<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Home extends CI_Controller {

    public function index(){
        $this->load->model('home_model');
        $data['political'] = $this->home_model->getAll('political');
        $data['pramukulu'] = $this->home_model->getAll('pramukulu');
        $data['interview'] = $this->home_model->getAll('interview');
        $data['sahityam'] = $this->home_model->getAll('sahityam');
        $data['business'] = $this->home_model->getAll('business');
        $data['cinemas'] = $this->home_model->getAll('cinema');
        $data['guest'] = $this->home_model->getAll('guest');
        $data['paryatakam'] = $this->home_model->getAll('paryatakam');
        $data['special'] = $this->home_model->getAll('special');
        $title['title'] = "APNN News Portal";
        $this->load->view('header',$title);
        $this->load->view('home',$data);
        $this->load->view('sidebar');
        $this->load->view('footer');
    }
}