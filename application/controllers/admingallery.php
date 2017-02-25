<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminGallery extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if (!is_loggedIn()) {
            redirect('admin/login');
        }
		$this->load->model('gallery_model');
	}
	
	public function index(){		
		$data['galleries']=$this->gallery_model->get_gallery();
		$this->load->view('admin/header');
		$this->load->view('admin/galleryadmin',$data);
		$this->load->view('admin/footer');
	}

	public function create(){
		$data['categories']=$this->gallery_model->getCategories();
		if($this->input->post()){
            $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header');
				$this->load->view('admin/addgallery',$data);
				$this->load->view('admin/footer');
            } else {
			    $save_to_file = true;
			    $cut_x = $cut_y = 0;
			    $image_quality = 100;
			    $images_folder = "useruploadfiles/galleryimages/";
			    $title = $_POST['title'];
			    $cat_id = $_POST['category'];
			    $date = date('Y-m-d H:i:s');
			    $imagesCount = count($_FILES["photo"]['name']);
			    //print_r($_FILES);
			    //echo $imagesCount;exit;
			    if ($imagesCount > 0) {
			        $photo_id = 0;
			        $count = 0;
			        for ($i = 0; $i < $imagesCount; $i++, $count++) {
			            if ((($_FILES["photo"]["type"][$i] == "image/png") || ($_FILES["photo"]["type"][$i] == "image/jpeg") || ($_FILES["photo"]["type"][$i] == "image/pjpeg")) && ($_FILES["photo"]["size"][$i] < 5000000000)) {
			                $time =time();
			                if ($i == 0) {
			                   $imageName = $time . "_" . $_FILES["photo"]["name"][$i];
			                    $ms = mysql_query("INSERT INTO  `photo` (`title` ,`cat_id` ,`image` ,`date`,`status`)VALUES ('$title','$cat_id','$imageName', '$date',  'Not Active')");
			                    if ($ms) {
			                        $photo_id = mysql_insert_id();
			                    }
			                }
		                 	$image_type = (($_FILES["photo"]["type"][$i] == "image/gif")) ? 1 : ($_FILES["photo"]["type"][$i] == "image/jpeg") ? 2 : ($_FILES["photo"]["type"][$i] == "image/png") ? 3 : -1;
	                        if (@move_uploaded_file($_FILES["photo"]["tmp_name"][$i], $images_folder . $time . '_' . $_FILES["photo"]["name"][$i])) {
	                        }
	                        $add = $time . "_" . $_FILES["photo"]["name"][$i];
	                        $ms = mysql_query("INSERT INTO  `photo_images` (`title` ,`image` ,`photo_id` ,`image_date`)VALUES ('$title', '$add','$photo_id' ,'$date')");
	                        if (!$ms) {
	                            break;
	                        }
			            }
			        }
	                $this->session->set_flashdata('success', 'Gallery created successfully please make active...!');  
	                redirect('admingallery');      
			    }	
			}	    
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/addgallery',$data);
			$this->load->view('admin/footer');
		}
	}	

	public function make_active_not() {
        if($this->input->post('galleryid')){
            $status=$this->input->post('status')=="Active"?"Deactive":"Active";
            echo json_encode(['galleryid'=>$this->input->post('galleryid'),'success'=>((int)$this->gallery_model->update_status($status,$this->input->post('galleryid')))]);
            die();
        }
    }
}
