<?php

class Posts_model extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $this->db->order_by('id','desc');
        $query = $this->db->get('posts');
        return $query->result();
    }

    function get_single_post($id)
    {
        $this->db->where('id', $id);
        $query=$this->db->get('posts');
        return array_shift($query->result());
    }
    
    function insert_entry($data)
    {
        return $this->db->insert('posts', $data);
    }

    function update_status($status,$id)
    {
        $this->db->update('posts',['status'=>$status], array('id' => $id));
        return ($this->db->affected_rows() > 0)?1:0;          
    }

    function delete_post($id)
    {
        $this->db->delete('posts', array('id' => $id));
        return ($this->db->affected_rows() > 0)?1:0;          
    }

    function update_entry($data,$id)
    {
        $this->db->update('posts', $data, ['id' => $id]);
    }

    function get_posts_count(){
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('status = "Active"');
        $query = $this->db->get();
        return $result =$query->num_rows();
    }

    function get_posts_by_range($start,$end){
        $query = $this->db->query("select * from posts  order by id desc limit $start,$end ");
        return $result =$query->result();
    }

}
