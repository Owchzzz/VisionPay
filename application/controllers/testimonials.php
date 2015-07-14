<?
	class testimonials extends CI_Controller
	{
		public function index()
		{
			$this->load->model('testimonials_model', 't');
			
			// Paging info: Display 10 ads
			$this->load->library('pagination');

			$config['base_url'] = 'http://visionclab.com/testimonials/';
			$config['total_rows'] = $this->t->get_testimonials_count();
			$config['per_page'] = 5; 
			$config['uri_segment'] = 2;
			$config['num_links'] = 2;
			
			$config['full_tag_open'] = '<ul class="page_nav">';
			$config['full_tag_close'] = '</ul>';
			
			$config['cur_tag_open'] = '<li><span>';
			$config['cur_tag_close'] = '</span></li>';
			
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$config['prev_link'] = FALSE;
			$config['next_link'] = FALSE;
			$config['first_link'] = FALSE;
			$config['last_link'] = FALSE;
			
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			
			$data['paging_links'] = $this->pagination->create_links();
			
			$data['testimonials'] = $this->t->get_testimonials($page, $config["per_page"]);
			
			// add work here
			$this->load->helper('MY_form_helper');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$data['form_submit_message'] = '';
			
			// Now setting the validation rules
			$this->form_validation->set_rules('first_name', lang('name'), 'required');
			$this->form_validation->set_rules('last_name', lang('family'), 'required');
			$this->form_validation->set_rules('testimonial', lang('testimonial'), 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
			}
			else
			{
				// handling the file upload
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png|bmp';
				$config['max_size']	= '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('picture'))
				{
					$error = $this->upload->display_errors();
					//print_r($error);
					$data['form_submit_message'] = '<div style="font-weight:bold;color:#FF0000;">'.lang('msg_testimonial_save_fail').' '. $error .'</div>';
				}
				else
				{
					$picture_data = $this->upload->data();

					// now we will add the testimonial
					$this->load->model('testimonials_model', 't');
					$testimonial_data = array(
													'first_name' => $this->input->post('first_name'),
													'last_name' => $this->input->post('last_name'),
													'picture' => '/uploads/'.$picture_data['file_name'],
													'testimonial' => $this->input->post('testimonial'),
													'added_on' => date('Y-m-d H:i:s'),
												);
					$this->t->add($testimonial_data);
					$data['form_submit_message'] = '<div style="font-weight:bold;color:#0000FF;">'.lang('msg_testimonial_save_success').'</div>';
				}
			}
			
			$this->load->view('testimonials', $data);
		}// end of public function index()
	}// end of class testimonials extends CI_Controller
?>