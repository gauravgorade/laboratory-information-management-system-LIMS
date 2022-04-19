<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Testimonial extends CI_Controller 
{
    
        function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->helper('url');
             $this->load->library('form_validation');
            $this->load->model('testimonial_model');
            
       }
       
       public function view_testimonial()
       {   
           $session_id = $this->session->userdata('client_login');
           if($session_id==true)
           {
               $data['result']=$this->testimonial_model->get_testimonial();
               $this->load->view("admin/testimonial_view", $data);   
                
           } else 
           {
               $data['message'] = 'your login session has expired';
               $this->load->view('admin/login', $data);
              
           } 
       }
       
       
       public function add_testimonial()
       {
           $session_id = $this->session->userdata('client_login');
           if($session_id==true)
           {
               $this->load->view('admin/testimonial_add');
               
           } else {
               $data['message'] = 'Your login session has expired';
               $this->load->view('admin/login', $data);
               
           } 
       }
      
       public function status($t_id,$status)
       {
           $session_id = $this->session->userdata('client_login');
           if ($session_id == true)
           {
               $data = array('status' => $status );
               
               $this->testimonial_model->update_data($data,$t_id);
               $this->session->set_flashdata('success','Testimonial Status Change   Successfully!');
               redirect(base_url(). 'Testimonial/view_testimonial');
                    
           }else {
               $data['message'] = 'Your login session has expired';
               $this->load->view('admin/login', $data);
           }
       }
       
       
       
       public function edit($t_id)
       {
           $session_id = $this->session->userdata('client_login');
           if ($session_id == true)
           {
             
               $data['result'] = $this->testimonial_model->get_single_data($t_id);
               $this->load->view('admin/testimonial_edit', $data);
                
           }else {
               $data['message'] = 'Your login session has expired';
               $this->load->view('admin/login', $data);
           }
       }
       
       public function delete_testimonial($t_id)
       {
           $session_id = $this->session->userdata('client_login');
           if ($session_id == true)
           {
              $result=$this->testimonial_model->get_single_data($t_id);
              $img_path="";
              foreach ($result as $row)
               {
                   $img_path =$row->img_path;
               } 
               $old_file_path = "public/img/client/".$img_path;
               if (file_exists($old_file_path))
               {
                   unlink($old_file_path);
               }
               
               $this->testimonial_model->delete_id($t_id);
               $this->session->set_flashdata('success', 'Testimonial delete successfully !');
               redirect(base_url() . 'Testimonial/view_testimonial');
           }else 
           {
               $data['message'] = 'Your login session has expired';
               $this->load->view('admin/login', $data);
           }
       }
       
       
       public function update_testimonial()
       {
           $session_id = $this->session->userdata('client_login');
           if ($session_id == true)
           {
              
               function test_input($data)
               {
                   $data = trim($data);
                   $data = stripslashes($data);
                   $data = strip_tags($data);
                   $data = htmlspecialchars($data);
                   return $data;
               }
               $url = test_input($this->input->post('url'));
               $fullname = test_input($this->input->post('fullname'));
               $cname = test_input($this->input->post('cname'));
               $thought = test_input($this->input->post('thought'));
               $old_profile =  test_input($this->input->post('old_profile'));
               $picture = "";
               if (! empty($_FILES['userImage']['name'])) {
                   $config['upload_path'] = 'public/img/client';
                   $config['max_size'] = 2100;
                   // $config['allowed_types'] = 'jpg|jpeg|png|gif';
                   $config['allowed_types'] = 'jpg|jpeg|png|gif';
                   $config['file_name'] = time() . '-' . $_FILES['userImage']['name'];
                   
                   // Load upload library and initialize configuration
                   $this->load->library('upload', $config);
                   $this->upload->initialize($config);
                   
                   if ($this->upload->do_upload('userImage')) {
                       $uploadData = $this->upload->data();
                       $picture = $uploadData['file_name'];
                        
                       $old_file_path = "public/img/client/".$old_profile;
                            if (file_exists($old_file_path))
                           {
                               unlink($old_file_path);
                           }
                    } else {
                       $picture = "";
                       $this->session->set_flashdata('fileerror', 'Plase Must Choose jpg|jpeg|png|gif
                            formate file and size MAX 2 MB !');
                   }
               } else {  $picture = $old_profile; }
               
               
               $t_id = test_input($this->input->post('t_id'));
               $data = array('full_name' => $fullname,
                   'thought' => $thought, 
                   'c_desc' => $cname,
                   'img_path'=> $picture );
            
                  $this->testimonial_model->update_data($data,$t_id);
                 $this->session->set_flashdata('success','Testimonial Update Successfully!');
                 redirect($url);
               
               
           }else {
               $data['message'] = 'Your login session has expired';
               $this->load->view('admin/login', $data);
           }
         redirect(base_url() . 'Testimonial/view_testimonial');
       }
       
       
       
       public function creting_testimonial()
       {
           $session_id = $this->session->userdata('client_login');
           if ($session_id == true)
           {
               function test_input($data)
               {
                   $data = trim($data);
                   $data = stripslashes($data);
                   $data = strip_tags($data);
                   $data = htmlspecialchars($data);
                   return $data;
               }
               
               if (isset($_POST['fullname']))
               {
                   
                   $fullname = test_input($this->input->post('fullname'));
                   $cname = test_input($this->input->post('cname'));
                   $thought = test_input($this->input->post('thought'));
                   
                   $picture="";
                   if(!empty($_FILES['userImage']['name']))
                   {
                       $config['upload_path'] = 'public/img/client';
                       $config['max_size']  = 2100;
                       $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    /*    $config['allowed_types'] = 'doc|pdf'; */
                       $config['file_name'] = time().'-'.$_FILES['userImage']['name'];
                       
                       //Load upload library and initialize configuration
                       $this->load->library('upload',$config);
                       $this->upload->initialize($config);
                       
                       if($this->upload->do_upload('userImage'))
                       {
                           $uploadData = $this->upload->data();
                           $picture = $uploadData['file_name'];
                          
                            $data = array('full_name' => $fullname,'thought' => $thought,  'c_desc' => $cname,
                               'img_path'=> $picture , 'status' => 1);
                           $this->testimonial_model->insert_data($data);
                           $this->session->set_flashdata('success','Testimonial Added Successfully!');
                         //   redirect($url);
                       }else
                       {
                           $this->session->set_flashdata('error','Please Choose Image JPG OR PNG format and file size must be MAX 2 MB!');
                       }
                   }else
                   {
                       $this->session->set_flashdata('error','Plase Choose User Image!');
                   }
               } else 
               {
                 $this->session->set_flashdata('error','Fill Up All Entery!');
                   
               }
               
             redirect(base_url() . 'Testimonial/add_testimonial');
               
           } else
           { $data['message'] = 'your login session has expired';
           $this->load->view('admin/login', $data);
           // redirect(base_url() . 'users/create');
           }
       }
       
       
       
       
}