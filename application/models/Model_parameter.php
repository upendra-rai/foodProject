<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_parameter extends CI_Model {
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
    
    
    
    public function select_unit(){
        
        $this->db->select('*');
		$this->db->from('unit');
		
		$data = $this->db->get();
		return $data->result();
        
    }
    
    public function selected_unit($id){
        
        $this->db->select('*');
		$this->db->from('unit');
		$this->db->where('unit_id',$id);
		$data = $this->db->get();
		return $data->result();
        
    }
 // select user data

   public function add_unit($unit){
    $check_unit  = $this->db->get_where('unit',array('unit_name' =>$unit ));
    
       if($check_unit->num_rows() > 0){
          
             redirect('./parameter/add_unit?alert=This unit is alredy exist.');
       }else{
       
          $arr =  array(
            'unit_name' =>  $unit,
          );
          if($this->db->insert('unit',$arr)){
              redirect('./parameter/add_unit');
          }else{
              redirect('./parameter/add_unit');
          };
       }
   }
    
   public function edit_unit($unit,$id){
       
       $this->db->where('unit_id',$id);
       $this->db->set('unit_name',$unit);
          if($this->db->update('unit')){
            redirect('./parameter/add_unit');
          }else{
              redirect('./parameter/add_unit');
          };
       
   }   
    
   public function del_unit($del_id){
        $this->db->where('unit_id',$del_id);
         if($this->db->delete('unit')){
            echo 'success';
          }else{
              echo 'failed';
          };
       
   }
 
// ******************** Service Charge Section****************//    
// ******************** Service Charge Section****************//
// ******************** Service Charge Section****************//     
    
  public function select_app_setting(){
      
        $this->db->select('*');
		$this->db->from('delivery_app_settings');
		
		$data = $this->db->get();
		return $data->result();
      
  }    
    
   public function manage_service_charge($packaging_charge,$delivery_charge){
       
       $this->db->set('packaging_charge',$packaging_charge);
       $this->db->set('delivery_charge',$delivery_charge);
       if($this->db->update('delivery_app_settings')){
            redirect('./parameter/manage_service_charge');
          }else{
              redirect('./parameter/manage_service_charge');
          };
       
       
   } 
// ******************** GST Section****************//    
// ******************** GST Section****************//
// ******************** GST Section****************//   
    public function select_gst(){
        
        $this->db->select('*');
		$this->db->from('gst');
		
		$data = $this->db->get();
		return $data->result();
        
    }
    
    public function selected_gst($id){
        
        $this->db->select('*');
		$this->db->from('gst');
		$this->db->where('gst_id',$id);
		$data = $this->db->get();
		return $data->result();
        
    }    
    
   public function add_gst($unit){
    $check_unit  = $this->db->get_where('gst',array('gst_value' =>$unit ));
    
       if($check_unit->num_rows() > 0){
          
            redirect('./parameter/add_gst?alert=This gst value is alredy exist.');
           
       }else{
       
          $arr =  array(
            'gst_value' =>  $unit,
          );
          if($this->db->insert('gst',$arr)){
              redirect('./parameter/add_gst');
          }else{
              redirect('./parameter/add_gst');
          };
       }
   }
    
   public function edit_gst($unit,$id){
       
       $this->db->where('gst_id',$id);
       $this->db->set('gst_value',$unit);
          if($this->db->update('gst')){
            redirect('./parameter/add_gst');
          }else{
              redirect('./parameter/add_gst');
          };
       
   }   
    
   public function del_gst($del_id){
        $this->db->where('gst_id',$del_id);
         if($this->db->delete('gst')){
            echo 'success';
          }else{
              echo 'failed';
          };
       
   }
}
