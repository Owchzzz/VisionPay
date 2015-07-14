<?php
	class programs extends CI_Controller
	{
		public function index()
		{
			$this->load->model('programs_model', 'p');
			$data['programs'] = $this->p->get_programs_main(2);
			$this->load->view('program', $data);
		}// end of public function index()
		
		public function details($program_id)
		{
			$program_id = rawurldecode($program_id);
			$this->load->model('programs_model', 'p');
			$program_data = $this->p->get_program_details($program_id);
			if(count($program_data) > 0)
			{
				$data['program_data'] = $program_data;
				$this->load->view('program_details', $data);
			}
			else
			{
				$data['msg_title'] = lang('programs');
				$data['msg_type'] = 'fail';
				$data['msg_text'] = lang('msg_no_programs_found');
				$this->load->view('general_message', $data);
			}
		}// end of public function details($program_id)
	}// end of class programs extends CI_Controller
?>