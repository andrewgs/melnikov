<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users_interface extends MY_Controller{
	
	var $per_page = 5;
	var $offset = 0;
	
	function __construct(){
		
		parent::__construct();
	}
	
	/****************************************************** PAGES *******************************************************/
	
	public function index(){

		$this->load->view("users_interface/pages/page-images",array('images'=> $this->images->read_records('marriage')));
	}
	
	public function family(){
	
		$this->load->view("users_interface/pages/page-images",array('images'=>$this->images->read_records('family')));
	}

	public function portrait(){
		
		$this->load->view("users_interface/pages/page-images",array('images'=>$this->images->read_records('portrait')));
	}
	
	public function fashion(){
		
		$this->load->view("users_interface/pages/page-images",array('images'=>$this->images->read_records('fashion')));
	}
	
	public function landscape(){
		
		$this->load->view("users_interface/pages/page-images",array('images'=>$this->images->read_records('landscape')));
	}
	
	public function reportage(){
		
		$pagevar = array(
			'content' => $this->pages->read_limit_records($this->uri->segment(1),$this->per_page,$this->offset),
			'next_items' => $this->pages->exist_next_records($this->uri->segment(1),$this->per_page+$this->offset+1)
		);
		$this->load->view("users_interface/pages/page-text",$pagevar);
	}
	
	public function genre(){
		
		$this->load->view("users_interface/pages/page-images",array('images'=>$this->images->read_records('genre')));
	}
	
	public function photographer(){
		
		$pagevar = array(
			'content' => $this->pages->read_limit_records($this->uri->segment(1),$this->per_page,$this->offset),
			'next_items' => $this->pages->exist_next_records($this->uri->segment(1),$this->per_page+$this->offset+1)
		);
		$this->load->view("users_interface/pages/page-text",$pagevar);
	}
	
	/************************************************** PAGES MARRIEGE****************************************************/
	
	public function marriage_series(){
		
		$pagevar = array(
			'content' => $this->pages->read_limit_records($this->uri->segment(2),$this->per_page,$this->offset),
			'next_items' => $this->pages->exist_next_records($this->uri->segment(2),$this->per_page+$this->offset+1)
		);
		$this->load->view("users_interface/pages/page-text",$pagevar);
	}
	
	public function prenuptial(){
		
		$pagevar = array(
			'content' => $this->pages->read_limit_records($this->uri->segment(2),$this->per_page,$this->offset),
			'next_items' => $this->pages->exist_next_records($this->uri->segment(2),$this->per_page+$this->offset+1)
		);
		$this->load->view("users_interface/pages/page-text",$pagevar);
	}
	
	public function wedding(){
		
		$pagevar = array(
			'content' => $this->pages->read_limit_records($this->uri->segment(2),$this->per_page,$this->offset),
			'next_items' => $this->pages->exist_next_records($this->uri->segment(2),$this->per_page+$this->offset+1)
		);
		$this->load->view("users_interface/pages/page-text",$pagevar);
	}
	
	public function sliders(){
		
		$this->load->model('video');
		$this->load->view("users_interface/pages/sliders",array('video'=>$this->video->read_records('video','date','DESC')));
	}
	
	public function poly(){
		
		$pagevar = array(
			'content' => $this->pages->read_limit_records($this->uri->segment(2),$this->per_page,$this->offset),
			'next_items' => $this->pages->exist_next_records($this->uri->segment(2),$this->per_page+$this->offset+1)
		);
		$this->load->view("users_interface/pages/page-text",$pagevar);
	}
	
	public function reviews(){
		
		$this->load->model('review');
		$this->load->view("users_interface/pages/review",array('reviews'=>$this->review->read_records('reviews','date','DESC')));
	}
	
	/*************************************************** PAGES FAMILY****************************************************/
	
	public function children(){
		
		$this->load->view("users_interface/pages/page-images",array('images'=>$this->images->read_records('children')));
	}
	
	public function family_series(){
		
		$pagevar = array(
			'content' => $this->pages->read_limit_records($this->uri->segment(2),$this->per_page,$this->offset),
			'next_items' => $this->pages->exist_next_records($this->uri->segment(2),$this->per_page+$this->offset+1)
		);
		$this->load->view("users_interface/pages/page-text",$pagevar);
	}
	
	/***************************************************** END PAGES ****************************************************/
	
	public function logoff(){
		
		$this->session->sess_destroy();
		redirect('');
	}
	
	public function login(){
		
		$this->load->view("users_interface/pages/login");
	}
}