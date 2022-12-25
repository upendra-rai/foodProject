<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_product extends CI_Model {



	function __construct(){


       date_default_timezone_set("Asia/Calcutta");
		parent::__construct();

	}
    
    
    public function select_gst()
	{
		$this->db->select('*');
		$this->db->from('gst');
		
		$data = $this->db->get();
		return $data->result();
	}

	public function select_product($category_id,$subcategory_id)
	{
		    $get_category_id = $this->db->get_where('product_category',array('product_category_id' => $category_id ));
        if($get_category_id->num_rows() == 1){

					   $category_have_subcategory = $get_category_id->result()[0]->have_sub_category;

						 if($category_have_subcategory == 'yes'){

							 $this->db->select('*');
							 $this->db->from('product_details');
							 $this->db->join('product_category','product_category.product_category_id = product_details.product_category_id');
							 $this->db->join('product_sub_category','product_sub_category.product_sub_category_id = product_details.product_sub_category_id','left');

							 $this->db->where('product_details.product_category_id',$category_id);
							 $this->db->where('product_details.product_sub_category_id',$subcategory_id);
                             //**********Outlet Filter ********//
                             if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
                                 $user_outlet = $this->session->userdata('outlet_id');
                                 $this->db->where('product_category.outlet_id',$user_outlet);
                             }
                             //**********Outlet Filter ********//
                             
                             $this->db->order_by('product_id','desc');
							 $data = $this->db->get();
							 return $data->result();

						 }else if($category_have_subcategory == 'no'){
							 $this->db->select('*');
							 $this->db->from('product_details');
							 $this->db->join('product_category','product_category.product_category_id = product_details.product_category_id');

							$this->db->where('product_details.product_category_id',$category_id);
                              $this->db->order_by('product_id','desc');
							$data = $this->db->get();
							return $data->result();
						 }


				}


	}

	public function select_category($category_id,$subcategory_id)
	{
		        $this->db->select('*');
				$this->db->from('product_category');
                //**********Outlet Filter ********//
                if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
                     $user_outlet = $this->session->userdata('outlet_id');
                     $this->db->where('product_category.outlet_id',$user_outlet);
                }
                //**********Outlet Filter ********//
				$data = $this->db->get();
				return $data->result();
	}
	public function select_subcategory($category_id,$subcategory_id)
	{
		    $this->db->select('*');
				$this->db->from('product_sub_category');
				if($category_id != '' && $category_id != '0'){
					  $this->db->join('product_category','product_category.product_category_id = product_sub_category.product_category_id');
						$this->db->where('product_sub_category.product_category_id',$category_id);
				}
                
				$data = $this->db->get();
				return $data->result();
	}

  public function add_product($posted_category_id,$posted_subcategory_id,$product_name,$unit,$unit_price,$status,$img_name,$gst,$short_discription,$discription,$mrp_price,$unit_qty){
      
       if(!$mrp_price){
           
           $mrp_price = $unit_price;
       }
      
        $arr = array(
					'product_category_id' => $posted_category_id,
					'product_sub_category_id' => $posted_subcategory_id,
					'product_name' => $product_name,
                    'short_discription' => $short_discription,
                    'discription' => $discription,
					'product_unit' => $unit,
                    'unit_qty' => $unit_qty,
                    'mrp_rate' => $mrp_price,
					'product_unit_price' => $unit_price,
                     'sgst' => $gst/2,
                    'cgst' => $gst/2,
					'product_img' => $img_name,
					'product_status' => $status,
                
				);

				if($this->db->insert('product_details',$arr)){
					 redirect('./product/add_product/'.$posted_category_id.'/'.$posted_subcategory_id.'/?msg=Product is successfully added.');
				}else{
					echo 'failed';
				}

	}

	public function selected_product($id,$category_id,$subcategory_id)
	{
		$this->db->select('*');
		$this->db->from('product_details');
		$this->db->where('product_id',$id);
		$this->db->where('product_category_id',$category_id);

		if($subcategory_id != '' && $subcategory_id != '0'){
			$this->db->where('product_sub_category_id',$subcategory_id);
		}

		$data = $this->db->get();
		return $data->result();
	}

	public function edit_product($id,$posted_category_id,$posted_subcategory_id,$product_name,$unit,$unit_price,$status,$img_name,$count_scroll_position,$gst,$short_discription,$discription,$mrp_price,$unit_qty)
	{
		$arr = array(
			'product_category_id' => $posted_category_id,
			'product_sub_category_id' => $posted_subcategory_id,
			'product_name' => $product_name,
            'short_discription' => $short_discription,
            'discription' => $discription,
			'product_unit' => $unit,
            'unit_qty' => $unit_qty,
            'mrp_rate' => $mrp_price,
			'product_unit_price' => $unit_price,
             'sgst' => $gst/2,
            'cgst' => $gst/2,
			'product_img' => $img_name,
			'product_status' => $status,
		);
      $this->db->where('product_id',$id);
			if($this->db->update('product_details',$arr)){
				    $redirect_str = './product/add_product/'.$posted_category_id.'/'.$posted_subcategory_id.'/'.$count_scroll_position.'/?msg=Product is successfully updated.';
				    redirect($redirect_str);
			}else{
				    echo 'failed';
			}

	}

	public function del_product($del_id)
	{
		 $this->db->where('product_id',$del_id);
		 if($this->db->delete('product_details')){
			 echo 'success';
		 }else{
					 echo 'failed';
		 }
	}

 // List product section
    
    
    public function select_all_product(){
         $this->db->select('*,product_category.product_category_id as my_product_category_id');
         $this->db->from('product_details');
         $this->db->join('product_category','product_category.product_category_id = product_details.product_category_id');
         $this->db->join('product_sub_category','product_sub_category.product_sub_category_id = product_details.product_sub_category_id','left');
        //**********Outlet Filter ********//
         if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
              $user_outlet = $this->session->userdata('outlet_id');
              $this->db->where('product_category.outlet_id',$user_outlet);
         }
         //**********Outlet Filter ********//
         $this->db->order_by('product_id','desc');
        $data = $this->db->get();
        return $data->result();
        
    }
}
