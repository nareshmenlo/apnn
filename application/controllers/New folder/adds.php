<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adds extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!is_loggedIn()) {
            redirect('admin/login');
        }
        $this->load->model('adds_model');
    }

    public function index() {
        $data['adds'] = $this->adds_model->get_all();
        $this->load->view('admin/header');
        $this->load->view('admin/adds', $data);
        $this->load->view('admin/footer');
    }

    public function create() {
        if($this->input->post()){
            $this->form_validation->set_rules('add_title', 'Title', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header');
                $this->load->view('admin/newadd');
                $this->load->view('admin/footer');
            } else {
                $upload_image_name="";
                $upload_file_res=$this->do_upload('addimage');
                if(is_array($upload_file_res)){
                    if(!$upload_file_res['error']){
                        $upload_image_name=$upload_file_res['data']['file_name'];
                    }
                }
                $post_insert_data=[
                    'title'=>$this->input->post('add_title'),
                    'image'=>$upload_image_name,
                    'status'=>'Not Active',
                ];   
                $this->adds_model->insert_entry($post_insert_data);
                $this->session->set_flashdata('success', 'New add created successfully please make active...!');             
                redirect('adds');     
            }
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/newadd');
            $this->load->view('admin/footer');
        }
    }

    function do_upload($fieldname)
    {
        $config['upload_path'] = './useruploadfiles/addimages';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($fieldname)){
            $result = array('error' =>true,'data'=>$this->upload->display_errors());
            return $result;
        }else{
            $result = array('error' =>false,'data'=>$this->upload->data());
            return $result;
        }
    }

    public function make_active_not() {
        if($this->input->post('addid')){
            $status=$this->input->post('status')=="Active"?"Deactive":"Active";
            echo json_encode(['addid'=>$this->input->post('addid'),'success'=>((int)$this->adds_model->update_status($status,$this->input->post('addid')))]);
            die();
        }
    }

    public function viewadd($id=0) {
        $data['adddata']=$this->get_single_post($id);
        $this->load->view('admin/header');
        $this->load->view('admin/viewadd',$data);
        $this->load->view('admin/footer');
    }

    function get_single_post($id){
        if($id==0){
            redirect('adds');
        }
        $postdata=$this->adds_model->get_single_post($id);
        if($postdata==NULL){
            $this->session->set_flashdata('error', 'Sorry some thing went wrong...(selected post is not available)!');             
            redirect('adds');
        }else{
            return $postdata;
        }
    }

    public function update($id) {
        $data['adddata']=$this->get_single_post($id);
        if($this->input->post()){
            $this->form_validation->set_rules('add_title', 'Title', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header');
                $this->load->view('admin/editadd',$data);
                $this->load->view('admin/footer');
            } else {
                $upload_image_name=$data['adddata']->image;
                $upload_file_res=$this->do_upload('addimage');
                if(is_array($upload_file_res)){
                    if(!$upload_file_res['error']){
                        $upload_image_name=$upload_file_res['data']['file_name'];
                    }
                }
                $post_updated_data=[
                    'title'=>$this->input->post('add_title'),
                    'image'=>$upload_image_name,
                ];   
                $this->adds_model->update_entry($post_updated_data,$id);
                $this->session->set_flashdata('success', 'add updated successfully..!');             
                redirect('adds');     
            }
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/editadd',$data);
            $this->load->view('admin/footer');
        }
    }

    public function delete_post() {
        if($this->input->post('addid')){
            $postdata=$this->get_single_post($this->input->post('addid'));
            if(is_object($postdata)){
                $res=json_encode(['success'=>((int)$this->adds_model->delete_post($this->input->post('addid')))]);
                $this->session->set_flashdata('success', 'Add deleted successfully');             
                echo $res;
            }
        }
    }

}
