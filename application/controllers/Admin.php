<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('model_profile');

		if($this->session->userdata('logged_in') == 'verifysoft_pos'){
			redirect('./dashboard');
		}
	}

	public function index(){

		redirect('./admin/login');
	}

	public function login(){

		if($this->input->post('submit') != ''){

			$data['message'] = $this->model_profile->login();
			$this->load->view('my-details/login', $data);
		} else {

			$this->load->view('my-details/login');
		}
	}

	public function forgot(){

		if($this->input->post('submit') != ''){

			$data['message'] = $this->model_profile->forgot();
			$this->load->view('my-details/forgot', $data);
		} else {

			$this->load->view('my-details/forgot');
		}
	}

	public function reset_password($user_id='', $token=''){

		if($user_id=='' or $token==''){
			echo "Unauthorised Access.";
		} else {

			$check = $this->model_profile->reset_password($user_id, $token);
			if($check === true){

				if($this->input->post('submit') != ''){

					$data['message'] = $this->model_profile->update_password($user_id);
					$this->load->view('my-details/reset_password', $data);
				} else {

					$this->load->view('my-details/reset_password');
				}
			} else if($check === false) {

				echo "Invalid Token.";
			} else if($check == 0) {

				echo "Unauthorised Access.";
			}
		}
	}
}
