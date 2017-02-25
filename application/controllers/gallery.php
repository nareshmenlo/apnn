<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	public function index($page=1){
		$this->load->model('gallery_model');
		$this->load->library('pagination');
		$this->load->library('paginationlib');
		try
		{	
			$title['title'] = "చిత్రమాలిక";
			$data=[];
			$pagingConfig   = $this->paginationlib->initPagination("gallery/index",$this->gallery_model->get_count(),21,3);
 			$data["pagination_helper"]= $this->pagination;
			$data["gallery"] = $this->gallery_model->get_by_range((($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$this->load->view('header',$title);
			$this->load->view('gallery',$data);
			$this->load->view('sidebar');
			$this->load->view('footer');
 		}
		catch (Exception $err)
		{
			log_message("error", $err->getMessage());
			return show_error($err->getMessage());
		}
		
	}
	public function cats($cat_id=0,$page=1){
		$this->load->model('gallery_model');
		$this->load->library('pagination');
		$this->load->library('paginationlib');
		try{	
			$title['title'] = "చిత్రమాలిక";
			$data=[];
			$pagingConfig   = $this->paginationlib->initPagination("gallery/cats/$cat_id",$this->gallery_model->get_cat_count($cat_id),20,4);
 			$data["pagination_helper"]= $this->pagination;
			$data["gallery"] = $this->gallery_model->get_cat_by_range($cat_id,(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$data['cat']=$this->gallery_model->get_cat_details($cat_id);
			$this->load->view('header',$title);
			$this->load->view('gallery_cat',$data);
			$this->load->view('sidebar');
			$this->load->view('footer');
 		}catch (Exception $err){
			log_message("error", $err->getMessage());
			return show_error($err->getMessage());
		}
	}
	public function photos($photo_id=0,$page=1){
		$this->load->model('gallery_model');
		$this->load->library('pagination');
		$this->load->library('paginationlib');
		try{	
			$title['title'] = "చిత్రమాలిక";
			$data=[];
			$pagingConfig   = $this->paginationlib->initPagination("gallery/photos/$photo_id",$this->gallery_model->get_cat_photo_count($photo_id),21,4);
 			$data["pagination_helper"]= $this->pagination;
 			$data['cat']=$this->gallery_model->get_cat_photo_details($photo_id);
 			$data["gallery"] = $this->gallery_model->get_cat_photo_by_range($photo_id,(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$this->load->view('header',$title);
			$this->load->view('gallery_cat_photo',$data);
			$this->load->view('sidebar');
			$this->load->view('footer');
 		}catch (Exception $err){
			log_message("error", $err->getMessage());
			return show_error($err->getMessage());
		}
	}
	public function albumDetails($photo_id=0){
		$this->load->model('gallery_model');
		try{	
			$title['title'] = "చిత్రమాలిక";
			$data=[];
			$data["gallery"] = $this->gallery_model->get_albums_photos($photo_id);
			$this->load->view('header',$title);
			$this->load->view('gallery_photos_slide',$data);
			$this->load->view('sidebar');
			$this->load->view('footer');
 		}catch (Exception $err){
			log_message("error", $err->getMessage());
			return show_error($err->getMessage());
		}
	}
}
