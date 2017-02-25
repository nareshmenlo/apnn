<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class movienews extends CI_Controller {

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

			$pagingConfig   = $this->paginationlib->initPagination("movienews/index",$this->home_model->get_count_pagename('cinema'),11,3);

 			$data["pagination_helper"]   = $this->pagination;

			$data["movienews"] = $this->home_model->get_by_pagename_range('cinema',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);

			$title['title'] = "సినిమా";

 			

  			$this->load->view('header',$title);

			$this->load->view('movienews',$data);

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

		$data['movienews'] = $this->home_model->getAll("cinema");

		

		$data['movienewsById'] = $this->home_model->getPostById($id,"cinema");

 		$title['articleimage'] = $data['movienewsById'][0]->image;//"Movie News";
 		$title['title'] = $data['movienewsById'][0]->title;//"Movie News";
		$title['description'] = substr(strip_tags($data['movienewsById'][0]->description),0,800);

		$this->load->view('header',$title);

		$this->load->view('moviesingle',$data);

		$this->load->view('sidebar',$data);

		$this->load->view('footer');

	}

}

