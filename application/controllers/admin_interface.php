<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_interface extends MY_Controller{
	
	function __construct(){
		
		parent::__construct();
		
		if(!$this->loginstatus || !$this->user['uid']):
			redirect('');
		endif;
	}
	
	public function control_panel(){
		
		$images = array('marriage'=>IMAGE_DEFAULT,'family'=>IMAGE_DEFAULT,'portrait'=>IMAGE_DEFAULT,'fashion'=>IMAGE_DEFAULT,'landscape'=>IMAGE_DEFAULT,'genre'=>IMAGE_DEFAULT);
		$images_tmp = $this->images->last_records();
		for($i=0;$i<count($images_tmp);$i++):
			switch($images_tmp[$i]['page']):
				case 'marriage': $images['marriage'] = $images_tmp[$i]['link'];break;
				case 'family': $images['family'] = $images_tmp[$i]['link'];break;
				case 'portrait': $images['portrait'] = $images_tmp[$i]['link'];break;
				case 'fashion': $images['fashion'] = $images_tmp[$i]['link'];break;
				case 'landscape': $images['landscape'] = $images_tmp[$i]['link'];break;
				case 'genre': $images['genre'] = $images_tmp[$i]['link'];break;
			endswitch;
		endfor;
		$this->load->view("admin_interface/pages/control-panel",array('images' => $images));
		
	}
	
	public function control_pages(){
		
		$pagevar = array(
		
		);
		$this->load->view("admin_interface/pages/control-panel",$pagevar);
	}
	
	public function images_delete(){
		
		$image_id = $this->uri->segment(5);
		if($image_id):
			$image_link = getcwd().'/'.$this->images->read_field($image_id,'images','link');
			if($this->filedelete($image_link)):
				$this->session->set_userdata('msgs','Файл удален успешно.');
			else:
				$this->session->set_userdata('msgr','Ошибка при удалении файла.<br/>Запись удалена.');
			endif;
			$this->images->delete_record($image_id,'images');
			redirect($_SERVER['HTTP_REFERER']);
		endif;
		redirect('control-panel');
	}
	
	/******************************************* items ***********************************************/
	
	public function text_items(){
		
		$uri = preg_replace('/(\/)?from(\/)?(\d)?/i','',uri_string());
		$per_page = 15;
		if($this->uri->segment(3) == 'marriage' || $this->uri->segment(3) == 'family'):
			$segment = $this->uri->segment(4);
			$from = $this->uri->segment(6);
			$uri_segment = 6;
		else:
			$segment = $this->uri->segment(3);
			$from = $this->uri->segment(5);
			$uri_segment = 5;
		endif;
		$pagevar = array(
			'list' => $this->pages->read_limit_records($segment,$per_page,$from),
			'pages' => $this->pagination($uri,$uri_segment,$this->pages->count_records('pages','page',$segment),$per_page),
			'current_uri' => $uri
		);
		$this->session->set_userdata('backpath',uri_string());
		$this->load->view("admin_interface/pages/page-items",$pagevar);
	}

	public function insert_item(){
		
		if($this->input->post('submit')):
			$insert = $this->input->post();
			if($this->uri->segment(3) == 'marriage' || $this->uri->segment(3) == 'family'):
				$insert['page'] = $this->uri->segment(4);
			else:
				$insert['page'] = $this->uri->segment(3);
			endif;
			$pattern = "/(\d+)\.(\w+)\.(\d+)/i";
			$replacement = "\$3-\$2-\$1";
			$insert['date'] = preg_replace($pattern,$replacement,$insert['date']);
			$result = $this->pages->insert_record($insert);
			redirect($this->session->userdata('backpath'));
		endif;
		$this->load->view("admin_interface/pages/page-editor",array('content'=>'','title'=>'','date'=>date("d.m.Y")));
	}
	
	public function update_item(){
		
		if($this->input->post('submit')):
			$update = $this->input->post();
			$pattern = "/(\d+)\.(\w+)\.(\d+)/i";
			$replacement = "\$3-\$2-\$1";
			$update['date'] = preg_replace($pattern,$replacement,$update['date']);
			$result = $this->pages->update_record($this->uri->segment(6),$update);
			redirect($this->session->userdata('backpath'));
		endif;
		$this->load->helper('date');
		$pagevar = array(
			'content'=>$this->pages->read_field($this->uri->segment(6),'pages','content'),
			'title'=>htmlspecialchars($this->pages->read_field($this->uri->segment(6),'pages','title')),
			'date'=>swap_dot_date($this->pages->read_field($this->uri->segment(6),'pages','date'))
		);
		$this->load->view("admin_interface/pages/page-editor",$pagevar);
	}
	
	public function item_delete(){
		
		$this->pages->delete_record($this->uri->segment(4),'pages');
		if(isset($_SERVER['HTTP_REFERER'])):
			redirect($_SERVER['HTTP_REFERER']);
		endif;
		redirect('control-panel');
	}
	/*************************************** end items ***********************************************/
	
	public function page_editor(){
		
		$content_id = $this->uri->segment(3);
		if($this->uri->total_segments() == 4):
			$content_id = $this->uri->segment(4);
		endif;
		$pagevar = array(
			'content' => $this->pages->read_record($content_id),
		);
		
		if($this->input->post('submit')):
			$result = $this->pages->replace_record($content_id,$this->input->post('content'));
			if($result):
				$this->session->set_userdata('msgs','Cодержимое страницы сохранено успешно.');
			else:
				$this->session->set_userdata('msgr','Ошибка при сохранении.');
			endif;
			redirect($this->uri->uri_string());
		endif;
		
		$this->load->view("admin_interface/pages/page-editor",$pagevar);
	}
	
	public function page_sliders(){
		
		$this->load->model('video');
		if($this->input->post('insvideo')):
			unset($_POST['insvideo']);
			$this->form_validation->set_rules('link',' ','required|trim');
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('date',' ','required|trim');
			$this->form_validation->set_rules('note',' ','trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполнены необходимые поля<br/>');
				redirect($this->uri->uri_string());
			else:
				$insert = $this->input->post();
				$pattern = "/(\d+)\.(\w+)\.(\d+)/i";
				$replacement = "\$3-\$2-\$1";
				$insert['date'] = preg_replace($pattern,$replacement,$insert['date']);
				$result = $this->video->insert_record($insert);
				if($result):
					$this->session->set_userdata('msgs','Запись успешно создана');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		if($this->input->post('updatevideo')):
			unset($_POST['updatevideo']);
			$this->form_validation->set_rules('vid',' ','required|trim');
			$this->form_validation->set_rules('link',' ','required|trim');
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('date',' ','required|trim');
			$this->form_validation->set_rules('note',' ','trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполнены необходимые поля<br/>');
				redirect($this->uri->uri_string());
			else:
				$update = $this->input->post();
				$pattern = "/(\d+)\.(\w+)\.(\d+)/i";
				$replacement = "\$3-\$2-\$1";
				$update['date'] = preg_replace($pattern,$replacement,$update['date']);
				$result = $this->video->update_record($update);
				if($result):
					$this->session->set_userdata('msgs','Запись успешно cохранена');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$this->load->view("admin_interface/pages/page-sliders",array('video'=>$this->video->read_records('video','date','DESC')));
	}
	
	public function video_delete(){
		
		$this->load->model('video');
		$this->video->delete_record($this->uri->segment(5),'video');
		if(isset($_SERVER['HTTP_REFERER'])):
			redirect($_SERVER['HTTP_REFERER']);
		endif;
		redirect('control-panel');
	}
	
	public function page_reviews(){
		
		$this->load->model('review');
		$this->load->helper('date');
		$this->load->helper('text');
		if($this->input->post('insreview')):
			unset($_POST['insreview']);
			$this->form_validation->set_rules('name',' ','required|trim');
			$this->form_validation->set_rules('city',' ','required|trim');
			$this->form_validation->set_rules('date',' ','required|trim');
			$this->form_validation->set_rules('text',' ','required|trim');
			if(!$this->form_validation->run()):
				redirect($this->uri->uri_string());
			else:
				$insert = $this->input->post();
				if($_FILES['image']['error'] != 4):
					$this->load->helper('string');
					$config['upload_path'] = getcwd().'/images/download/';
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['file_name'] = preg_replace('/.+(.)(\.)+/',random_string('alpha',12)."\$2",$_FILES['image']['name']);
					$this->load->library('upload',$config);
					$this->upload->do_upload('image');
					$image_info = $this->upload->data();
					$insert['name'] = htmlspecialchars($insert['name']);
					$insert['photo'] = 'images/download/'.$image_info['file_name'];
					$pattern = "/(\d+)\.(\w+)\.(\d+)/i";
					$replacement = "\$3-\$2-\$1";
					$insert['date'] = preg_replace($pattern,$replacement,$insert['date']);
					$this->review->insert_record($insert);
					$this->image_manupulation(getcwd().'/'.$insert['photo'],'width',TRUE,781,521);
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		if($this->input->post('updreview')):
			unset($_POST['updreview']);
			$this->form_validation->set_rules('rid',' ','required|trim');
			$this->form_validation->set_rules('name',' ','required|trim');
			$this->form_validation->set_rules('date',' ','required|trim');
			$this->form_validation->set_rules('city',' ','required|trim');
			$this->form_validation->set_rules('text',' ','required|trim');
			if(!$this->form_validation->run()):
				redirect($this->uri->uri_string());
			else:
				$update = $this->input->post();
				if($_FILES['image']['error'] != 4):
					$old_file = getcwd().'/'.$this->review->read_field($update['rid'],'reviews','photo');
					$this->filedelete($old_file);
					$this->load->helper('string');
					$config['upload_path'] = getcwd().'/images/download/';
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['file_name'] = preg_replace('/.+(.)(\.)+/',random_string('alpha',12)."\$2",$_FILES['image']['name']);
					$this->load->library('upload',$config);
					$this->upload->do_upload('image');
					$image_info = $this->upload->data();
					$update['photo'] = 'images/download/'.$image_info['file_name'];
					$this->image_manupulation(getcwd().'/'.$update['photo'],'width',TRUE,781,521);
				endif;
				
				$pattern = "/(\d+)\.(\w+)\.(\d+)/i";
				$replacement = "\$3-\$2-\$1";
				$update['date'] = preg_replace($pattern,$replacement,$update['date']);
				$result = $this->review->update_record($update);
				redirect($this->uri->uri_string());
			endif;
		endif;
		$from = intval($this->uri->segment(6));
		$pagevar = array(
			'reviews' => $this->review->read_limit_records(5,$from,'reviews','date','DESC'),
			'pages' => $this->pagination('control-panel/pages/marriage/reviews',6,$this->review->count_records('reviews'),5)
		);
		$this->load->view("admin_interface/pages/page-reviews",$pagevar);
	}
	
	public function review_delete(){
		
		$this->load->model('review');
		$file = getcwd().'/'.$this->review->read_field($this->uri->segment(5),'reviews','photo');
		$this->filedelete($file);
		$this->review->delete_record($this->uri->segment(5),'reviews');
		if(isset($_SERVER['HTTP_REFERER'])):
			redirect($_SERVER['HTTP_REFERER']);
		endif;
		redirect('control-panel');
	}
	
	public function page_images(){
		
		$page = $this->uri->segment(3);
		if($this->uri->total_segments() == 4):
			$page = $this->uri->segment(4);
		endif;
		if($this->input->post('insimage')):
			if(isset($_FILES)):
				$images = $_FILES;
				$_FILES = array();
				$titles = $this->input->post();
				$insert['page'] = $page;
				$this->load->library('upload');
				$this->load->helper('string');
				$config['upload_path'] = getcwd().'/images/download/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
			else:
				$images = array();
			endif;
			for($i=0;$i<count($images['image']['name']);$i++):
				if($images['image']['error'][$i] != 4):
					$_FILES['userfile']['name'] = $images['image']['name'][$i];
					$_FILES['userfile']['type'] = $images['image']['type'][$i];
					$_FILES['userfile']['tmp_name'] = $images['image']['tmp_name'][$i];
					$_FILES['userfile']['error'] = $images['image']['error'][$i];
					$_FILES['userfile']['size'] = $images['image']['size'][$i];
					$config['file_name'] = preg_replace('/.+(.)(\.)+/',random_string('alpha',12)."\$2",$_FILES['userfile']['name']);
					$this->upload->initialize($config);
					$this->upload->do_upload();
					$image_info = $this->upload->data();
					$insert['title'] = htmlspecialchars($titles['title'][$i]);
					$insert['link'] = 'images/download/'.$image_info['file_name'];
					$this->images->insert_record($insert);
					$this->image_manupulation(getcwd().'/'.$insert['link'],'width',TRUE,781,521);
				endif;
			endfor;
			redirect($this->uri->uri_string());
		endif;
		if($this->input->post('editimage')):
			$update = $this->input->post();
			$this->images->update_record($update);
			redirect($this->uri->uri_string());
		endif;
		$this->load->view("admin_interface/pages/page-images",array('images'=>$this->images->read_records($page)));
	}
}