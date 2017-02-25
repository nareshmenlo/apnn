<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Live extends CI_Controller {

    public function index() {
        $this->load->model('home_model');
        $data['flash'] = $this->home_model->getAll('flash');
        $data['latestupdates'] = $this->home_model->getAll('latest');
        $data['political'] = $this->home_model->getAll('political');
        $data['editorchoice'] = $this->home_model->getAll('editor_choice');
        $data['moviereviews'] = $this->home_model->getAll('movie_reviews');
        $data['cinema'] = $this->home_model->getAll('cinema');
        $title['title'] = "APNN News Portal: Live";
        $this->load->view('header',$title);
        $this->load->view('live',$data);
        $this->load->view('sidebar');
        $this->load->view('footer');
    }

}