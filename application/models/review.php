<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Review extends MY_Model{

	var $id 			= '';
	var $photo			= '';
	var $name			= '';
	var $text			= '';
	var $city			= '';
	var $date			= '';

	function __construct(){
		parent::__construct();
	}
	
	function insert_record($data){
	
		$this->photo= $data['photo'];
		$this->city= $data['city'];
		$this->name	= $data['name'];
		$this->text	=$data['text'];
		$this->date	=$data['date'];
		
		$this->db->insert('reviews',$this);
		return $this->db->insert_id();
	}
	
	function update_record($data){
		
		if(isset($data['photo']) && !empty($data['photo'])):
			$this->db->set('photo',$data['photo']);
		endif;
		$this->db->set('city',$data['city']);
		$this->db->set('name',$data['name']);
		$this->db->set('text',$data['text']);
		$this->db->set('date',$data['date']);
		$this->db->where('id',$data['rid']);
		$this->db->update('reviews');
		return $this->db->affected_rows();
	}
}