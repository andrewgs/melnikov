<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Video extends MY_Model{

	var $id 			= '';
	var $title			= '';
	var $note			= '';
	var $link			= '';
	var $date			= '';

	function __construct(){
		parent::__construct();
	}
	
	function insert_record($data){
	
		$this->title= $data['title'];
		$this->link	= $data['link'];
		$this->note	=$data['note'];
		$this->date	=$data['date'];
		
		$this->db->insert('video',$this);
		return $this->db->insert_id();
	}
	
	function update_record($data){

		$this->db->set('title',$data['title']);
		$this->db->set('link',$data['link']);
		$this->db->set('note',$data['note']);
		$this->db->set('date',$data['date']);
		$this->db->where('id',$data['vid']);
		$this->db->update('video');
		return $this->db->affected_rows();
	}
}