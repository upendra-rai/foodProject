<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_points extends CI_Model {



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
		$this->db->join('user_permission','user_permission.staff_id = staff_member.staff_id');
		$data = $this->db->get();
		return $data->result();
  }
 // select user data


	public function select_app_setting()
	{
		    $this->db->select('*');
				$this->db->from('delivery_app_settings');
				
				$data = $this->db->get();
				return $data->result();
	}
    
    public function update_point_setting($point_value,$loyal_point,$loyal_sales_figure,$reffer_point){
        
        $arr = array(
            'point_value' => $point_value,
            'reffer_and_earn' => $reffer_point,
            'loyalty_sales_figure' => $loyal_sales_figure,
            'loyalty_sales_point' =>  $loyal_point,
        );
        
        if($this->db->update('delivery_app_settings',$arr)){
            
             redirect('./points/point_settings/?msg=Point setting successfully updated.');
            
        }else{
            
              redirect('./points/point_settings/');
        }
    }
    
    
    public function update_point($point_value){
         $arr = array(
            'point_value' => $point_value,
            
        );
        
        if($this->db->update('delivery_app_settings',$arr)){
            
             redirect('./points/point_settings/?msg=Point setting successfully updated.');
            
        }else{
            
              redirect('./points/point_settings/');
        }
    }
    
    
    public function update_loyalty_point($loyal_point,$loyal_sales_figure){
         $arr = array(
            'loyalty_sales_figure' => $loyal_sales_figure,
            'loyalty_sales_point' =>  $loyal_point,
            
        );
        
        if($this->db->update('delivery_app_settings',$arr)){
            
             redirect('./points/point_settings/?msg=Point setting successfully updated.');
            
        }else{
            
              redirect('./points/point_settings/');
        }
    }
    
    
      public function update_reffer_point($reffer_point){
         $arr = array(
             'reffer_and_earn' => $reffer_point,
            
        );
        
        if($this->db->update('delivery_app_settings',$arr)){
            
             redirect('./points/point_settings/?msg=Point setting successfully updated.');
            
        }else{
            
              redirect('./points/point_settings/');
        }
    }
    
    
    

	public function outlet_list()
	{
		$this->db->select('*');
		$this->db->from('outlet_details');
		$data = $this->db->get();
		return $data->result();
	}

  public function add($name,$Mobile,$email,$role,$outlet,$user_id,$user_password,$user_status){
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
					   redirect('./users/add_user_permisson/'.$user_insert_id.'/?msg=User is successfully added.');
				}else{
					echo 'failed';
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


}
