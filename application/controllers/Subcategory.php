<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class subcategory extends CI_Controller {

	function __construct(){

		parent::__construct();

		 ini_set('max_execution_time', 0);
         ini_set('memory_limit','2048M');

		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_subcategory');
        $this->load->model('model_dashboard');
        if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			redirect('./admin/login');
		}


	}


	public function index(){
        $data['active_menu'] = "home";

        $this->load->helper('form');


        $this->load->view('home', $data);

	}

	public function add_subcategory()
	{
    $selected_category_id = $this->uri->segment(3);

		if($this->input->post('submit')){
       $posted_category_id = $this->input->post('category');
			 $subcategory_name = $this->input->post('subcategory_name');
			 $status =  $this->input->post('status');
			 $data["msg"] = $this->model_subcategory->add_subcategory($posted_category_id,$subcategory_name,$status);

		}else{
		$data['active_menu'] = "category";
		$data['active_submenu'] = "add_subcategory";
		$data['selected_category'] = $selected_category_id;

		$data["category_list"] = $this->model_subcategory->select_category();
		$data["product_subcategory"] = $this->model_subcategory->select_product_subcategory($selected_category_id);
		$this->load->view('category/add_subcategory', $data);
	}
	}

	public function edit_subcategory()
	{
		  $selected_category_id = $this->uri->segment(3);
		  $id = $this->uri->segment(4);
			$count_scroll_position = $this->uri->segment(5);

		if($this->input->post('submit')){
			   $posted_category_id = $this->input->post('category');
			   $subcategory_name = $this->input->post('subcategory_name');
			   $status =  $this->input->post('status');
				 $data["msg"] = $this->model_subcategory->edit_subcategory($id,$posted_category_id,$subcategory_name,$status);

		}else{
		$data['active_menu'] = "category";
		$data['active_submenu'] = "add_subcategory";

		$data['selected_category'] = $selected_category_id;

		$data['selected_subcategory'] = $this->model_subcategory->selected_subcategory($id);
		$data["category_list"] = $this->model_subcategory->select_category();
		$data["product_subcategory"] = $this->model_subcategory->select_product_subcategory($selected_category_id);
		$this->load->view('category/add_subcategory', $data);
	  }
	}

	public function del_subcategory()
	{
		if(isset($_POST["del_id"])){
			$del_id = $_POST["del_id"];
			$data["msg"] = $this->model_subcategory->del_subcategory($del_id);
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
    
    public function list_subcategory()
	{

		if($this->input->post('submit')){
       $category_type = $this->input->post('category_type');
			 $category_name = $this->input->post('category_name');
			 $have_subcategory = $this->input->post('have_subcategory');

			 $status =  $this->input->post('status');
       $img_name = $this->input->post('image_name');
			 if($category_type == 'item'){
				 $data["msg"] = $this->model_subcategory->add_category_of_items($category_name,$status,$have_subcategory,$img_name);

			 }

		}else{
		
		$data['active_menu'] = "category";
		$data['active_submenu'] = "list_subcategory";

		$data["list"] = $this->model_subcategory->select_item_subcategory();
		$this->load->view('category/list_subcategory', $data);
	}
	}
}
