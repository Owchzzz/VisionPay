<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	if ( ! function_exists('is_part_of_m1'))
	{
		function is_part_of_m1()
		{
			$ci =& get_instance();
			$ci->load->model('user_profiles', 'up');
			$user_data = $ci->up->get_user_by_login($ci->session->userdata('login'));
			return $ci->up->is_user_in_m1($user_data->user_id);
		}// end of function is_part_of_m2()
	}// end of if ( ! function_exists('is_part_of_m1'))
	
	if ( ! function_exists('is_part_of_m2'))
	{
		function is_part_of_m2()
		{
			$ci =& get_instance();
			$ci->load->model('user_profiles', 'up');
			$user_data = $ci->up->get_user_by_login($ci->session->userdata('login'));
			return $ci->up->is_user_in_m2($user_data->user_id);
		}// end of function is_part_of_m2()
	}// end of if ( ! function_exists('is_part_of_m2'))
	
	if ( ! function_exists('is_part_of_m3'))
	{
		function is_part_of_m3()
		{
			$ci =& get_instance();
			$ci->load->model('user_profiles', 'up');
			$user_data = $ci->up->get_user_by_login($ci->session->userdata('login'));
			return $ci->up->is_user_in_m3($user_data->user_id);
		}// end of function is_part_of_m3()
	}// end of if ( ! function_exists('is_part_of_m3'))
?>