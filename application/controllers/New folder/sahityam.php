<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sahityam extends CI_Controller {
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
			$pagingConfig   = $this->paginationlib->initPagination("sahityam/index",$this->home_model->get_count_pagename('sahityam'),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["sahityam"] = $this->home_model->get_by_pagename_range('sahityam',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "సాహిత్యం";
	
  			$this->load->view('header',$title);
			$this->load->view('sahityam',$data);
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
		$data['sahityam'] = $this->home_model->getAll("sahityam");
		
		$data['sahityamById'] = $this->home_model->getPostById($id,"sahityam");
		$title['articleimage'] = $data['sahityamById'][0]->image;
		$title['description'] = substr(strip_tags($data['sahityamById'][0]->description),0,800);
		$title['title'] = $data['sahityamById'][0]->title;
		$this->load->view('header',$title);
		$this->load->view('sahityamsingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
