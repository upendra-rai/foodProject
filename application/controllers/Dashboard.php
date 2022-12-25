<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

	function __construct(){

		parent::__construct();

		     ini_set('max_execution_time', 0);
         ini_set('memory_limit','2048M');

		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_dashboard');
        if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			       redirect('./admin/login');
	     	}
        
         
	}

	public function init_user(){
       $user_id = $this->session->userdata('uid');
       $data["user_data"] = $this->model_dashboard->select_userdata($user_id);
       echo json_encode($data["user_data"]);
	}

	public function index(){
        $data['today_sell'] = $this->model_dashboard->select_today_sell();
        $data['yesterday_sell'] = $this->model_dashboard->select_yesterday_sell();
        $data['month_sell'] = $this->model_dashboard->select_month_sell();
        $data['lastmonth_sell'] = $this->model_dashboard->select_lastmonth_sell();
        $data['thisyear_sell'] = $this->model_dashboard->select_year_sell();
        
        $data['today_recharge'] = $this->model_dashboard->select_today_recharge();
        $data['yesterday_recharge'] = $this->model_dashboard->select_yesterday_recharge();
		$data['month_recharge'] = $this->model_dashboard->select_month_recharge();
        $data['lastmonth_recharge'] = $this->model_dashboard->select_lastmonth_recharge();
        $data['thisyear_recharge'] = $this->model_dashboard->select_year_recharge();

        $data['today_registration'] = $this->model_dashboard->select_today_registration();
        $data['yesterday_registration'] = $this->model_dashboard->select_yesterday_registration();
		$data['month_registration'] = $this->model_dashboard->select_month_registration();
        $data['lastmonth_registration'] = $this->model_dashboard->select_lastmonth_registration();
        $data['thisyear_registration'] = $this->model_dashboard->select_year_registration();
        
        
        $data['today_orders'] = $this->model_dashboard->select_today_orders();
        $data['yesterday_orders'] = $this->model_dashboard->select_yesterday_orders();
		$data['month_orders'] = $this->model_dashboard->select_month_orders();
        $data['lastmonth_orders'] = $this->model_dashboard->select_lastmonth_orders();
        $data['thisyear_orders'] = $this->model_dashboard->select_year_orders();
        
        $data['active_menu'] = "dashboard";
        
       $this->model_dashboard->check_expire_orders();
        $this->load->helper('form');
        $this->load->view('home', $data);

	}


    public function blocked_customer(){
        $data['active_menu'] = "home";
        $data['blocked'] = $this->model_dashboard->total_blocked_customer_detail();
        //echo json_encode($data['blocked_customer']);
        $this->load->view('customer/total_blocked', $data);
    }

    public function uniq(){

        $str = openssl_random_pseudo_bytes(6);
        $value = bin2hex($str);
         echo uniqid($value.date('ymd'));
        //echo date('ymd');
    }

	public function profile(){

		$this->load->helper('form');

		$data = $this->init('profile');

		if($this->input->post('submit') == 'update-pic'){

			$config['upload_path'] = './uploads/profile/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '1024';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$new_name = 'original-'.$_FILES["userfile"]['name'];
			$config['file_name'] = $new_name;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload()){

				$data['message'] = '<div id="notification" class="alert alert-warning">'.$this->upload->display_errors().'</div>';
				$this->load->view('my-details/profile', $data);
			} else {

				$image_data = $this->upload->data();
				$data['message'] = $this->resize($image_data);
				$this->load->view('my-details/profile', $data);
			}

		} else if($this->input->post('submit') == 'update-info'){

			$uid = $this->session->userdata('uid');
			$data['message'] = $this->model_dashboard->update_info($uid);
			$this->load->view('my-details/profile', $data);

		} else if($this->input->post('submit') == 'update-pass'){

			$uid = $this->session->userdata('uid');
			$data['message'] = $this->model_dashboard->update_pass($uid);
			$this->load->view('my-details/profile', $data);

		} else {

			$this->load->view('my-details/profile', $data);
		}
	}

	public function resize($image_data){

		$this->load->library('image_lib');
		$thumb_img = 'thumbnail-'.$image_data['client_name'];

		$config['image_library'] = 'gd2';
		$config['source_image'] = $image_data['full_path'];
		$config['new_image'] = './uploads/profile/thumbnail/'.$thumb_img;
		$config['width'] = 160;
		$config['height'] = 160;

		$this->image_lib->initialize($config);

		if($this->image_lib->resize()){

			$uid = $this->session->userdata('uid');
			$data2 = $this->model_dashboard->update_pic($thumb_img, $uid);
			return $data2;
		} else {

			return '<div id="notification" class="alert alert-danger">Something went wrong.</div>';
		}
	}

	public function logout(){

		$this->session->sess_destroy();
		redirect('./admin/login');
	}

	public function angular_crud(){

		echo "Message for Angular";
	}


    public function update_my_profile(){

        if(isset($_POST['first_name'],$_POST['email'])){

            $fname = $_POST['first_name'];
            $email = $_POST['email'];

            $this->model_dashboard->update_my_profile($fname,$email);


        }


    }

     public function change_pass(){

        if(isset($_POST['n_pass'],$_POST['r_pass'])){

            $n_pass = $_POST['n_pass'];
            $r_pass = $_POST['r_pass'];


            $this->model_dashboard->change_pass($n_pass);


        }


    }

    public function data_cleaner(){

        //$before_year = date('Y-m-d', strtotime('-1 year'));
        //echo $before_year;
        date_default_timezone_set('Asia/Kolkata');
        $cookie_name = "sharma_dairy_data_cleaner";
        $cookie_value = date('Y-m-d');
        if(isset($_COOKIE[$cookie_name])) {

            echo "data cleanup is already done";
         }else{

             $before_year = date('Y-m-d', strtotime('-1 year'));
             $this->model_dashboard->my_data_cleaner($before_year);

        }
    }

    public function block_transaction(){

        $cookie_name = "sharma_dairy_card_blocker";

        if(!isset($_COOKIE[$cookie_name])) {
             date_default_timezone_set('Asia/Kolkata');
             $before_tenday = date('Y-m-d', strtotime('-10 days'));
             $this->model_dashboard->my_block_transaction($before_tenday);
         }else{
             echo "card bolcker is already done";
        }
    }

    public function backup()
    {  $data['active_menu'] = "backup";
       $this->load->view('backup',$data);
    }

    public function db_backup()
    {
       $this->load->dbutil();
       $backup =& $this->dbutil->backup();
       $this->load->helper('file');
       write_file('<?php echo base_url();?>/downloads', $backup);
       $this->load->helper('download');
       force_download('SharmaDairy.sql', $backup);
    }

    public function enter_card()
    {
       $this->model_dashboard->enter_code();
    }
    
    public function switch_outlet(){
        $outlet_id = $this->uri->segment(3);
        $outlet_name = $this->uri->segment(4);
        $outlet_type = $this->uri->segment(5);
        
        
        $this->session->set_userdata('outlet_id',$outlet_id);
        $this->session->set_userdata('outlet_name',$outlet_name);
        $this->session->set_userdata('outlet_type',$outlet_type);
        redirect('./');
       
    }
    
    public function fetch_outlet(){
        
        $data['outlet_list'] = $this->model_dashboard->fetch_outlet();
        echo json_encode($data);
    }
    
    //////////////////////////////////
    
    public function new_order(){
        
        $data['list'] = $this->model_dashboard->new_order();
        echo json_encode($data);
    }
    
    public function feedback_notification(){
        
         $data['list'] = $this->model_dashboard->feedback_notification();
        echo json_encode($data);
    }
    
     public function read_feedback($id){
        
         $data['list'] = $this->model_dashboard->read_feedback($id);
        
    }
}
