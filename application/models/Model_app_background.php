<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_app_background extends CI_Model {



	function __construct(){


       date_default_timezone_set("Asia/Calcutta");
		parent::__construct();

	}

	public function select_list()
	{
		        $this->db->select('*');
				$this->db->from('app_background');
               
				$data = $this->db->get();
				return $data->result();
	}

  public function add($status,$img_name){
      
      $user_outlet = $this->session->userdata('outlet_id');
      
        $arr = array(
					'img' => $img_name,
					'status' => $status,
                    
				);

				if($this->db->insert('app_background',$arr)){
					 redirect('./app_background/add?msg=App Background is successfully added.');
				}else{
					echo 'failed';
				}

	}

	public function selected_row($id)
	{
		$this->db->select('*');
		$this->db->from('app_background');
		
		$data = $this->db->get();
		return $data->result();
	}

	public function edit($id,$status,$img_name)
	{
        $user_outlet = $this->session->userdata('outlet_id');
		$arr = array(
			'img' => $img_name,
            'status' => $status,
		);
      $this->db->where('sr_no',$id);
			if($this->db->update('app_background',$arr)){

				    $redirect_str = './app_background/add//?msg=App Background is successfully updated.';
				    redirect($redirect_str);
			}else{
				    echo 'failed';
			}

	}

	public function del_row($del_id)
	{
		 $this->db->where('sr_no',$del_id);
		 if($this->db->delete('app_background')){
			 echo 'success';
		 }else{
					 echo 'failed';
		 }
	}


}
