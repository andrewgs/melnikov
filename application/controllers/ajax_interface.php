<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_interface extends MY_Controller{
	
	var $per_page = 3;
	var $offset = 0;
	
	function __construct(){
		
		parent::__construct();
	}

	public function login(){
		
		if(!$this->input->is_ajax_request()):
			show_error('Аccess denied');
		endif;
		$statusval = array('status'=>FALSE,'message'=>'Авторизация невозможна','redirect'=>'');
		$data = trim($this->input->post('postdata'));
		if($data):
			$data = preg_split("/&/",$data);
			for($i=0;$i<count($data);$i++):
				$dataid = preg_split("/=/",$data[$i]);
				$dataval[$i] = $dataid[1];
			endfor;
			if($dataval):
				$user = $this->admin->auth_user($dataval[0],$dataval[1]);
				if($user):
					$statusval['status'] = TRUE;
					$statusval['message'] = '';
					$session_data = array('logon'=>md5($user['login']),'userid'=>$user['id']);
					$this->session->set_userdata($session_data);
					$statusval['redirect'] = 'control-panel';
				endif;
			endif;
		endif;
		echo json_encode($statusval);
	}
	
	public function change_position(){
		
		if(!$this->input->is_ajax_request()):
			show_error('Аccess denied');
		endif;
		$list = trim($this->input->post('list'));
		$page = trim($this->input->post('page'));
		$content = trim($this->input->post('content'));
		if($list):
			$list = preg_split("/&/",$list);
			for($i=0;$i<count($list);$i++):
				$dataid = preg_split("/=/",$list[$i]);
				$dataval[$i] = $dataid[1];
			endfor;
			if($dataval):
				if(in_array($content,array('images','pages','video','reviews'))):
					$items = $this->$content->read_records($page);
					for($i=0;$i<count($items);$i++):
						$this->$content->update_field($dataval[$i],'position',$i+1,$content);
					endfor;
				endif;
			endif;
		endif;
	}
	
	public function text_load(){
		
		if(!$this->input->is_ajax_request()):
			show_error('Аccess denied');
		endif;
		$this->offset = $this->uri->segment(4);
		$content = $this->pages->read_limit_records($this->uri->segment(2),$this->per_page,$this->offset);
		$next_items = $this->pages->exist_next_records($this->uri->segment(2),$this->per_page+$this->offset+1);
		$html = '';
		$this->load->helper('text');
		for($i=0;$i<count($content);$i++):
			$html .= '<h4 style="color:#ff0000">'.$content[$i]['title'].'</h4>';
			$html .= '<p>'.blog_limiter($content[$i]['content']).'</p>';
		endfor;
//		if($next_items):
			$offset = $this->per_page+$this->offset+1;
			$html .= '<a class="jscroll-next" href="'.site_url("text-load/".$this->uri->segment(2)."/from/$offset").'">Еще ...</a>';
//		endif;
		echo $html;
	}

}