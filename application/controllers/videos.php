<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class videos extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($id = 0) {
        $this->load->model('home_model');
        $this->load->library('pagination');
        $this->load->library('paginationlib');
        try {
            $data["videos"] = $this->home_model->get_by_range(0, 25);
            if(count($data["videos"])>0){
                $data["single"] = $this->home_model->getVideoById($id)[0];
            }
            $title['title'] = "వీడియోస్";
            $this->load->view('header', $title);
            $this->load->view('videos', $data);
            $this->load->view('sidebar');
            $this->load->view('footer');
        } catch (Exception $err) {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }
    }
}
