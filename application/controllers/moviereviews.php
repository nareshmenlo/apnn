<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class moviereviews extends CI_Controller {

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

			$pagingConfig   = $this->paginationlib->initPagination("moviereviews/index",$this->home_model->get_count_pagename('movie_reviews'),10,3);

 			$data["pagination_helper"]   = $this->pagination;

			$data["moviereviews"] = $this->home_model->get_by_pagename_range('movie_reviews',(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);

			$title['title'] = "సినీ'మా'రివ్వూ";

 			

  			$this->load->view('header',$title);

			$this->load->view('reviews',$data);

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

		$data['moviereviews'] = $this->home_model->getAll("movie_reviews");
 		$data['moviereviewsById'] = $this->home_model->getPostById($id,"movie_reviews");
		$title['articleimage']=$data['moviereviewsById'][0]->image;
		$title['title'] = $data['moviereviewsById'][0]->title;//"Movie reviews";
		$title['description'] = substr(strip_tags($data['moviereviewsById'][0]->description),0,800);
	 	$this->load->view('header',$title);

		$this->load->view('singlereview',$data);

		$this->load->view('sidebar',$data);

		$this->load->view('footer');

	}

}

