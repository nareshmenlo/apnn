<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class editorchoice extends CI_Controller {
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
			$pagingConfig   = $this->paginationlib->initPagination("editorchoice/index",$this->home_model->get_count_pagename('editor_choice'),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["editorchoice"] = $this->home_model->get_by_pagename_range('editor_choice',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "ఎడిటర్స్ చాయిస్";
			
  			$this->load->view('header',$title);
			$this->load->view('editorchoice',$data);
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
		$data['editorchoice'] = $this->home_model->getAll("editor_choice");
		
		$data['editorchoiceById'] = $this->home_model->getPostById($id,"editor_choice");
		$title['articleimage'] = $data['editorchoiceById'][0]->image;
		$title['description'] = substr(strip_tags($data['editorchoiceById'][0]->description),0,800);
		$title['title'] = $data['editorchoiceById'][0]->title;
		$this->load->view('header',$title);
		$this->load->view('editorchoicesingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
