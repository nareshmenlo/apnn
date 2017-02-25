<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class business extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index($page=1)
	{
		try
		{
			$pagingConfig   = $this->paginationlib->initPagination("business/index",$this->home_model->get_count_pagename('business'),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["business"] = $this->home_model->get_by_pagename_range('business',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "బిజినెస్";
  			$this->load->view('header',$title);
			$this->load->view('business',$data);
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
		$data['id']=$id;
		$data['business'] = $this->home_model->getAll("business");
		$data['businessById'] = $this->home_model->getPostById($id,"business");
		$title['description'] = substr(strip_tags($data['businessById'][0]->description),0,800);
		$title['articleimage'] =  $data['businessById'][0]->image;
		$title['title'] =  $data['businessById'][0]->title." : బిజినెస్";
		$this->load->view('header',$title);
		$this->load->view('businesssingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
