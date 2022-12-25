<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_notification extends CI_Model {



	function __construct(){



		parent::__construct();

	}
    
    
    public function select_customer_report(){
        
                $this->db->select('*');
		    	$this->db->from('customer_details');
                
                $this->db->join('current_balance', 'current_balance.customer_id = customer_details.customer_id');
               
		    	$data = $this->db->get();
                return $data->result();
        
    }
    

    public function customer_report_multi_searchbar($name_search,$email_search,$mobile_no){
              
        
                $this->db->select('*');
		    	$this->db->from('customer_details');
                
                
                if($name_search != ""){
                         
                            $this->db->like("customer_name", $name_search);
				           
                }
                 if($mobile_no != ""){
                         
                            $this->db->like("contact_1", $mobile_no);
				           
                } 
        
                if($email_search != ""){
                         
                            $this->db->like("email_id", $email_search);
				           
                } 

                $this->db->order_by("customer_name", "asc");
		       
                $this->db->join('current_balance', 'current_balance.customer_id = customer_details.customer_id');
                
                 $data = $this->db->get();
                return $data->result();
        
        
    }
    
    public function send_notification($title,$msg,$customer_id_array){
        
        
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
        
        
        $customer_id = explode(',',$customer_id_array);
        $my_msg = 0;
        
        $i = 1;
        foreach($customer_id as $row){
        $i++;
        $my_msg = $i;    
        $arr = array(
	        "customer_id" => $row,
			"title"  => $title,
			"message" => $msg,
			"notification_date" => $time_stamp,
		

	   );
	   
	   $this->db->insert("notification",$arr); 
      }
      
        echo 'success';
    }

}