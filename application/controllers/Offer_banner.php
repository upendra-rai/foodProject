<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class offer_banner extends CI_Controller {

	function __construct(){

		parent::__construct();

		 ini_set('max_execution_time', 0);
         ini_set('memory_limit','2048M');

		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_offer_banner');
        if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			        redirect('./admin/login');
		    }
	}


	public function index(){
        $data['active_menu'] = "home";

        $this->load->helper('form');


        $this->load->view('home', $data);

	}

	public function add()
	{

		if($this->input->post('submit')){
			 $status =  $this->input->post('status');
       $img_name = $this->input->post('image_name');
			 $data["msg"] = $this->model_offer_banner->add($status,$img_name);

		}else{
		$data['active_menu'] = "management";
		$data['active_submenu'] = "offer_banner";
		$data["list"] = $this->model_offer_banner->select_list();
		$this->load->view('banner/offer_banner', $data);
	}
	}

	public function edit($id)
	{

		if($this->input->post('submit')){

			 $status =  $this->input->post('status');
       $img_name = $this->input->post('image_name');
       $last_uploaded_image_name =  $this->input->post('last_uploaded_image_name');

			 if($last_uploaded_image_name != $img_name){
				  unlink('uploads/offer_banner_image/'.$unlink_img_src);
		  	}
				$data["msg"] = $this->model_offer_banner->edit($id,$status,$img_name);
		}else{
		$data['active_menu'] = "management";
		$data['active_submenu'] = "offer_banner";

		$data["selected_row"] = $this->model_offer_banner->selected_row($id);
		$data["list"] = $this->model_offer_banner->select_list();
		$this->load->view('banner/offer_banner', $data);
	  }
	}

	public function del_row()
	{
		if(isset($_POST["del_id"])){
			$del_id = $_POST["del_id"];
			$data["msg"] = $this->model_offer_banner->del_row($del_id);
		}

	}

// upload category image
	public function upload_image(){

	  if($_FILES["file"]["name"] != "")
      {
		 $img_folder_name = $_POST['img_folder_name'];
	   $test = explode(".", $_FILES["file"]["name"]);
	   $extension = end($test);
	   $name = rand(100,99999).strtotime(date('Y-m-d H:i:s')).bin2hex(openssl_random_pseudo_bytes(4)).'.'.$extension;
	   $location = 'uploads/'.$img_folder_name.'/'.$name;
	   move_uploaded_file($_FILES["file"]["tmp_name"], $location);
	   echo '<img src="'.base_url().$location.'" data-img_name="'.$name.'" alt="User" style="width:100% ; height:100%;"/><input type="hidden" name="image_name" value="'.$name.'" /><button type="button" class="btn" id="inlink_img_bt" data-unlink_img_src="'.$location.'" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>';

      }
	}
// upload category image

	public function unlink_image()
	{
		  if(isset($_POST['unlink_img_src'])){
          $unlink_img_src = $_POST['unlink_img_src'];
					if($unlink_img_src != ''){
		        if(unlink($unlink_img_src)){
							echo 'success';
						}else{
							echo 'failes';
						}
		 		 }
			}
	}
}
