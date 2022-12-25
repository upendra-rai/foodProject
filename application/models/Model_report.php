<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_report extends CI_Model {
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
    
    
//=========********===========********========******========//
// ************Transaction Report section ***********//
//=========********===========********========******========//      
    public function daily_transaction(){

                $this->db->select('* , SUM(transaction_amount) AS total_value , COUNT(transaction_id) as count_tran');
		    	$this->db->from('transaction_details');
                $this->db->where('MONTH(transaction_date)',date('m'));
                $this->db->where('YEAR(transaction_date)',date('Y'));
                $this->db->join('customer_details', 'customer_details.customer_id = transaction_details.customer_id');
                $this->db->join('online_orders','online_orders.online_order_id = transaction_details.online_order_id');
                //**********Outlet Filter ********//
                if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
                     $user_outlet = $this->session->userdata('outlet_id');
                     $this->db->where('outlet_id',$user_outlet);
                }
                //**********Outlet Filter ********//
                $this->db->order_by('transaction_date','DESC');
                $this->db->group_by('DATE(transaction_date)');
		    	$data = $this->db->get();
                return $data->result();



    }
    
    public function transaction_report_search($start,$end,$payment_mode,$order_status){

                $this->db->select('* , SUM(transaction_amount) AS total_value , COUNT(transaction_id) as count_tran');
		    	$this->db->from('transaction_details');


                if($start != ''){
                    $start = date('Y-m-d',strtotime($start));
                    $this->db->where('date(transaction_date) >=', $start);
                }
                if($end != ''){
                     $end = date('Y-m-d',strtotime($end));
                    $this->db->where('date(transaction_date) <=', $end);
                }
                if($payment_mode != ''){
                     $this->db->where('transaction_details.type', $payment_mode);

                }
               
               
                $this->db->join('customer_details', 'customer_details.customer_id = transaction_details.customer_id');
                $this->db->join('online_orders', 'online_orders.online_order_id = transaction_details.online_order_id');
                 if($order_status != ''){
                     $this->db->where('online_orders.order_status', $order_status);

                }
        
                 //**********Outlet Filter ********//
                if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id')){
                     $user_outlet = $this->session->userdata('outlet_id');
                     $this->db->where('outlet_id',$user_outlet);
                }
                //**********Outlet Filter ********//
                $this->db->group_by('DATE(transaction_date)');
                $this->db->order_by('transaction_date','DESC');
		    	$data = $this->db->get();
                return $data->result();

    }
    
    public function transaction_full_report($date){

                $this->db->select('*');
		    	$this->db->from('transaction_details');
                
                $this->db->join('customer_details', 'customer_details.customer_id = transaction_details.customer_id');
                $this->db->join('online_orders', 'online_orders.online_order_id = transaction_details.online_order_id');
                 //**********Outlet Filter ********//
                if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
                     $user_outlet = $this->session->userdata('outlet_id');
                     $this->db->where('outlet_id',$user_outlet);
                }
                //**********Outlet Filter ********//
                $this->db->where('date(transaction_details.transaction_date)',$date);
                $this->db->order_by('transaction_date','DESC');
		    	$data = $this->db->get();
                return $data->result();

    }
    
    
    public function transaction_date_multi_searchbar($name,$mobile_no,$payment_mode,$order_status,$date){
        
                $this->db->select('*');
		    	$this->db->from('transaction_details');
                
                $this->db->join('customer_details', 'customer_details.customer_id = transaction_details.customer_id');
                $this->db->join('online_orders', 'online_orders.online_order_id = transaction_details.online_order_id');
                
                if($name != ''){
                     $this->db->like('customer_name', $name);
                }
        
                if($mobile_no != ''){
                     $this->db->like('contact_1', $mobile_no);
                }
                if($payment_mode != ''){
                     $this->db->where('transaction_details.type', $payment_mode);
                }
        
                if($order_status != ''){
                     $this->db->where('online_orders.order_status', $order_status);
                }
        
                if($date != ''){
                     $this->db->where('date(transaction_details.transaction_date)', $date);
                }
                 //**********Outlet Filter ********//
                if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
                     $user_outlet = $this->session->userdata('outlet_id');
                     $this->db->where('outlet_id',$user_outlet);
                }
                //**********Outlet Filter ********//
                $this->db->order_by('transaction_date','DESC');
		    	$data = $this->db->get();
                return $data->result();
    }
    
    
