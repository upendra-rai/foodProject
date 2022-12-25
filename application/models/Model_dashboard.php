<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_dashboard extends CI_Model {

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


   public function select_today_recharge(){
            $this->db->select('* , SUM(recharge_amount) AS total');
			$this->db->from('recharge_detail');
            $this->db->where('date(recharge_date)',date('Y-m-d'));
            
			$data = $this->db->get()->result();
            return $data;
  }

  public function select_yesterday_recharge(){
            $yes = date('Y-m-d',strtotime("-1 days"));
            $this->db->select('* , SUM(recharge_amount) AS total');
			$this->db->from('recharge_detail');
            $this->db->where('date(recharge_date)',$yes);
			$data = $this->db->get()->result();
            return $data;
  }

  public function select_month_recharge(){
            $this->db->select('* , SUM(recharge_amount) AS total');
			$this->db->from('recharge_detail');
			$this->db->where('MONTH(recharge_date)',date('m'));
            $this->db->where('YEAR(recharge_date)',date('Y'));
			$data = $this->db->get()->result();

            return $data;
  }

  public function select_lastmonth_recharge(){
            $yes = date('m',strtotime("-1 month"));
            $this->db->select('* , SUM(recharge_amount) AS total');
			$this->db->from('recharge_detail');
            $this->db->where('MONTH(recharge_date)',$yes);
            $this->db->where('YEAR(recharge_date)',date('Y'));
			$data = $this->db->get()->result();

            return $data;
  }

  public function select_year_recharge(){

            $this->db->select('* , SUM(recharge_amount) AS total');
			$this->db->from('recharge_detail');
            $this->db->where('YEAR(recharge_date)',date('Y'));
			$data = $this->db->get()->result();
            return $data;
  }



  public function select_today_sell(){
            $this->db->select('* , SUM(transaction_amount) AS total');
			$this->db->from('transaction_details');
            $this->db->join('online_orders','online_orders.online_order_id = transaction_details.online_order_id');
            //**********Outlet Filter ********//
            if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
                 $user_outlet = $this->session->userdata('outlet_id');
                 $this->db->where('outlet_id',$user_outlet);
            }
            //**********Outlet Filter ********//
      
            $this->db->where('date(transaction_date)',date('Y-m-d'));
			$data = $this->db->get()->result();
            return $data;
  }

  public function select_yesterday_sell(){
            $yes = date('Y-m-d',strtotime("-1 days"));
            $this->db->select('* , SUM(transaction_amount) AS total');
			$this->db->from('transaction_details');
            $this->db->join('online_orders','online_orders.online_order_id = transaction_details.online_order_id');
            //**********Outlet Filter ********//
            if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
                 $user_outlet = $this->session->userdata('outlet_id');
                 $this->db->where('outlet_id',$user_outlet);
            }
            //**********Outlet Filter ********//
            $this->db->where('date(transaction_date)',$yes);
			$data = $this->db->get()->result();
            return $data;
  }

  public function select_month_sell(){
            $this->db->select('* , SUM(transaction_amount) AS total');
			$this->db->from('transaction_details');
            $this->db->join('online_orders','online_orders.online_order_id = transaction_details.online_order_id');
            //**********Outlet Filter ********//
            if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
                 $user_outlet = $this->session->userdata('outlet_id');
                 $this->db->where('outlet_id',$user_outlet);
            }
            //**********Outlet Filter ********//
			$this->db->where('MONTH(transaction_date)',date('m'));
            $this->db->where('YEAR(transaction_date)',date('Y'));
			$data = $this->db->get()->result();

            return $data;
  }

  public function select_lastmonth_sell(){
            $yes = date('m',strtotime("-1 month"));
            $this->db->select('* , SUM(transaction_amount) AS total');
			$this->db->from('transaction_details');
            $this->db->join('online_orders','online_orders.online_order_id = transaction_details.online_order_id');
            //**********Outlet Filter ********//
            if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id')){
                 $user_outlet = $this->session->userdata('outlet_id');
                 $this->db->where('outlet_id',$user_outlet);
            }
            //**********Outlet Filter ********//
            $this->db->where('MONTH(transaction_date)',$yes);
            $this->db->where('YEAR(transaction_date)',date('Y'));
			$data = $this->db->get()->result();

            return $data;
  }

  public function select_year_sell(){

            $this->db->select('* , SUM(transaction_amount) AS total');
			$this->db->from('transaction_details');
            $this->db->join('online_orders','online_orders.online_order_id = transaction_details.online_order_id');
            //**********Outlet Filter ********//
            if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
                 $user_outlet = $this->session->userdata('outlet_id');
                 $this->db->where('outlet_id',$user_outlet);
            }
            //**********Outlet Filter ********//
            $this->db->where('YEAR(transaction_date)',date('Y'));
			$data = $this->db->get()->result();
            return $data;
  }





 public function select_barchart_transaction(){
            $second = date('m',strtotime("-1 month"));
            $third = date('m',strtotime("-2 month"));
            $forth = date('m',strtotime("-3 month"));
            $fifth = date('m',strtotime("-4 month"));
            $six = date('m',strtotime("-5 month"));
            $seven = date('m',strtotime("-6 month"));
            $eight = date('m',strtotime("-7 month"));
            $nine = date('m',strtotime("-8 month"));
            $ten = date('m',strtotime("-9 month"));
            $eleven = date('m',strtotime("-10 month"));
            $twelve = date('m',strtotime("-11 month"));


            $this->db->select('SUM(transaction_amount) AS bar_tran');
			$this->db->from('transaction_details');
            $this->db->where('MONTH(transaction_date)',date('m'));
            $this->db->or_where('MONTH(transaction_date)',$second);
            $this->db->or_where('MONTH(transaction_date)',$third);
            $this->db->or_where('MONTH(transaction_date)',$forth);
            $this->db->or_where('MONTH(transaction_date)',$fifth);
            $this->db->or_where('MONTH(transaction_date)',$six);

            $this->db->or_where('MONTH(transaction_date)',$seven);
            $this->db->or_where('MONTH(transaction_date)',$eight);
            $this->db->or_where('MONTH(transaction_date)',$nine);
            $this->db->or_where('MONTH(transaction_date)',$ten);
            $this->db->or_where('MONTH(transaction_date)',$eleven);
            $this->db->or_where('MONTH(transaction_date)',$twelve);

            $this->db->group_by('MONTH(transaction_date)');
            $this->db->order_by('transaction_date','DESC');
			$data = $this->db->get()->result();
            return $data;
  }

   public function select_barchart_recharge(){
            $second = date('m',strtotime("-1 month"));
            $third = date('m',strtotime("-2 month"));
            $forth = date('m',strtotime("-3 month"));
            $fifth = date('m',strtotime("-4 month"));
            $six = date('m',strtotime("-5 month"));
            $seven = date('m',strtotime("-6 month"));
            $eight = date('m',strtotime("-7 month"));
            $nine = date('m',strtotime("-8 month"));
            $ten = date('m',strtotime("-9 month"));
            $eleven = date('m',strtotime("-10 month"));
            $twelve = date('m',strtotime("-11 month"));

            $this->db->select('SUM(recharge_amount) AS bar_re');
			$this->db->from('recharge_detail');
            $this->db->where('MONTH(recharge_date)',date('m'));
            $this->db->or_where('MONTH(recharge_date)',$second);
            $this->db->or_where('MONTH(recharge_date)',$third);
            $this->db->or_where('MONTH(recharge_date)',$forth);
            $this->db->or_where('MONTH(recharge_date)',$fifth);
            $this->db->or_where('MONTH(recharge_date)',$six);

            $this->db->or_where('MONTH(recharge_date)',$seven);
            $this->db->or_where('MONTH(recharge_date)',$eight);
            $this->db->or_where('MONTH(recharge_date)',$nine);
            $this->db->or_where('MONTH(recharge_date)',$ten);
            $this->db->or_where('MONTH(recharge_date)',$eleven);
            $this->db->or_where('MONTH(recharge_date)',$twelve);

            $this->db->group_by('MONTH(recharge_date)');
            $this->db->order_by('recharge_date','DESC');
			$data = $this->db->get()->result();
           //echo json_encode($data);
           return $data;
  }




  public function my_data_cleaner($before_year){
        date_default_timezone_set('Asia/Kolkata');
        $this->db->where('date(transaction_date) <=', $before_year);
        if($this->db->delete('transaction_details')){

            $this->db->where('date(recharge_date) <=', $before_year);
            if($this->db->delete('recharge_detail')){
                echo "success";
                $cookie_name = "sharma_dairy_data_cleaner";
                $cookie_value = 'sharmadairy';
                setcookie($cookie_name, $cookie_value, time() + 86400, "/");

            }

        }else{

            echo "fail";
            unset($_COOKIE["sharma_dairy_data_cleaner"]);
        };

  }

  public function my_block_transaction($before_tenday){
        $arr = array(
            'card_status' => 'blocked',
        );

        $this->db->where('card_status', 'active');
        $this->db->where('last_transaction_date <=', $before_tenday);
        if($this->db->update('atm_card_detail',$arr)){
            echo "success";
            $cookie_name = "sharma_dairy_card_blocker";
            $cookie_value = 'sharmadairy';
            setcookie($cookie_name, $cookie_value, time() + 86400, "/");
        }else{
            echo "fail";
            unset($_COOKIE["sharma_dairy_card_blocker"]);
        };

  }

  public function total_customer(){
      $this->db->select('customer_details.customer_id');
      $this->db->from('customer_details');
      $data = $this->db->get()->result();
      $count =  count($data);
      return $count;

  }

   public function total_active_customer(){
      $this->db->select('customer_details.customer_id');
      $this->db->from('customer_details');
      $this->db->join('atm_card_detail','atm_card_detail.customer_id = customer_details.customer_id');
      $this->db->where('card_status','active');
      $data = $this->db->get()->result();
      $count =  count($data);
      return $count;

  }

   public function total_blocked_customer(){
      $this->db->select('customer_details.customer_id');
      $this->db->from('customer_details');
      $this->db->join('atm_card_detail','atm_card_detail.customer_id = customer_details.customer_id');

      $this->db->where('card_status','blocked');
      $data = $this->db->get()->result();
      $count =  count($data);
      return $count;

  }

  public function total_blocked_customer_detail(){
      $this->db->select('*');
      $this->db->from('customer_details');
      $this->db->join('atm_card_detail','atm_card_detail.customer_id = customer_details.customer_id');
      $this->db->join('current_balance','current_balance.customer_id = customer_details.customer_id');
      $this->db->where('card_status','blocked');
      $data = $this->db->get()->result();
      //$count =  count($data);
      return $data;

  }
    
  public function select_today_registration(){
            $this->db->select('COUNT(customer_id) AS total');
			$this->db->from('customer_details');
            $this->db->where('date(ragistration_date)',date('Y-m-d'));
			$data = $this->db->get()->result();
            return $data;
  } 

  public function select_yesterday_registration(){
            $yes = date('Y-m-d',strtotime("-1 days"));
            $this->db->select('COUNT(customer_id) AS total');
			$this->db->from('customer_details');
            $this->db->where('date(ragistration_date)',$yes);
			$data = $this->db->get()->result();
            return $data;
  } 
  
  public function select_month_registration(){
            $this->db->select('COUNT(customer_id) AS total');
			$this->db->from('customer_details');
			$this->db->where('MONTH(ragistration_date)',date('m'));
            $this->db->where('YEAR(ragistration_date)',date('Y'));
			$data = $this->db->get()->result();
            
            return $data;
  } 

  public function select_lastmonth_registration(){
            $yes = date('m',strtotime("-1 month"));
            $this->db->select('COUNT(customer_id) AS total');
			$this->db->from('customer_details');
            $this->db->where('MONTH(ragistration_date)',$yes);
            $this->db->where('YEAR(ragistration_date)',date('Y'));
			$data = $this->db->get()->result();
            
            return $data;
  }  
    
  public function select_year_registration(){
           
            $this->db->select('COUNT(customer_id) AS total');
			$this->db->from('customer_details');
            $this->db->where('YEAR(ragistration_date)',date('Y'));
			$data = $this->db->get()->result();
            return $data;
  }
    
  public function fetch_outlet(){
      
            $this->db->select('*');
			$this->db->from('outlet_details');
           
			$data = $this->db->get();
            return $data->result();
  }   
    
