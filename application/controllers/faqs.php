<?php
	class faqs extends CI_Controller
	{	
		public function index()
		{
			$this->load->model('faqs_model', 'fm');
			$data['faqs_data'] = $this->fm->get_all_active();
			$this->load->view('faqs', $data);
		}// end of public function index()
	}// end of class presentation extends CI_Controller
?>