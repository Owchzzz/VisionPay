<?
	class user extends CI_Controller
	{
		public function login_check()
		{
			if(!$this->session->userdata('user_id'))
			{
				redirect('user/login/1');
			}// end of if(!$this->session->userdata('user_id'))
		}// end of public function login_check()
		
		public function terms_conditions()
		{
			$this->load->model('settings_model', 'sm');
			$data['terms_conditions'] = $this->sm->load_terms_conditions();
			$this->load->view('terms_conditions', $data);
		}
		
		public function register($sponsor_login = null)
		{
			$data['sponsor_login'] = $sponsor_login;
			$this->load->model('settings_model', 'sm');
			$data['terms_conditions'] = $this->sm->load_terms_conditions();
			
			$this->load->helper('MY_form_helper');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->database();
			
			$this->form_validation->set_error_delimiters('<div style="font-weight:bold;color:#FF0000;">', '</div>');
			$data['form_submit_message'] = '';
			
			// Now setting the validation rules
			$this->form_validation->set_rules('first_name', lang('name'), 'required');
			$this->form_validation->set_rules('last_name', lang('family'), 'required');
			$this->form_validation->set_rules('email', lang('email'), 'required|valid_email|is_unique[user_profiles.email]');
			$this->form_validation->set_rules('phone', lang('phone_number'), 'required');
			//$this->form_validation->set_rules('phone', lang('phone_number'), 'required|regex_match[/^\+\d+$/]');
			$this->form_validation->set_rules('phone', lang('phone_number'), 'required');
			$this->form_validation->set_rules('country', lang('country'), 'required');
			$this->form_validation->set_rules('city', lang('city'), 'required');
			$this->form_validation->set_rules('street', lang('street'), 'required');
			$this->form_validation->set_rules('house', lang('house'), 'required');
			$this->form_validation->set_rules('post_code', lang('post_code'), 'required');
			$this->form_validation->set_rules('sponsor_login', lang('sponsor_login'), 'required|callback_sponsor_exists');
			$this->form_validation->set_rules('login', lang('your_login'), 'required|is_unique[user_profiles.login]');			
			$this->form_validation->set_rules('password', lang('password'), 'required|matches[confirm_password]');
			$this->form_validation->set_rules('confirm_password', lang('confirm_password'), 'required');
			$this->form_validation->set_rules('fin_password', lang('financial_password'), 'required|matches[confirm_fin_password]');
			$this->form_validation->set_rules('confirm_fin_password', lang('confirm_financial_password'), 'required');
			$this->form_validation->set_rules('ok_pay_wallet', lang('okpay_wallet'), 'required');
			$this->form_validation->set_rules('pm_wallet', lang('pm_wallet'), 'required');
			$this->form_validation->set_rules('check1', '...', 'callback_accept_terms');
			
			$this->form_validation->set_message('regex_match', lang('validate_phone_number'));
			
			if ($this->form_validation->run() == FALSE)
			{
			}
			else
			{
				unset($_POST['confirm_password']);
				unset($_POST['confirm_fin_password']);
				unset($_POST['check1']);
				
				$_POST['created_on'] = date('Y-m-d H:i:s');
				$_POST['password'] = md5($_POST['password']);
				$_POST['fin_password'] = md5($_POST['fin_password']);
				
				$this->load->model('user_profiles', 'up');
				$user_id = $this->up->add($_POST);
				if($user_id)
				{
					$data['form_submit_message'] = '<div style="font-weight:bold;color:#0000FF;">'.lang('register_success_message').'</div>';
					
					// now will send email to user for confirmation
					$mail_to = $_POST['email'];
					$mail_subject = lang('mail_subject_confirm_email');
					$mail_body_data = array(
												'first_name' => $_POST['first_name'],
												'last_name' => $_POST['last_name'],
												'email' => $_POST['email']
											);
					// Now loading the email library
					$this->load->library('email');
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$this->email->from('info@visionclab.com', 'Vision Clab');
					$this->email->to($mail_to);
					$this->email->subject($mail_subject);
					
					$message = $this->load->view('mail_confirm_email', $mail_body_data, TRUE); 
					$this->email->message($message);
					
					if($this->email->send())
					{					
						redirect('/user/registration_success/'.md5($user_id));
					}// end of if($this->email->send())
					else
					{
						// setting the error message
						$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_email_send_fail'). show_error($this->email->print_debugger()) .'</div>';
					}// end of else of if($this->email->send())
				}
			}
			
			$this->load->view('registration', $data);
		}// end of public function register()
		
		function accept_terms()
		{
			if (isset($_POST['check1'])) 
				return true;
			$this->form_validation->set_message('accept_terms', lang('validate_accept_terms'));
			return false;
		}// end of function accept_terms()
		
		function sponsor_exists()
		{
			$this->form_validation->set_message('sponsor_exists', lang('validate_sponsor_exists'));
			if(isset($_POST['sponsor_login']) && trim($_POST['sponsor_login']) != '')
			{
				$this->load->model('user_profiles', 'up');
				if($this->up->sponsor_available($_POST['sponsor_login']))
					return true;
				else
					return false;
			}// end of if(isset($_POST['sponsor_login']) && trim($_POST['sponsor_login']) != '')
			else
			{
				return false;
			}// end of else of if(isset($_POST['sponsor_login']) && trim($_POST['sponsor_login']) != '')
		}// end of function sponsor_exists()
		
		public function login_available()
		{
			$validateValue = $_REQUEST['fieldValue'];
			$validateId = $_REQUEST['fieldId'];
			
			$arrayToJs = array();
			$arrayToJs[0] = $validateId;
			$this->load->model('user_profiles', 'up');
			if($this->up->login_available($validateValue))
				$arrayToJs[1] = true;
			else
				$arrayToJs[1] = false;
			echo json_encode($arrayToJs);
		}// end of public function login_available()
		
		public function email_available()
		{
			$validateValue = rawurldecode($_REQUEST['fieldValue']);
			$validateId = $_REQUEST['fieldId'];
			
			$arrayToJs = array();
			$arrayToJs[0] = $validateId;
			$this->load->model('user_profiles', 'up');
			if($this->up->email_available($validateValue))
				$arrayToJs[1] = true;
			else
				$arrayToJs[1] = false;
			echo json_encode($arrayToJs);
		}// end of public function login_available()
		
		public function sponsor_available()
		{
			$validateValue = $_REQUEST['fieldValue'];
			$validateId = $_REQUEST['fieldId'];
			
			$arrayToJs = array();
			$arrayToJs[0] = $validateId;
			$this->load->model('user_profiles', 'up');
			if($this->up->sponsor_available($validateValue))
				$arrayToJs[1] = true;
			else
				$arrayToJs[1] = false;
			echo json_encode($arrayToJs);
		}// end of public function sponsor_available()
		
		public function registration_success($md5_user_id)
		{
			$this->load->helper('MY_form_helper');
			$this->load->helper('form');
			
			$md5_user_id = rawurldecode($md5_user_id);
			$this->load->model('user_profiles', 'up');
			$user_data = $this->up->get_user_by_md5_id($md5_user_id);
			if(count($user_data) > 0)
			{
				$data['form_submit_message'] = '';
				$data['email'] = $user_data['email'];
				$this->load->view('registration_success', $data);
			}// end of if(count($user_data) > 0)
			else
			{
				$data['msg_title'] = lang('registration');
				$data['msg_type'] = 'fail';
				$data['msg_text'] = lang('msg_no_user_found');
				$this->load->view('general_message', $data);
			}// end of else of if(count($user_data) > 0)
		}// end of public function registration_success($md5_user_id)
		
		public function confirm_email($md5_email)
		{
			$md5_email = rawurldecode($md5_email);
			$this->load->model('user_profiles', 'up');
			$user_data = $this->up->get_user_by_md5_email($md5_email);
			if(count($user_data) > 0)
			{
				if($user_data['email_verified'] == 0)
				{
					$user_id = $user_data['user_id'];
					$user_data_update['email_verified'] = 1;
					$this->up->update($user_id, $user_data_update);
					
					$data['msg_title'] = lang('registration');
					$data['msg_type'] = 'success';
					$data['msg_text'] = lang('msg_account_confirm');
                                        
					$this->load->view('payment', $data);
				}
				else
				{
					$data['msg_title'] = lang('registration');
					$data['msg_type'] = 'fail';
					$data['msg_text'] = lang('msg_account_already_verified');
                                        $data['email'] = $md5_email;
					$this->load->view('payment', $data);
				}// end of if($user_data['email_verified'] == 0)
			}// end of if(count($user_data) > 0)
			else
			{
				$data['msg_title'] = lang('registration');
				$data['msg_type'] = 'fail';
				$data['msg_text'] = lang('msg_no_user_found');
				$this->load->view('general_message', $data);
			}// end of else of if(count($user_data) > 0)
		}// end of public function confirm_email($md5_email)
		
		public function cancel_account($md5_email)
		{
			$md5_email = rawurldecode($md5_email);
			$this->load->model('user_profiles', 'up');
			$user_data = $this->up->get_user_by_md5_email($md5_email);
			if(count($user_data) > 0)
			{
				if($user_data['email_verified'] == 0)
				{
					$user_id = $user_data['user_id'];
					$this->up->delete($user_id);
					
					$data['msg_title'] = lang('registration');
					$data['msg_type'] = 'success';
					$data['msg_text'] = lang('msg_account_cancel');
					$this->load->view('general_message', $data);
				}
				else
				{
					$data['msg_title'] = lang('registration');
					$data['msg_type'] = 'fail';
					$data['msg_text'] = lang('msg_account_cancel_verified');
					$this->load->view('general_message', $data);
				}// end of if($user_data['email_verified'] == 0)
			}// end of if(count($user_data) > 0)
			else
			{
				$data['msg_title'] = lang('registration');
				$data['msg_type'] = 'fail';
				$data['msg_text'] = lang('msg_no_user_found');
				$this->load->view('general_message', $data);
			}// end of else of if(count($user_data) > 0)
		}// end of public function cancel_account($md5_email)
		
		public function resend_email($md5_email)
		{
			$md5_email = rawurldecode($md5_email);
			$this->load->model('user_profiles', 'up');
			$user_data = $this->up->get_user_by_md5_email($md5_email);
			if(count($user_data) > 0)
			{
				$user_id = $user_data['user_id'];
				if($user_data['email_verified'] == 0)
				{
					// Now we shall resend the confirmation email
					$mail_to = $user_data['email'];
					$mail_subject = lang('mail_subject_confirm_email');
					$mail_body_data = array(
												'first_name' => $user_data['first_name'],
												'last_name' => $user_data['last_name'],
												'email' => $user_data['email']
											);
					// Now loading the email library
					$this->load->library('email');
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$this->email->from('info@visionclab.com', 'Vision Clab');
					$this->email->to($mail_to);
					$this->email->subject($mail_subject);
					
					$message = $this->load->view('mail_confirm_email', $mail_body_data, TRUE); 
					$this->email->message($message);
					
					if($this->email->send())
					{					
						redirect('/user/registration_success/'.md5($user_id));
					}// end of if($this->email->send())
					else
					{
						// setting the error message
						$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_email_send_fail'). show_error($this->email->print_debugger()) .'</div>';
						$this->load->view('registration_success', $data);
					}// end of else of if($this->email->send())
				}// end of if($user_data['email_verified'] == 0)
				else
				{
					$data['msg_title'] = lang('registration');
					$data['msg_type'] = 'fail';
					$data['msg_text'] = lang('msg_account_already_verified');
					$this->load->view('general_message', $data);
				}// end of else of if($user_data['email_verified'] == 0)
			}// end of if(count($user_data) > 0)
			else
			{
				$data['msg_title'] = lang('registration');
				$data['msg_type'] = 'fail';
				$data['msg_text'] = lang('msg_no_user_found');
				$this->load->view('general_message', $data);
			}// end of else of if(count($user_data) > 0)
		}// end of public function resend_email($md5_email)
		
		public function update_email($md5_email)
		{
			$md5_email = rawurldecode($md5_email);
			$this->load->model('user_profiles', 'up');
			$user_data = $this->up->get_user_by_md5_email($md5_email);
			if(count($user_data) > 0)
			{
				if($user_data['email_verified'] == 0)
				{
					$this->load->helper('MY_form_helper');
					$this->load->helper('form');
					$this->load->library('form_validation');
					$this->load->database();
					
					$this->form_validation->set_error_delimiters('<div style="font-weight:bold;color:#FF0000;">', '</div>');
					$data['form_submit_message'] = '';
					
					// Now setting the validation rules
					$this->form_validation->set_rules('email', lang('email'), 'required|valid_email|is_unique[user_profiles.email]');
					if ($this->form_validation->run() == FALSE)
					{
					}// end of if ($this->form_validation->run() == FALSE)
					else
					{
						$user_id = $user_data['user_id'];
						$user_data_update['email'] = $this->input->post('email');
						$this->up->update($user_id, $user_data_update);
						
						// Now we shall resend the confirmation email
						$mail_to = $user_data_update['email'];
						$mail_subject = lang('mail_subject_confirm_email');
						$mail_body_data = array(
													'first_name' => $user_data['first_name'],
													'last_name' => $user_data['last_name'],
													'email' => $user_data_update['email']
												);
						// Now loading the email library
						$this->load->library('email');
						$config['mailtype'] = 'html';
						$this->email->initialize($config);
						
						$this->email->from('info@visionclab.com', 'Vision Clab');
						$this->email->to($mail_to);
						$this->email->subject($mail_subject);
						
						$message = $this->load->view('mail_confirm_email', $mail_body_data, TRUE); 
						$this->email->message($message);
						
						if($this->email->send())
						{					
							redirect('/user/registration_success/'.md5($user_id));
						}// end of if($this->email->send())
						else
						{
							// setting the error message
							$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_email_send_fail'). show_error($this->email->print_debugger()) .'</div>';
							$this->load->view('registration_success', $data);
						}// end of else of if($this->email->send())
					}// end of else of if ($this->form_validation->run() == FALSE)
				}// end of if($user_data['email_verified'] == 0)
				else
				{
					$data['msg_title'] = lang('registration');
					$data['msg_type'] = 'fail';
					$data['msg_text'] = lang('msg_account_already_verified');
					$this->load->view('general_message', $data);
				}// end of else of if($user_data['email_verified'] == 0)
			}// end of if(count($user_data) > 0)
			else
			{
				$data['msg_title'] = lang('registration');
				$data['msg_type'] = 'fail';
				$data['msg_text'] = lang('msg_no_user_found');
				$this->load->view('general_message', $data);
			}// end of else of if(count($user_data) > 0)
		}// end of public function update_email($md5_email)
		
		public function login($login_required = null)
		{
			$this->load->helper('MY_form_helper');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('<div style="font-weight:bold;color:#FF0000;">', '</div>');
			$data['form_submit_message'] = '';
			
			if($login_required != NULL)
			{
				$data['form_submit_message'] = '<div style="color:#FF0000; font-weight:bold;">'.lang('msg_login_first').'</div>';
			}// end of if($login_required != NULL)
			
			$this->form_validation->set_rules('login', lang('your_username'), 'required');
			$this->form_validation->set_rules('password', lang('password'), 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				
			}
			else
			{
				$this->load->model('user_profiles', 'up');
				$login = $this->input->post('login');
				$password = $this->input->post('password');
				$user_data = $this->up->login($login, $password);
				if(count($user_data) > 0)
				{
					if($user_data['email_verified'] == 0)
					{
						$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_email_not_confirm').'</div>';
					}// end of if($user_data['email_verified'] == 0)
					else
					{
						if($user_data['status'] == 0)
						{
							// means the user has not paid and is trying to login
							$user_id = $user_data['user_id'];
							$user_data_update['email_verified'] = 1;
							$this->up->update($user_id, $user_data_update);
							
							$data['msg_title'] = lang('registration');
							$data['msg_type'] = 'success';
							$data['msg_text'] = lang('msg_account_confirm');
							$data['email'] = md5($user_data['email']);
							$this->load->view('payment', $data);
						}
						else
						{
							// Now we shall login the user and set the session variables
							unset($user_data['status']);
							unset($user_data['email_verified']);
							$this->session->set_userdata($user_data);
							
							// updating the last login
							$last_login_on = array(
													'last_login_on' => date('Y-m-d H:i:s')
													);
							$this->up->update($user_data['user_id'], $last_login_on);
							redirect('/user/cabinet');
						}
					}// end of else of if($user_data['email_verified'] == 0)
				}// end of if(count($user_data) > 0)
				else
				{
					$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_no_user_found').'</div>';
				}// end of else of if(count($user_data) > 0)
			}
			
			$this->load->view('login', $data);
		}// end of public function login($login_required = null)
		
		public function logout()
		{
			$this->session->sess_destroy();
			redirect('/user/login');
		}// end of public function logout()
		
		public function cabinet($id=NULL)
		{
                        
			$this->login_check();
			$data['ownlogin']=$this->session->userdata('login');
                        if($id){
                            $data['ownlogin'] = $id;
                        }
			$query = $this->db->query('SELECT * FROM user_profiles WHERE login="'.$data['ownlogin'].'";');
			$row = $query->row_array();
			$data['sponsor']=$row['sponsor_login'];
			$data['mylogin']=$data['ownlogin'];
			$data['balance']=$row['credit'];
			$query = $this->db->query('SELECT * FROM global_matrix WHERE login_id="'.$row['user_id'].'";');
			$row = $query->row_array();
			if (!empty($row['pay_date'])){
			$data['pay_day']=$row['pay_date'];
			}
                        //test
                        $this->load->model('User_Profiles','us');
                        $data['is_admin']=$this->us->is_admin($data['ownlogin']);
                        $data['is_in_globalmatrix'] = $this->us->is_in_globalmatrix($data['ownlogin']);
                        $data['glob_butt_check'] = "";
                        if($data['is_admin'] == true){
                            if($data['is_in_globalmatrix'] == true){
                            $data['glob_butt_check'] = "<li><a href=\"/user/addtoglobalmatrix\">Add to Global Matrix</a></li>";
                            }
                        }
			$this->load->view('cabinet',$data);
		}// end of public function cabinet()
		
		public function change_fin_password()
		{
			$this->login_check();
			$user_id = $this->session->userdata('user_id');
			$this->load->helper('MY_form_helper');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('<div style="font-weight:bold;color:#FF0000;">', '</div>');
			$data['form_submit_message'] = '';
			
			$this->form_validation->set_rules('fin_password', lang('current_financial_password'), 'required');
			$this->form_validation->set_rules('new_fin_password', lang('new_financial_password'), 'required|matches[confirm_fin_password]');
			$this->form_validation->set_rules('confirm_fin_password', lang('repeat_new_password_financial'), 'required');
			$this->form_validation->set_rules('password', lang('password_entry'), 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
			}
			else
			{
				$this->load->model('user_profiles', 'up');
				$fin_password = $this->input->post('fin_password');
				$new_fin_password = $this->input->post('new_fin_password');
				$password = $this->input->post('password');
				if(!$this->up->fin_password_check($fin_password, $user_id))
					$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('current_financial_password').' '.lang('msg_is_incorrect').'</div>';
				else
				{
					if(!$this->up->password_check($password, $user_id))
						$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('password_entry').' '.lang('msg_is_incorrect').'</div>';
					else
					{
						// Now we shall save the data to fin_password_change
						$email = $this->session->userdata('email');
						$requested_on = date('Y-m-d H:i:s');
						$special_part = md5($email.$requested_on);
						$fin_password_change_data = array(
															'user_id' => $user_id,
															'email' => $email,
															'requested_on' => $requested_on,
															'special_part' => $special_part,
															'password' => md5($new_fin_password)
															);
						$this->load->model('fin_password_change', 'fpc');
						$this->fpc->add($fin_password_change_data);
						
						// now will send email to user for confirmation
						$mail_to = $this->session->userdata('email');
						$mail_subject = lang('mail_subject_fin_password_change');
						$mail_body_data = array(
													'first_name' => $this->session->userdata('first_name'),
													'last_name' => $this->session->userdata('last_name'),
													'special_part' => $special_part
												);
						// Now loading the email library
						$this->load->library('email');
						$config['mailtype'] = 'html';
						$this->email->initialize($config);
						
						$this->email->from('info@visionclab.com', 'Vision Clab');
						$this->email->to($mail_to);
						$this->email->subject($mail_subject);
						
						$message = $this->load->view('mail_confirm_fin_password_change', $mail_body_data, TRUE); 
						$this->email->message($message);
						
						if($this->email->send())
						{
							// setting the success message
							$data['form_submit_message'] = '<div style="font-weight:bold;color:#0000FF;">'.lang('msg_change_request_email_sent').'</div>';
						}// end of if($this->email->send())
						else
						{
							// setting the error message
							$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_change_request_email_sent_fail'). show_error($this->email->print_debugger()) .'</div>';
						}// end of else of if($this->email->send())
					}
				}
			}
			
			$this->load->view('change_fin_parol', $data);
		}// end of public function change_fin_password()
		
		public function change_password()
		{
			$this->login_check();
			$user_id = $this->session->userdata('user_id');
			$this->load->helper('MY_form_helper');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('<div style="font-weight:bold;color:#FF0000;">', '</div>');
			$data['form_submit_message'] = '';
			
			$this->form_validation->set_rules('current_password', lang('current_password'), 'required');
			$this->form_validation->set_rules('password', lang('new_password'), 'required|matches[confirm_password]');
			$this->form_validation->set_rules('confirm_password', lang('repeat_new_password'), 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
			}
			else
			{
				$this->load->model('user_profiles', 'up');
				//$fin_password = $this->input->post('fin_password');
				$current_password = $this->input->post('current_password');
				$password = $this->input->post('password');
				
				if(!$this->up->password_check($current_password, $user_id))
					$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('password_entry').' '.lang('msg_is_incorrect').'</div>';
				else
				{
					// Now we shall save the data to fin_password_change
					$user_data_update['password'] = md5($password);
					$this->up->update($user_id, $user_data_update);
					$data['form_submit_message'] = '<div style="font-weight:bold;color:#0000FF;">'.lang('msg_password_change_success').'</div>';
					/*
					$email = $this->session->userdata('email');
					$requested_on = date('Y-m-d H:i:s');
					$special_part = md5($email.$requested_on);
					$fin_password_change_data = array(
														'user_id' => $user_id,
														'email' => $email,
														'requested_on' => $requested_on,
														'special_part' => $special_part,
														'password' => md5($new_fin_password)
														);
					$this->load->model('fin_password_change', 'fpc');
					$this->fpc->add($fin_password_change_data);
					
					// now will send email to user for confirmation
					$mail_to = $this->session->userdata('email');
					$mail_subject = lang('mail_subject_fin_password_change');
					$mail_body_data = array(
												'first_name' => $this->session->userdata('first_name'),
												'last_name' => $this->session->userdata('last_name'),
												'special_part' => $special_part
											);
					// Now loading the email library
					$this->load->library('email');
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$this->email->from('info@visionclab.com', 'Vision Clab');
					$this->email->to($mail_to);
					$this->email->subject($mail_subject);
					
					$message = $this->load->view('mail_confirm_fin_password_change', $mail_body_data, TRUE); 
					$this->email->message($message);
					
					if($this->email->send())
					{
						// setting the success message
						$data['form_submit_message'] = '<div style="font-weight:bold;color:#0000FF;">'.lang('msg_change_request_email_sent').'</div>';
					}// end of if($this->email->send())
					else
					{
						// setting the error message
						$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_change_request_email_sent_fail'). show_error($this->email->print_debugger()) .'</div>';
					}// end of else of if($this->email->send())
					*/
				}
			}
			
			$this->load->view('change_parol', $data);
		}// end of public function change_password()
		
		public function create_reward_array($limit, $matrix_users, $added_user)
		{
			$matrix_element_counter = 0;
			$my_matrix_array = array();
			for($i = 0; $i <= $limit; $i++)
			{
				$number_of_stars = pow(2, $i);
				$string = '';
				for($j=1; $j<=$number_of_stars; $j++)
				{
					if(array_key_exists(($matrix_element_counter), $matrix_users))
					{
						if($added_user == $matrix_users[$matrix_element_counter]['login'])
						{
							$added_user_index = $matrix_element_counter;
							$element = array();
							while($added_user_index != 0)
							{
								if(($added_user_index % 2) != 0)
									$added_user_index = $added_user_index+1;
								$added_user_index = $added_user_index/2;
								$added_user_index = $added_user_index-1;
								$element[] = $added_user_index;
							}
							
							for($a=0;$a<count($element);$a++)
							{
								if(array_key_exists($element[$a], $matrix_users))
								{
									$key = $element[$a];
									$my_matrix_array[$a] = $matrix_users[$key]['login'];
								}
							}
						}
					}
					$matrix_element_counter++;
				}
			}
			return $my_matrix_array;
		}// end of public function create_reward_array($limit, $matrix_users, $added_user)
		
		public function update_m1_users($added_user_login, $added_user_id)
		{
			$this->load->model('user_profiles', 'up');
			$matrix_users = $this->up->users_in_m2();
			$total_users = count($matrix_users);
			$limit = 0;
			for($i=0; $i<$total_users; $i++)
			{
				$limit = $limit + pow(2, $i);
				if($limit >= $total_users)
				{
					$limit = $i;
					break;
				}
			}
			$reward_users_array = $this->create_reward_array($limit, $matrix_users, $added_user_login);
			$parent_count = 0;
			for($i=0;$i<count($reward_users_array);$i++)
			{
				if($parent_count < 2)
				{
					$parent_count++;
				}// end of if($parent_count < 2)
			}// end of for($i=0;$i<count($reward_users_array);$i++)
		}// end of public function update_m1_users($added_user_login, $added_user_id)
		
		public function update_m2_users($added_user_login, $added_user_id)
		{
			$this->load->model('user_profiles', 'up');
			$matrix_users = $this->up->users_in_m2();
			$total_users = count($matrix_users);
			$limit = 0;
			for($i=0; $i<$total_users; $i++)
			{
				$limit = $limit + pow(2, $i);
				if($limit >= $total_users)
				{
					$limit = $i;
					break;
				}
			}
			$reward_users_array = $this->create_reward_array($limit, $matrix_users, $added_user_login);
			$parent_count = 0;
			for($i=0;$i<count($reward_users_array);$i++)
			{
				if($parent_count < 2)
				{
					// only immeidate 2 parents can get $750
					$immidiate_parrent_data = $this->up->get_user_by_login($reward_users_array[$parent_count]);
					$current_m2_data = $this->up->get_m2_data($immidiate_parrent_data->user_id);
					if(($current_m2_data->users_added == 0 && $current_m2_data->lines_added == 0) || ($current_m2_data->users_added == 2 && $current_m2_data->lines_added == 1))
					{
						
						$this->up->update_m2($immidiate_parrent_data->user_id, 1, 1);
						// also give him the reward on adding a new line
						// defined m2_reward_amount in the /config/constants.php file
						if($current_m2_data->users_added == 2)
						{
							$this->up->add_reward_balance($reward_users_array[$parent_count], m2_reward_amount);
							
							
// re-invest in m1
							//if(array_key_exists(1, $reward_users_array))
							//{
								$parent_data = $this->up->get_user_by_login($reward_users_array[1]);
								$parent_data_array = get_object_vars($parent_data);
								$parent_data_array['login'] = $parent_data_array['login'].'_reinvest_m1_1';
								$parent_data_array['credit'] = 0;
								$parent_data_array['parent_id'] = $parent_data_array['user_id'];
								unset($parent_data_array['user_id']);
								$reinvest_user_id_m1 = $this->up->add($parent_data_array);
								// now add the new dummy user to m1
							$this->up->add_to_m1($reinvest_user_id_m1);
							//}
							// end of re-invest to m1
							
				
						}
					}
					else
					{
						if($current_m2_data->users_added < 6)
							$this->up->update_m2($immidiate_parrent_data->user_id, 0, 1);
					}
					$parent_count++;
				}// end of if($parent_count < 2)
			}// end of for($i=0;$i<count($reward_users_array);$i++)
			
			// working for m3
			// first check if the parent exists
			if(array_key_exists(1, $reward_users_array))
			{
				// Now Check if the parent has 6 users and 2 lines
				$parrent_data = $this->up->get_user_by_login($reward_users_array[1]);
				$parent_m2_data = $this->up->get_m2_data($parrent_data->user_id);
				
				// check to see if the user is set to join m3
				if($parent_m2_data->lines_added == 2 && $parent_m2_data->users_added == 6 && !$this->up->is_user_in_m3($parent_m1_data->login_id))
				{
					// means the user is all set to join m3
					// add parent to m3
					$this->up->add_to_m3($parrent_data->user_id);
					// give the user bonus for joining m3
					$this->up->add_reward_balance($reward_users_array[1], m3_joining_bonus);
					// update the m3 table
					$this->update_m3_users($reward_users_array[1], $parent_m3_data->login_id);
					
					// give the reward to the sponsor
					$this->up->add_reward_balance($parrent_data->sponsor_login, m3_joining_reward_sponsor);
				}// end of if($parent_m2_data->lines_added == 2 && $parent_m2_data->users_added == 6 && !$this->up->is_user_in_m3($parent_m1_data->login_id))
			}// end of if(array_key_exists(1, $reward_users_array))
			// end of working for m3
		}// end of public function update_m2_users($added_user_login, $added_user_id)
		
		public function update_m3_users($added_user_login, $added_user_id)
		{
			$this->load->model('user_profiles', 'up');
			$matrix_users = $this->up->users_in_m3();
			$total_users = count($matrix_users);
			$limit = 0;
			for($i=0; $i<$total_users; $i++)
			{
				$limit = $limit + pow(2, $i);
				if($limit >= $total_users)
				{
					$limit = $i;
					break;
				}
			}
			$reward_users_array = $this->create_reward_array($limit, $matrix_users, $added_user_login);
			$parent_count = 0;
			for($i=0;$i<count($reward_users_array);$i++)
			{
				if($parent_count < 2)
				{
					// only immeidate 2 parents can get $750
					$immidiate_parrent_data = $this->up->get_user_by_login($reward_users_array[$parent_count]);
					$current_m3_data = $this->up->get_m3_data($immidiate_parrent_data->user_id);
					if(($current_m3_data->users_added == 0 && $current_m3_data->lines_added == 0) || ($current_m3_data->users_added == 2 && $current_m3_data->lines_added == 1))
					{
						$this->up->update_m3($immidiate_parrent_data->user_id, 1, 1);
						// also give him the reward on adding a new line
						// defined m3_reward_amount in the /config/constants.php file
						if($current_m3_data->users_added == 2)
						{
							$this->up->add_reward_balance($reward_users_array[$parent_count], m3_reward_amount);
							// re-invest 2 in m1 and 1 in m2
							if(array_key_exists(1, $reward_users_array))
							{
								$parent_data = $this->up->get_user_by_login($reward_users_array[1]);
								$parent_data_array = get_object_vars($parent_data);
								$parent_data_array['login'] = $parent_data_array['login'].'_reinvest_m1_2';
								$parent_data_array['credit'] = 0;
								$parent_data_array['parent_id'] = $parent_data_array['user_id'];
								unset($parent_data_array['user_id']);
								$reinvest_user_id_m1 = $this->up->add($parent_data_array);
								// now add the new dummy user to m1
								$this->up->add_to_m1($reinvest_user_id_m1);
								
								// 2nd re-invest in m1
								$parent_data_array['login'] = $parent_data_array['login'].'_reinvest_m1_3';
								$reinvest_user_id_m1_1 = $this->up->add($parent_data_array);
								// now add the new dummy user to m2
								$this->up->add_to_m1($reinvest_user_id_m1_1);
								
								
								// now re-invest in m2
								$parent_data_array['login'] = $parent_data_array['login'].'_reinvest_m2_1';
								$reinvest_user_id_m2 = $this->up->add($parent_data_array);
								// now add the new dummy user to m2
								$this->up->add_to_m1($reinvest_user_id_m2);
							}
							// end of re-invest to m1 and m2
						}
					}
					else
					{
						if($current_m3_data->users_added < 6)
							$this->up->update_m3($immidiate_parrent_data->user_id, 0, 1);
					}
					$parent_count++;
				}// end of if($parent_count < 2)
			}// end of for($i=0;$i<count($reward_users_array);$i++)
			
			// working for m4
			// first check if the parent exists
			if(array_key_exists(1, $reward_users_array))
			{
				// Now Check if the parent has 6 users and 2 lines
				$parrent_data = $this->up->get_user_by_login($reward_users_array[1]);
				$parent_m3_data = $this->up->get_m3_data($parrent_data->user_id);
				
				// check to see if the user is set to join m4
				if($parent_m3_data->lines_added == 2 && $parent_m3_data->users_added == 6 && !$this->up->is_user_in_m4($parent_m1_data->login_id))
				{
					// means the user is all set to join m3
					// add parent to m3
					$this->up->add_to_m4($parrent_data->user_id);
					// give the user bonus for joining m4
					$this->up->add_reward_balance($reward_users_array[1], m4_joining_bonus);
					// update the m4 table
					//$this->update_m4_users($reward_users_array[1], $parent_m3_data->login_id);
				}// end of if($parent_m3_data->lines_added == 2 && $parent_m3_data->users_added == 6 && !$this->up->is_user_in_m4($parent_m1_data->login_id))
			}// end of if(array_key_exists(1, $reward_users_array))
			// end of working for m4
		}// end of public function update_m3_users($added_user_login, $added_user_id)
		
		public function update_m4_users($added_user_login, $added_user_id)
		{
		}// end of public function update_m4_users($added_user_login, $added_user_id)
		
		public function addtoglobalmatrix($user_id)
		{
			$this->load->model('user_profiles', 'up');
			// adding to the global matrix table
			$this->up->add_to_globalmatrix($user_id);
			// update the in_global_matrix field
			$user_data_update['in_global_matrix'] = 1;
			$this->up->update($user_id, $user_data_update);
			// adding to the m1 table
			$this->up->add_to_m1($user_id);
			
			$matrix_users = $this->up->users_in_global_matrix();
			
			$total_users = count($matrix_users);
			$limit = 0;
			for($i=0; $i<$total_users; $i++)
			{
				$limit = $limit + pow(2, $i);
				if($limit >= $total_users)
				{
					$limit = $i;
					break;
				}
			}
			$added_user_data = $this->up->get_user_by_id($user_id);
			$reward_users_array = $this->create_reward_array($limit, $matrix_users, $added_user_data->login);
			$reward_array = $this->up->get_rewards_array();
			$m1_parent_count = 0;
			for($i=0;$i<count($reward_users_array);$i++)
			{
				//echo $reward_users_array[$i].' --> '.$reward_array[$i]['reward'];
				//echo '<br/>';
				$this->up->add_reward_balance($reward_users_array[$i], $reward_array[$i]['reward']);
				if($m1_parent_count < 2)
				{
					// only immeidate 2 parents can get $750
					$immidiate_parrent_data = $this->up->get_user_by_login($reward_users_array[$m1_parent_count]);
					$current_m1_data = $this->up->get_m1_data($immidiate_parrent_data->user_id);
					//print_r($current_m1_data);
					
					// m1 specific rewarding
					
					if(($current_m1_data->users_added == 0 && $current_m1_data->lines_added == 0) || ($current_m1_data->users_added == 2 && $current_m1_data->lines_added == 1))
					{
						$this->up->update_m1($immidiate_parrent_data->user_id, 1, 1);
						// also give him the reward on adding a new line
						// defined m1_reward_amount in the /config/constants.php file
						if($current_m1_data->users_added == 2 )
							$this->up->add_reward_balance($reward_users_array[$m1_parent_count], m1_reward_amount);
					}
					else
					{
						if($current_m1_data->users_added < 6)
							$this->up->update_m1($immidiate_parrent_data->user_id, 0, 1);
					}
					$m1_parent_count++;
				}// end of if($m1_parent_count < 2)
			}// end of for($i=0;$i<count($reward_users_array);$i++)
			
			// Working for m2
			// get users from m1
			$m1_users = $this->up->users_in_m1();
			
			$total_users_m1 = count($m1_users);
			$limit_m1 = 0;
			for($i=0; $i<$total_users_m1; $i++)
			{
				$limit_m1 = $limit_m1 + pow(2, $i);
				if($limit_m1 >= $total_users_m1)
				{
					$limit_m1 = $i;
					break;
				}
			}
			$reward_users_array_m1 = $this->create_reward_array($limit_m1, $m1_users, $added_user_data->login);
			print_r($reward_users_array_m1);
			// first check if the parent exists
			if(array_key_exists(1, $reward_users_array_m1))
			{
				// Now Check if the parent has 6 users and 2 lines
				$parrent_data = $this->up->get_user_by_login($reward_users_array_m1[1]);
				$parent_m1_data = $this->up->get_m1_data($parrent_data->user_id);
				
				// check to see if the user is set to join m2
				if($parent_m1_data->lines_added == 2 /* && $parent_m1_data->users_added == 6 */ && !$this->up->is_user_in_m2($parent_m1_data->login_id))
				{
					echo "YES!";
					// means the user is all set to join m2
					// add parent to m2
					$this->up->add_to_m2($parent_m1_data->login_id);
					// give the user bonus for joining m2
					$this->up->add_reward_balance($reward_users_array_m1[1], m2_joining_bonus);
					// update the m2 table
					$this->update_m2_users($reward_users_array_m1[1], $parent_m1_data->login_id);
				}// end of if($parent_m1_data->lines_added == 2 && $parent_m1_data->users_added == 6 && !$this->up->is_user_in_m2($parent_m1_data->login_id))
			}// end of if(array_key_exists(1, $reward_users_array_m1))
			// End of m2 working
			//redirect('/admin/user_list/','refresh');
		}// end of public function addtoglobalmatrix($user_id)
		
		public function complete_payment($program, $user_id)
		{
			$program = rawurldecode($program);
			$user_id = rawurldecode($user_id);
			$this->load->model('user_profiles', 'up');
			// adding to the global matrix table
			$this->up->add_to_globalmatrix($user_id);
			// update the in_global_matrix field
			$user_data_update['in_global_matrix'] = 1;
			$this->up->update($user_id, $user_data_update);
			// adding to the m1 table
			$this->up->add_to_m1($user_id);
			
			$matrix_users = $this->up->users_in_global_matrix();
			
			$total_users = count($matrix_users);
			$limit = 0;
			for($i=0; $i<$total_users; $i++)
			{
				$limit = $limit + pow(2, $i);
				if($limit >= $total_users)
				{
					$limit = $i;
					break;
				}
			}
			$added_user_data = $this->up->get_user_by_id($user_id);
			$reward_users_array = $this->create_reward_array($limit, $matrix_users, $added_user_data->login);
			$reward_array = $this->up->get_rewards_array();
			$m1_parent_count = 0;
			for($i=0;$i<count($reward_users_array);$i++)
			{
				//echo $reward_users_array[$i].' --> '.$reward_array[$i]['reward'];
				//echo '<br/>';
				$this->up->add_reward_balance($reward_users_array[$i], $reward_array[$i]['reward']);
				if($m1_parent_count < 2)
				{
					// only immeidate 2 parents can get $750
					$immidiate_parrent_data = $this->up->get_user_by_login($reward_users_array[$m1_parent_count]);
					$current_m1_data = $this->up->get_m1_data($immidiate_parrent_data->user_id);
					//print_r($current_m1_data);
					
					// m1 specific rewarding
					
					if(($current_m1_data->users_added == 0 && $current_m1_data->lines_added == 0) || ($current_m1_data->users_added == 2 && $current_m1_data->lines_added == 1))
					{
						$this->up->update_m1($immidiate_parrent_data->user_id, 1, 1);
						// also give him the reward on adding a new line
						// defined m1_reward_amount in the /config/constants.php file
						if($current_m1_data->users_added == 2 )
							$this->up->add_reward_balance($reward_users_array[$m1_parent_count], m1_reward_amount);
					}
					else
					{
						if($current_m1_data->users_added < 6)
							$this->up->update_m1($immidiate_parrent_data->user_id, 0, 1);
					}
					$m1_parent_count++;
				}// end of if($m1_parent_count < 2)
			}// end of for($i=0;$i<count($reward_users_array);$i++)
			
			// Working for m2
			// get users from m1
			$m1_users = $this->up->users_in_m1();
			
			$total_users_m1 = count($m1_users);
			$limit_m1 = 0;
			for($i=0; $i<$total_users_m1; $i++)
			{
				$limit_m1 = $limit_m1 + pow(2, $i);
				if($limit_m1 >= $total_users_m1)
				{
					$limit_m1 = $i;
					break;
				}
			}
			$reward_users_array_m1 = $this->create_reward_array($limit_m1, $m1_users, $added_user_data->login);
			print_r($reward_users_array_m1);
			// first check if the parent exists
			if(array_key_exists(1, $reward_users_array_m1))
			{
				// Now Check if the parent has 6 users and 2 lines
				$parrent_data = $this->up->get_user_by_login($reward_users_array_m1[1]);
				$parent_m1_data = $this->up->get_m1_data($parrent_data->user_id);
				
				// check to see if the user is set to join m2
				if($parent_m1_data->lines_added == 2 /* && $parent_m1_data->users_added == 6 */ && !$this->up->is_user_in_m2($parent_m1_data->login_id))
				{
					echo "YES!";
					// means the user is all set to join m2
					// add parent to m2
					$this->up->add_to_m2($parent_m1_data->login_id);
					// give the user bonus for joining m2
					$this->up->add_reward_balance($reward_users_array_m1[1], m2_joining_bonus);
					// update the m2 table
					$this->update_m2_users($reward_users_array_m1[1], $parent_m1_data->login_id);
				}// end of if($parent_m1_data->lines_added == 2 && $parent_m1_data->users_added == 6 && !$this->up->is_user_in_m2($parent_m1_data->login_id))
			}// end of if(array_key_exists(1, $reward_users_array_m1))
			// End of m2 working
			redirect('/user/cabinet/','refresh');
		}// end of public function complete_payment($user_id)
		
		public function change_fin_system()
		{
			$this->login_check();
			$user_id = $this->session->userdata('user_id');
			
			$this->load->model('user_profiles', 'up');
			$data = $this->up->get_fin_system($user_id);
			
			$this->load->helper('MY_form_helper');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('<div style="font-weight:bold;color:#FF0000;">', '</div>');
			$data['form_submit_message'] = '';
			
			$this->form_validation->set_rules('fin_password', lang('current_financial_password'), 'required');
			$this->form_validation->set_rules('ok_pay_wallet', lang('okpay_wallet'), 'required');
			$this->form_validation->set_rules('pm_wallet', lang('pm_wallet'), 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
			}
			else
			{
				$fin_password = $this->input->post('fin_password');
				if(!$this->up->fin_password_check($fin_password, $user_id))
					$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('current_financial_password').' '.lang('msg_is_incorrect').'</div>';
				else
				{
					// get the users current payment system
					$ok_pay_wallet = '';
					$pm_wallet = '';
					if($data['ok_pay_wallet'] != $this->input->post('ok_pay_wallet'))
						$ok_pay_wallet = $this->input->post('ok_pay_wallet');
					if($data['pm_wallet'] != $this->input->post('pm_wallet'))
						$pm_wallet = $this->input->post('pm_wallet');
					
					// Now we shall save the data to fin_password_change
						$email = $this->session->userdata('email');
						$requested_on = date('Y-m-d H:i:s');
						$special_part = md5($email.$requested_on);
						$fin_system_change_data = array(
															'user_id' => $user_id,
															'email' => $email,
															'requested_on' => $requested_on,
															'ok_pay_wallet' => $ok_pay_wallet,
															'pm_wallet' => $pm_wallet,
															'special_part' => $special_part
															);
						$this->load->model('fin_system_change', 'fsc');
						$this->fsc->add($fin_system_change_data);
						
						if(trim($ok_pay_wallet) != '' || trim($pm_wallet) != '')
						{
							// now will send email to user for confirmation
							$mail_to = $this->session->userdata('email');
							$mail_subject = lang('mail_subject_fin_system_change');
							$mail_body_data = array(
														'first_name' => $this->session->userdata('first_name'),
														'last_name' => $this->session->userdata('last_name'),
														'ok_pay_wallet' => $ok_pay_wallet,
														'pm_wallet' => $pm_wallet,
														'special_part' => $special_part
													);
							// Now loading the email library
							$this->load->library('email');
							$config['mailtype'] = 'html';
							$this->email->initialize($config);
							
							$this->email->from('info@visionclab.com', 'Vision Clab');
							$this->email->to($mail_to);
							$this->email->subject($mail_subject);
							
							$message = $this->load->view('mail_confirm_fin_system_change', $mail_body_data, TRUE); 
							$this->email->message($message);
							
							if($this->email->send())
							{
								// setting the success message
								$data['form_submit_message'] = '<div style="font-weight:bold;color:#0000FF;">'.lang('msg_change_request_email_sent').'</div>';
							}// end of if($this->email->send())
							else
							{
								// setting the error message
								$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_change_request_email_sent_fail'). show_error($this->email->print_debugger()) .'</div>';
							}// end of else of if($this->email->send())
						}// end of if(trim($ok_pay_wallet) != '' || trim($pm_wallet) != '')
						else
						{
							// means no change to the financial system was made
							$data['form_submit_message'] = '<div style="font-weight:bold;color:#0000FF;">'.lang('msg_payment_system_up_to_date').'</div>';
						}// end of else of if(trim($ok_pay_wallet) != '' || trim($pm_wallet) != '')
				}
			}
			
			$this->load->view('change_fin_system', $data);
		}// end of public function change_fin_system()
		
		public function forgot_password()
		{
			$this->load->model('user_profiles', 'up');
			$this->load->helper('MY_form_helper');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('<div style="font-weight:bold;color:#FF0000;">', '</div>');
			$data['form_submit_message'] = '';
			
			$this->form_validation->set_rules('email', lang('email'), 'required|valid_email');
			
			if ($this->form_validation->run() == FALSE)
			{
			}// end of if ($this->form_validation->run() == FALSE)
			else
			{
				$email = $this->input->post('email');
				$user_data = $this->up->get_user_by_email($email);
				if(count($user_data) > 0)
				{
					$special_part = md5($email.date("Y-m-d H:i:s"));
					$special_link = base_url("user/reset_password/$special_part");
					$reset_password_data = array(
													'user_id' => $user_data['user_id'],
													'email' => $email,
													'md5' => $special_part,
													'special_link' => $special_link,
													'requested_on' => date("Y-m-d H:i:s")
												);
					$this->load->model('reset_password');
					$this->reset_password->add($reset_password_data);
					
					// Now will send email
					$mail_to = $this->session->userdata('email');
					$mail_subject = lang('mail_subject_forgot_password');
					$mail_body_data = array(
												'first_name' => $user_data['first_name'],
												'last_name' => $user_data['last_name'],
												'special_part' => $special_part
											);
					// Now loading the email library
					$this->load->library('email');
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$this->email->from('info@visionclab.com', 'Vision Clab');
					$this->email->to($email);
					$this->email->subject($mail_subject);
					
					$message = $this->load->view('mail_forgot_password', $mail_body_data, TRUE); 
					$this->email->message($message);
					
					if($this->email->send())
					{
						// setting the success message
						$data['form_submit_message'] = '<div style="font-weight:bold;color:#0000FF;">'.lang('msg_forgot_password_email_sent').'</div>';
					}// end of if($this->email->send())
					else
					{
						// setting the error message
						$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_change_request_email_sent_fail'). show_error($this->email->print_debugger()) .'</div>';
					}// end of else of if($this->email->send())
				}// end of if(count($user_data) > 0)
				else
				{
					$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_no_user_found').'</div>';
				}
			}// end of else of if ($this->form_validation->run() == FALSE)
			$this->load->view('forgot_password', $data);
		}// end of public function forgot_password()
					
		public function reset_password($special_part)
		{
			$special_part = rawurldecode($special_part);
			$this->load->model('reset_password', 'rp');
			$reset_password_data = $this->rp->get_by_md5($special_part);
			
			$this->load->model('user_profiles', 'up');
			$this->load->helper('MY_form_helper');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('<div style="font-weight:bold;color:#FF0000;">', '</div>');
			$data['form_submit_message'] = '';
			
			$this->form_validation->set_rules('password', lang('new_password'), 'required|matches[confirm_password]');
			$this->form_validation->set_rules('confirm_password', lang('confirm_password'), 'required');
			
			if(count($reset_password_data) > 0)
			{
				if($reset_password_data['status'] == 0)
				{
					if ($this->form_validation->run() == FALSE)
					{
					}// end of if ($this->form_validation->run() == FALSE)
					else
					{
						$request_id = $reset_password_data['request_id'];
						$user_id = $reset_password_data['user_id'];
						$password = md5($this->input->post('password'));
						
						$reset_password_data_updated['status'] = 1;
						$this->rp->update($request_id, $reset_password_data_updated);
						
						$user_data_updated['password'] = $password;
						$this->up->update($user_id, $user_data_updated);
						
						$data['form_submit_message'] = '<div style="font-weight:bold;color:#0000FF;">'.lang('msg_password_updated').'</div>';
					}// end of else of if ($this->form_validation->run() == FALSE)
				}// end of if($reset_password_data['status'] == 0)
				else
				{
					$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_password_reset_used').'</div>';
				}// end of else of if($reset_password_data['status'] == 0)
				$this->load->view('reset_password', $data);
			}
			else
			{
				$data['msg_type'] = 'fail';
				$data['msg_text'] = lang('msg_no_user_found');
				$this->load->view('general_message', $data);
			}
		}// end of public function reset_password($special_part)
		
		public function cancel_reset_password($special_part)
		{
			$data['msg_title'] = lang('reset_password');
			$special_part = rawurldecode($special_part);
			$this->load->model('reset_password', 'rp');
			$reset_password_data = $this->rp->get_by_md5($special_part);
			
			if(count($reset_password_data) > 0)
			{
				if($reset_password_data['status'] == 0)
				{
					$this->rp->delete($reset_password_data['request_id']);
					
					$data['msg_type'] = 'success';
					$data['msg_text'] = lang('msg_password_reset_removed');
					$this->load->view('general_message', $data);
				}// end of if($reset_password_data['status'] == 0)
				else
				{
					$data['msg_type'] = 'fail';
					$data['msg_text'] = lang('msg_password_reset_used');
					$this->load->view('general_message', $data);
				}// end of else of if($reset_password_data['status'] == 0)
			}
			else
			{
				$data['msg_type'] = 'fail';
				$data['msg_text'] = lang('msg_no_user_found');
				$this->load->view('general_message', $data);
			}
		}// end of public function cancel_reset_password($special_part)
		
		public function transfer_balance_to_real_users()
		{
			$this->load->model('user_profiles', 'up');
			$reinvest_users = $this->up->get_reinvest_users();
			foreach($reinvest_users as $reinvest_user)
			{
				// add the credit to the real/parent user
				$this->up->transfer_reward_balance($reinvest_user->parent_id, $reinvest_user->credit);
				// update the balance of the re-invest user to 0
				$user_data['credit'] = 0;
				$this->up->update($reinvest_user->user_id, $user_data);
			}// end of foreach($reinvest_users as $reinvest_user)
		}// end of public function transfer_balance_to_real_users()
		
		public function clearing36h() //function for not payed users
		{
			$deletedate=strtotime(date("Y-m-d H:m:i"))-36*60*60; //calculation date for deleting
			$deletedate=date("Y-m-d H:m:i",$deletedate); //convert datestamp to datetime
			$query = $this->db->query('SELECT * FROM user_profiles WHERE created_on < "'.$deletedate.'" and status="0"');
			foreach ($query->result_array() as $row)
			{
    			$this->db->delete('user_profiles', array('user_id' => $row['user_id'])); 
			}
		} // end of deleting not payed users
                
                
                public function methodpay($progtype,$md5_email){
                    //Program 1
                    $this->load->model('user_profiles', 'up');
                    $user_data = $this->up->get_user_by_md5_email($md5_email);
                    $pmethod = $this->input->post('paymentmethod');
                    $ptype = $this->input->post('type');
                    if(count($user_data) > 1){
                        
                    $uid=$user_data['user_id'];
                    if($progtype == "prog1"){
                        if($pmethod == 1){
                        redirect("/user/okpay_payment/prog1/$ptype/$uid");
                        }
                        else{
                            redirect("/user/perfectmoneypayment/prog1/$ptype/$uid");
                        }
                    }
                    
                    //Program 2
                    else if($progtype == "prog2"){
                        if($pmethod == 1){
                            redirect("/user/okpay_payment/prog2/$ptype/$uid");
                        }else{
                            redirect("/user/perfectmoneypayment/prog1/$ptype/$uid");
                        }
                    }
                    
                    }
                }
                
                public function okpay_payment($prog,$type,$userid){
                    $price = 0;
                    if($prog == "prog1"){
                        $price = 800;
                    }
                    else{
                        switch($type){
                            case 0:
                                $price = 270;
                                break;
                            case 1:
                                $price = 800;
                                break;
                            case 2:
                                $price = 2200;
                                break;
                            case 3:
                                $price = 6200;
                                break;
                            case 4:
                                $price = 17000;
                                break;
                        }
                        
                    }
                   
                    redirect("https://www.okpay.com/process.html?ok_receiver=info@visionclab.com&ok_currency=USD&ok_item_1_name=Subscription&ok_item_1_price=$price&ok_item_1_custom_value=$prog&ok_item_2_custom_value=$userid&ok_item_3_custom_value=$type");
                }
                
                public function perfectmoney($status){
                    //Success
                    if($status == "success"){
                        $user = $this->input->post('USER_ID');
                        $tin = $this->input->post('TRANSACTION_ID');
                        $package = $this->input->post('PACKAGE_TYPE');
                        $query=$this->db->get_where('user_profiles',array('user_id'=>$user));
                        $valid=true;
                        foreach($query->result() as $row){
                            $query2=$this->db->get('transactions');
                            foreach($query2->result() as $row2){
                                if($row2->tin == $tin){
                                    $valid=false;
                                }
                            }
                            
                            if($valid == true){
                                $data=array('user_id'=>$row->user_id,'tin'=>$tin);
                                $this->db->insert('transactions',$data);
                                $date=date("d.m.Y",time());
                                $mon = date("m",strtotime($date));
                                $year = date("Y",strtotime($date));
                                $num = cal_days_in_month(CAL_GREGORIAN, $mon, $year);
                                $data=array('login_id'=>$row->user_id,'date'=>$date,'days'=>$num);
                                $this->db->insert('global_matrix',$data);
                                
                                $data=array('login_id'=>$row->user_id,'type'=>$package);
                                $this->db->insert('dreams_come_true',$data);
                            }
                        }
                        
                        $this->load->view('perfectmoney-success');
                    }
                    //Failure
                    else if($status == "failure"){
                       $this->load->view('perfectmoney-fail');
                    }
                    //check status
                    else{
                        $this->load->view('perfectmoney-stat');
                    }
                }
                
                public function perfectmoneypayment($prog,$type,$userid){
                    $query=$this->db->get('transactions');
                    $lastid=0;
                    foreach($query->result() as $row){
                        $lastid=$row->id;
                    }
                    $lastid++;
                    $tin = 'PM'.rand(0,9) . '' .rand(0,9) . '' .rand(0,9) . '' .rand(0,9) . '' .rand(0,9) . '' .rand(0,9) . '' .rand(0,9) . '' .$lastid;
                    $data=array('program'=>$prog,'type'=>$type,'userid'=>$userid,'tin'=>$tin);
                    if($prog == "prog1"){
                        $price = program1_fee;
                    }
                    else{
                        switch($type){
                            case 0:
                                $price = program2_fee_0;
                                break;
                            case 1:
                                $price = program2_fee_1;
                                break;
                            case 2:
                                $price = program2_fee_2;
                                break;
                            case 3:
                                $price = program2_fee_3;
                                break;
                            case 4:
                                $price = program2_fee_4;
                                break;
                        }
                        
                    }
                    $data['price'] = $price;
                    $this->load->view('perfect-money-payment',$data);
                }
                
                
                
                public function output_finance(){
                    $user_id = $this->session->userdata('user_id');
                    $this->load->model('financemodul');
                    $data=$this->financemodul->load_payment_info($user_id);
                    $this->load->view('output_finance',$data);
                }
                
                public function withdraw_finance(){
                    $user_id = $this->session->userdata('user_id');
                    $this->load->model('financemodul');
                    $amt=$this->input->post('amt');
                    $financial_pass=$this->input->post('financialpass');
                    $financialcheck=$this->financemodul->check_financialpass($user_id,$financial_pass);
                    $creditcheck=$this->financemodul->check_credit($user_id,$amt);
                    $data=array();
                    if($financialcheck == true){
                        if($creditcheck == true){
                            $this->financemodul->add_withdrawal($user_id,$amt);
                        }
                        else{
                            redirect('user/failwithdraw/credit','refresh');
                        }
                    }
                    else{
                        redirect('user/failwithdraw/finance','refresh');
                    }
                }
                
                public function failwithdraw($stat){
                    if($stat == "credit"){
                        $this->load->view('withdraw-cred-fail');
                    }else{
                        $this->load->view('withdraw-financial-fail');
                    }
                }
                
                public function success_withdrawal(){
                     $this->load->view('withdrawal-success');
                }
		
	}// end of class user extends CI_Controller
?>