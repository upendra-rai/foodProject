<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_category extends CI_Model {
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

	public function select_item_category()
	{
		    $this->db->select('*,product_category.product_category_id as my_category_id');
				$this->db->from('product_category');
				
                $this->db->join('product_sub_category','product_sub_category.product_category_id = product_category.product_category_id','left');
               //**********Outlet Filter ********//
                 if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id')){
                      $user_outlet = $this->session->userdata('outlet_id');
                      $this->db->where('product_category.outlet_id',$user_outlet);
                 }
                 //**********Outlet Filter ********//
                $this->db->group_by('product_category.product_category_id');
                 $this->db->order_by('product_category.product_category_id','desc');
				$data = $this->db->get();
				return $data->result();
	}

  public function add_category_of_items($category_name,$status,$have_subcategory,$img_name){
        $user_outlet = $this->session->userdata('outlet_id');
      
        $arr = array(
					'product_category_name' => $category_name,
					'category_status' => $status,
					'have_sub_category' => $have_subcategory,
					'category_image' => $img_name,
                    'outlet_id' => $user_outlet,
				);

				if($this->db->insert('product_category',$arr)){
					 redirect('./category/add_category?msg=Category is successfully added.');
				}else{
					echo 'failed';
				}

	}

	public function select_item_category_selected($id)
	{
		$this->db->select('*');
		$this->db->from('product_category');
		$this->db->where('product_category_id',$id);
		$data = $this->db->get();
		return $data->result();
	}

	public function edit_category_of_items($id,$category_name,$status,$img_name,$count_scroll_position)
	{
		  $arr = array(
				    'product_category_name' => $category_name,
						'category_status' => $status,
						'category_image' => $img_name,
			);
      $this->db->where('product_category_id',$id);
			if($this->db->update('product_category',$arr)){

				    $redirect_str = './category/add_category/'.$count_scroll_position.'/?msg=Category is successfully updated.';
				    redirect($redirect_str);
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
