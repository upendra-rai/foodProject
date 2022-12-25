<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_orders extends CI_Model {
	function __construct(){
		parent::__construct();
	}



public function orders($start,$end,$name,$mobile_no,$status)
{
	 $this->db->select('*');
	 $this->db->from('online_orders');
	 $this->db->join('customer_details','customer_details.customer_id = online_orders.customer_id');
     $this->db->join('staff_member','staff_member.staff_id = online_orders.delivery_person','left');
     $this->db->join('outlet_details','outlet_details.outlet_id = online_orders.outlet_id','left');
	
     //**********Outlet Filter ********//
     if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id')){
          $user_outlet = $this->session->userdata('outlet_id');
          $this->db->where('online_orders.outlet_id',$user_outlet);
     }
     //**********Outlet Filter ********//
    
    
    if($start != ''){
         $start = date('Y-m-d',strtotime($start));
         $this->db->where('date(online_orders.online_order_date) >=',$start);
    }
    
    if($end != ''){
        $end = date('Y-m-d',strtotime($end));
        $this->db->where('date(online_orders.online_order_date) <=',$end);
    }
    
    if($name != ''){
         $this->db->like('customer_details.customer_name',$name);
        
    }
    
    if($mobile_no != ''){
         $this->db->like('customer_details.contact_1',$mobile_no);
        
    }
    
    if($status != ''){
         $this->db->where('order_status',$status);
        
    }else{
        $this->db->where('order_status','');
    }
    
    
    
     $this->db->order_by('online_order_id','desc');
    $this->db->limit(100);
	 $data = $this->db->get();
 	 return $data->result();
}

public function order_details($order_id)
{
	$this->db->select('*');
	$this->db->from('online_orders');
	$this->db->join('customer_details','customer_details.customer_id = online_orders.customer_id');

	$this->db->where('online_orders.online_order_id',$order_id);
	$data = $this->db->get();
	return $data->result();
}

public function order_accept_or_reject($order_id,$action){
    $this->db->where('online_orders.online_order_id',$order_id);
    $this->db->set('order_status',$action);
    if($this->db->update('online_orders')){
         echo 'success';
        
           // redirect('./orders/placed_orders');
        
    }else{
        
        echo 'failed';
        //redirect('./orders/'.$return_href);
    }
}
    
public function order_dispatch_and_assign($order_id,$action,$delivery_person){
    $this->db->where('online_orders.online_order_id',$order_id);
    $this->db->set('order_status',$action);
    if($action == 'dispatched'){
        $this->db->set('delivery_person',$delivery_person);
    }
    
    if($this->db->update('online_orders')){
          echo 'success';
        
    }else{
          echo 'failed';
    }
}    

public function change_order_delivery_person($order_id,$delivery_person,$return_href){
    $this->db->where('online_orders.online_order_id',$order_id);
    $this->db->set('delivery_person',$delivery_person);
    if($this->db->update('online_orders')){
            redirect('./orders/'.$return_href);
        
    }else{
        redirect('./orders/'.$return_href);
    }
    
}    
    
public function order_item_details($order_id)
{
	$this->db->select('*');
	$this->db->from('online_orders');
	$this->db->where('online_orders.online_order_id',$order_id);
	$data = $this->db->get();
	return $data;
}


public function accept_orders($order_id,$status)
{
		$this->db->where('online_order_id',$order_id);
		$this->db->set('order_status', $status);
		if($this->db->update('online_orders')){
			echo 'success';
		}else {
			echo 'failed';
		}
}


public function count_orders(){
	$this->db->select('count(online_order_id) AS total');
	$this->db->from('online_orders');
	$this->db->where('online_orders.order_status','');
	$new_order = $this->db->get();
  $n = $new_order->result();

	$this->db->select('count(online_order_id) AS total');
	$this->db->from('online_orders');
	$this->db->where('online_orders.order_status','placed');
	$placed_order = $this->db->get();
	$p = $placed_order->result();
    
    $this->db->select('count(online_order_id) AS total');
	$this->db->from('online_orders');
	$this->db->where('online_orders.order_status','dispatched');
	$placed_order = $this->db->get();
	$d = $placed_order->result();

	$this->db->select('count(online_order_id) AS total');
	$this->db->from('online_orders');
	$this->db->where('online_orders.order_status','delivered');
	$completed_order = $this->db->get();
	$c = $completed_order->result();

	$this->db->select('count(online_order_id) AS total');
	$this->db->from('online_orders');
	$this->db->where('online_orders.order_status','canceled');
	$canceled_order = $this->db->get();
	$cn = $canceled_order->result();

	return array(
			'new_order_count' => $n,
			'placed_order_count' => $p,
            'dispatched_order_count' => $d,
			'completed_order_count' => $c,
			'canceled_order_count' => $cn,
	);

}

    
public function all_delivery_person($user_id){
    
    $check_user = $this->db->get_where('staff_member',array('staff_id' => $user_id));
    
    if($check_user->num_rows() == 1){
        
            $outlet_id = $check_user->result()[0]->outlet_id;
            
            $this->db->select('*');
	        $this->db->from('staff_member');
	        $this->db->where('staff_member.role','delivery');
            
            //**********Outlet Filter ********//
            if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id')){
                 $user_outlet = $this->session->userdata('outlet_id');
                 $this->db->where('staff_member.outlet_id',$user_outlet);
            }
            //**********Outlet Filter ********//
        
	        $data = $this->db->get();
	        return $data->result();
        
    }
    
    
}


}
