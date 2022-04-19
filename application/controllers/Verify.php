<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Verify extends CI_Controller
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
        $this->load->model('Email_contact');
        $this->load->model('Inquiry_model');
    }
    
    
    
    public function index()
    {
        $data['result']= $this->website_model->get_single_data();
        $this->load->view('verify_otp', $data);
    }
    
    public function validate_otp()
    {
        
        $verify_otp =  $this->input->post('verify_otp');
        
        
       
    if ($this->session->userdata('contact_otp'))
     {  $contact_otp =$this->session->userdata('contact_otp');
       if ($contact_otp == $verify_otp )
        {
            if ($this->session->userdata('temp_contact_id'))
            {
                $temp_contact_id =$this->session->userdata('temp_contact_id');
                $status="1";
                $data = array('verify' => $status);
                
                $this->Contact_model->update_data($data,$temp_contact_id);
                
                $result=$this->Contact_model->get_single_data($temp_contact_id);
                foreach ($result as $row)
                {
                    $name = $row->name; $mobile = $row->mobile;
                    $email = $row->email; ;   $message = $row->subject;
                    
                    $this->Email_contact->contact_email_admin($name,$email, $mobile,$message);
                   $this->Email_contact->cotact_email_user($email);
                 //   $admin_no1 ="8446641804";
                    //    Admin Messages  
                    $admin_no1 = 9822365247;  $admin_no2 = 9890590499;
                    $admin_msg = "Alert!!\r\nInquiry From Detect Website,\r\nName: ".$name."\r\nEmail: ".$email."\r\nMobile: ".$mobile."\r\nMessage: ".$message."\r\nTake a note!";
                    
                    $user_msg = "Dear User, ".$contact_otp." is your Detect Diagnostics OTP for mobile number verification.";
                    $this->sms_send_model->sendmsg($admin_no1,$admin_msg);
                    $this->sms_send_model->sendmsg($mobile,$user_msg);
                    $this->sms_send_model->sendmsg($admin_no2,$admin_msg);
                    
                }
                
               $this->session->unset_userdata('contact_otp');
               $this->session->unset_userdata('temp_contact_id');
            } 
            
            if ($this->session->userdata('temp_text_contect'))
            {  $temp_text_contect =  $this->session->userdata('temp_text_contect');
            $status="1";
            $data = array('verify' => $status);
            $this->Contact_model->update_contactlist($data,$temp_text_contect);
            $this->session->userdata('temp_text_contect');
            }
          
            $this->session->set_flashdata('successhome','Contacting us, we will reply soon!');
        }
        else
        {
            $this->session->set_flashdata('error','Invalid or Wrong  OTP Enter');
        }
    }
        
        
        
        if ($this->session->userdata('package_otp'))
        {  $package_otp =$this->session->userdata('package_otp');
           if ($package_otp == $verify_otp )
            { 
                if ($this->session->userdata('temp_inquiry_id'))
                {
                    $temp_inquiry_id = $this->session->userdata('temp_inquiry_id');
                    $status="1";
                    $data = array('verify' => $status);
                    $p_package="";
                    $this->Home_data->update_package_collection($data,$temp_inquiry_id);
                    $result=$this->Inquiry_model->get_single_data($temp_inquiry_id);
                    foreach ($result as $row)
                    {
                        $h_name = $row->name; $h_mobno = $row->mobile;
                        $h_email = $row->email; $p_package = $row->subject;
                        
                          $this->Home_data->email_user_package_collection($h_email,$p_package);
                          $this->Home_data->email_admin_package_collection($h_name,$h_mobno,$h_email,$p_package );
                        // $admin_no1 ="8446641804";
                        //   Admin Messages
                        $admin_no1 = 9822365247;  $admin_no2 = 9890590499;
                         $admin_msg = "Alert!!\r\nInquiry From Detect Website,\r\nName: ".$h_name."\r\nMobile No.: ".$h_mobno."\r\nEmail: ".$h_email."\r\nPackage: ".$p_package."\r\nTake a note & Call Immediately...";
                        $user_msg ="Congrats for taking care of your health by choosing Swasthyam Wellness Package. Our representative will contact you,\r\nRegards,\r\nDetect Diagnostics\r\n9822365247";
                        
                           $this->sms_send_model->sendmsg($admin_no1,$admin_msg);
                           $this->sms_send_model->sendmsg($h_mobno,$user_msg);
                            $this->sms_send_model->sendmsg($admin_no2,$admin_msg);
                    }
                   $this->session->unset_userdata('package_otp');
                   $this->session->unset_userdata('temp_inquiry_id');
                }
                if ($this->session->userdata('temp_text_contect'))
                {  $temp_text_contect =  $this->session->userdata('temp_text_contect');
                $status="1";
                $data = array('verify' => $status);
                $this->Contact_model->update_contactlist($data,$temp_text_contect);
                $this->session->userdata('temp_text_contect');
                }
            
                $this->session->set_flashdata('successhome',''.$p_package.'Your Swasthyam Package Booked Succesfully We will connect with you shortly');
            }
            else
            {
                $this->session->set_flashdata('error','Invalid or Wrong  OTP Enter');
            }
        }
        
        
        
        
        
  if ($this->session->userdata('support_otp'))
    {  $support_otp =$this->session->userdata('support_otp');
      if ($support_otp == $verify_otp )
      {
          if ($this->session->userdata('temp_get_support_id'))
          {
              $temp_get_support_id =  $this->session->userdata('temp_get_support_id');
              $status="1";
              $data = array('verify' => $status);
              
              $this->Home_data->update_get_support($data,$temp_get_support_id);
              $result=$this->Inquiry_model->get_single_getsupportdata($temp_get_support_id);
              foreach ($result as $row)
              {
                  $h_name = $row->g_name; $h_mobno = $row->g_mobno;
                  $h_email = $row->g_email; $g_message = $row->g_message;
                  
                  $this->Home_data->email_user_get_support($h_email);
                   $this->Home_data->email_admin_get_support($h_name, $h_mobno, $h_email, $g_message);
                 
                  //  $admin_no1 ="8446641804";
                   $g_message =substr($g_message,0,30);
                   $admin_no1 = 9822365247;  $admin_no2 = 9890590499;
                  $admin_msg = "Alert!!\r\nGet Support Inquiry From Detect Website,\r\nName: ".$h_name."\r\nEmail: ".$h_email."\r\nMobile: ".$h_mobno."\r\nMessage: ".$g_message."\r\nTake a note!";
                  $user_msg ="Thank you for contacting us!\r\nYou can call us for specific questions, We are open 365 x 24 x 7 days.\r\nRegards,\r\nDetect Diagnostics\r\n9822365247";
               
                    $this->sms_send_model->sendmsg($admin_no1,$admin_msg);
                    $this->sms_send_model->sendmsg($h_mobno,$user_msg);
                    $this->sms_send_model->sendmsg($admin_no2,$admin_msg);
               }
                $this->session->unset_userdata('support_otp');
                $this->session->unset_userdata('temp_get_support_id');
          }  if ($this->session->userdata('temp_text_contect'))
          {  $temp_text_contect =  $this->session->userdata('temp_text_contect');
              $status="1";
              $data = array('verify' => $status);
              $this->Contact_model->update_contactlist($data,$temp_text_contect);
              $this->session->userdata('temp_text_contect');
          }
           
          $this->session->set_flashdata('successhome','for contacting us, we will reply soon!');
      }
       else
      {
            $this->session->set_flashdata('error','Invalid or Wrong  OTP Enter');
      }
        
  }
      
        
        
        
  $verify_otp =  $this->input->post('verify_otp');
        
   if ($this->session->userdata('home_otp'))
     {  $home_otp =$this->session->userdata('home_otp');
     if ($home_otp == $verify_otp )
            {   
                 if ($this->session->userdata('temp_home_sample'))
                {
                    $temp_home_sample =  $this->session->userdata('temp_home_sample');
                    $status="1";
                    $data = array('verify_home' => $status);
                    $this->Home_data->update_home_sample($data,$temp_home_sample);
                    $result=$this->Home_data->single_home_sample($temp_home_sample);
                    foreach ($result as $row)
                    {
                        $h_name = $row->h_name; $h_mobno = $row->h_mobno;
                        $h_email = $row->h_email;
                        
                        $this->Home_data->email_user_home_sample($h_email);
                         $this->Home_data->email_admin_home_sample($h_name,$h_email,$h_mobno);
                        $admin_no1 = "9822365247";  $admin_no2 = "9890590499";
                        
                      //  $admin_no1 ="8446641804";
                        
                        $admin_msg = "Alert!!\r\nInquiry From Detect Website,\r\nName: ".$h_name."\r\nMobile No.: ".$h_mobno."\r\nEmail: ".$h_email."\r\nFrom: Home Sample Collection Form\r\nTake a note & Call Immediately...";
                        $user_msg ="Thank you for choosing us!\r\nOur representative will contact you, We guarantee you an extraordinary doorstep service.\r\nRegards,\r\nDetect Diagnostics\r\n9822365247";
                        
                          $this->sms_send_model->sendmsg($admin_no1,$admin_msg);
                        $this->sms_send_model->sendmsg($h_mobno,$user_msg);
                        $this->sms_send_model->sendmsg($admin_no2,$admin_msg);
                    }
                    $this->session->unset_userdata('home_otp');
                    $this->session->unset_userdata('temp_home_sample');
                }
                
                if ($this->session->userdata('temp_text_contect'))
                {  
                $temp_text_contect =  $this->session->userdata('temp_text_contect');
                $status="1";
                $data = array('verify' => $status);
                $this->Contact_model->update_contactlist($data,$temp_text_contect);
                $this->session->userdata('temp_text_contect');
                }
               
               // $this->session->set_flashdata('successhome','Your Home Visit is Booked Succesfully,\nWe will connect with you shortly');
                 
                $this->session->set_flashdata('successhome','Your Home Visit is Booked Succesfully,\nWe will connect with you shortly');
            }
            else
            {
                $this->session->set_flashdata('error','Invalid or Wrong  OTP Enter');
            }
        
    }
      
      
       
       redirect(base_url() . 'Verify');
        
       
    }
    
    
    
    
}