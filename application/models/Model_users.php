<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_users extends CI_Model {



	function __construct(){


       date_default_timezone_set("Asia/Calcutta");
		parent::__construct();

	}

  // select user data
  public function select_userdata($user_id)
  {
		$this->db->select('*');
		$this->db->from('staff_member');
		$this->db->where('staff_member.staff_id',$user_id);
       
		$this->db->join('user_permission','user_permission.staff_id = staff_member.staff_id','left');
		$data = $this->db->get();
		return $data->result();
  }
 // select user data


	public function list_details()
	{
		    $this->db->select('*');
            $this->db->from('staff_member');
                $this->db->where_in('staff_member.role',array('admin','sub admin'));
                $this->db->join('outlet_details','outlet_details.outlet_id = staff_member.outlet_id'); 
				$this->db->order_by('staff_id','desc');
				$data = $this->db->get();
				return $data->result();
	}
    
    

	public function outlet_list()
	{
		$this->db->select('*');
		$this->db->from('outlet_details');
		$data = $this->db->get();
		return $data->result();
	}

  public function add($name,$Mobile,$email,$role,$outlet,$user_id,$user_password,$user_status){
      
      $check = $this->db->get_where('staff_member',array('email_address' => $email));
      
      if($check->num_rows() > 0){
          return 'Email Address already exist.';
      }else{
        $arr = array(
					'name' => $name,
					'email_address' => $email,
					'mobile_no' => $Mobile,
					'user_name' => 'no',
					'user_password' => $user_password,
					'user_status' => $user_status,
					'role' => $role,
					'outlet_id' => $outlet,
				);

				if($this->db->insert('staff_member',$arr)){
                       $user_insert_id = $this->db->insert_id();
					   redirect('./users/add_user_permisson/'.$user_insert_id.'/?msg=User is successfully added.');
				}else{
					 redirect(base_url().'users/add');
				}
      }

	}

	public function add_user_permisson($id,$dashboard,$track_location,$create_users)
	{
		$array2 = array(
				'staff_id' =>  $id,
				'dashboard' => $dashboard,
				'track_location' => $track_location,
				'create_users' => $create_users,
		);
		 if($this->db->insert('user_permission',$array2)){
			  redirect('./users/user_list/?msg=User Permission is successfully added.');
		 }else{
					echo 'failed';
		 }
	}

	public function selected_row($id)
	{
		$this->db->select('*');
		$this->db->from('staff_member');
		$this->db->where('staff_id',$id);
		$data = $this->db->get();
		return $data->result();
	}



	public function edit($id,$name,$Mobile,$email,$role,$outlet,$user_id,$user_password,$user_status)
	{
     $check = $this->db->get_where('staff_member',array('staff_id !=' => $id ,'email_address' => $email ));
      
      if($check->num_rows() > 0){
          return 'Email Address already exist.';
      }else{    
        
		$arr = array(
			'name' => $name,
			'email_address' => $email,
			'mobile_no' => $Mobile,
			'user_name' => $user_id,
			'user_password' => $user_password,
			'user_status' => $user_status,
			'role' => $role,
			'outlet_id' => $outlet,
		);
      $this->db->where('staff_id',$id);
			if($this->db->update('staff_member',$arr)){

				    $redirect_str = './users/user_list/?msg=User is successfully updated.';
				    redirect($redirect_str);
			}else{
				    echo 'failed';
			}
      }
	}

	public function edit_user_permission($id,$dashboard,$track_location,$create_users)
	{
		$array2 = array(
				'dashboard' => $dashboard,
				'track_location' => $track_location,
				'create_users' => $create_users,
		);
		 $this->db->where('staff_id',$id);
		 if($this->db->update('user_permission',$array2)){
			  redirect('./users/user_list/?msg=User Permission is successfully Updated.');
		 }else{
					echo 'failed';
		 }
	}

	public function del_product_category($del_id)
	{
    $get_row = $this->db->get_where('product_category',array('product_category_id' => $del_id));

		if($get_row->num_rows() == 1){
        $img_name = $get_row->result()[0]->category_image;
				$this->db->where('product_category_id',$del_id);
	 		  if($this->db->delete('product_category')){
	 			  echo 'success';
					if($img_name){
						 unlink('uploads/product_category_image/'.$img_name);
					 }

	 		  }else{
	 					 echo 'failed';
	 		  }
		}
	}
    
    
    public function del_admin($del_id){
        
        $check = $this->db->get_where('staff_member', array('staff_id' => $del_id));
        
        if($check->num_rows() == 1){
            
            $this->db->where('staff_id',$del_id);
            if($this->db->delete('user_permission')){
                
                $this->db->where('staff_id',$del_id);
                if($this->db->delete("staff_member")){   
                    echo "success";
                }else{
                    echo "failed";
                }
                
            }else{
                 echo "failed";
            }
            
        }
        
    }
    
    
    public function del_delivery_boy($del_id){
        
        $check = $this->db->get_where('staff_member', array('staff_id' => $del_id));
        
        if($check->num_rows() == 1){
           $this->db->where('agent_id',$del_id);
             if($this->db->delete("agent_location")){   
            
                $this->db->where('staff_id',$del_id);
                if($this->db->delete("staff_member")){   
                    echo "success";
                }else{
                    echo "failed";
                }
             }else{
                   echo "failed";
             }
         
        }
        
    }
//=========********===========********========******========//
// ************ Delivery Boy section ***********//
//=========********===========********========******========//
	public function delivery_boy_list()
  {
		$this->db->select('*');
		$this->db->from('staff_member');
        $this->db->where('staff_member.role','delivery');
		//**********Outlet Filter ********//
         if($this->session->userdata('user_role') != 'master admin' ){
              $user_outlet = $this->session->userdata('outlet_id');
              $this->db->where('staff_member.outlet_id',$user_outlet);
         }
         //**********Outlet Filter ********//
        
        $this->db->join('outlet_details','outlet_details.outlet_id = staff_member.outlet_id');
		$data = $this->db->get();
		return $data->result();
  }    
  
    public function add_delivery_person($name,$Mobile,$email,$role,$outlet,$user_id,$user_password,$user_status){
         
        if(!$outlet){
            
            $outlet = $this->session->userdata('outlet_id');
        }
        
         $check = $this->db->get_where('staff_member',array('email_address' => $email));
        
        if($check->num_rows() > 0){
            
            return 'Email address already exist';
        }else{
         
             $check_user_name = $this->db->get_where('staff_member',array('user_name' => $user_id));
         if($check_user_name->num_rows() > 0){
               return 'User Name already exist';
             
         }else{   
            
         $arr = array(
					'name' => $name,
					'email_address' => $email,
					'mobile_no' => $Mobile,
					'user_name' => $user_id,
					'user_password' => $user_password,
					'user_status' => $user_status,
					'role' => $role,
					'outlet_id' => $outlet,
				);

				if($this->db->insert('staff_member',$arr)){
             $user_insert_id = $this->db->insert_id();
					   redirect('./users/delivery_boy_list/'.$user_insert_id.'/?msg=Delivery Person is successfully added.');
				}else{
					echo 'failed';
				}
         }
        }
        
    }
    
    public function edit_delivery_boy($id,$name,$Mobile,$email,$role,$outlet,$user_id,$user_password,$user_status){
         if(!$outlet){
            
            $outlet = $this->session->userdata('outlet_id');
        }
        
          $check = $this->db->get_where('staff_member',array( 'staff_id !=' => $id, 'email_address' => $email));
        
        if($check->num_rows() > 0){
            
            return 'Email address already exist';
        }else{
         
             $check_user_name = $this->db->get_where('staff_member',array( 'staff_id !=' => $id, 'user_name' => $user_id));
         if($check_user_name->num_rows() > 0){
               return 'User Name already exist';
             
         }else{    
        
        
        $arr = array(
			'name' => $name,
			'email_address' => $email,
			'mobile_no' => $Mobile,
			'user_name' => $user_id,
			'user_password' => $user_password,
			'user_status' => $user_status,
			'role' => $role,
			'outlet_id' => $outlet,
		);
         $this->db->where('staff_id',$id);
            if($this->db->update('staff_member',$arr)){
				    $redirect_str = './users/delivery_boy_list/?msg=Delivery Person is successfully updated.';
				    redirect($redirect_str);
			}else{
				    echo 'failed';
			}
      }
        }
    }

}
