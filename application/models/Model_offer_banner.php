<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_offer_banner extends CI_Model {



	function __construct(){


       date_default_timezone_set("Asia/Calcutta");
		parent::__construct();

	}

	public function select_list()
	{
		       $this->db->select('*');
				$this->db->from('offer_banner');
                //**********Outlet Filter ********//
                 if( $this->session->userdata('outlet_id')){
                     $user_outlet = $this->session->userdata('outlet_id');
                     $this->db->where('outlet_id',$user_outlet);
                }
                //**********Outlet Filter ********//
				$data = $this->db->get();
				return $data->result();
	}

  public function add($status,$img_name){
        $user_outlet = $this->session->userdata('outlet_id');
        $check = $this->db->get_where('offer_banner',array('outlet_id' => $user_outlet));
      
         if($check->num_rows() > 0){
             $arr = array(
					'img_name' => $img_name,
					'outlet_id' => $user_outlet,
				);
               // $this->db->where('banner_id',$id);
                $this->db->where('outlet_id',$user_outlet);
				if($this->db->update('offer_banner',$arr)){
					 redirect('./offer_banner/add?msg=Offer Banner is successfully added.');
				}else{
					echo 'failed';
				}
             
         }else{
               $arr2 = array(
					'img_name' => $img_name,
					'outlet_id' => $user_outlet,
				);
               // $this->db->where('banner_id',$id);
				if($this->db->insert('offer_banner',$arr2)){
					 redirect('./offer_banner/add?msg=Offer Banner is successfully added.');
				}else{
					echo 'failed';
				}
         }
       
            

	}

	public function selected_row($id)
	{
		$this->db->select('*');
		$this->db->from('offer_banner');
		$this->db->where('offer_banner_id',$id);
		$data = $this->db->get();
		return $data->result();
	}

	public function edit($id,$status,$img_name)
	{
		$arr = array(
			'img_name' => $img_name,
			
		);
      $this->db->where('offer_banner_id',$id);
			if($this->db->update('offer_banner',$arr)){

				    $redirect_str = './offer_banner/add/?msg=Offer Banner is successfully updated.';
				    redirect($redirect_str);
			}else{
				    echo 'failed';
			}

	}

	public function del_row($del_id)
	{
		 $this->db->where('offer_banner_id',$del_id);
		 if($this->db->delete('offer_banner')){
			 echo 'success';
		 }else{
					 echo 'failed';
		 }
	}


}
