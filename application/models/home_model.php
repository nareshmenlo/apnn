<?php

class Home_model extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $db = $this->load->database();
    }
   
	function getBreakingNews(){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('status = "Active" and pagename="breakingnews"');
		$this->db->order_by("id","desc");
		$this->db->limit(6);
		$query = $this->db->get();
        return $result = $query->result();
	}
	
	function interviews(){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('status = "Active" and pagename="interview"');
		$this->db->order_by("id","desc");
		$this->db->limit(6);
		$query = $this->db->get();
        return $result = $query->result();
	}
	
	function getPoliticalNews(){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('status = "Active" and pagename="political_news"');
		$this->db->order_by("id","desc");
		$this->db->limit(6);
		$query = $this->db->get();
        return $result = $query->result();
	}
	
	function getCinema(){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('status = "Active" and pagename="cinema"');
		$this->db->order_by("id","desc");
		$this->db->limit(6);
		$query = $this->db->get();
        return $result = $query->result();
	}
	
	function getAll($pagename){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('status = "Active" and pagename="'.$pagename.'"');
		$this->db->order_by("id","desc");
		if($pagename=="movie_reviews"){
			$this->db->limit(5);	
		}else{
			$this->db->limit(6);
		}
 		$query = $this->db->get();
        return $result = $query->result();
	}

	function getAllBanners(){
		$this->db->select('*');
		$this->db->from('banners');
		$this->db->where('status = "Active"');
		$this->db->order_by("id","desc");
		$this->db->limit(10);
 		$query = $this->db->get();
        return $result = $query->result();
	}

	function getAllPosts(){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->order_by("id","desc");
 		$query = $this->db->get();
        return $result = $query->result();
	}	
	
	function getLastUpdates(){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('status = "Active" and pagename="latest" ');
		$this->db->order_by("id","desc");
		$this->db->limit(5);
		$query = $this->db->get();
        return $result = $query->result();
	}

	function flashNews(){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('status = "Active" and pagename="flashnews" ');
		$this->db->order_by("id","desc");
		$this->db->limit(6);
		$query = $this->db->get();
        return $result = $query->result();
	}

	function movieReviews(){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('status = "Active" and pagename="movie_reviews" ');
		$this->db->order_by("id","desc");
		$this->db->limit(6);
		$query = $this->db->get();
        return $result = $query->result();
	}

	function get_count_pagename($pagename){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('status = "Active" and pagename="'.$pagename.'"');
		$query = $this->db->get();
		return $result =$query->num_rows();
	}

	function get_each_district_count($district){
		//echo $district;exit;
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('status = "Active" and pagename="district" and district="'.$district.'"');
		$query = $this->db->get();
		return $result =$query->num_rows();
	}

	function get_district_count(){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('status = "Active" and pagename="district"');
		$query = $this->db->get();
		return $result =$query->num_rows();
	}
	
	function get_banners_count(){
		$this->db->select('*');
		$this->db->from('banners');
		$this->db->where('status = "Active"');
		$query = $this->db->get();
		return $result =$query->num_rows();
	}
	
	function get_by_range($start,$end){
		$query = $this->db->query("select * from vedios where is_active = 1 order by id desc limit $start,$end ");
		return $result =$query->result();
 	}	

	
	function get_by_pagename_range($pagename,$start,$end){
		$query = $this->db->query("select * from posts where status = 'Active' and pagename='$pagename' order by id desc limit $start,$end ");
		return $result =$query->result();
 	}

 	function get_by_each_district_range($district,$start,$end){
		$query = $this->db->query("select * from posts where status = 'Active' and pagename='district' and district='$district' order by id desc limit $start,$end ");
		return $result =$query->result();
 	}

 	function getAlldistrictnews($district){
		$query = $this->db->query("select * from posts where status = 'Active' and pagename='district' and district='$district' limit 20 ");
		return $result =$query->result();
 	}

 	function get_by_district_range($start,$end){
		$query = $this->db->query("select * from posts where status = 'Active' and pagename='district' order by id desc limit $start,$end ");
		return $result =$query->result();
 	}

 	function get_by_banners_range($start,$end){
		$query = $this->db->query("select * from banners where status = 'Active' order by id desc limit $start,$end ");
		return $result =$query->result();
 	}

	function getPostById($id,$pagename){
		$query = $this->db->get_where('posts','status = "Active" and pagename="'.$pagename.'" and id='.$id);
        return $result = $query->result();
	}

	function getdistrictnewsById($id){
		$query = $this->db->get_where('posts','status = "Active" and pagename="district" and id='.$id);
        return $result = $query->result();
	}

	function getBannerById($id){
		$query = $this->db->get_where('banners','status = "Active" and id='.$id);
        return $result = $query->result();
	}

	 function getVideoById($id){
        if($id==0){
            $query = $this->db->query("select * from vedios where is_active = 1 order by id desc limit 0,1 ");
        }else{
            $query = $this->db->query("select * from vedios where is_active = 1 and id=$id ");
        }
		return $result =$query->result();
 	}

 	function get_videos_home(){
		$query = $this->db->query("select * from vedios where is_active = 1 order by id desc limit 0,4");
		return $result =$query->result();
 	}
	
}