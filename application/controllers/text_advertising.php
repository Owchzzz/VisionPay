<?php
	class text_advertising extends CI_Controller
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
			$this->load->model('text_advertising_model', 'tam');
			$data['text_ads'] = $this->tam->get_all_active();
			$this->load->view('text_advertising', $data);
		}// end of public function index()
	}// end of class text_advertising extends CI_Controller
?>