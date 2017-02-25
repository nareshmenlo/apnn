<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class district extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index($page=1)
	{
		try
		{
			$pagingConfig   = $this->paginationlib->initPagination("district/index",$this->home_model->get_district_count(),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["district"] = $this->home_model->get_by_district_range((($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "District News";
  			$this->load->view('header',$title);
			$this->load->view('district',$data);
			$this->load->view('sidebar',$data);
			$this->load->view('footer');
		}
		catch (Exception $err)
		{
			log_message("error", $err->getMessage());
			return show_error($err->getMessage());
		}
	}

	public function sd($district="",$page=1)
	{
		try
		{
			$pagingConfig   = $this->paginationlib->initPagination("district/sd/".$district,$this->home_model->get_each_district_count($district),19,4);
 			$data["pagination_helper"]   = $this->pagination;
			$data["district"] = $this->home_model->get_by_each_district_range($district,(($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "district";
			$title['districtname'] = $district;
  			$this->load->view('header',$title);
			$this->load->view('districtsingle',$data);
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
		$data['districtById'] = $this->home_model->getdistrictnewsById($id);
		$title['description'] = substr(strip_tags($data['districtById'][0]->description),0,800);
		$title['articleimage'] =  $data['districtById'][0]->image;
		$district = $data['districtById'][0]->district;
		$data['district'] = $this->home_model->getAlldistrictnews($district);
		$title['title'] =  $data['districtById'][0]->title;
		$title['districtname'] = $district;
		$this->load->view('header',$title);
		$this->load->view('districtsingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
