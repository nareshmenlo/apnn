<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class political extends CI_Controller {
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
			$pagingConfig   = $this->paginationlib->initPagination("political/index",$this->home_model->get_count_pagename('political'),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["political"] = $this->home_model->get_by_pagename_range('political',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "పాలిటిక్స్‌";
			
  			$this->load->view('header',$title);
			$this->load->view('political',$data);
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
		//print_r($id);exit;
		$this->load->model('home_model');
		$data['id']=$id;
		$data['political'] = $this->home_model->getAll("political");
		$data['politicalById'] = $this->home_model->getPostById($id,"political");
		$title['description'] = substr(strip_tags($data['politicalById'][0]->description),0,800);

		//print_r($data);exit;
		$title['articleimage'] = $data['politicalById'][0]->image;
		$title['title'] = $data['politicalById'][0]->title;
		$this->load->view('header',$title);
		$this->load->view('politicalsingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
