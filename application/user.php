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
                                        $this->load->view('login.php', $data);
					#mail_confirm_email.php
					#$this->load->view('payment', $data);
				}
				else
				{
					$data['msg_title'] = lang('registration');
					$data['msg_type'] = 'fail';
					$data['msg_text'] = lang('msg_account_already_verified');
                                        $data['email'] = $md5_email;
$this->load->view('login.php', $data);					
#$this->load->view('payment', $data);
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
							$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_account_inactive').'</div>';
						}
						else
						{
							// Now we shall login the user and set the session variables
							unset($user_data['status']);
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
		
                public function addtoglobalmatrix($id){
                    $this->load->model('user_profiles');
                    $this->user_profiles->add_to_globalmatrix($id);
                    
                }
                
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
                    $data['price'] = $price;
                    $this->load->view('perfect-money-payment',$data);
                }
                
                
		
	}// end of class user extends CI_Controller
?>
