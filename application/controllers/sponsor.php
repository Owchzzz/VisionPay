<?php
	class sponsor extends CI_Controller
	{
		public function login($sponsor_login = NULL)
		{
			if($sponsor_login != NULL)
			{
				$this->load->model('user_profiles', 'up');
				if($this->up->sponsor_available($sponsor_login))
				{
					redirect('/user/register/'.$sponsor_login);
				}
				else
				{
					$data['msg_title'] = lang('registration');
					$data['msg_type'] = 'fail';
					$data['msg_text'] = lang('msg_sponsor_not_found');
					$this->load->view('general_message', $data);
				}
			}// end of if($sponsor_login != NULL)
			else
			{
				$data['msg_title'] = lang('registration');
				$data['msg_type'] = 'fail';
				$data['msg_text'] = lang('msg_invalid_register_link');
				$this->load->view('general_message', $data);
			}// end of else of if($sponsor_login != NULL)
		}// end of public function login($sponsor_login)
	}// end of class sponsor extends CI_Controller
?>