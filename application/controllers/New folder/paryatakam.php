<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class paryatakam extends CI_Controller {
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
			$pagingConfig   = $this->paginationlib->initPagination("paryatakam/index",$this->home_model->get_count_pagename('paryatakam'),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["paryatakam"] = $this->home_model->get_by_pagename_range('paryatakam',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "ప‌ర్యాట‌కం";	
  			$this->load->view('header', $title);
			$this->load->view('paryatakam', $data);
			$this->load->view('sidebar', $data);
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
		$data['paryatakam'] = $this->home_model->getAll("paryatakam");
		
		$data['paryatakamById'] = $this->home_model->getPostById($id,"paryatakam");
		$title['articleimage'] = $data['paryatakamById'][0]->image;
		$title['description'] = substr(strip_tags($data['paryatakamById'][0]->description),0,800);
		$title['title'] = $data['paryatakamById'][0]->title;
		$this->load->view('header',$title);
		$this->load->view('paryatakamsingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
