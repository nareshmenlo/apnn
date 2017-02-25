<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class latestupdates extends CI_Controller {
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
			$pagingConfig   = $this->paginationlib->initPagination("latestupdates/index",$this->home_model->get_count_pagename('latest'),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["latestupdates"] = $this->home_model->get_by_pagename_range('latest',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "తాజా వార్తాలు";
			//$data['latestupdates'] = $this->home_model->getAll("latestupdates");
			
  			$this->load->view('header',$title);
			$this->load->view('latestupdates',$data);
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
		$data['latestupdates'] = $this->home_model->getAll("latest");
		$data['latestupdatesById'] = $this->home_model->getPostById($id,"latest");
		$title['description'] = substr(strip_tags($data['latestupdatesById'][0]->description),0,800);
		$title['articleimage'] = $data['latestupdatesById'][0]->image;
		$title['title'] = $data['latestupdatesById'][0]->title;
		$this->load->view('header',$title);
		$this->load->view('latestupdatessingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
