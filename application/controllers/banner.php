<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class banner extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index($page=1)
	{
		try
		{
			$pagingConfig   = $this->paginationlib->initPagination("banner/index",$this->home_model->get_banners_count(),19,3);
 			$data["pagination_helper"]   = $this->pagination;
			$data["banner"] = $this->home_model->get_by_banners_range((($page-1) * $pagingConfig['per_page']),$pagingConfig['per_page']);
			$title['title'] = "banners";
  			$this->load->view('header',$title);
			$this->load->view('banner',$data);
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
		$data['banner'] = $this->home_model->getAllBanners();
		$data['bannerById'] = $this->home_model->getBannerById($id);
		$title['description'] = substr(strip_tags($data['bannerById'][0]->description),0,800);
		$title['articleimage'] =  $data['bannerById'][0]->image;
		$title['title'] =  $data['bannerById'][0]->title;
		$this->load->view('header',$title);
		$this->load->view('bannersingle',$data);
		$this->load->view('sidebar',$data);
		$this->load->view('footer');
	}
}
