<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class flashnews extends CI_Controller {
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
			$pagingConfig   = $this->paginationlib->initPagination("flashnews/index",$this->home_model->get_count_pagename('flashnews'),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["flashnews"] = $this->home_model->get_by_pagename_range('flashnews',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "ఇప్పుడే అందిన వార్తలు";
			
  			$this->load->view('header',$title);
			$this->load->view('flashnews',$data);
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
		$data['flashnews'] = $this->home_model->getAll("flashnews");
		$data['flashnewsById'] = $this->home_model->getPostById($id,"flashnews");
		$title['description'] = substr(strip_tags($data['flashnewsById'][0]->description),0,800);

		$title['articleimage']=$data['flashnewsById'][0]->image;
		$title['title'] = $data['flashnewsById'][0]->title;
		$this->load->view('header',$title);
		$this->load->view('flashnewssingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
