<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Images extends MY_Model{

	var $id 	= '';
	var $title	= '';
	var $link	= '';
	var $page	= '';
	var $position	= '';

	function __construct(){
		parent::__construct();
	}
	
	function insert_record($data){
	
		$this->title= $data['title'];
		$this->link	= $data['link'];
		$this->page	=$data['page'];
		$this->position= $this->next_numbers($data['page']);
		
		$this->db->insert('images',$this);
		return $this->db->insert_id();
	}
	
	function update_record($data){

		$this->db->set('title',$data['title']);
		$this->db->where('id',$data['imgid']);
		$this->db->update('images');
		return $this->db->affected_rows();
	}

	function read_records($page = ''){
		
		$this->db->where('page',$page);
		$this->db->order_by('position');
		$query = $this->db->get('images');
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}

	function next_numbers($page){
		
		$query = "SELECT MAX(position*1)+1 AS position FROM images WHERE page = '$page'";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if(isset($data[0]['position'])) return $data[0]['position'];
		return 1;
	}
	
	function last_records(){
		
		$query = "SELECT page,link,position FROM images WHERE id IN (select MAX(id) FROM images GROUP BY page)";
		$query = $this->db->query($query);
		$data = $query->result_array();
		if($data) return $data;
		return FALSE;
	}
}