<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class apnews extends CI_Controller {
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
			$pagingConfig   = $this->paginationlib->initPagination("apnews/index",$this->home_model->get_count_pagename('apnews'),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["apnews"] = $this->home_model->get_by_pagename_range('apnews',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "Andhra Pradesh";
			
  			$this->load->view('header',$title);
			$this->load->view('apnews',$data);
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
		$data['apnews'] = $this->home_model->getAll("apnews");
		$data['apnewsById'] = $this->home_model->getPostById($id,"apnews");
		$title['description'] = substr(strip_tags($data['apnewsById'][0]->description),0,800);
		$title['articleimage'] = $data['apnewsById'][0]->image;
		$title['title'] = $data['apnewsById'][0]->title;
		$this->load->view('header',$title);
		$this->load->view('apnewssingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
