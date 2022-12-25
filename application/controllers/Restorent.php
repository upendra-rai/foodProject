<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class restorent extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_restorent');

        if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			    redirect('./admin/login');
	     	}
	}

	public function init_user(){
       $user_id = $this->session->userdata('uid');
			 $data["user_data"] = $this->model_restorent->select_userdata($user_id);
       return $data;
	}

	public function index(){

	}

  public function restorent_list()
  {
		$data = $this->init_user();
		$data['active_menu'] = "restorent";
		  $data['active_submenu'] = "add_restorent";

		$data["list"] = $this->model_restorent->list_details();
		$this->load->view('restorent/restorent_list', $data);
  }

	public function add()
	{

		if($this->input->post('submit')){
			 $data["msg"] = $this->model_restorent->add();
		}else{
			$data['active_menu'] = "restorent";
		  $data['active_submenu'] = "add_restorent";
			$data = $this->init_user();
			$this->load->view('restorent/add_restorent', $data);
	    }
	}



	public function edit($id)
	{
		if($this->input->post('submit')){

			$data["msg"] = $this->model_restorent->edit($id);

		}else{
			$data['active_menu'] = "restorent";
		  $data['active_submenu'] = "add_restorent";
			$data = $this->init_user();

			$data["selected_row"] = $this->model_restorent->selected_row($id);
			$data["outlet_list"] = $this->model_restorent->outlet_list();
		  $this->load->view('restorent/add_restorent', $data);
	  }
	}

	public function edit_user_permission($id)
	{
       if($this->input->post('submit')){
								// user Permission
									 $dashboard = $this->input->post('dashboard');
									 $track_location = $this->input->post('track_location');
									 $create_users = $this->input->post('create_users');
								// user permission
								$data["msg"] = $this->model_users->edit_user_permission($id,$dashboard,$track_location,$create_users);
			 }else{
				 $data['active_menu'] = "create_users";
				 $data['active_submenu'] = "users";
				 $data = $this->init_user();
				 $this->load->view('users/user_permission', $data);
			 }
	}

	public function delete_outlet()
	{
		if(isset($_POST["del_id"])){
			$del_id = $_POST["del_id"];
			$data["msg"] = $this->model_restorent->delete_outlet($del_id);
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
