<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class guest extends CI_Controller {
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
			$pagingConfig   = $this->paginationlib->initPagination("guest/index",$this->home_model->get_count_pagename('guest'),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["guest"] = $this->home_model->get_by_pagename_range('guest',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "గెస్ట్ పేజీ";
	
  			$this->load->view('header',$title);
			$this->load->view('guest',$data);
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
		$data['guest'] = $this->home_model->getAll("guest");
		
		$data['guestById'] = $this->home_model->getPostById($id,"guest");
		$title['articleimage'] = $data['guestById'][0]->image;
		$title['description'] = substr(strip_tags($data['guestById'][0]->description),0,800);
		$title['title'] = $data['guestById'][0]->title;
		$this->load->view('header',$title);
		$this->load->view('guestsingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
