<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_map_location extends CI_Model {



	function __construct(){



		parent::__construct();

	}
    
    public function select_agent_location(){
	   $this->db->select('*');
       $this->db->from('agent_location');
	   $data = $this->db->get();
	   return $data->result();
	   
    }
        
    public function select_customer_location(){
	   $this->db->select('*');
       $this->db->from('customer_location');
       $this->db->join('customer_details','customer_details.customer_id = customer_location.customer_id');   
	   $data = $this->db->get();
	   return $data->result();
	   
    }    
   
   public function update_location(){
	   
	   $this->db->select('*');
       $this->db->from('agent_location');
	   $data = $this->db->get();
	   
	   return $data->result();
	   
   }

}