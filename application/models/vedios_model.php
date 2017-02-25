<?php

class Vedios_model extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $this->db->order_by('id','desc');
        $query = $this->db->get('vedios');
        return $query->result_array();
    }

    function getHeaderVedios()
    {
        $this->db->where('is_active = 1');
        $this->db->order_by('id','desc');
        $this->db->limit(10);
        $query = $this->db->get('vedios');
        return $query->result_array();
    }

    function get_single_vedio($id)
    {
        $this->db->where('id', $id);
        $query=$this->db->get('vedios');
        return array_shift($query->result());
    }
    
    function insert_entry($data)
    {
        return $this->db->insert('vedios', $data);
    }

    function update_status($status,$id)
    {
        $this->db->update('vedios',['is_active'=>$status], array('id' => $id));
        
        return ($this->db->affected_rows() > 0)?1:0;          
    }

    function delete_vedio($id)
    {
        $this->db->delete('vedios', array('id' => $id));
        return ($this->db->affected_rows() > 0)?1:0;          
    }

    function update_entry($data,$id)
    {
        $this->db->update('vedios', $data, ['id' => $id]);
    }

}
