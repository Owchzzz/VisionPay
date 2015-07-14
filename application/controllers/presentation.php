<?php
	class presentation extends CI_Controller
	{
		public function login_check()
		{
			if(!$this->session->userdata('user_id'))
			{
				redirect('user/login/1');
			}// end of if(!$this->session->userdata('user_id'))
		}// end of public function login_check()
		
		public function index()
		{
			$this->login_check();
			$this->load->model('presentation_images_model', 'pim');
			$data['presentation_images'] = $this->pim->get_all_active();
			$this->load->view('presentation', $data);
		}// end of public function index()
	}// end of class presentation extends CI_Controller
?>