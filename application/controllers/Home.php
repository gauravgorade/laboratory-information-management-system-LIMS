<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Home extends CI_Controller
{
    function __construct()
    {
        
        parent::__construct();
        #Libariry Coll
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('admin_model');
        $this->load->model('website_model');
        $this->load->model('Contact_model');
        $this->load->model('Slider_model');
        $this->load->model('Home_data');
        $this->load->model('sms_send_model');
        $this->load->model('send_email_model');
    }
    
   
    
    
      
    public function index()
    {
       
        $data['result']= $this->website_model->get_single_data();
        $data['result2']=$this->Slider_model->get_ative_sliderdata();
        $this->load->view('index', $data);
    }
    
    public function beed()
    {
       
        $data['result']= $this->website_model->get_single_data();
        $data['result2']=$this->Slider_model->get_ative_sliderdata();
        $this->load->view('beed', $data);
    }
    
    
 
    
    
    
    public function get_support()
    {
        $district  = $this->input->post('district');
            $url  = $this->input->post('url');
        $h_name =  $this->input->post('g_name');
        $h_mobno=  $this->input->post('g_mobno');
        $h_email=  $this->input->post('g_email');
        $g_message =  $this->input->post('g_message');
        
        $date = date("Y-m-d");   $time = date("H:i:s"); $status= "1";
        $data = array('g_name' => $h_name,'g_mobno' => $h_mobno,'entryfrom' => $district,
            'g_email' => $h_email, 'g_message' => $g_message,'g_date' => $date,
            'g_status' => $status);
        //print_r($data);
          $this->Home_data->insert_get_support($data);
          
        if ($this->session->userdata('support_otp'))
        {
            $support_otp = $this->session->userdata('support_otp');
        } else
        {   $support_otp = rand(100001,999999);
             $this->session->set_userdata('support_otp',$support_otp);
        }
        
        $this->session->set_flashdata('success','OTP has Send Your mobile number!');
        $otp_msg ="Your OTP $support_otp  for Get Support form us,\r\nDetect Diagnostics\r\n9822365247";
        $this->sms_send_model->sendmsg($h_mobno,$otp_msg);
         
         
         $result=$this->Contact_model->check_contact_exist($h_mobno);
        $count1=count($result);
        if ($count1=='0')
        {
            $data2 = array('t_name' => $h_name,
                't_mobno'=> $h_mobno , 't_date' => $date,'t_status' => $status);
            $this->Contact_model->insert_contact_save($data2);
            
        }
        
        $result2=$this->Contact_model->check_email_exist($h_email);
        $count2=count($result2);
        if ($count2=='0')
        {
            $data3 = array('email' => $h_email,
                'date' => $date,'time' => $time, 'status' => $status);
            $this->Contact_model->insert_email_save($data3);
            
        }
        
   
         redirect(base_url() . 'Verify');
        
      
    }
    
    
    
    
    public function home_sample()

    { 
                // $district =  $this->input->post('district');
                // $district =  '2';
               
                $district  = $this->input->post('district');               
                $url  = $this->input->post('url');
                $h_name =  $this->input->post('h_name');
                $h_mobno=  $this->input->post('h_mobno');
                $h_email=  $this->input->post('h_email');
                $date = date("Y-m-d");   $time = date("H:i:s"); $status= "1";
                $verify_home ="0";
                $data = array('h_name' => $h_name,'entryfrom' => $district,'h_mobno' => $h_mobno,
                    'h_email' => $h_email, 'h_date' => $date,'h_status' => $status,'verify_home' => $verify_home);
                print_r($data);
                
                if ($this->session->userdata('home_otp'))
                {
                    $contact_otp = $this->session->userdata('home_otp');
                } else
                {
                    $contact_otp = rand(100001,999999);
                    $this->session->set_userdata('home_otp',$contact_otp);
                } 
                $this->Home_data->insert_home_sample($data);
                $this->session->set_flashdata('success','OTP has Send Your mobile number!');
              
                $otp_msg ="Your OTP $contact_otp  for Home Sample Collection,\r\nDetect Diagnostics\r\n9822365247";
                $this->sms_send_model->sendmsg($h_mobno,$otp_msg);
                 
                
                 $result=$this->Contact_model->check_contact_exist($h_mobno);
                 $count1=count($result);
                if ($count1=='0')
                {
                    $data2 = array('t_name' => $h_name,
                        't_mobno'=> $h_mobno , 't_date' => $date,'t_status' => $status,'verify' => $verify_home);
                      $this->Contact_model->insert_contact_save($data2);
                    
                }
                
                $result2=$this->Contact_model->check_email_exist($h_email);
                $count2=count($result2);
                if ($count2=='0')
                {
                    $data3 = array('email' => $h_email,
                        'date' => $date,'time' => $time, 'status' => $status);
                    $this->Contact_model->insert_email_save($data3);
                    
                }
                
            redirect(base_url() . 'Verify');
        
       
    }
    
    
    
    public function home_package_collection()
    {
        
        $h_name =  $this->input->post('p_name');
        $h_mobno=  $this->input->post('p_mobno');
        $h_email=  $this->input->post('p_email');
        $p_package =  $this->input->post('p_package');
        
        $date = date("Y-m-d");   $time = date("H:i:s"); $status= "1";
        $data = array('name' => $h_name,'mobile' => $h_mobno,
            'email' => $h_email, 'subject' => $p_package,'date' => $date,
            'time' => $time,'status' => $status);
       
        $this->Home_data->insert_package_collection($data);
     
        if ($this->session->userdata('package_otp'))
        {
            $package_otp = $this->session->userdata('package_otp');
        } else
        {
            $package_otp = rand(100001,999999);
            $this->session->set_userdata('package_otp',$package_otp);
        }  
        
        $this->session->set_flashdata('success','OTP has Send Your mobile number!');
        
        $otp_msg ="Your OTP $package_otp  for  Swasthyam Package,\r\nDetect Diagnostics\r\n9822365247";
        $this->sms_send_model->sendmsg($h_mobno,$otp_msg);
        
     
        $result=$this->Contact_model->check_contact_exist($h_mobno);
        $count1=count($result);
        if ($count1=='0')
        {
            $data2 = array('t_name' => $h_name,
                't_mobno'=> $h_mobno , 't_date' => $date,'t_status' => $status);
            
            $this->Contact_model->insert_contact_save($data2);
            
        }
        
        $result=$this->Contact_model->check_email_exist($h_email);
        $count1=count($result);
        if ($count1=='0')
        {
            $data3 = array('email' => $h_email,
                'date' => $date,'time' => $time, 'status' => $status);
            $this->Contact_model->insert_email_save($data3);
            
        }
        
     
        redirect(base_url().'Verify');
          
       
    }
}
?>