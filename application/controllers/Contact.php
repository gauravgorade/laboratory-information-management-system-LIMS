<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Contact extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Contact_model');
        $this->load->model('website_model');
        $this->load->model('Admin_model');
        $this->load->model('sms_send_model');
        $this->load->model('Email_contact');
        
    }
    
    public function newslatter()
    { 
           function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = strip_tags($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            
            
            $district  = test_input($this->input->post('district'));
            $email  = test_input($this->input->post('subscribe_email'));
        $url  = $this->input->post('url');
        $result=$this->Contact_model->check_email_exist($email);
        $count1=count($result);
        if ($count1=='0')
        {
            $date = date("Y-m-d");   $time = date("H:i:s"); $status= "1";
            $data = array('email' => $email,'entryfrom' => $district,
                'date' => $date,'time' => $time,'status' => $status);
           

            $this->Contact_model->insert_email_save($data);
            $this->session->set_flashdata('success','for Subscribed our newsletter');
          
          //  $this->Email_contact->email_newslatter_user($email);
         //   $this->Email_contact->email_newslatter_admin($email);
            
          //  $admin_no1="8446641804";
            $admin_no1 = 9822365247;  $admin_no2 = 9890590499;  
            $admin_msg = "Alert!!\r\nNew subscriber joined,\r\n".$email."\r\nWe are growing...";
            
         //  $this->sms_send_model->sendmsg($admin_no1,$admin_msg);
        // $this->sms_send_model->sendmsg($admin_no2,$admin_msg);
             
            $this->session->set_flashdata('success','successfully subscribed our newsletter!!');
            
        }
        else
        {
            $this->session->set_flashdata('error','You already subscribed our newsletter!');
            
            
        }
        
        
        redirect($url);
    }
    
    
    public function contact_us()
    {
             function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = strip_tags($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            $district  = test_input($this->input->post('district'));
            $url  = $this->input->post('url');
            $name =  $this->input->post('name');
            $email  = test_input($this->input->post('email'));
            $mobile  = test_input($this->input->post('mobile'));
            $message  = test_input($this->input->post('message'));
          
            $date = date("Y-m-d");   $time = date("H:i:s");
            $status= "1";  $verify_home ="0";
            
            $data = array('name' => $name, 'email' => $email,'entryfrom' => $district,
               'mobile'=> $mobile ,'subject'=> $message ,
                'date' => $date,'time' => $time,
                'status' => $status,'verify' => $verify_home);
          
            $this->Contact_model->insert_contact($data);
             
              if ($this->session->userdata('contact_otp'))
             { 
                 $contact_otp = $this->session->userdata('contact_otp');
             } else
             { 
                 $contact_otp = rand(100001,999999);
                 $this->session->set_userdata('contact_otp',$contact_otp); 
             }
             
             $otp_msg ="Your $contact_otp OTP for GET IN TOUCH,\r\nDetect Diagnostics\r\n9822365247";
             $this->sms_send_model->sendmsg($mobile,$otp_msg);
            
           
             $result=$this->Contact_model->check_contact_exist($mobile);
             $count1=count($result);
             if ($count1=='0')
             {
                 $data2 = array('t_name' => $name, 
                     't_mobno'=> $mobile , 't_date' => $date,'t_status' => $status,);
                  $this->Contact_model->insert_contact_save($data2);
             }
            $result=$this->Contact_model->check_email_exist($email);
            $count1=count($result);
              if ($count1=='0')
              {
                  $data2 = array('email' => $email, 'entryfrom' => $datafrom,
                      'date' => $date,'time' => $time, 'status' => $status);
                   $this->Contact_model->insert_email_save($data2);
             }  
             $this->session->set_flashdata('success','OTP has Send Your mobile number!');
             
              redirect(base_url() . 'Verify');
         
    }
    
    public function view_contactlist()
    {
        $session_id = $this->session->userdata('client_login');
        if($session_id==true)
        {
            $data['result']=$this->Contact_model->getall_contactlist();
            $this->load->view("admin/mobile_view", $data);
            
        } else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
            
        }
    }
    
    public function contactlist_status($t_id,$status)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $data = array('t_status' => $status );
            
            $this->Contact_model->update_contactlist($data,$t_id);
            $this->session->set_flashdata('success','Contact Status Change Successfully!');
            redirect(base_url(). 'Contact/view_contactlist');
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    public function view_contact()
    {
        $session_id = $this->session->userdata('client_login');
        if($session_id==true)
        {
            $data['result']=$this->Contact_model->getall_contact();
            $this->load->view("admin/contact_view", $data);
            
        } else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
            
        }
    }
    
    
    public function delete_contactlist($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $this->Contact_model->delete_contactlist($t_id);
            $this->session->set_flashdata('success', 'Contact Mobile Number Delete successfully');
            redirect(base_url().'Contact/view_contactlist');
        }else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    public function delete_contact($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $this->Contact_model->delete_id($t_id);
            $this->session->set_flashdata('success', 'Contact Delete successfully');
            redirect(base_url().'Contact/view_contact');
        }else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    public function view_details($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $data = array('status' => '0' );
            $this->Contact_model->update_data($data,$t_id);
            
            $data['result'] = $this->Contact_model->get_single_data($t_id);
            $this->load->view('admin/contact_details', $data);
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    public function export()
    {
        $session_id = $this->session->userdata('client_login');
        if($session_id==true)
        {
            if ($this->input->post('daterangepicker2') != Null)
            {
                $daterangepicker = date('Y-m-d',strtotime($this->input->post('daterangepicker')));
                
                $daterangepicker2 =date('Y-m-d',strtotime($this->input->post('daterangepicker2')));
                
                $sel_msg= "Data Shown Form date $daterangepicker TO  $daterangepicker2";
                
                $this->session->set_flashdata('export_msg',$sel_msg);
                
                $query6= $this->db->query("SELECT * FROM `contact` WHERE date
                BETWEEN '$daterangepicker' AND '$daterangepicker2'");
                $data['result'] =$query6->result();
                
            } else
            {
                $query6= $this->db->query("SELECT * FROM `contact` WHERE status='1'");
                $data['result'] =$query6->result();
                //$data['result']=$this->Inquiry_model->getnew_inquiry();
            }
            $this->load->view("admin/contact_export", $data);
            
        } else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
            
        }
    }
    
   
    

    
    
    
}
 ?>