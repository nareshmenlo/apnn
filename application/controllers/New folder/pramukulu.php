<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pramukulu extends CI_Controller {
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
			$pagingConfig   = $this->paginationlib->initPagination("pramukulu/index",$this->home_model->get_count_pagename('pramukulu'),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["pramukulu"] = $this->home_model->get_by_pagename_range('pramukulu',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "ప్ర‌ముఖులు";
	
  			$this->load->view('header',$title);
			$this->load->view('pramukulu',$data);
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
		$data['pramukulu'] = $this->home_model->getAll("pramukulu");
		
		$data['pramukuluById'] = $this->home_model->getPostById($id,"pramukulu");
		$title['articleimage'] = $data['pramukuluById'][0]->image;
		$title['description'] = substr(strip_tags($data['pramukuluById'][0]->description),0,800);
		$title['title'] = $data['pramukuluById'][0]->title;
		$this->load->view('header',$title);
		$this->load->view('pramukulusingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
