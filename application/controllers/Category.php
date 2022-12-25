<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_category');
         if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			        redirect('./admin/login');
	      	}
	}
	public function init_user(){
       $user_id = $this->session->userdata('uid');
			 $data["user_data"] = $this->model_category->select_userdata($user_id);
       return $data;
	}

	public function index(){

	}

	public function add_category()
	{

		if($this->input->post('submit')){
       $category_type = $this->input->post('category_type');
			 $category_name = $this->input->post('category_name');
			 $have_subcategory = $this->input->post('have_subcategory');

			 $status =  $this->input->post('status');
       $img_name = $this->input->post('image_name');
			 if($category_type == 'item'){
				 $data["msg"] = $this->model_category->add_category_of_items($category_name,$status,$have_subcategory,$img_name);

			 }

		}else{
		$data = $this->init_user();
		$data['active_menu'] = "category";
		$data['active_submenu'] = "add_category";

		$data["item_category_list"] = $this->model_category->select_item_category();
		$this->load->view('category/add_category', $data);
	}
	}

	public function edit_category()
	{
		 $count_scroll_position = $this->uri->segment(3);
		  $id = $this->uri->segment(4);

		if($this->input->post('submit')){
       $category_type = $this->input->post('category_type');
			 $category_name = $this->input->post('category_name');
			 $status =  $this->input->post('status');
       $img_name = $this->input->post('image_name');
       if(!$img_name){
				 $img_name = '';
			 }

       $last_uploaded_image_name =  $this->input->post('last_uploaded_image_name');

			 if($last_uploaded_image_name != $img_name){

				  unlink('uploads/product_category_image/'.$last_uploaded_image_name);
		  	}

			 if($category_type == 'item'){
				 $data["msg"] = $this->model_category->edit_category_of_items($id,$category_name,$status,$img_name,$count_scroll_position);

			 }

		}else{
		$data['active_menu'] = "category";
		$data['active_submenu'] = "add_category";

		$data["item_category_selected"] = $this->model_category->select_item_category_selected($id);
		$data["item_category_list"] = $this->model_category->select_item_category();
		$this->load->view('category/add_category', $data);
	  }
	}

	public function del_product_category()
	{
		if(isset($_POST["del_id"])){
			$del_id = $_POST["del_id"];
			$data["msg"] = $this->model_category->del_product_category($del_id);
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
    
 // list category section
    
    public function list_category()
	{

		if($this->input->post('submit')){
       $category_type = $this->input->post('category_type');
			 $category_name = $this->input->post('category_name');
			 $have_subcategory = $this->input->post('have_subcategory');

			 $status =  $this->input->post('status');
       $img_name = $this->input->post('image_name');
			 if($category_type == 'item'){
				 $data["msg"] = $this->model_category->add_category_of_items($category_name,$status,$have_subcategory,$img_name);

			 }

		}else{
		$data = $this->init_user();
		$data['active_menu'] = "category";
		$data['active_submenu'] = "list_category";

		$data["item_category_list"] = $this->model_category->select_item_category();
		$this->load->view('category/list_category', $data);
	}
	}
}