// ***********############################***************//
    //        Orders count
// ***********############################***************//  
    
    
   public function select_today_orders(){
            $this->db->select('* , COUNT(online_order_id) AS total');
			$this->db->from('online_orders');
            $this->db->where('date(online_order_date)',date('Y-m-d'));
            
			$data = $this->db->get()->result();
            return $data;
  }

  public function select_yesterday_orders(){
            $yes = date('Y-m-d',strtotime("-1 days"));
            $this->db->select('* , COUNT(online_order_id) AS total');
			$this->db->from('online_orders');
            $this->db->where('date(online_order_date)',$yes);
			$data = $this->db->get()->result();
            return $data;
  }

  public function select_month_orders(){
            $this->db->select('* ,  COUNT(online_order_id) AS total');
			$this->db->from('online_orders');
			$this->db->where('MONTH(online_order_date)',date('m'));
            $this->db->where('YEAR(online_order_date)',date('Y'));
			$data = $this->db->get()->result();

            return $data;
  }

  public function select_lastmonth_orders(){
            $yes = date('m',strtotime("-1 month"));
            $this->db->select('* ,  COUNT(online_order_id) AS total');
			$this->db->from('online_orders');
            $this->db->where('MONTH(online_order_date)',$yes);
            $this->db->where('YEAR(online_order_date)',date('Y'));
			$data = $this->db->get()->result();

            return $data;
  }

  public function select_year_orders(){

            $this->db->select('* ,  COUNT(online_order_id) AS total');
			$this->db->from('online_orders');
            $this->db->where('YEAR(online_order_date)',date('Y'));
			$data = $this->db->get()->result();
            return $data;
  }
    
    /////////////////////////////////////////////
    
    
     public function new_order(){
         
        $this->db->select('*');
	 	$this->db->from('online_orders');
	 	$this->db->where('online_orders.order_status','');
        $this->db->join('customer_details','customer_details.customer_id = online_orders.customer_id','left'); 
          
	 	$data = $this->db->get();
	    return $data->result();
         
         
     }
    
    public function feedback_notification(){
        
         $this->db->select('*');
          $this->db->from('feedback');
          $this->db->where('feedback_status','');
          $this->db->join('customer_details','customer_details.customer_id = feedback.customer_id');
          
          $data = $this->db->get();
	      return $data->result();
        
    }
    
    public function read_feedback($id){
        
        $this->db->where('feedback_id',$id);
        $this->db->set('feedback_status','read');
        if($this->db->update('feedback')){
            
            redirect(base_url().'report/feedback/'.$id);
        }else{
             redirect(base_url().'report/feedback');
        }
    }

    ////////////////////////////////////////
    
    public function check_expire_orders(){
        
         date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $today = $date->format('Y-m-d');
        
        $this->db->select('online_order_id');
        $this->db->from('online_orders');
        $this->db->where('Date(delivery_date) <',$today);
        $this->db->where_in('order_status',array('','placed','dispatched'));
        $check = $this->db->get();
	    
        if($check->num_rows() > 0){
            
            $this->db->where('Date(delivery_date) <',$today);
            $this->db->where_in('order_status',array('','placed','dispatched'));
        
            $this->db->set('order_status','canceled');
            $this->db->update('online_orders');
            
        }
        
        
        
    }
}
