<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
	
	public function is_login()
	{
		$admin_logged=$this->session->userdata('admin_logged');
		if ($admin_logged != "1"){
			redirect('/admin/login');
		}
	}
	
	public function index()
	{
		$admin_logged=$this->session->userdata('admin_logged');
		if ($admin_logged != "1"){
			redirect('/admin/login');
		}
		$this->load->view('admin-header');
		$this->load->view('admin');
	}
	
	public function login()
	{
		$this->load->view('admin-login');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/admin/login');
	}
	
	public function logging()
	{
		$login=$this->input->post('login');
		$password=$this->input->post('password');
		
		$query = $this->db->query('SELECT value FROM admin_info WHERE name="login" LIMIT 1');
		$row = $query->row_array();
		$login_db=$row['value'];
		
		$query = $this->db->query('SELECT value FROM admin_info WHERE name="password" LIMIT 1');
		$row = $query->row_array();
		$password_db=$row['value'];
		
		if ($login==$login_db and md5($password)==$password_db){
			$newdata = array(
                   'admin_logged'  => '1'
               );
			$this->session->set_userdata($newdata);
			redirect('/admin');
			
		}else{
			redirect('/admin/login');
		}
	}
        
        public function news(){
            $this->output->cache(0);
            $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
            $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
            $this->output->set_header("Pragma: no-cache");
            $this->load->model('newsmodul');
			$this->load->view('admin-header');
            $data['history'] = $this->newsmodul->fetch_news();
            $this->load->view('news-admin',$data);
        }
        
        public function newspost(){
            $this->load->model('newsmodul');
            $content=$this->input->post('content');
            $title=$this->input->post('title');
            $this->newsmodul->create_news($title,$content);
            redirect('admin/news','refresh');
        }
        
        public function newsedit(){
            $this->output->cache(0);
            $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
            $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
            $this->output->set_header("Pragma: no-cache");
            $id=$this->input->get('id');
            $this->load->model('newsmodul');
            $data=$this->newsmodul->fetch_newsid($id);
            $data['id'] = $id;
            
            $this->load->view('editnews-admin',$data); 
        }
        
        public function newseditsave(){
            $id=$this->input->get('id');
            $title=$this->input->post('title');
            $content=$this->input->post('content');
            $this->load->model('newsmodul');
            $this->newsmodul->update_news($id,$title,$content);
            //redirect('admin/news/','refresh');
        }
        
        public function newsdel(){
            $this->load->model('newsmodul');
            $id=$this->input->get('id');
            $this->newsmodul->delete_news($id);
            redirect('admin/news/','refresh');
        }
		
		public function testimonials()
		{
			$this->is_login();
			$this->load->model('testimonials_model', 't');
			$data['testimonials'] = $this->t->get_all();
			$this->load->view('testimonials-admin', $data);
		}// end of public function testimonials()
		
		public function testimonial_set_status($testimonial_id, $status)
		{
			$this->is_login();
			$testimonial_id = rawurldecode($testimonial_id);
			$status = rawurldecode($status);
			$update_data['status'] = $status;
			$this->load->model('testimonials_model', 't');
			$this->t->update($testimonial_id, $update_data);
			redirect('/admin/testimonials','refresh');
		}// end of public function testimonial_set_status($testimonial_id, $status)
		
		public function testimonial_delete($testimonial_id)
		{
			$this->is_login();
			$testimonial_id = rawurldecode($testimonial_id);
			$this->load->model('testimonials_model', 't');
			$this->t->delete($testimonial_id);
			redirect('/admin/testimonials','refresh');
		}// end of public function testimonial_delete($testimonial_id)
		
		public function programs()
		{
			$this->is_login();
			$this->load->model('programs_model', 'p');
			$data['programs'] = $this->p->get_all();
			$this->load->view('programs-admin', $data);
		}// end of public function programs()
		
		public function edit_program($program_id)
		{
			$this->is_login();
			$program_id = rawurldecode($program_id);
			
			$this->load->helper('MY_form_helper');
			$this->load->helper('form');
			
			$this->load->model('programs_model', 'p');
			$data['program_data'] = $this->p->get_program_details($program_id);
			
			$this->load->library('form_validation');
			
			if(count($_POST) > 0)
			{
				$program_data_updated = $_POST;
				// handling the file upload
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png|bmp';
				//$config['max_size']	= '100';
				//$config['max_width']  = '1024';
				//$config['max_height']  = '768';

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('intro_image'))
				{
					$error = $this->upload->display_errors();
					$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_testimonial_save_fail').' '. $error .'</div>';
				}
				else
				{
					$title_image_data = $this->upload->data();
					$program_data_updated['intro_image'] = '/uploads/'.$title_image_data['file_name'];
				}
				$this->p->update($program_id, $program_data_updated);
				redirect('/admin/programs','refresh');
			} 
			
			$this->load->view('edit_program-admin', $data);
		}// end of public function edit_program($program_id)
		
		public function program_set_status($program_id, $status)
		{
			$this->is_login();
			$program_id = rawurldecode($program_id);
			$status = rawurldecode($status);
			$update_data['status'] = $status;
			$this->load->model('programs_model', 'p');
			$this->p->update($program_id, $update_data);
			redirect('/admin/programs','refresh');
		}// end of public function program_set_status($program_id, $status)
		
		public function text_advertising()
		{
			$this->is_login();
			$this->load->model('text_advertising_model', 'tam');
			$data['text_ads'] = $this->tam->get_all();
			$this->load->view('text_advertising-admin', $data);
		}// end of public function text_advertising()
		
		public function add_edit_text_ad($id = null)
		{
			$this->is_login();
			if($id == NULL)
				redirect('/admin/add_edit_text_ad/0');
			$id = rawurldecode($id);
			if(is_numeric($id))
			{
				$this->load->helper('MY_form_helper');
				$this->load->helper('form');
				$this->load->model('text_advertising_model', 'tam');
				if($id == 0)
				{
					// add new text ad
					$this->load->view('add_edit_text_ad-admin');
					if(count($_POST) > 0)
					{
						$this->tam->add($_POST);
						redirect('/admin/text_advertising','refresh');
					}
				}
				else
				{
					// edit text ad
					$data['ad_details'] = $this->tam->get_ad_details($id);
					$this->load->view('add_edit_text_ad-admin', $data);
					if(count($_POST) > 0)
					{
						$this->tam->update($id, $_POST);
						redirect('/admin/text_advertising','refresh');
					}
				}// end of else of if($id == 0)
			}// end of if(is_numeric($id))
		}// end of public function add_edit_text_ad($id)
		
		public function text_ad_set_status($id, $status)
		{
			$this->is_login();
			$id = rawurldecode($id);
			$status = rawurldecode($status);
			$update_data['status'] = $status;
			$this->load->model('text_advertising_model', 'tam');
			$this->tam->update($id, $update_data);
			redirect('/admin/text_advertising','refresh');
		}// end of public function text_ad_set_status($id, $status)
		
		public function text_ad_delete($id)
		{
			$this->is_login();
			$id = rawurldecode($id);
			$this->load->model('text_advertising_model', 'tam');
			$this->tam->delete($id);
			redirect('/admin/text_advertising','refresh');
		}// end of public function text_ad_delete($id)
		
		public function presentation_images()
		{
			$this->is_login();
			$this->load->model('presentation_images_model', 'pim');
			$data['presentation_images'] = $this->pim->get_all();
			$this->load->view('presentation_images-admin', $data);
		}// end of public function presentation_images()
		
		public function add_edit_presentation_image($image_id = null)
		{
			$this->is_login();
			if($image_id == NULL)
				redirect('/admin/add_edit_presentation_image/0');
			$image_id = rawurldecode($image_id);
			if(is_numeric($image_id))
			{
				$this->load->helper('MY_form_helper');
				$this->load->helper('form');
				$this->load->model('presentation_images_model', 'pim');
				if($image_id == 0)
				{
					// add new slide image
					$this->load->view('add_edit_presentation_image-admin');
					if(count($_POST) > 0)
					{
						$presentation_image_data_updated = $_POST;
						// handling the file upload
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|bmp';
						//$config['max_size']	= '100';
						//$config['max_width']  = '1024';
						//$config['max_height']  = '768';

						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('image_path'))
						{
							$error = $this->upload->display_errors();
							$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_testimonial_save_fail').' '. $error .'</div>';
						}
						else
						{
							$image_data = $this->upload->data();
							$presentation_image_data_updated['image_path'] = '/uploads/'.$image_data['file_name'];
						} 
						$this->pim->add($presentation_image_data_updated);
						redirect('/admin/presentation_images','refresh');
					}
				}
				else
				{
					// edit slide image
					$data['presentation_image'] = $this->pim->get_presentation_images_details($image_id);
					$this->load->view('add_edit_presentation_image-admin', $data);
					if(count($_POST) > 0)
					{
						$presentation_image_data_updated = $_POST;
						// handling the file upload
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'gif|jpg|png|bmp';
						//$config['max_size']	= '100';
						//$config['max_width']  = '1024';
						//$config['max_height']  = '768';

						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('image_path'))
						{
							$error = $this->upload->display_errors();
							$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_testimonial_save_fail').' '. $error .'</div>';
						}
						else
						{
							$image_data = $this->upload->data();
							$presentation_image_data_updated['image_path'] = '/uploads/'.$image_data['file_name'];
						}
						$this->pim->update($image_id, $presentation_image_data_updated);
						redirect('/admin/presentation_images','refresh');
					}
				}// end of else of if($image_id == 0)
			}// end of if(is_numeric($image_id))
		}// end of public function add_edit_presentation_image($image_id = null)
		
		public function presentation_image_set_status($image_id, $status)
		{
			$this->is_login();
			$image_id = rawurldecode($image_id);
			$status = rawurldecode($status);
			$update_data['status'] = $status;
			$this->load->model('presentation_images_model', 'pim');
			$this->pim->update($image_id, $update_data);
			redirect('/admin/presentation_images','refresh');
		}// end of public function presentation_image_set_status($image_id, $status)
		
		public function presentation_image_delete($image_id)
		{
			$this->is_login();
			$image_id = rawurldecode($image_id);
			$this->load->model('presentation_images_model', 'pim');
			$this->pim->delete($image_id);
			redirect('/admin/presentation_images','refresh');
		}// end of public function presentation_image_delete($image_id)
		
		public function site_settings()
		{
			$this->is_login();
			$data['form_submit_message'] = '';
			$this->load->model('settings_model', 'sm');
			
			if(count($_POST) > 0)
			{
				foreach($_POST as $key => $value)
				{
					$settings_data['value'] = $value;
					$this->sm->update($key, $settings_data);
				}
				$data['form_submit_message'] = '<div style="font-weight:bold;color:#0000FF;">'.lang('msg_settings_saved') .'</div>';
			}
			
			$settings_raw_data = $this->sm->get_all();
			$settings_data = array();
			foreach($settings_raw_data as $raw_settings)
				$settings_data[$raw_settings->name] = $raw_settings->value;
			$data['settings'] = $settings_data;
			$this->load->view('settings-admin', $data);
		}// end of public function site_settings()
		
		public function terms_conditions()
		{
			$this->is_login();
			$data['form_title'] = "Edit Terms and Conditions";
			$data['form_action'] = 'terms_conditions';
			$data['form_submit_message'] = '';
			$this->load->model('settings_model', 'sm');
			
			if(count($_POST) > 0)
			{
				$id = 3;
				$content_data = $_POST;
				$this->add_edit_content($id, $content_data);
				$data['form_submit_message'] = '<div style="font-weight:bold;color:#0000FF;">'.lang('msg_content_saved') .'</div>';
			}
			$data['terms_conditions'] = $this->sm->load_terms_conditions();
			$this->load->view('add_edit_content-admin', $data);
		}// end of public function terms_conditions()
		
		public function add_edit_content($id, $content_data)
		{
			$this->load->model('settings_model', 'sm');
			$this->sm->update_content($id, $content_data);
		}// end of public function add_edit_content($id, $content_data)
		
		public function user_list()
		{
			$this->is_login();
			$this->load->model('User_Profiles', 'up');
			$data['users'] = $this->up->get_all_users();
			$this->load->view('user_list-admin',$data);
		}// end of public function user_list()
		
		public function add_edit_user($user_id = null)
		{
			$this->is_login();
			if($user_id == NULL)
				redirect('/admin/add_edit_user/0');
			$user_id = rawurldecode($user_id);
			if(is_numeric($user_id))
			{
				$this->load->helper('MY_form_helper');
				$this->load->helper('form');
				$this->load->library('form_validation');
				$this->load->database();
				
				$this->form_validation->set_error_delimiters('<div style="font-weight:bold;color:#FF0000;">', '</div>');
				$data['form_submit_message'] = '';
				if($user_id == 0)
				{
					// add a user
				}
				else
				{
					// edit a user
				}
				$this->load->view('add_edit_user-admin', $data);
			}
		}// end of public function add_edit_user($user_id = null)
		
		public function delete_user($user_id)
		{
			$this->is_login();
			$user_id = rawurldecode($user_id);
			$this->load->model('user_profiles', 'up');
			$this->up->delete($user_id);
			redirect('/admin/user_list','refresh');
		}// end of public function delete_user($user_id)
                
                
}