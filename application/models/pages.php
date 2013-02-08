<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Model{

	var $page = '';
	var $title = '';
	var $content = '';
	var $date = '';

	function __construct(){
		parent::__construct();
	}
	
	function insert_record($data){
	
		$this->page = $data['page'];
		$this->title = $data['title'];
		$this->content = $data['content'];
		$this->date = $data['date'];
		$this->db->insert('pages',$this);
		return $this->db->insert_id();
	}
	
	function update_record($id,$data){

		$this->db->set('title',$data['title']);
		$this->db->set('content',$data['content']);
		$this->db->set('date',$data['date']);
		$this->db->where('id',$id);
		$this->db->update('pages');
		return $this->db->affected_rows();
	}

	function read_limit_records($page,$count,$from){
		
		$this->db->order_by('date','DESC');
		$this->db->order_by('id','DESC');
		$query = $this->db->get_where('pages',array('page'=>$page),$count,$from);
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}

	function exist_next_records($page,$offset){
		
		$query = $this->db->get_where('pages',array('page'=>$page),1,$offset);
		$data = $query->result_array();
		if($data) return TRUE;
		return FALSE;
	}
}