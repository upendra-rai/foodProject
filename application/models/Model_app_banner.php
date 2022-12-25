<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_app_banner extends CI_Model {



	function __construct(){


       date_default_timezone_set("Asia/Calcutta");
		parent::__construct();

	}

	public function select_list()
	{
		        $this->db->select('*');
				$this->db->from('app_banner');
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
      
        $arr = array(
					'banner_img' => $img_name,
					'banner_status' => $status,
                    'outlet_id' => $user_outlet,
				);

				if($this->db->insert('app_banner',$arr)){
					 redirect('./app_banner/add?msg=Banner is successfully added.');
				}else{
					echo 'failed';
				}

	}

	public function selected_row($id)
	{
		$this->db->select('*');
		$this->db->from('app_banner');
		$this->db->where('banner_id',$id);
		$data = $this->db->get();
		return $data->result();
	}

	public function edit($id,$status,$img_name)
	{
        $user_outlet = $this->session->userdata('outlet_id');
		$arr = array(
			'banner_img' => $img_name,
			'banner_status' => $status,
            'outlet_id' => $user_outlet,
		);
      $this->db->where('banner_id',$id);
			if($this->db->update('app_banner',$arr)){

				    $redirect_str = './app_banner/add//?msg=Banner is successfully updated.';
				    redirect($redirect_str);
			}else{
				    echo 'failed';
			}

	}

	public function del_row($del_id)
	{
		 $this->db->where('banner_id',$del_id);
		 if($this->db->delete('app_banner')){
			 echo 'success';
		 }else{
					 echo 'failed';
		 }
	}


}
