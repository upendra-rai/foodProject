<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_app_interface extends CI_Model {



	function __construct(){



		parent::__construct();
        date_default_timezone_set('Asia/Kolkata');

	}
   
/* *********||*********|******************|*********||********* */	
/* *********||*********|User Login Section|*********||********* */
/* *********||*********|******************|*********||********* */    
         
    public function user_login_model($user_name,$password){
		$check = $this->db->get_where('staff_member', array(
					'user_name' => $user_name,
					'user_password' => $password,
				));
		if($check->num_rows() == 1){
          echo $check->result()[0]->staff_id;
        }else{
	    	echo "failed";
	    }
    }
/* *********||*********|******************|*********||********* */	
/* *********||*********|Table Category Section|*********||********* */
/* *********||*********|******************|*********||********* */
    public function select_table_category(){
		$this->db->select('*');
		$this->db->from('table_category');
		$data = $this->db->get();
		return $data->result();
	}
    
    public function select_tables_by_cat($table_cate_id){
        $this->db->select('table_details.table_id,table_details.table_cat_id,table_details.table_name,table_details.table_status,table_details.kot_id as my_kot_id,kot_details.server_id,bill_details.bill_type,bill_details.bill_id');
		$this->db->from('table_details');
        $this->db->where('table_cat_id',$table_cate_id);
        $this->db->join('bill_details','bill_details.kot_id = table_details.kot_id','left');
        $this->db->join('kot_details','kot_details.kot_id = table_details.kot_id','left');
        $this->db->order_by('table_details.table_id','asc');
		$data = $this->db->get();
		return $data->result();
        
    }
    
   
	
	public function select_waiters(){
		$this->db->select('*');
		$this->db->from('staff_member');
		$this->db->where('role','waiter');
		$data = $this->db->get();
		return $data->result();
	}

/* *********||*********|******************|*********||********* */	
/* *********||*********|Item Category Section|*********||********* */
/* *********||*********|******************|*********||********* */
    public function select_item_category(){
		$this->db->select('*');
		$this->db->from('product_category');
		$data = $this->db->get();
		return $data->result();
	}

	public function select_item_subcategory(){
		$this->db->select('*');
		$this->db->from('product_sub_category');
		$data = $this->db->get();
		return $data->result();
	}
	
	
	public function select_item(){
		
		$this->db->select('*');
		$this->db->from('product_details');
		$data = $this->db->get();
		return $data->result();
		
	}
/* *********||*********|******************|*********||********* */	
/* *********||*********|Item Table Section|*********||********* */
/* *********||*********|******************|*********||********* */ 
    
     public function genrate_kot_for_new_table($kot_type,$table_id,$server_id,$table_kot_id,$item_id,$item_name,$item_qty,$item_price,$total_amount,$item_remark,$total_item_qty,$total_discount,$total_net_amt,$total_gross_amt,$item_sgst,$item_cgst){
       
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
         
         
        $arr = array(
            'kot_date' => $time_stamp,
            'kot_type' => $kot_type,
            'table_id' => $table_id,
            'server_id' => $server_id,
            'kot_status' => "pending",
            
            'total_qty' => $total_item_qty,
            'total_discount' => $total_discount,
            'total_net_amount' => $total_net_amt,
            'total_gross_amount' => $total_gross_amt
        );
        
        if($this->db->insert('kot_details',$arr)){
             $kot_id = $this->db->insert_id();
             $this->db->where('table_id',$table_id);
             $this->db->set('table_status','running');
             $this->db->set('kot_id',$kot_id);
             
             if($this->db->update('table_details')){
                  for($i = 0; $i < count($item_id); $i++){  
                     $arr2 = array(
                          'kot_id' => $kot_id,
                          'product_id' => $item_id[$i],
                          'product_name' => $item_name[$i],
                          'product_qty' => $item_qty[$i],
                          'unit_price' => $item_price[$i],
                          'total_amount' => $total_amount[$i],
                          'remark' =>  $item_remark[$i],
                          'product_sgst' => $item_sgst[$i],
                          'product_cgst' => $item_cgst[$i],
                         
                     );
                     $this->db->insert('kot_order_details',$arr2);
                   }
                   echo "success";
                 }
                 
             }
        
    }
    
 
    public function update_genrated_kot($kot_type,$table_id,$server_id,$table_kot_id,$item_id,$item_name,$item_qty,$item_price,$total_amount,$item_remark,$total_item_qty,$total_discount,$total_net_amt,$total_gross_amt,$item_sgst,$item_cgst){
       
       $check_kot_id = $this->db->get_where('kot_details',array( 'kot_id' => $table_kot_id ));
        
        if($check_kot_id->num_rows() == 1){
             
            $this->db->set('kot_status','pending');
            $this->db->where('kot_id',$table_kot_id);
            if($this->db->update('kot_details')){
                $this->db->where('table_id',$table_id);
                $this->db->set('table_status','running');
                if($this->db->update('table_details')){
                     $this->db->where('kot_id',$table_kot_id);
                     $this->db->delete('kot_order_details');
                     for($i = 0; $i < count($item_id); $i++){  
                            $arr2 = array(
                                 'kot_id' => $table_kot_id,
                                 'product_id' => $item_id[$i],
                                 'product_name' => $item_name[$i],
                                 'product_qty' => $item_qty[$i],
                                 'unit_price' => $item_price[$i],
                                 'total_amount' => $total_amount[$i],
                                 'remark' =>  $item_remark[$i],
                                 'product_sgst' => $item_sgst[$i],
                                 'product_cgst' => $item_cgst[$i],
                                
                            );
                           $this->db->insert('kot_order_details',$arr2);
                    }
                    echo "success";
                }else{ echo "falied";}   
            }else{ echo "falied";}
        }else{
            echo "not_exist";
        }
    }
    
    public function genrate_kot_for_self_service($kot_type,$table_id,$server_id,$table_kot_id,$item_id,$item_name,$item_qty,$item_price,$total_amount,$item_remark,$total_item_qty,$total_discount,$total_net_amt,$total_gross_amt,$item_sgst,$item_cgst){
       
       $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
         
         
        $arr = array(
            'kot_date' => $time_stamp,
            'kot_type' => $kot_type,
            'kot_status' => "pending",
            'total_qty' => $total_item_qty,
            'total_discount' => $total_discount,
            'total_net_amount' => $total_net_amt,
            'total_gross_amount' => $total_gross_amt
        );
        
        if($this->db->insert('kot_details',$arr)){
                  $kot_id = $this->db->insert_id();
                  for($i = 0; $i < count($item_id); $i++){  
                     $arr2 = array(
                          'kot_id' => $kot_id,
                          'product_id' => $item_id[$i],
                          'product_name' => $item_name[$i],
                          'product_qty' => $item_qty[$i],
                          'unit_price' => $item_price[$i],
                          'total_amount' => $total_amount[$i],
                          'remark' =>  $item_remark[$i],
                          'product_sgst' => $item_sgst[$i],
                          'product_cgst' => $item_cgst[$i],
                         
                     );
                     $this->db->insert('kot_order_details',$arr2);
                   }
                  echo $kot_id;
                    
             }
    }
    
    public function genrate_kot_for_home_delivery($kot_type,$table_id,$server_id,$table_kot_id,$item_id,$item_name,$item_qty,$item_price,$total_amount,$item_remark,$total_item_qty,$total_discount,$total_net_amt,$total_gross_amt,$item_sgst,$item_cgst,$home_delivery_id){
       
       $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
         
         
        $arr = array(
            'kot_date' => $time_stamp,
            'kot_type' => $kot_type,
            'kot_status' => "pending",
            'total_qty' => $total_item_qty,
            'total_discount' => $total_discount,
            'total_net_amount' => $total_net_amt,
            'total_gross_amount' => $total_gross_amt
        );
        
        if($this->db->insert('kot_details',$arr)){
                  $kot_id = $this->db->insert_id();
                  for($i = 0; $i < count($item_id); $i++){  
                     $arr2 = array(
                          'kot_id' => $kot_id,
                          'product_id' => $item_id[$i],
                          'product_name' => $item_name[$i],
                          'product_qty' => $item_qty[$i],
                          'unit_price' => $item_price[$i],
                          'total_amount' => $total_amount[$i],
                          'remark' =>  $item_remark[$i],
                          'product_sgst' => $item_sgst[$i],
                          'product_cgst' => $item_cgst[$i],
                         
                     );
                     $this->db->insert('kot_order_details',$arr2);
                   }
                  
                    
                  $this->db->set("kot_id",$kot_id);
                  $this->db->where("home_delivery_id",$home_delivery_id);
                  if($this->db->update("home_delivery_details")){
                      echo $kot_id;
                  }else{
                      echo "failed";
                  }
                 
             }
    }
    
     public function genrate_kot_for_draft($kot_type,$table_id,$server_id,$table_kot_id,$item_id,$item_name,$item_qty,$item_price,$total_amount,$item_remark,$total_item_qty,$total_discount,$total_net_amt,$total_gross_amt,$item_sgst,$item_cgst){
       
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
         
         
        $arr = array(
            'kot_date' => $time_stamp,
            'kot_type' => $kot_type,
            'table_id' => $table_id,
            'server_id' => $server_id,
            'kot_status' => "draft",
            
            'total_qty' => $total_item_qty,
            'total_discount' => $total_discount,
            'total_net_amount' => $total_net_amt,
            'total_gross_amount' => $total_gross_amt
        );
        
        if($this->db->insert('kot_details',$arr)){
             $kot_id = $this->db->insert_id();
             $this->db->where('table_id',$table_id);
             $this->db->set('table_status','draft');
             $this->db->set('kot_id',$kot_id);
             
             if($this->db->update('table_details')){
                  for($i = 0; $i < count($item_id); $i++){  
                     $arr2 = array(
                          'kot_id' => $kot_id,
                          'product_id' => $item_id[$i],
                          'product_name' => $item_name[$i],
                          'product_qty' => $item_qty[$i],
                          'unit_price' => $item_price[$i],
                          'total_amount' => $total_amount[$i],
                          'remark' =>  $item_remark[$i],
                          'product_sgst' => $item_sgst[$i],
                          'product_cgst' => $item_cgst[$i],
                         
                     );
                     $this->db->insert('kot_order_details',$arr2);
                   }
                   echo "success";
                 }
                 
             }
        
    }
/* *********||*********|******************|*********||********* */	
/* *********||*********|Genrate Bill Section|*********||********* */
/* *********||*********|******************|*********||********* */ 
    
     public function genrate_bill_details($table_id){
 
        $this->db->select('*');
		$this->db->from('kot_details');
        $this->db->where('kot_details.table_id',$table_id);
        $this->db->where('kot_details.kot_status','pending'); 
         
        $this->db->join('kot_order_details','kot_order_details.kot_id = kot_details.kot_id','left');
        $this->db->join('table_details','table_details.table_id = kot_details.table_id','left');
        $this->db->join('bill_details','bill_details.bill_id = kot_details.bill_id','left'); 
        $this->db->join('customer_details','customer_details.customer_id = bill_details.customer_id','left'); 
		$data = $this->db->get();
		return $data->result();
    }
    
    public function genrate_bill_details_for_self_service($kot_id){
        $this->db->select('*');
		$this->db->from('kot_details');
        $this->db->where('kot_details.kot_id',$kot_id);
        $this->db->join('kot_order_details','kot_order_details.kot_id = kot_details.kot_id','left');
        $this->db->join('bill_details','bill_details.bill_id = kot_details.bill_id','left'); 
        $this->db->join('customer_details','customer_details.customer_id = bill_details.customer_id','left'); 
		$data = $this->db->get();
		return $data->result();
    }
    
    public function genrate_bill_details_for_home_delivery($kot_id){
        $this->db->select('*');
		$this->db->from('kot_details');
        $this->db->where('kot_details.kot_id',$kot_id);
        $this->db->join('kot_order_details','kot_order_details.kot_id = kot_details.kot_id');
        $this->db->join('home_delivery_details','home_delivery_details.kot_id = kot_details.kot_id');
        $this->db->join('customer_details','customer_details.customer_id = home_delivery_details.customer_id');
        
		$data = $this->db->get();
		return $data->result();
        
    }
    
     public function select_customer(){
         
         $this->db->select('*');
		 $this->db->from('customer_details');
         //$this->db->order_by('first_name');
		 $data = $this->db->get();
		 return $data->result();

         
     }
    
	 public function search_guest($search_value){
         
        
        $query = "SELECT * 
                FROM  (
                      SELECT *, CONCAT(customer_name,' ',contact_1) name
                      FROM customer_details 
                  ) a
                WHERE name LIKE '%".$search_value."%'";
         $rs = $this->db->query($query);
         
         $data = $rs->result();
        
         if($rs->num_rows() > 0){
             
             foreach($data as $row){
                 echo '<li data-customer_id="'.$row->customer_id.'" data-class_id="'.$row->class_id.'" data-name="'.$row->customer_name.'" data-contact_1="'.$row->contact_1.'" data-contact_2="'.$row->contact_2.'" data-company="'.$row->company_name.'" data-gstin="'.$row->gst_in.'" data-addresss="'.$row->address.'" data-dob="'.$row->dob.'" data-any="'.$row->anniversary.'" data-gender="'.$row->gender.'">'.$row->customer_name.'-'.$row->contact_1.'</li>';
                 
             }
             
         }
         //echo json_encode($data);
		//return $data->result();
		
     }  
    
    public function print_bill_for_dinning($customer_id,$kot_id, $net_amount,$gross_amount,$sgst,$cgst,$service_charge,$discount,$bill_remark,$table_id,$customer_type,$m_status,$guest_name,$company_name,$gstin,$contact_1,$contact_2,$address,$dob,$anniversary,$gender,$bill_type){
       // echo $customer_id.$kot_id.$net_amount.$gross_amount.$sgst.$cgst.$service_charge.$discount.$bill_remark;
        
        if($customer_id == ''){
            $customer_id = null;
        }
        
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
        
        if($guest_name != "" && $contact_1 != ""){
        
        $check_customer = $this->db->get_where('customer_details',array('customer_id' => $customer_id));
        
        if($check_customer->num_rows() == 1){
            
            $c_arr1 = array(
             'customer_name' => $guest_name,
             'company_name' => $company_name,
             'gst_in' => $gstin,
             'contact_1' => $contact_1,
             'contact_2' => $contact_2,
             'address' => $address,
             'gender' => $gender,
             'dob' =>  $dob,
             'anniversary' => $anniversary,
             'class_id' => $customer_type,
            );
            
            $this->db->where("customer_id",$customer_id);
            $this->db->update("customer_details",$c_arr1);
        }else{
            
            $c_arr2 = array(
             'customer_name' => $guest_name,
             'company_name' => $company_name,
             'gst_in' => $gstin,
             'contact_1' => $contact_1,
             'contact_2' => $contact_2,
             'address' => $address,
             'gender' => $gender,
             'dob' =>  $dob,
             'anniversary' => $anniversary,
             'class_id' => $customer_type,
            );
            if($this->db->insert("customer_details",$c_arr2)){
                $inserting_customer_id = $this->db->insert_id();
                
                $current_balance_arr = array(
                    "customer_id" => $inserting_customer_id,
                    "balance_amount" => 0,
                );
                $this->db->insert("current_balance",$current_balance_arr);
                
            }
        }
        
        }
        $check_bill = $this->db->get_where('bill_details',array('kot_id' => $kot_id, 'bill_status' => "pending"));
        
       if($check_bill->num_rows() == 1){
           
             $arr2 = array(
             'bill_type' => $bill_type,
             'table_id' => $table_id,     
             'customer_id' => $customer_id,
             'bill_net_amount' => $net_amount,
             'bill_gross_amount' => $gross_amount,
             'bill_sgst' => $sgst,
             'bill_cgst' => $cgst,
             'bill_service_charge' => $service_charge,
             'bill_discount' => $discount,
             'bill_remark' => $bill_remark,
             'bill_date' => $time_stamp, 
            'bill_status' => "pending",     
            );
            $this->db->where('kot_id',$kot_id);
            if($this->db->update('bill_details',$arr2)){
                $my_bill_id = $check_bill->result()[0]->bill_id;
                
                $this->db->where('table_id',$table_id);
                $this->db->where('kot_status','pending');
                $this->db->set('bill_id',$my_bill_id);
                $this->db->update('kot_details');
                
                echo $my_bill_id;
                
            }else{ echo 'failed'; } 
        }else{
          
          $arr = array(
             'bill_type' => $bill_type,  
             'table_id' => $table_id,
             'kot_id' =>  $kot_id, 
             'customer_id' => $customer_id,
             'bill_net_amount' => $net_amount,
             'bill_gross_amount' => $gross_amount,
             'bill_sgst' => $sgst,
             'bill_cgst' => $cgst,
             'bill_service_charge' => $service_charge,
             'bill_discount' => $discount,
             'bill_remark' => $bill_remark,
              'bill_date' => $time_stamp, 
              'bill_status' => "pending",    
            );
        
            if($this->db->insert('bill_details',$arr)){
                $bill_id = $this->db->insert_id();
                
                $chek_table = $this->db->get_where('table_details',array('table_id' => $table_id));
                
                if($chek_table->num_rows() == 1){
                    $this->db->set("table_status","tender");
                    $this->db->where("table_id",$table_id);
                    if($this->db->update("table_details")){
                        $this->db->where('table_id',$table_id);
                        $this->db->where('kot_status','pending');
                        $this->db->set('bill_id',$bill_id);
                        $this->db->update('kot_details');
                        
                    }
                    
                }
                
                echo $bill_id;
            }else{ echo 'failed'; }
        
        }
        
        
    }
    
    public function print_bill_for_self_service($customer_id,$kot_id, $net_amount,$gross_amount,$sgst,$cgst,$service_charge,$discount,$bill_remark,$table_id,$customer_type,$m_status,$guest_name,$company_name,$gstin,$contact_1,$contact_2,$address,$dob,$anniversary,$gender,$bill_type){
        
        if($customer_id == ''){
            $customer_id = null;
        }
        
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
        
        if($guest_name != "" && $contact_1 != ""){
        
        $check_customer = $this->db->get_where('customer_details',array('customer_id' => $customer_id));
        
        if($check_customer->num_rows() == 1){
            
            $c_arr1 = array(
             'customer_name' => $guest_name,
             'company_name' => $company_name,
             'gst_in' => $gstin,
             'contact_1' => $contact_1,
             'contact_2' => $contact_2,
             'address' => $address,
             'gender' => $gender,
             'dob' =>  $dob,
             'anniversary' => $anniversary,
             'class_id' => $customer_type,
            );
            
            $this->db->where("customer_id",$customer_id);
            $this->db->update("customer_details",$c_arr1);
        }else{
            
            $c_arr2 = array(
             'customer_name' => $guest_name,
             'company_name' => $company_name,
             'gst_in' => $gstin,
             'contact_1' => $contact_1,
             'contact_2' => $contact_2,
             'address' => $address,
             'gender' => $gender,
             'dob' =>  $dob,
             'anniversary' => $anniversary,
             'class_id' => $customer_type,
            );
            if($this->db->insert("customer_details",$c_arr2)){
                $inserting_customer_id = $this->db->insert_id();
                
                $current_balance_arr = array(
                    "customer_id" => $inserting_customer_id,
                    "balance_amount" => 0,
                );
                $this->db->insert("current_balance",$current_balance_arr);
                
            }
        }
        
        }
        $check_bill = $this->db->get_where('bill_details',array('kot_id' => $kot_id, 'bill_status' => "pending"));
        
       if($check_bill->num_rows() == 1){
           
             $arr2 = array(
             'bill_type' => $bill_type,
             'table_id' => $table_id,     
             'customer_id' => $customer_id,
             'bill_net_amount' => $net_amount,
             'bill_gross_amount' => $gross_amount,
             'bill_sgst' => $sgst,
             'bill_cgst' => $cgst,
             'bill_service_charge' => $service_charge,
             'bill_discount' => $discount,
             'bill_remark' => $bill_remark,
             'bill_date' => $time_stamp, 
            'bill_status' => "pending",     
            );
            $this->db->where('kot_id',$kot_id);
            if($this->db->update('bill_details',$arr2)){
                $my_bill_id = $check_bill->result()[0]->bill_id;
                
                $this->db->where('kot_id',$kot_id);
                $this->db->where('kot_status','pending');
                $this->db->set('bill_id',$my_bill_id);
                $this->db->update('kot_details');
                
                echo $my_bill_id;
                
            }else{ echo 'failed'; } 
        }else{
          
          $arr = array(
             'bill_type' => $bill_type,  
             'table_id' => $table_id,
             'kot_id' =>  $kot_id, 
             'customer_id' => $customer_id,
             'bill_net_amount' => $net_amount,
             'bill_gross_amount' => $gross_amount,
             'bill_sgst' => $sgst,
             'bill_cgst' => $cgst,
             'bill_service_charge' => $service_charge,
             'bill_discount' => $discount,
             'bill_remark' => $bill_remark,
              'bill_date' => $time_stamp, 
              'bill_status' => "pending",    
            );
        
            if($this->db->insert('bill_details',$arr)){
                $bill_id = $this->db->insert_id();
                $this->db->where('kot_id',$kot_id);
                $this->db->where('kot_status','pending');
                $this->db->set('bill_id',$bill_id);
                $this->db->update('kot_details');
                
                echo $bill_id;
            }else{ echo 'failed'; }
        
        }
        
        
        
    }
    
    
    public function print_bill_for_home_delivery($customer_id,$kot_id, $net_amount,$gross_amount,$sgst,$cgst,$service_charge,$discount,$bill_remark,$table_id,$bill_type,$home_delivery_id){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
       
        $check_bill = $this->db->get_where('bill_details',array('kot_id' => $kot_id, 'bill_status' => "pending"));
        
       if($check_bill->num_rows() == 1){
           
             $arr2 = array(
             'bill_type' => $bill_type,
                  
             'customer_id' => $customer_id,
             'bill_net_amount' => $net_amount,
             'bill_gross_amount' => $gross_amount,
             'bill_sgst' => $sgst,
             'bill_cgst' => $cgst,
             'bill_service_charge' => $service_charge,
             'bill_discount' => $discount,
             'bill_remark' => $bill_remark,
             'bill_date' => $time_stamp, 
            'bill_status' => "pending",     
            );
            $this->db->where('kot_id',$kot_id);
            if($this->db->update('bill_details',$arr2)){
                $this->db->where("kot_id",$kot_id);
                $this->db->set("bill_id",$bill_id);
                if($this->db->update("kot_details")){
                
                 $this->db->where("kot_id",$kot_id);
                $this->db->set("bill_id",$bill_id);
                if($this->db->update("home_delivery_details")){
                     echo $check_bill->result()[0]->bill_id;
                }else{ echo 'failed'; }
               }else{ echo 'failed'; }
            }else{ echo 'failed'; } 
        }else{
          
          $arr = array(
             'bill_type' => $bill_type,
             'kot_id' =>  $kot_id, 
             'customer_id' => $customer_id,
             'bill_net_amount' => $net_amount,
             'bill_gross_amount' => $gross_amount,
             'bill_sgst' => $sgst,
             'bill_cgst' => $cgst,
             'bill_service_charge' => $service_charge,
             'bill_discount' => $discount,
             'bill_remark' => $bill_remark,
              'bill_date' => $time_stamp, 
              'bill_status' => "pending",    
            );
        
            if($this->db->insert('bill_details',$arr)){
                $bill_id = $this->db->insert_id();
                
                $this->db->where("kot_id",$kot_id);
                $this->db->set("bill_id",$bill_id);
                if($this->db->update("kot_details")){
                      $this->db->where("kot_id",$kot_id);
                      $this->db->set("bill_id",$bill_id);
                      if($this->db->update("home_delivery_details")){
                         echo $bill_id;
                      }else{ echo 'failed'; }
                }else{ echo 'failed'; }  
            }else{ echo 'failed'; }
        
        }
        
        
    }
    
     public function print_bill_and_cash_payment_for_dinning($customer_id,$kot_id, $net_amount,$gross_amount,$sgst,$cgst,$service_charge,$discount,$bill_remark,$table_id,$customer_type,$m_status,$guest_name,$company_name,$gstin,$contact_1,$contact_2,$address,$dob,$anniversary,$gender,$bill_type){
       // echo $customer_id.$kot_id.$net_amount.$gross_amount.$sgst.$cgst.$service_charge.$discount.$bill_remark;
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
       if($guest_name != "" && $contact_1 != ""){
         $check_customer = $this->db->get_where('customer_details',array('customer_id' => $customer_id));
        if($check_customer->num_rows() == 1){
            $c_arr1 = array(
             'customer_name' => $guest_name,
             'company_name' => $company_name,
             'gst_in' => $gstin,
             'contact_1' => $contact_1,
             'contact_2' => $contact_2,
             'address' => $address,
             'gender' => $gender,
             'dob' =>  $dob,
             'anniversary' => $anniversary,
             'class_id' => $customer_type,
            );
            
            $this->db->where("customer_id",$customer_id);
            $this->db->update("customer_details",$c_arr1);
        }else{
            $c_arr2 = array(
             'customer_name' => $guest_name,
             'company_name' => $company_name,
             'gst_in' => $gstin,
             'contact_1' => $contact_1,
             'contact_2' => $contact_2,
             'address' => $address,
             'gender' => $gender,
             'dob' =>  $dob,
             'anniversary' => $anniversary,
             'class_id' => $customer_type,
            );
            if($this->db->insert("customer_details",$c_arr2)){
                $inserting_customer_id = $this->db->insert_id();
                
                $current_balance_arr = array(
                    "customer_id" => $inserting_customer_id,
                    "balance_amount" => 0,
                );
                $this->db->insert("current_balance",$current_balance_arr);
                
            }
        }
        
        }
       
       $check_bill = $this->db->get_where('bill_details',array('kot_id' => $kot_id, 'bill_status' => "pending"));
       if($check_bill->num_rows() == 1){
             $arr2 = array(
             'bill_type' => $bill_type,
             'table_id' => $table_id,         
             'customer_id' => $customer_id,
             'bill_net_amount' => $net_amount,
             'bill_gross_amount' => $gross_amount,
             'bill_sgst' => $sgst,
             'bill_cgst' => $cgst,
             'bill_service_charge' => $service_charge,
             'bill_discount' => $discount,
             'bill_remark' => $bill_remark,
             'bill_date' => $time_stamp, 
            'bill_status' => "completed",     
            );
            $this->db->where('kot_id',$kot_id);
            if($this->db->update('bill_details',$arr2)){
                $bill_id = $check_bill->result()[0]->bill_id;
                $arr5 = array(
                    "bill_id" => $bill_id,
                    "customer_id" => $customer_id,
                    "transaction_amount" => $net_amount,
                    "transaction_date" => $time_stamp
                 
                );
                if($this->db->insert("transaction_details",$arr5)){
                    if($table_id){
                        $this->db->where("table_id",$table_id);
                        $this->db->where("kot_status",'pending');
                        $this->db->set("kot_status","completed");
                        $this->db->set("bill_id",$bill_id);
                        if($this->db->update("kot_details")){
                            $this->db->set("table_status",""); 
                            $this->db->set("kot_id",0); 
                            $this->db->where("table_id",$table_id);
                            if($this->db->update("table_details")){
                                 echo 'success';
                             }else{ echo 'failed'; }
                        }else{ echo 'failed'; }
                    }
                }else{ echo 'failed'; }
            }else{ echo 'failed'; } 
        }else{
          
        $arr = array(
             'bill_type' => $bill_type,
             'table_id' => $table_id,    
             'kot_id' =>  $kot_id, 
             'customer_id' => $customer_id,
             'bill_net_amount' => $net_amount,
             'bill_gross_amount' => $gross_amount,
             'bill_sgst' => $sgst,
             'bill_cgst' => $cgst,
             'bill_service_charge' => $service_charge,
             'bill_discount' => $discount,
             'bill_remark' => $bill_remark,
              'bill_date' => $time_stamp, 
              'bill_status' => "completed",    
            );
        
            if($this->db->insert('bill_details',$arr)){
              $bill_id = $this->db->insert_id();
               $arr6 = array(
                    "bill_id" => $bill_id,
                    "customer_id" => $customer_id,
                    "transaction_amount" => $net_amount,
                    "transaction_date" => $time_stamp
                 
                );
                
                if($this->db->insert("transaction_details",$arr6)){
                    if($table_id){
                        $this->db->where("table_id",$table_id);
                        $this->db->where("kot_status",'pending');
                        $this->db->set("kot_status","completed");
                        $this->db->set("bill_id",$bill_id);
                        if($this->db->update("kot_details")){
                            $this->db->set("table_status",""); 
                            $this->db->set("kot_id",0); 
                            $this->db->where("table_id",$table_id);
                            if($this->db->update("table_details")){
                                 echo 'success';
                             }else{ echo 'failed'; }
                        }else{ echo 'failed'; }
                    }
                }else{ echo 'failed'; }
                
            }else{ echo 'failed'; }
           
        }
      
    }
    
    
    public function print_bill_and_cash_payment_for_home_delivery($customer_id,$kot_id, $net_amount,$gross_amount,$sgst,$cgst,$service_charge,$discount,$bill_remark,$table_id,$customer_type,$m_status,$guest_name,$company_name,$gstin,$contact_1,$contact_2,$address,$dob,$anniversary,$gender,$bill_type){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
       
        $check_bill = $this->db->get_where('bill_details',array('kot_id' => $kot_id, 'bill_status' => "pending"));
        
       if($check_bill->num_rows() == 1){
             $arr2 = array(
             'bill_type' => $bill_type,
             'table_id' => $table_id,         
             'customer_id' => $customer_id,
             'bill_net_amount' => $net_amount,
             'bill_gross_amount' => $gross_amount,
             'bill_sgst' => $sgst,
             'bill_cgst' => $cgst,
             'bill_service_charge' => $service_charge,
             'bill_discount' => $discount,
             'bill_remark' => $bill_remark,
             'bill_date' => $time_stamp, 
            'bill_status' => "completed",     
            );
            $this->db->where('kot_id',$kot_id);
            if($this->db->update('bill_details',$arr2)){
                $bill_id = $check_bill->result()[0]->bill_id;
                $arr5 = array(
                    "bill_id" => $bill_id,
                    "customer_id" => $customer_id,
                    "kot_id" => $kot_id,
                    "transaction_amount" => $net_amount,
                    "transaction_date" => $time_stamp
                );
                if($this->db->insert("transaction_details",$arr5)){
                        $this->db->where("kot_id",$kot_id);
                        $this->db->set("kot_status","completed");
                        $this->db->set("bill_id",$bill_id);
                        if($this->db->update("kot_details")){
                             $this->db->where("kot_id",$kot_id);
                             $this->db->set("bill_id",$bill_id);
                             $this->db->set("home_delivery_status",'completed');
                             if($this->db->update("home_delivery_details")){
                                 echo 'success';
                             }else{
                                 echo 'failed';
                             }
                            
                        }else{ echo 'failed'; }
                    
                }else{ echo 'failed'; }
            }else{ echo 'failed'; } 
        }else{
          
        $arr = array(
             'bill_type' => $bill_type,
             'table_id' => $table_id,    
             'kot_id' =>  $kot_id, 
             'customer_id' => $customer_id,
             'bill_net_amount' => $net_amount,
             'bill_gross_amount' => $gross_amount,
             'bill_sgst' => $sgst,
             'bill_cgst' => $cgst,
             'bill_service_charge' => $service_charge,
             'bill_discount' => $discount,
             'bill_remark' => $bill_remark,
              'bill_date' => $time_stamp, 
              'bill_status' => "completed",    
            );
        
            if($this->db->insert('bill_details',$arr)){
                $bill_id = $this->db->insert_id();
                
               $arr6 = array(
                    "bill_id" => $bill_id,
                    "customer_id" => $customer_id,
                    "kot_id" => $kot_id,
                    "transaction_amount" => $net_amount,
                    "transaction_date" => $time_stamp
                 
                );
                
                if($this->db->insert("transaction_details",$arr6)){
                    
                        $this->db->where("kot_id",$kot_id);
                        $this->db->set("kot_status","completed");
                        $this->db->set("bill_id",$bill_id);
                        if($this->db->update("kot_details")){
                             $this->db->where("kot_id",$kot_id);
                             $this->db->set("bill_id",$bill_id);
                             $this->db->set("home_delivery_status",'completed');
                             if($this->db->update("home_delivery_details")){
                                 echo 'success';
                             }else{
                                 echo 'failed';
                             }
                        }else{ echo 'failed'; }
                    
                }else{ echo 'failed'; }
                
            }else{ echo 'failed'; }
           
        }
      
    }
    
     public function print_bill_and_cash_payment_for_self_service($customer_id,$kot_id, $net_amount,$gross_amount,$sgst,$cgst,$service_charge,$discount,$bill_remark,$table_id,$customer_type,$m_status,$guest_name,$company_name,$gstin,$contact_1,$contact_2,$address,$dob,$anniversary,$gender,$bill_type){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
       if($guest_name != "" && $contact_1 != ""){
         $check_customer = $this->db->get_where('customer_details',array('customer_id' => $customer_id));
        if($check_customer->num_rows() == 1){
            $c_arr1 = array(
             'customer_name' => $guest_name,
             'company_name' => $company_name,
             'gst_in' => $gstin,
             'contact_1' => $contact_1,
             'contact_2' => $contact_2,
             'address' => $address,
             'gender' => $gender,
             'dob' =>  $dob,
             'anniversary' => $anniversary,
             'class_id' => $customer_type,
            );
            
            $this->db->where("customer_id",$customer_id);
            $this->db->update("customer_details",$c_arr1);
        }else{
            $c_arr2 = array(
             'customer_name' => $guest_name,
             'company_name' => $company_name,
             'gst_in' => $gstin,
             'contact_1' => $contact_1,
             'contact_2' => $contact_2,
             'address' => $address,
             'gender' => $gender,
             'dob' =>  $dob,
             'anniversary' => $anniversary,
             'class_id' => $customer_type,
            );
            if($this->db->insert("customer_details",$c_arr2)){
                $inserting_customer_id = $this->db->insert_id();
                
                $current_balance_arr = array(
                    "customer_id" => $inserting_customer_id,
                    "balance_amount" => 0,
                );
                $this->db->insert("current_balance",$current_balance_arr);
            }
        }
        }
       
        $check_bill = $this->db->get_where('bill_details',array('kot_id' => $kot_id, 'bill_status' => "pending"));
        if($check_bill->num_rows() == 1){
             $arr2 = array(
             'bill_type' => $bill_type,
             'table_id' => $table_id,         
             'customer_id' => $customer_id,
             'bill_net_amount' => $net_amount,
             'bill_gross_amount' => $gross_amount,
             'bill_sgst' => $sgst,
             'bill_cgst' => $cgst,
             'bill_service_charge' => $service_charge,
             'bill_discount' => $discount,
             'bill_remark' => $bill_remark,
             'bill_date' => $time_stamp, 
            'bill_status' => "completed",     
            );
            $this->db->where('kot_id',$kot_id);
            if($this->db->update('bill_details',$arr2)){
                $bill_id = $check_bill->result()[0]->bill_id;
                $arr5 = array(
                    "bill_id" => $bill_id,
                    "customer_id" => $customer_id,
                    "kot_id" => $kot_id,
                    "transaction_amount" => $net_amount,
                    "transaction_date" => $time_stamp
                );
                if($this->db->insert("transaction_details",$arr5)){
                        $this->db->where("kot_id",$kot_id);
                        $this->db->set("kot_status","completed");
                        $this->db->set("bill_id",$bill_id);
                        if($this->db->update("kot_details")){
                             echo 'success';
                        }else{ echo 'failed'; }
                    
                }else{ echo 'failed'; }
            }else{ echo 'failed'; } 
        }else{
          
        $arr = array(
             'bill_type' => $bill_type,
             'table_id' => $table_id,    
             'kot_id' =>  $kot_id, 
             'customer_id' => $customer_id,
             'bill_net_amount' => $net_amount,
             'bill_gross_amount' => $gross_amount,
             'bill_sgst' => $sgst,
             'bill_cgst' => $cgst,
             'bill_service_charge' => $service_charge,
             'bill_discount' => $discount,
             'bill_remark' => $bill_remark,
              'bill_date' => $time_stamp, 
              'bill_status' => "completed",    
            );
        
            if($this->db->insert('bill_details',$arr)){
                $bill_id = $this->db->insert_id();
               $arr6 = array(
                    "bill_id" => $bill_id,
                    "customer_id" => $customer_id,
                    "kot_id" => $kot_id,
                    "transaction_amount" => $net_amount,
                    "transaction_date" => $time_stamp
                 
                );
                if($this->db->insert("transaction_details",$arr6)){
                        $this->db->where("kot_id",$kot_id);
                        $this->db->set("kot_status","completed");
                        $this->db->set("bill_id",$bill_id);
                        if($this->db->update("kot_details")){
                             echo 'success';
                        }else{ echo 'failed'; }
                }else{ echo 'failed'; }
            }else{ echo 'failed'; }
           
        }
      
    }
/* *********||*********|******************|*********||********* */	
/* *********||*********|View Bill Section|*********||********* */
/* *********||*********|******************|*********||********* */     
     public function fetch_bill_pending(){
         $this->db->select('*, bill_details.kot_id as my_kot_id');
		 $this->db->from('bill_details');
         $this->db->join('kot_details','kot_details.kot_id = bill_details.kot_id');
         $this->db->join('table_details','table_details.table_id = kot_details.table_id','left');
         $this->db->where('bill_status','pending');
         $this->db->order_by('bill_date','desc');
         //$this->db->order_by('first_name');
		 $data = $this->db->get();
		 return $data->result();  
     }  
    
    public function fetch_bill_completed(){
         $this->db->select('*');
		 $this->db->from('bill_details');
         $this->db->join('kot_details','kot_details.kot_id = bill_details.kot_id');
         $this->db->join('table_details','table_details.table_id = kot_details.table_id','left');
         $this->db->where('bill_status','completed');
         $this->db->order_by('bill_date','desc');
         //$this->db->order_by('first_name');
		 $data = $this->db->get();
		 return $data->result();  
     }
    
    public function fetch_bill_cancel(){
         $this->db->select('*');
		 $this->db->from('bill_details');
         $this->db->join('kot_details','kot_details.kot_id = bill_details.kot_id');
         $this->db->join('table_details','table_details.table_id = kot_details.table_id' ,'left');
         $this->db->where('bill_status','canceled');
         $this->db->order_by('bill_date','desc');
         //$this->db->order_by('first_name');
		 $data = $this->db->get();
		 return $data->result();  
     }
    
  

/* *********||*********|******************|*********||********* */	
/* *********||*********|Tender Section|*********||********* */
/* *********||*********|******************|*********||********* */      
    public function bill_tender_details_for_dinning($bill_id){
        
         $this->db->select('*');
		 $this->db->from('bill_details');
         $this->db->where('bill_details.bill_id',$bill_id); 
         $this->db->join('table_details','table_details.table_id = bill_details.table_id','left');
         $this->db->join('kot_details','kot_details.table_id = bill_details.table_id','left');
         $this->db->join('kot_order_details','kot_order_details.kot_id = kot_details.kot_id','left');
         $this->db->join('customer_details','customer_details.customer_id = bill_details.customer_id','left');
         $this->db->join('current_balance','current_balance.customer_id = bill_details.customer_id','left');
         $this->db->where('kot_details.kot_status','pending'); 
        
         $data = $this->db->get();
         return $data->result();

    }    
    
     public function bill_tender_details($bill_id){
        
         $this->db->select('*');
		 $this->db->from('bill_details');
         $this->db->where('bill_details.bill_id',$bill_id); 
         $this->db->join('kot_details','kot_details.bill_id = bill_details.bill_id','left');
         $this->db->join('kot_order_details','kot_order_details.kot_id = kot_details.kot_id','left');
         $this->db->join('customer_details','customer_details.customer_id = bill_details.customer_id','left');
         $this->db->join('current_balance','current_balance.customer_id = bill_details.customer_id','left');
         $data = $this->db->get();
         return $data->result();

    } 
   public function pay_money($bill_id,$customer_id,$kot_id,$table_id,$paid_amount,$bill_amount){
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
       
       
       $check_wallet = $this->db->get_where('current_balance',array('customer_id' => $customer_id));
       
       if($check_wallet->num_rows() == 1){
           
           $cal_balance = $bill_amount-$paid_amount;
           $balance = $check_wallet->result()[0]->balance_amount;
           $avl_balance = $balance - $cal_balance;
           
           $arr = array(
                'bill_id' => $bill_id,
                'customer_id' => $customer_id,
                'kot_id' => $kot_id,
                'transaction_amount' => $paid_amount,
                'ledger' => $avl_balance,
                'transaction_date' => $time_stamp,
            
           );
           
           if($this->db->insert('transaction_details',$arr)){
               $this->db->set('balance_amount',$avl_balance);
               $this->db->where('customer_id',$customer_id);
               if($this->db->update('current_balance')){
                     $this->db->set('bill_status','completed');
                     $this->db->where('bill_id',$bill_id);
                     if($this->db->update('bill_details')){
                            $this->db->set('table_status','');
                            $this->db->set('kot_id','');
                            $this->db->where('table_id',$table_id);
                            if($this->db->update('table_details')){
                                $this->db->set('kot_status','completed');
                                $this->db->where('kot_id',$kot_id);
                                if($this->db->update('kot_details')){
                                    echo "success";
                                }else{ echo 'failed'; }
                            }else{ echo 'failed'; }
                     }else{ echo 'failed'; } 
               }else{ echo 'failed'; }
           }else{ echo 'failed'; }
           
       }else{
           
           $arr = array(
                'bill_id' => $bill_id,
                'kot_id' => $kot_id,
                'transaction_amount' => $paid_amount,
                'transaction_date' => $time_stamp,
            
           );
           
           if($this->db->insert('transaction_details',$arr)){
               
                     $this->db->set('bill_status','completed');
                     $this->db->where('bill_id',$bill_id);
                     if($this->db->update('bill_details')){
                            $this->db->set('table_status','');
                            $this->db->set('kot_id','');
                            $this->db->where('table_id',$table_id);
                            if($this->db->update('table_details')){
                                $this->db->set('kot_status','completed');
                                $this->db->where('kot_id',$kot_id);
                                if($this->db->update('kot_details')){
                                    echo "success";
                                }else{ echo 'failed'; }
                            }else{ echo 'failed'; }
                     }else{ echo 'failed'; } 
              
           }else{ echo 'failed'; }
       }
       
   }      
    
   public function cancel_bill($bill_id,$kot_id,$table_id){
       
       $this->db->where('bill_id',$bill_id);
       $this->db->set('bill_status','canceled');
       if($this->db->update('bill_details')){
           $this->db->where('kot_id',$kot_id);
           $this->db->set('kot_status','canceled');
           if($this->db->update('kot_details')){
                 $this->db->where('table_id',$table_id);
                 $this->db->set('table_status','');
                 $this->db->set('kot_id',0);
                 if($this->db->update('table_details')){
                     echo 'success';
                 }else{echo'failed';}
           }else{echo'failed';}
       }else{echo'failed';}
   }    
/* *********||*********|******************|*********||********* */	
/* *********||*********|View Kot Section|*********||********* */
/* *********||*********|******************|*********||********* */     
    public function fetch_kot_pending(){
         $this->db->select('*,kot_details.kot_id as my_kot_id');
		 $this->db->from('kot_details');
         $this->db->join('kot_order_details','kot_order_details.kot_id = kot_details.kot_id');
         $this->db->join('table_details','table_details.table_id = kot_details.table_id','left');
         $this->db->where('kot_status','pending');
         $this->db->order_by('kot_date','desc');
		 $data = $this->db->get();
		 return $data->result();  
    }  
    
    public function fetch_kot_completed(){
         $this->db->select('*');
		 $this->db->from('kot_details');
         $this->db->join('kot_order_details','kot_order_details.kot_id = kot_details.kot_id');
         $this->db->join('table_details','table_details.table_id = kot_details.table_id','left');
         $this->db->where('kot_status','completed');
         $this->db->order_by('kot_date','desc');
		 $data = $this->db->get();
		 return $data->result();  
    } 
    
    public function fetch_kot_cancel(){
         $this->db->select('*');
		 $this->db->from('kot_details');
         $this->db->join('kot_order_details','kot_order_details.kot_id = kot_details.kot_id');
         $this->db->join('table_details','table_details.table_id = kot_details.table_id','left');
         $this->db->where('kot_status','canceled');
         $this->db->order_by('kot_date','desc');
		 $data = $this->db->get();
		 return $data->result();  
    } 
    
    public function cancel_kot($table_id,$table_kot_id){
        
        $this->db->where('kot_id',$table_kot_id);
        $this->db->set('kot_status','canceled');
        if($this->db->update('kot_details')){
             $this->db->where('table_id',$table_id);
             $this->db->set('table_status','');
             $this->db->set('kot_id',0);
             if($this->db->update('table_details')){
                 echo "success";
             }else{
                 echo "failed";
             }
        }else{
            echo "failed";
        }
        
    }
/* *********||*********|******************|*********||********* */	
/* *********||*********|Fast Bill Section|*********||********* */
/* *********||*********|******************|*********||********* */      
    public function fast_bill($kot_type,$table_id,$server_id,$table_kot_id,$item_id,$item_name,$item_qty,$item_price,$total_amount,$item_remark,$total_item_qty,$total_discount,$total_net_amt,$total_gross_amt,$item_sgst,$item_cgst,$home_delivery_id){
       
       $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
         
         
        $arr = array(
            'kot_date' => $time_stamp,
            'kot_type' => $kot_type,
            'kot_status' => "pending",
            'total_qty' => $total_item_qty,
            'total_discount' => $total_discount,
            'total_net_amount' => $total_net_amt,
            'total_gross_amount' => $total_gross_amt
        );
        
        if($this->db->insert('kot_details',$arr)){
                  $kot_id = $this->db->insert_id();
                  for($i = 0; $i < count($item_id); $i++){  
                     $arr2 = array(
                          'kot_id' => $kot_id,
                          'product_id' => $item_id[$i],
                          'product_name' => $item_name[$i],
                          'product_qty' => $item_qty[$i],
                          'unit_price' => $item_price[$i],
                          'total_amount' => $total_amount[$i],
                          'remark' =>  $item_remark[$i],
                          'product_sgst' => $item_sgst[$i],
                          'product_cgst' => $item_cgst[$i],
                         
                     );
                     $this->db->insert('kot_order_details',$arr2);
                   }
                     $arr = array(
                             'kot_id' =>  $kot_id, 
                             'bill_net_amount' => $total_net_amt,
                             'bill_gross_amount' => $total_gross_amt,
                             'bill_discount' => $total_discount,
                             'bill_status' => "pending"
                            );
        
                      if($this->db->insert('bill_details',$arr)){
                          $bill_id = $this->db->insert_id();
                            $this->db->where('kot_id',$kot_id);
                            $this->db->set('bill_id',$bill_id);
                            if($this->db->update('kot_details')){
                                if($home_delivery_id != ''){
                                $this->db->where('home_delivery_id',$home_delivery_id);
                                $this->db->set('kot_id',$kot_id);
                                $this->db->set('bill_id',$bill_id);
                                $this->db->update('home_delivery_details');
                                }
                                
                                 echo $bill_id;
                            }else{ echo 'failed'; }    
                
                         
                       }else{ echo 'failed'; }  
             }
    }
    
/* *********||*********|******************|*********||********* */	
/* *********||*********|Home Delivery Section|*********||********* */
/* *********||*********|******************|*********||********* */      
    public function next_button_of_home_delivery($customer_id,$customer_type,$m_status,$guest_name,$company_name,$gstin,$contact_1,$contact_2,$address,$dob,$anniversary,$gender,$delivery_person){
       
        
        $check_customer_id = $this->db->get_where('customer_details',array("customer_id" => $customer_id));
        
        if($check_customer_id->num_rows() == 1){
            $arr = array(
                'customer_name' => $guest_name,
                'company_name' => $company_name,
                'gst_in' => $gstin,
                'contact_1' => $contact_1,
                'contact_2' => $contact_2,
                'address' => $address,
                'gender' => $gender,
                'dob' =>  $dob,
                'anniversary' => $anniversary,
                'class_id' => $customer_type,
            );
            
            $this->db->where("customer_id",$customer_id);
            if($this->db->update("customer_details",$arr)){
                $arr3 = array(
                       "customer_id" => $customer_id,
                       "staff_id" => $delivery_person,
                );
                
                if($this->db->insert("home_delivery_details",$arr3)){
                    $home_delivery_id = $this->db->insert_id();
                    echo $home_delivery_id;
                }else{echo "failed"; }
            }else{ echo "failed"; }
        }else{
            $arr2 = array(
                'customer_name' => $guest_name,
                'company_name' => $company_name,
                'gst_in' => $gstin,
                'contact_1' => $contact_1,
                'contact_2' => $contact_2,
                'address' => $address,
                'gender' => $gender,
                'dob' =>  $dob,
                'anniversary' => $anniversary,
                'class_id' => $customer_type,
            );
            
             if($this->db->insert("customer_details",$arr2)){
                 $new_customer_id = $this->db->insert_id();
                 
                 $current_balance_arr = array(
                    "customer_id" => $new_customer_id,
                    "balance_amount" => 0,
                );
                if($this->db->insert("current_balance",$current_balance_arr)){
                     
                    $arr3 = array(
                       "customer_id" => $new_customer_id,
                       "staff_id" => $delivery_person,
                    );
                
                   if($this->db->insert("home_delivery_details",$arr3)){
                       $home_delivery_id = $this->db->insert_id();
                       echo $home_delivery_id;
                    }else{echo "failed"; }
                    
                }else{echo "failed";}
                 
             }else{echo "failed";}
        }
    }   
/* *********||*********|******************|*********||********* */	
/* *********||*********|Draft Section|*********||********* */
/* *********||*********|******************|*********||********* */     
    
     public function add_to_draft($table_id,$server_id){
         
         $check_table = $this->db->get_where('draft_details',array('table_id' => $table_id));
         
         if($check_table->num_rows() == 1){
                 $this->db->set('server_id',$server_id);
                 $this->db->where('table_id',$table_id);
                 if($this->db->update('draft_details')){
                    echo "success";
                 }else{ echo "failed";} 
         }else{
               $arr = array(
                     'table_id' => $table_id,
                     'server_id' => $server_id,
                );
         
                if($this->db->insert('draft_details',$arr)){
                   $this->db->set('table_status','draft');
                   $this->db->where('table_id',$table_id);
                   if($this->db->update("table_details")){
                       echo "success";
                   }else{ echo "failed";}   
                }else{ echo "failed";} 
         }      
    }  
/* *********||*********|******************|*********||********* */	
/* *********||*********|Draft Section|*********||********* */
/* *********||*********|******************|*********||********* */ 
    public function select_genrated_kot_items($table_kot){ 
           $this->db->select('*');
		   $this->db->from('kot_details');
           $this->db->where('kot_details.kot_id',$table_kot);
           $this->db->join('kot_order_details','kot_order_details.kot_id = kot_details.kot_id');
		   $data = $this->db->get();
		   return $data->result(); 

    }  
    
/* *********||*********|******************|*********||********* */	
/* *********||*********|Retail Verify POS |*********||********* */
/* *********||*********|******************|*********||********* */ 

/* *********||*********|******************|*********||********* */	
/* *********||*********|home _section|*********||********* */
/* *********||*********|******************|*********||********* */   
    public function select_customer_by_value($value,$type){
        
           $this->db->select('*');
		   $this->db->from('customer_details');
           $this->db->like($type,$value);
           $this->db->join('current_balance','current_balance.customer_id = customer_details.customer_id');
		   $data = $this->db->get();
		   return $data->result(); 
    }    
    
    
    public function select_item_by_value($value){
        
           $this->db->select('*');
		   $this->db->from('product_details');
           $this->db->like('product_name',$value);
           //$this->db->join('current_balance','current_balance.customer_id = customer_details.customer_id');
		   $data = $this->db->get();
		   return $data->result(); 
    }
    
    public function retail_pay($item_array,$total_sell,$gst,$gross_amt,$discount,$cash){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
        $item_array = json_encode($item_array);
        $arr  = array(
            
             'online_order_details' => $item_array,
             'cart_total' => $gross_amt,
             'total_order_price' => $gross_amt,
             'order_tax' => $gst,
             'coupan_discount' =>  $discount,
             'paid_amount' => $cash,
             'payment_method' => 'cash',
             'online_order_date' =>  $time_stamp,
             'order_status' => 'completed',
             'outlet_id' => '1',
        );
        
        if($this->db->insert('online_orders',$arr)){
           $online_order_id = $this->db->insert_id();
            $arr2 = array(
            
                 'transaction_amount' => $cash,
                 'transaction_date' => $time_stamp,
                 'type' => 'cash',
                 'online_order_id' => $online_order_id,
            
            );
            
            if($this->db->insert('transaction_details',$arr2)){
                
                echo $online_order_id;
            }else{
                echo 'failed1';
            }
        }else{
            echo 'failed';
        }
        
    }
    
    public function get_invoice($invoice_id){
        
        $this->db->select('*');
        $this->db->from('online_orders');
        $this->db->where('online_order_id',$invoice_id);
        $data = $this->db->get();
        return $data->result();
        
    }
} 