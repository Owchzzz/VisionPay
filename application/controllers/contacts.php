<?php
	class contacts extends CI_Controller
	{	
		public function index()
		{
			$this->load->model('settings_model', 'sm');
			$settings_raw_data = $this->sm->get_all();
			$settings_data = array();
			foreach($settings_raw_data as $raw_settings)
				$settings_data[$raw_settings->name] = $raw_settings->value;
			$data['settings'] = $settings_data;
			
			$this->load->helper('MY_form_helper');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('<div style="font-weight:bold;color:#FF0000;">', '</div>');
			$data['form_submit_message'] = '';
			
			// Now setting the validation rules
			$this->form_validation->set_rules('name', lang('name'), 'required');
			$this->form_validation->set_rules('email', lang('email'), 'required|valid_email');
			$this->form_validation->set_rules('message', lang('text'), 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
			}
			else
			{
				// now will send the email
				$mail_to = $settings_data['contact_email'];
				$mail_subject = lang('mail_subject_contacts');
				$mail_body_data = array(
											'message' => $this->input->post('message')
										);
				// Now loading the email library
				$this->load->library('email');
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				
				$this->email->from($this->input->post('email'), $this->input->post('name'));
				$this->email->to($mail_to);
				$this->email->subject($mail_subject);
				$message = $this->load->view('mail_contacts', $mail_body_data, TRUE);
				$this->email->message($message);
				
				if($this->email->send())
				{					
					$data['form_submit_message'] = '<div style="font-weight:bold;color:#0000FF;">'.lang('msg_contacts_success') .'</div>';
				}// end of if($this->email->send())
				else
				{
					// setting the error message
					$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_email_send_fail'). show_error($this->email->print_debugger()) .'</div>';
				}// end of else of if($this->email->send())
			}
			
			$this->load->view('contacts', $data);
		}// end of public function index()
	}// end of class contacts extends CI_Controller
?>