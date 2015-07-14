<?php
class LanguageLoader
{
    function initialize()
    {
		 $ci =& get_instance();
        $ci->load->helper('language');
 
        $site_lang = $ci->session->userdata('site_lang');
		//echo $site_lang; die();
        if ($site_lang)
		{
			$ci->config->set_item('language', $site_lang);
			$ci->lang->load('general', $site_lang);
        } 
		else 
		{
			$ci->config->set_item('language', 'russian');
            $ci->lang->load('general','russian');
        }
	}// end of function initialize()
}// end of class LanguageLoader
?>