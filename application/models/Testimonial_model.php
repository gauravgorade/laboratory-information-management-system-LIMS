<?php
class Testimonial_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function  get_single_data($cid)
    {
        $this->db->select('*');
        $this->db->from('testimonial');
        $this->db->where('t_id', $cid);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
        
    }
    
    
    function update_data($data,$userid)
    {
        $this->db->where('t_id', $userid);
        $this->db->update('testimonial', $data);
    }
    
    
    function get_testimonial()
    {
        $this->db->select('*');
        $this->db->from("testimonial");
        $this->db->order_by("t_id", "DESC");
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
        
    }
    
    function insert_data($data)
    {
        $this->db->insert('testimonial', $data);
    }
    
    
    
    function delete_id($cid)
    {
        $this->db->where('t_id', $cid);
        $this->db->delete('testimonial');
    }
}