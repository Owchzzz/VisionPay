<?
	class fin_password extends CI_Controller
	{
		public function confirm_change($special_part)
		{
			$special_part = rawurldecode($special_part);
			$this->load->model('fin_password_change', 'fpc');
			$fin_password_change_request_data = $this->fpc->get_via_special_part($special_part);
			$data['msg_title'] = lang('financial_change_password');
			
			if(count($fin_password_change_request_data) > 0)
			{
				if($fin_password_change_request_data['status'] == 0)
				{
					$user_id = $fin_password_change_request_data['user_id'];
					$user_profile_data['fin_password'] = $fin_password_change_request_data['password'];
					$this->load->model('user_profiles', 'up');
					$this->up->update($user_id, $user_profile_data);
					
					$request_id = $fin_password_change_request_data['request_id'];
					$fin_password_change_request_data['status'] = 1;
					unset($fin_password_change_request_data['request_id']);
					$this->fpc->update($request_id, $fin_password_change_request_data);
					
					$data['msg_type'] = 'success';
					$data['msg_text'] = lang('msg_financial_password_changed');
				}// end of if($fin_password_change_request_data['status'] == 0)
				else
				{
					$data['msg_type'] = 'fail';
					$data['msg_text'] = lang('msg_fin_password_change_request_used');
				}// end of else of if($fin_password_change_request_data['status'] == 0)
			}// end of if(count($fin_password_change_request_data) > 0)
			else
			{
				$data['msg_type'] = 'fail';
				$data['msg_text'] = lang('msg_fin_password_change_request_not_found');
			}// end of else of if(count($fin_password_change_request_data) > 0)
			$this->load->view('general_message', $data);
		}// end of public function confirm_change($special_part)
		
		public function cancel_request($special_part)
		{
			$special_part = rawurldecode($special_part);
			$this->load->model('fin_password_change', 'fpc');
			$fin_password_change_request_data = $this->fpc->get_via_special_part($special_part);
			$data['msg_title'] = lang('financial_change_password');
			
			if(count($fin_password_change_request_data) > 0)
			{
				if($fin_password_change_request_data['status'] == 0)
				{
					$this->fpc->delete($fin_password_change_request_data['request_id']);
					$data['msg_type'] = 'info';
					$data['msg_text'] = lang('msg_fin_password_change_request_removed');
				}// end of if($fin_password_change_request_data['status'] == 0)
				else
				{
					$data['msg_type'] = 'fail';
					$data['msg_text'] = lang('msg_fin_password_change_request_used');
				}// end of else of if($fin_password_change_request_data['status'] == 0)
			}// end of if(count($fin_password_change_request_data) > 0)
			else
			{
				$data['msg_type'] = 'fail';
				$data['msg_text'] = lang('msg_fin_password_change_request_not_found');
			}// end of else of if(count($fin_password_change_request_data) > 0)
			$this->load->view('general_message', $data);
		}// end of public function cancel_request($special_part)
	}// end of class fin_password extends CI_Controller
?>