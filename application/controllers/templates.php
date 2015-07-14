<?
class templates extends CI_Controller {

        public function cabinet()
        {
                $this->load->view('cabinet');
        }
	
	 public function profile()
        {
                $this->load->view('profile');
        }

	public function change_fin_parol()
	{
                $this->load->view('change_fin_parol');
	}

	public function change_fin_system()
	{
                $this->load->view('change_fin_system');
	}	

	public function change_parol()
	{
                $this->load->view('change_parol');
	}

	public function contacts()
	{
                $this->load->view('contacts');
	}	

	public function faqs()
	{
                $this->load->view('faqs');
	}

	public function finance()
	{
                $this->load->view('finance');
	}

	public function index()
	{
		$this->load->model('templatequery');
		$data=array();
		$data['news'] = $this->templatequery->load_news();
		
		$this->load->model('testimonials_model', 't');
		$data['testimonials'] = $this->t->get_testimonials_main(3);
		$this->load->view('index',$data);
	}

	public function login()
	{
                $this->load->view('login');
	}

	public function news()
	{
                $this->load->model('templatequery');
                $data=$this->templatequery->load_all_news();
                
                $this->load->view('news',$data);
	}

	public function news_1()
	{
            $this->load->model('templatequery');
            $id=$this->input->get('id');
            $data=$this->templatequery->load_newsid($id);
                $this->load->view('news_1',$data);
	}
        
       
        
	public function output_finance()
	{
                $this->load->view('output_finance');
	}

	public function partners()
	{
                $this->load->view('partners');
	}

	public function program()
	{
                $this->load->view('program');
	}

	public function program1()
	{
                $this->load->view('program1');
	}

	public function registration()
	{
                $this->load->view('registration');
	}
	
	public function banners()
	{
            $this->load->model('bannermodul');
            $data=$this->bannermodul->load_banners();
                $this->load->view('banners',$data);
	}

	public function business_card()
	{
                $this->load->view('business_card');
	}
	
	public function testimonials()
	{
                $this->load->view('testimonials');
	}
	
	public function global_matrix()
	{
                $this->load->view('global_matrix');
	}
	
	public function global_matrix_detal()
	{
                $this->load->view('global_matrix_detal');
	}
	
	public function mail()
	{
                $this->load->view('mail');
	}
	
	public function presentation()
	{
            $this->load->model('presentation_images_model', 'pim');
			$data['presentation_images'] = $this->pim->get_all();
                $this->load->view('presentation',$data);
	}
	
	public function search_fail()
	{
                $this->load->view('search_fail');
	}
	
	public function  text_advertising()
	{
                $this->load->view('text_advertising');
	}
	
	public function  payment()
	{
                $this->load->view('payment');
	}
        
        public function okpayipn(){
            $this->load->model('okaypaymodel');
            $this->okaypaymodel->ipn();
        }
            
	
			        
}

