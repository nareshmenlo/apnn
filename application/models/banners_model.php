<?php

class Banners_model extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $this->db->order_by('id desc');
        $query = $this->db->get('banners');
        return $query->result();
    }

     function getHeaderBanners()
    {
        $this->db->order_by('id desc');
        $this->db->limit(10);
        $query = $this->db->get('banners');
        return $query->result();
    }

    function get_single_post($id)
    {
        $this->db->where('id', $id);
        $query=$this->db->get('banners');
        return array_shift($query->result());
    }
    
    function insert_entry($data)
    {
        return $this->db->insert('banners', $data);
    }

    function update_status($status,$id)
    {
        $this->db->update('banners',['status'=>$status], array('id' => $id));
        return ($this->db->affected_rows() > 0)?1:0;          
    }

    function delete_post($id)
    {
        $this->db->delete('banners', array('id' => $id));
        return ($this->db->affected_rows() > 0)?1:0;          
    }

    function update_entry($data,$id)
    {
        $this->db->update('banners', $data, ['id' => $id]);
    }

}
