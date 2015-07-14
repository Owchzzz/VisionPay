<?
	class user extends CI_Controller
	{
		public function register()
		{
			$this->load->helper('MY_form_helper');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->database();
			
			$this->form_validation->set_error_delimiters('<div style="font-weight:bold;color:#FF0000;">', '</div>');
			$data['form_submit_message'] = '';
			
			// Now setting the validation rules
			$this->form_validation->set_rules('first_name', lang('name'), 'required');
			$this->form_validation->set_rules('last_name', lang('family'), 'required');
			$this->form_validation->set_rules('email', lang('email'), 'required|valid_email');
			$this->form_validation->set_rules('phone', lang('phone_number'), 'required');
			//$this->form_validation->set_rules('phone', lang('phone_number'), 'required|regex_match[/^\+\d+$/]');
			$this->form_validation->set_rules('phone', lang('phone_number'), 'required');
			$this->form_validation->set_rules('skype', 'Skype', 'required');
			$this->form_validation->set_rules('country', lang('country'), 'required');
			$this->form_validation->set_rules('city', lang('city'), 'required');
			$this->form_validation->set_rules('street', lang('street'), 'required');
			$this->form_validation->set_rules('house', lang('house'), 'required');
			$this->form_validation->set_rules('post_code', lang('post_code'), 'required');
			$this->form_validation->set_rules('sponsor_login', lang('sponsor_login'), 'required|callback_sponsor_exists');
			$this->form_validation->set_rules('login', lang('your_login'), 'required|is_unique[user_profiles.login]');			
			$this->form_validation->set_rules('password', lang('password'), 'required|matches[confirm_password]');
			$this->form_validation->set_rules('confirm_password', lang('confirm_password'), 'required');
			$this->form_validation->set_rules('ok_pay_wallet', lang('okpay_wallet'), 'required');
			$this->form_validation->set_rules('pm_wallet', lang('pm_wallet'), 'required');
			$this->form_validation->set_rules('check1', '...', 'callback_accept_terms');
			
			$this->form_validation->set_message('regex_match', lang('validate_phone_number'));
			
			if ($this->form_validation->run() == FALSE)
			{
			}
			else
			{
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
	}// end of class user extends CI_Controller
?>