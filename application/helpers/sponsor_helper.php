<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	if ( ! function_exists('get_sponsor'))
	{
		function get_sponsor($login)
		{
			$ci =& get_instance();
			$ci->load->model('user_profiles', 'up');
			$sponsor = $ci->up->get_sponsor($login);
			return $sponsor->sponsor_login;
		}// end of function get_sponsor($login)
	}// end of if ( ! function_exists('get_sponsor'))
?>