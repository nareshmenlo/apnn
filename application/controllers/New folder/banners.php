<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banners extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!is_loggedIn()) {
            redirect('admin/login');
        }
        $this->load->model('banners_model');
    }

    public function index() {
        $data['banners'] = $this->banners_model->get_all();
        $this->load->view('admin/header');
        $this->load->view('admin/banners', $data);
        $this->load->view('admin/footer');
    }

    public function create() {
        if($this->input->post()){
            $this->form_validation->set_rules('banner_title', 'Title', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header');
                $this->load->view('admin/newbanner');
                $this->load->view('admin/footer');
            } else {
                $upload_image_name="";
                $upload_file_res=$this->do_upload('bannerimage');
                if(is_array($upload_file_res)){
                    if(!$upload_file_res['error']){
                        $upload_image_name=$upload_file_res['data']['file_name'];
                    }
                }
                $url = parse_url($this->input->post('youtubeurl'));
                parse_str($url['query'], $query);
                $youtubeid = isset($query['v'])?$query['v']:"";
                $post_insert_data=[
                    'title'=>$this->input->post('banner_title'),
                    'description'=>$this->input->post('editor1'),
                    'image'=>$upload_image_name,
                    'video'=>$youtubeid,
                    'full_video_url'=>$this->input->post('youtubeurl'),
                    'date'=>date('Y-m-d'),
                    'status'=>'Not Active',
                ];   
                $this->banners_model->insert_entry($post_insert_data);
                $this->session->set_flashdata('success', 'New banner created successfully please make active...!');             
                redirect('banners');     
            }
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/newbanner');
            $this->load->view('admin/footer');
        }
    }

    function do_upload($fieldname)
    {
        $config['upload_path'] = './useruploadfiles/postimages';
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
        if($this->input->post('bannerid')){
            $status=$this->input->post('status')=="Active"?"Deactive":"Active";
            echo json_encode(['bannerid'=>$this->input->post('bannerid'),'success'=>((int)$this->banners_model->update_status($status,$this->input->post('bannerid')))]);
            die();
        }
    }

    public function viewbanner($id=0) {
        $data['bannerdata']=$this->get_single_post($id);
        $this->load->view('admin/header');
        $this->load->view('admin/viewbanner',$data);
        $this->load->view('admin/footer');
    }

    function get_single_post($id){
        if($id==0){
            redirect('banners');
        }
        $postdata=$this->banners_model->get_single_post($id);
        if($postdata==NULL){
            $this->session->set_flashdata('error', 'Sorry some thing went wrong...(selected post is not available)!');             
            redirect('banners');
        }else{
            return $postdata;
        }
    }

    public function update($id) {
        $data['bannerdata']=$this->get_single_post($id);
        if($this->input->post()){
            $this->form_validation->set_rules('banner_title', 'Title', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header');
                $this->load->view('admin/editbanner',$data);
                $this->load->view('admin/footer');
            } else {
                $upload_image_name=$data['bannerdata']->image;
                $upload_file_res=$this->do_upload('bannerimage');
                if(is_array($upload_file_res)){
                    if(!$upload_file_res['error']){
                        $upload_image_name=$upload_file_res['data']['file_name'];
                    }
                }
                $url = parse_url($this->input->post('youtubeurl'));
                parse_str($url['query'], $query);
                $youtubeid = isset($query['v'])?$query['v']:"";
                $post_updated_data=[
                    'title'=>$this->input->post('banner_title'),
                    'description'=>$this->input->post('editor1'),
                    'image'=>$upload_image_name,
                    'video'=>$youtubeid,
                    'full_video_url'=>$this->input->post('youtubeurl')
                ];   
                $this->banners_model->update_entry($post_updated_data,$id);
                $this->session->set_flashdata('success', 'Banner updated successfully..!');             
                redirect('banners');     
            }
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/editbanner',$data);
            $this->load->view('admin/footer');
        }
    }

    public function delete_post() {
        if($this->input->post('bannerid')){
            $postdata=$this->get_single_post($this->input->post('bannerid'));
            if(is_object($postdata)){
                $res=json_encode(['success'=>((int)$this->banners_model->delete_post($this->input->post('bannerid')))]);
                $this->session->set_flashdata('success', 'Post deleted successfully');             
                echo $res;
            }
        }
    }

}
