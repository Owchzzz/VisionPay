<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class set_language extends CI_Controller {
    public function index(){
       // echo $this->input->get('lang');
            if($this->input->get('lang') == 'rus')
			{
                $this->session->set_userdata('site_lang', 'russian');
                $this->config->set_item('language', 'russian');
                $this->lang->load('general', 'russian');
            }
			else if($this->input->get('lang') == 'en')
			{
                $this->session->set_userdata('site_lang', 'english');
                $this->config->set_item('language', 'english');
                $this->lang->load('general', 'english');
            }
        
        
        redirect($_SERVER['HTTP_REFERER'],'refresh');
        
    }
}