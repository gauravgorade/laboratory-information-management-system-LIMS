<?php

class Inquiry_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function getall_get_support()
    {
        $this->db->select('*');
        $this->db->from("get_support");
        $this->db->order_by("g_id", "DESC");
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
        
    }
    
    
    function getall_inquiry()
    {
        $this->db->select('*');
        $this->db->from("inquiry");
        $this->db->order_by("c_id", "DESC");
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
        
    }
    function getall_home_collection()
    {
        $this->db->select('*');
        $this->db->from("home_collection");
        $this->db->order_by("h_id", "DESC");
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
        
    }
    
    
    
    function delete_getsupport($cid)
    {
        $this->db->where('g_id', $cid);
        $this->db->delete('get_support');
        
       
    }
    
    function delete_home_sample($cid)
    { 
        $this->db->where('h_id', $cid);
         $this->db->delete('home_collection');
       
    }
    
    
    function update_getsupportdata($data,$cid)
    {
        $this->db->where('g_id', $cid);
        $this->db->update('get_support', $data);
    }
    
    
    function  get_single_getsupportdata($cid)
    {
        $this->db->select('*');
        $this->db->from('get_support');
        $this->db->where('g_id', $cid);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
        
    }
    
    function update_home_sample_data($data,$cid)
    {
        $this->db->where('h_id', $cid);
        $this->db->update('home_collection', $data);
    }
    
    function getnew_inquiry()
    {
        $this->db->select('*');
        $this->db->from('inquiry');
        $this->db->where('status', '1');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    function update_data($data,$cid)
    {
        $this->db->where('c_id', $cid);
        $this->db->update('inquiry', $data);
    }
    
    function  get_single_data($cid)
    {
        $this->db->select('*');
        $this->db->from('inquiry');
        $this->db->where('c_id', $cid);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
        
    }   
    
    function delete_id($cid)
    {
        $this->db->where('c_id', $cid);
        $this->db->delete('inquiry');
    }  
    
}