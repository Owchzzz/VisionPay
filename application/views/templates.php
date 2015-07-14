<?
class templates extends CI_Controller {

        public function cabinet()
        {
                $this->load->view('cabinet');
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
                $this->load->view('index');
	}

	public function login()
	{
                $this->load->view('login');
	}

	public function news()
	{
                $this->load->view('news');
	}

	public function news_1()
	{
                $this->load->view('news_1');
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

	public function testimonials()
	{
                $this->load->view('testimonials');
	}
			        
}