//=========********===========********========******========//
// ************Recharge Report section ***********//
//=========********===========********========******========//   
    
     public function daily_recharge(){

                $this->db->select('* , SUM(recharge_amount) AS total_value , COUNT(recharge_id) as count_row');
		    	$this->db->from('recharge_detail');
                $this->db->where('MONTH(recharge_date)',date('m'));
                $this->db->where('YEAR(recharge_date)',date('Y'));
                $this->db->join('customer_details', 'customer_details.customer_id = recharge_detail.customer_id');
                $this->db->order_by('recharge_date','DESC');
                $this->db->group_by('DATE(recharge_date)');
		    	$data = $this->db->get();
                return $data->result();
    }
    
    public function recharge_report_search($start,$end,$payment_mode){

                $this->db->select('* , SUM(recharge_amount) AS total_value , COUNT(recharge_id) as count_row');
		    	$this->db->from('recharge_detail');


                if($start != ''){
                    $start = date('Y-m-d',strtotime($start));
                    $this->db->where('date(recharge_date) >=', $start);
                }
                if($end != ''){
                     $end = date('Y-m-d',strtotime($end));
                    $this->db->where('date(recharge_date) <=', $end);
                }
                if($payment_mode != ''){
                     $this->db->where('recharge_detail.type', $payment_mode);

                }
               
               
                $this->db->join('customer_details', 'customer_details.customer_id = recharge_detail.customer_id');
                
                $this->db->group_by('DATE(recharge_date)');
                $this->db->order_by('recharge_date','DESC');
		    	$data = $this->db->get();
                return $data->result();

    }
    
    public function recharge_full_report($date){

                $this->db->select('*');
		    	$this->db->from('recharge_detail');
                
                $this->db->join('customer_details', 'customer_details.customer_id = recharge_detail.customer_id');
                $this->db->where('date(recharge_detail.recharge_date)',$date);
                $this->db->order_by('recharge_date','DESC');
		    	$data = $this->db->get();
                return $data->result();

    }
    
    public function recharge_date_multi_searchbar($name,$mobile_no,$payment_mode,$date){
        
                $this->db->select('*');
		    	$this->db->from('recharge_detail');
                
                $this->db->join('customer_details', 'customer_details.customer_id = recharge_detail.customer_id');
                
                if($name != ''){
                     $this->db->like('customer_name', $name);
                }
        
                if($mobile_no != ''){
                     $this->db->like('contact_1', $mobile_no);
                }
                if($payment_mode != ''){
                     $this->db->where('recharge_detail.type', $payment_mode);
                }
        
                if($date != ''){
                     $this->db->where('date(recharge_detail.recharge_date)', $date);
                }
        
                $this->db->order_by('recharge_date','DESC');
		    	$data = $this->db->get();
                return $data->result();
    }
    
//=========********===========********========******========//
// ************Order Report section ***********//
//=========********===========********========******========//     
    
     public function order_full_report($date){

                $this->db->select('*');
		    	$this->db->from('online_orders');
                
                $this->db->join('customer_details', 'customer_details.customer_id = online_orders.customer_id');
                $this->db->join('transaction_details', 'transaction_details.online_order_id = online_orders.online_order_id');
                $this->db->join('staff_member', 'staff_member.staff_id = online_orders.delivery_person','left');
                 //**********Outlet Filter ********//
                if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id')){
                     $user_outlet = $this->session->userdata('outlet_id');
                     $this->db->where('online_orders.outlet_id',$user_outlet);
                }
                //**********Outlet Filter ********//
         
                $this->db->where('date(online_order_date)',$date);
                $this->db->order_by('online_order_date','DESC');
		    	$data = $this->db->get();
                return $data->result();

    }
    
    public function order_multi_searchbar($start,$end,$name,$mobile_no,$order_status){
        
                $this->db->select('*');
		    	$this->db->from('online_orders');
                
                $this->db->join('customer_details', 'customer_details.customer_id = online_orders.customer_id');
                $this->db->join('transaction_details', 'transaction_details.online_order_id = online_orders.online_order_id');
                $this->db->join('staff_member', 'staff_member.staff_id = online_orders.delivery_person','left');
                if($start != ''){
                    $start = date('Y-m-d',strtotime($start));
                    $this->db->where('date(online_order_date) >=', $start);
                }
                if($end != ''){
                     $end = date('Y-m-d',strtotime($end));
                    $this->db->where('date(online_order_date) <=', $end);
                }
        
                if($name != ''){
                     $this->db->like('customer_name', $name);
                }
        
                if($mobile_no != ''){
                     $this->db->like('contact_1', $mobile_no);
                }
                if($order_status != ''){
                     $this->db->where('online_orders.order_status', $order_status);
                }
        
                 //**********Outlet Filter ********//
                if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
                     $user_outlet = $this->session->userdata('outlet_id');
                     $this->db->where('online_orders.outlet_id',$user_outlet);
                }
                //**********Outlet Filter ********//
                $this->db->order_by('online_order_date','DESC');
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
//=========********===========********========******========//
// ************Customer Report section ***********//
//=========********===========********========******========//   
    
    public function customer_report(){

                $this->db->select('*');
		    	$this->db->from('customer_details');
                $this->db->order_by('customer_name','asc');
		    	$data = $this->db->get();
                return $data->result();

    }
    
//=========********===========********========******========//
// ************ Feedback Section ***********//
//=========********===========********========******========//     
     public function select_feedback($id){
        
               $this->db->select('*');
		       $this->db->from('feedback');
               $this->db->join('customer_details', 'customer_details.customer_id = feedback.customer_id');
              
              
               if($id != ''){
                   
                   $this->db->where('feedback_id',$id);
                   
               }
         
               $this->db->order_by('time_stamp','desc');
		       $data = $this->db->get();
               return $data->result();
        
    }
    
    public function select_feedback_filter($name_search,$mobile_no){
              
                $this->db->select('*');
		    	$this->db->from('feedback');
               
                $this->db->join('customer_details', 'customer_details.customer_id = feedback.customer_id');
		       
               
                if($mobile_no != ""){
                    $this->db->like("customer_details.contact_1", $mobile_no);
                }
              
                if($name_search != ""){
                    $this->db->like("customer_name", $name_search);
                }
              
                $data = $this->db->get();
                return $data->result();

    }    
}
