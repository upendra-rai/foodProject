<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_profile extends CI_Model {



	function __construct(){



		parent::__construct();

	}



	public function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		
        $this->db->select('*');
        $this->db->from('staff_member');
        $this->db->where('email_address',$email);
        $this->db->where('user_password',$password);
         $this->db->where('user_status','active');
        $this->db->where_in('role',['master admin','admin','sub admin',]);
        $this->db->join('outlet_details','outlet_details.outlet_id = staff_member.outlet_id','left');
        $check = $this->db->get();
		if($check->num_rows() == 1){  
            $outlet_id = $check->result()[0]->outlet_id;
            if(!$outlet_id){
                $outlet_id = '';
            }
           
            $outlet_name = $check->result()[0]->outlet_name;
            if(!$outlet_name){
                $outlet_name = '';
            }
            
			$arr = array(
					'logged_in' => 'verifysoft_pos',
					'uid' => $check->result()[0]->staff_id,
                    'user_name' => $check->result()[0]->name,
                    'user_role' => $check->result()[0]->role,
                    'outlet_id' => $check->result()[0]->outlet_id,
                    'outlet_name' => $check->result()[0]->outlet_name,
                    'outlet_type' => $check->result()[0]->outlet_type,
				);
			$this->session->set_userdata($arr);
			redirect('./dashboard');
		} else {
			return '<div id="notification" class="alert alert-danger">Invalid credentials.</div>';
		}
	}


	public function forgot(){

		$email = $this->input->post('email');

		$check = $this->db->get_where('users', array(

				'email' => $email,

			));

		if($check->num_rows() == 1){

			$tok = uniqid();

            $token = md5($tok);

            $url = base_url('admin/reset_password/'.$check->result()[0]->id.'/'.$token);

            $subject = "Reset Password";

            $from = "support";

            $body = "Hello, <br/> <br/>It seems you have recently requested for Password Reset, If you did so, just click the link bellow to reset your Password.  <br><br>".$url;

            $headers = "From: " . strip_tags($from) . "\r\n";

            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";

            $headers .= "MIME-Version: 1.0\r\n";

            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			mail($email, $subject, $body, $headers);


			$arr = array(

					'token' => $token

				);


			$this->db->where('id', $check->result()[0]->id);


			if ($this->db->update('users', $arr)) {

				return '<div id="notification" class="alert alert-success">we have sent you a mail to <b style="color:springgreen;">' .$email. '</b> along with password reset link</div>';

			} else {

				return '<div id="notification" class="alert alert-danger">Something went wrong.</div>';

			}

		} else {

			return '<div id="notification" class="alert alert-danger">You are not a registered user</div>';

		}

	}



	public function reset_password($user_id, $token){

		$this->db->select('token');

		$this->db->from('users');

		$this->db->where('id', $user_id);

		$d_token = $this->db->get();



		if($d_token->num_rows() == 0){



			return 0;

		} else {



			if($token == $d_token->result()[0]->token){

				return true;

			} else {

				return false;

			}

		}

	}



	public function update_password($id){



		$password = $this->input->post('password');



		$arr = array(

				'password' => $password,

				'token' => ''

			);



		$this->db->where('id', $id);

		if($this->db->update('users', $arr)){



			return '<div id="notification" class="alert alert-success">Your Password has been updated successfully.</div>';

		} else {



			return '<div id="notification" class="alert alert-danger">Something went wrong.</div>';

		}

	}



}
