<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class education extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index($page=1)
	{
		$this->load->model('home_model');
		$this->load->library('pagination');
		$this->load->library('paginationlib');
		try
		{
			$pagingConfig   = $this->paginationlib->initPagination("education/index",$this->home_model->get_count_pagename('education'),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["education"] = $this->home_model->get_by_pagename_range('education',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "Andhra Pradesh";
			
  			$this->load->view('header',$title);
			$this->load->view('education',$data);
			$this->load->view('sidebar',$data);
			$this->load->view('footer');
		}
		catch (Exception $err)
		{
			log_message("error", $err->getMessage());
			return show_error($err->getMessage());
		}
		
	}
	public function single($id)
	{
		$this->load->model('home_model');
		$data['id']=$id;
		$data['education'] = $this->home_model->getAll("education");
		$data['educationById'] = $this->home_model->getPostById($id,"education");
		$title['description'] = substr(strip_tags($data['educationById'][0]->description),0,800);
		$title['articleimage'] = $data['educationById'][0]->image;
		$title['title'] = $data['educationById'][0]->title;
		$this->load->view('header',$title);
		$this->load->view('educationsingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
