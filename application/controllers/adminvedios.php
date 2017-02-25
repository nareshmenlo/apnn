<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminvedios extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!is_loggedIn()) {
            redirect('admin/login');
        }
        $this->load->model('vedios_model');
    }

    public function index() {
        $data['vedios'] = $this->vedios_model->get_all();
        $this->load->view('admin/header');
        $this->load->view('admin/adminvedios', $data);
        $this->load->view('admin/footer');
    }

    function get_single_Vedio($id){
        if($id==0){
            redirect('adminvedios');
        }
        $postdata=$this->vedios_model->get_single_vedio($id);
        if($postdata==NULL){
            $this->session->set_flashdata('error', 'Sorry some thing went wrong...(selected Vedio is not available)!');             
            redirect('adminvedios');
        }else{
            return $postdata;
        }
    }

    public function create() {
        $res['error']=false;
        if($this->input->post()){
            $url = parse_url($this->input->post('full_vedio_url'));
            parse_str($url['query'], $query);
            $youtubeid = isset($query['v'])?$query['v']:"";
            $post_insert_data=[
                'vedio_name'=>$this->input->post('vedio_name'),
                'full_vedio_url'=>$this->input->post('full_vedio_url'),
                'vedio'=>$youtubeid,
                'is_active'=>0
            ];   
            $this->vedios_model->insert_entry($post_insert_data);
            $res['message']="New Vedio has been added successfully please make active to display...!";
        }else{
            $res['error']=true;
        }
        echo json_encode($res);
    }
    
    public function update() {
        $res['error']=false;
        if($this->input->post()){
            $url = parse_url($this->input->post('full_vedio_url'));
            parse_str($url['query'], $query);
            $youtubeid = isset($query['v'])?$query['v']:"";
            $post_insert_data=[
                'vedio_name'=>$this->input->post('vedio_name'),
                'full_vedio_url'=>$this->input->post('full_vedio_url'),
                'vedio'=>$youtubeid,
            ];   
            $this->vedios_model->update_entry($post_insert_data,$this->input->post('vedio_id'));
            $res['message']="New vedio has been added successfully please make active to display...!";
        }else{
            $res['error']=true;
        }
        echo json_encode($res);
    }


    public function make_active_not() {
        if($this->input->post('vedio_id')){
            $status=$this->input->post('is_active')==1?0:1;
            echo json_encode(['vedio_id'=>$this->input->post('vedio_id'),'success'=>((int)$this->vedios_model->update_status($status,$this->input->post('vedio_id')))]);
            die();
        }
    } 

    public function delete_vedio() {
        if($this->input->post('vedio_id')){
            $postdata=$this->get_single_vedio($this->input->post('vedio_id'));
            if(is_object($postdata)){
                $res=json_encode(['success'=>((int)$this->vedios_model->delete_vedio($this->input->post('vedio_id')))]);
                $this->session->set_flashdata('success', 'Vedio deleted successfully');             
                echo $res;
            }
        }
    }

}
