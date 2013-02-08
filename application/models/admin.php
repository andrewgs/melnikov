<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Model{

	var $login 			= '';
	var $email			= '';
	var $password 		= '';

	function __construct(){
		parent::__construct();
	}
	
	function auth_user($login,$password){
		
		$this->db->where('login',$login);
		$this->db->where('password',md5($password));
		$query = $this->db->get('admin',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0];
		return FALSE;
	}

	function valid_password($id,$field,$parameter){
			
		$this->db->where('id',$id);
		$this->db->where($field,$parameter);
		$query = $this->db->get('admin',1);
		$data = $query->result_array();
		if(count($data)) return $data[0]['id'];
		return FALSE;
	}

}