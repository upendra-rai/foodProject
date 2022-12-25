<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_restorent extends CI_Model {



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


	public function list_details()
	{
		        $this->db->select('*');
				$this->db->from('outlet_details');
                $this->db->where('outlet_type','restorent');
				$data = $this->db->get();
				return $data->result();
	}

	public function outlet_list()
	{
		$this->db->select('*');
		$this->db->from('outlet_details');
        $this->db->where('outlet_type','restorent');
		$data = $this->db->get();
		return $data->result();
	}

  public function add(){

		$name = $this->input->post('name');
	    $capacity  = $this->input->post('capacity');
		$table_no  = $this->input->post('table_no');
		$hall_no  = $this->input->post('hall_no');
	    $hall_capacity  = $this->input->post('hall_capacity');
		$address  = $this->input->post('address');
		$land_mark  = $this->input->post('land_mark');
		$lattitude  = $this->input->post('lattitude');
		$longitude  = $this->input->post('longitude');
		$zipp_code  = $this->input->post('zipp_code');
		$City  = $this->input->post('City');
		$State  = $this->input->post('State');
		$country  = $this->input->post('country');
		$tax  = $this->input->post('tax');
		$food_type  = $this->input->post('food_type');

		    $arr = array(
					'outlet_name' => $name,
					'capacity' => $capacity,
					'no_of_table' => $table_no,
					'no_of_hall' => $hall_no,
					'hall_capacity' => $hall_capacity,
					'outlet_address' => $address,
					'land_mark' => $land_mark,
					'outlet_letitude' => $lattitude,
					'outlet_longitude' => $longitude,
					'zip_code' => $zipp_code,
					'country' => $City,
					'states' => $State,
					'city' => $country,
					'tax' => $tax,
					'food_type' => $food_type,
					'outlet_type' => 'restorent',
					'outlet_status' => 'active',
				);

				if($this->db->insert('outlet_details',$arr)){
					   redirect('./restorent/restorent_list/?msg=Outlet is successfully added.');
				}else{
					echo 'failed';
				}

	}



	public function selected_row($id)
	{
		$this->db->select('*');
		$this->db->from('outlet_details');
		$this->db->where('outlet_id',$id);
		$data = $this->db->get();
		return $data->result();
	}


	public function edit($id)
	{
		$name = $this->input->post('name');
	  $capacity  = $this->input->post('capacity');
		$table_no  = $this->input->post('table_no');
		$hall_no  = $this->input->post('hall_no');
	  $hall_capacity  = $this->input->post('hall_capacity');
		$address  = $this->input->post('address');
		$land_mark  = $this->input->post('land_mark');
		$lattitude  = $this->input->post('lattitude');
		$longitude  = $this->input->post('longitude');
		$zipp_code  = $this->input->post('zipp_code');
		$City  = $this->input->post('City');
		$State  = $this->input->post('State');
		$country  = $this->input->post('country');
		$tax  = $this->input->post('tax');
		$food_type  = $this->input->post('food_type');

		$arr = array(
			'outlet_name' => $name,
			'capacity' => $capacity,
			'no_of_table' => $table_no,
			'no_of_hall' => $hall_no,
			'hall_capacity' => $hall_capacity,
			'outlet_address' => $address,
			'land_mark' => $land_mark,
			'outlet_letitude' => $lattitude,
			'outlet_longitude' => $longitude,
			'zip_code' => $zipp_code,
			'country' => $City,
			'states' => $State,
			'city' => $country,
			'tax' => $tax,
			'food_type' => $food_type,
			'outlet_type' => 'restorent',
			'outlet_status' => 'active',
		);



      $this->db->where('outlet_id',$id);
			if($this->db->update('outlet_details',$arr)){
				    redirect('./restorent/restorent_list/?msg=Outlet is successfully updated.');
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

	public function delete_outlet($del_id)
	{
            $check_user = $this->db->get_where('staff_member', array('outlet_id' => $del_id));
        
        
           if($check_user->num_rows() > 0){
                echo 'staff_member_exist';
               
           }else{
                $check_product_category = $this->db->get_where('product_category', array('outlet_id' => $del_id));
                 
                if($check_product_category->num_rows() > 0){
                    echo 'product_category_exist';
                    
                }else{
                    
                    if($del_id == 1){
                        echo 'failed';
                    }else{
                    
                     $this->db->where('outlet_id',$del_id);
                     if($this->db->delete('app_banner')){
                       $this->db->where('outlet_id',$del_id);
                       if($this->db->delete('offer_banner')){     
                         $this->db->where('outlet_id',$del_id);
                         if($this->db->delete('outlet_details')){
                             
                             echo 'success';
                         }else{
                             echo 'failed';
                         }
                       }else{
                            echo 'failed';
                       }
                     }else{
                             echo 'failed';
                      }
                    }
                
                }
           }
	}
    
    
    
  


}
