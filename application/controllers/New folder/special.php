<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class special extends CI_Controller {
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
			$pagingConfig   = $this->paginationlib->initPagination("special/index",$this->home_model->get_count_pagename('special'),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["special"] = $this->home_model->get_by_pagename_range('special',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "సమ్‌థింగ్ స్పెష‌ల్‌";
			//$data['special'] = $this->home_model->getAll("special");
			
  			$this->load->view('header',$title);
			$this->load->view('special',$data);
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
		$data['special'] = $this->home_model->getAll("special");
		
		$data['specialById'] = $this->home_model->getPostById($id,"special");
		$title['articleimage'] = $data['specialById'][0]->image;
		$title['description'] = substr(strip_tags($data['specialById'][0]->description),0,800);
		$title['title'] = $data['specialById'][0]->title;
		$this->load->view('header',$title);
		$this->load->view('specialsingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
