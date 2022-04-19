<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Inquiry extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Inquiry_model');
        
    }
    
    public function view_get_support()
    {
        $session_id = $this->session->userdata('client_login');
        if($session_id==true)
        {
            $data['result']=$this->Inquiry_model->getall_get_support();
            $this->load->view("admin/get_support_view", $data);
            
        } else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
            
        }
    }
    public function delete_getsupport($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $this->Inquiry_model->delete_getsupport($t_id);
            $this->session->set_flashdata('success', 'Get support Inquiry Delete successfully');
            redirect(base_url().'inquiry/view_get_support');
        }else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    
    public function getsupport_details($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $data = array('g_status' => '0' );
            $this->Inquiry_model->update_getsupportdata($data,$t_id);
            
            $data['result'] = $this->Inquiry_model->get_single_getsupportdata($t_id);
            $this->load->view('admin/getsupport_details', $data);
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    public function view_home_sample_collection()
    {
        $session_id = $this->session->userdata('client_login');
        if($session_id==true)
        {
            $data['result']=$this->Inquiry_model->getall_home_collection();
            $this->load->view("admin/home_sample_collection_view", $data);
            
        } else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
            
        }
    }
    public function delete_home_sample($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $this->Inquiry_model->delete_home_sample($t_id);
            $this->session->set_flashdata('success', 'Inquiry Delete successfully');
            redirect(base_url().'inquiry/view_home_sample_collection');
        }else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    
    public function home_sample_status($t_id,$status)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $data = array('h_status' => $status );
            $this->Inquiry_model->update_home_sample_data($data,$t_id);
            
            
            
             $this->session->set_flashdata('success','Home Sample Collection Status Change Successfully!');
            redirect(base_url(). 'inquiry/view_home_sample_collection');
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
 
    
    public function view_inquiry()
    {
        $session_id = $this->session->userdata('client_login');
        if($session_id==true)
        {
            $data['result']=$this->Inquiry_model->getall_inquiry();
            $this->load->view("admin/inquiry_view", $data);
            
        } else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
            
        }
    }
    public function export_getsupport()
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
                
                $query6= $this->db->query("SELECT * FROM `get_support` WHERE g_date
                BETWEEN '$daterangepicker' AND '$daterangepicker2'");
                $data['result'] =$query6->result();
                
                
                
            } else
            {
                $query6= $this->db->query("SELECT * FROM `get_support` WHERE g_status='1'");
                $data['result'] =$query6->result();
                //$data['result']=$this->Inquiry_model->getnew_inquiry();
            }
            $this->load->view("admin/getsupport_export", $data);
            
        } else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
            
        }
    }
    
    
    public function export_home_sample_collection()
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
                
                $query6= $this->db->query("SELECT * FROM `home_collection` WHERE h_date
                BETWEEN '$daterangepicker' AND '$daterangepicker2'");
                $data['result'] =$query6->result();
                
                
                
            } else
            {
                $query6= $this->db->query("SELECT * FROM `home_collection` WHERE h_status='1'");
                $data['result'] =$query6->result();
                //$data['result']=$this->Inquiry_model->getnew_inquiry();
            }
            $this->load->view("admin/home_sample_collection_export", $data);
            
        } else
        {
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
               
               $query6= $this->db->query("SELECT * FROM `inquiry` WHERE date 
                BETWEEN '$daterangepicker' AND '$daterangepicker2'");
               $data['result'] =$query6->result();
               
                  
               
            } else 
            {
                $query6= $this->db->query("SELECT * FROM `inquiry` WHERE status='1'");
                $data['result'] =$query6->result();
                //$data['result']=$this->Inquiry_model->getnew_inquiry();
            }
            $this->load->view("admin/inquiry_export", $data);
            
        } else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
            
        }
    }
    
    
    public function delete_inquiry($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $this->Inquiry_model->delete_id($t_id);
            $this->session->set_flashdata('success', 'Inquiry Delete successfully');
            redirect(base_url().'inquiry/view_inquiry');
        }else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    public function inquiry_details($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $data = array('status' => '0' );
            $this->Inquiry_model->update_data($data,$t_id);
            
            $data['result'] = $this->Inquiry_model->get_single_data($t_id);
            $this->load->view('admin/inquiry_details', $data);
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    
    
    
    
}
?> 