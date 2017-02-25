<?php

class Gallery_model extends CI_Model {



    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$db = $this->load->database();
    }

    function get_gallery(){
    	$this->db->order_by('id','desc');
		$query = $this->db->get("photo");
		$result =$query->result();	
 		return $result;
 	}

 	function update_status($status,$id)
    {
        $this->db->update('photo',['status'=>$status], array('id' => $id));
        return ($this->db->affected_rows() > 0)?1:0;          
    }

	function get_count(){
		$query = $this->db->query("SELECT count(*)  count FROM `photo` where  status = 'Active' ");
		$result =$query->result();
		return $result[0]->count;
	}
	
	function get_by_range($start,$end){
		$query = $this->db->query("select * from photo where status = 'Active' order by id desc  limit $start,$end ");
		$result =$query->result();	
 		return $result;
 	}
 	function get_cat_count($cat_id){
		$query = $this->db->query("SELECT count(*)  count FROM `photo` where cat_id=$cat_id and status = 'Active'");
		$result =$query->result();
		return $result[0]->count;
	}
	
	function get_cat_by_range($cat_id,$start,$end){
		$query = $this->db->query("select count(*) as cnt,p.* from photo p join photo_images pi on  p.id=pi.photo_id where p.cat_id=$cat_id and p.status = 'Active' group by p.id order by p.id  desc  limit $start,$end ");
		$result =$query->result();
		return $result;
 	}
 	function get_cat_photo_count($photo_id){
		$query = $this->db->query("SELECT count(*)  count FROM `photo_images` where photo_id=$photo_id ");
		$result =$query->result();
		return $result[0]->count;
	}
	function getHighlights(){
		$query = $this->db->query("SELECT * FROM `photo` where status='Active' order by id desc limit 0,4");
		$result =$query->result();
		return $result;
	}
	
	function get_cat_photo_by_range($photo_id,$start,$end){
		$query = $this->db->query("select * from photo_images where photo_id=$photo_id limit $start,$end ");
		$result =$query->result();	
 		return $result;
 	}

 	function get_albums_photos($photo_id){
		$query = $this->db->query("select * from photo_images where photo_id=$photo_id ");
		$result =$query->result();	
 		return $result;
 	}	
 	function get_cat_photo_details($photo_id){
		$query = $this->db->query("select * from photo p inner join celebrity_cat cc on p.cat_id=cc.id where p.id=$photo_id ");
		$result =$query->result();	
 		return $result;
 	}
 	function get_cat_details($cat_id){
		$query = $this->db->query("select * from celebrity_cat where id=$cat_id ");
		$result =$query->result();	
 		return $result;
 	}	

 	function getCategories(){
 		$query = $this->db->query("select * from celebrity_cat");
		$result =$query->result();	
 		return $result;
 	}

	
}