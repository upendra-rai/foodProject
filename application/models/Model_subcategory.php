<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_subcategory extends CI_Model {



	function __construct(){


       date_default_timezone_set("Asia/Calcutta");
		parent::__construct();

	}

	public function select_product_subcategory($selected_category_id)
	{
		        $this->db->select('*');
				$this->db->from('product_sub_category');
				$this->db->where('product_sub_category.product_category_id',$selected_category_id);
				$this->db->join('product_category','product_category.product_category_id = product_sub_category.product_category_id');
		        //**********Outlet Filter ********//
                 if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id')){
                      $user_outlet = $this->session->userdata('outlet_id');
                      $this->db->where('product_category.outlet_id',$user_outlet);
                 }
                 //**********Outlet Filter ********//		
         
                $data = $this->db->get();
				return $data->result();
	}

	public function select_category(){
		$this->db->select('*');
		$this->db->from('product_category');
		$this->db->where('have_sub_category','yes');
        //**********Outlet Filter ********//
         if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id')){
              $user_outlet = $this->session->userdata('outlet_id');
              $this->db->where('product_category.outlet_id',$user_outlet);
         }
         //**********Outlet Filter ********//
		$data = $this->db->get();
		return $data->result();
	}

  public function add_subcategory($posted_category_id,$subcategory_name,$status){
        $arr = array(
					'product_category_id' => $posted_category_id,
					'product_sub_category_name' => $subcategory_name,
					'product_subcategory_status' => $status,
				);

				if($this->db->insert('product_sub_category',$arr)){
					 redirect('./subcategory/add_subcategory/'.$posted_category_id.'/?msg=Sub Category is successfully added.');
				}else{
					echo 'failed';
				}

	}

	public function selected_subcategory($id)
	{
		$this->db->select('*');
		$this->db->from('product_sub_category');
		$this->db->where('product_sub_category_id',$id);
		$data = $this->db->get();
		return $data->result();
	}

	public function edit_subcategory($id,$posted_category_id,$subcategory_name,$status)
	{
		  $arr = array(
				'product_sub_category_name' => $subcategory_name,
				'product_subcategory_status' => $status,
			);
      $this->db->where('product_sub_category_id',$id);
			if($this->db->update('product_sub_category',$arr)){

				    $redirect_str = './subcategory/add_subcategory/'.$posted_category_id.'/'.$count_scroll_position.'/?msg=Sub Category is successfully updated.';
				    redirect($redirect_str);
			}else{
				    echo 'failed';
			}

	}

	public function del_subcategory($del_id)
	{
		 $this->db->where('product_sub_category_id',$del_id);
		 if($this->db->delete('product_sub_category')){
			 echo 'success';
		 }else{
					 echo 'failed';
		 }
	}

    public function select_item_subcategory(){
        $this->db->select('*');
		$this->db->from('product_sub_category');
        $this->db->order_by('product_sub_category_id','desc');
		$data = $this->db->get();
		return $data->result();
    }

}
