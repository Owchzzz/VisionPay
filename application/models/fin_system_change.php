<?php
	class Fin_System_Change extends CI_Model
	{
		public function add($fin_system_change_data)
		{
			$this->load->database();
			$this->db->insert('fin_system_change', $fin_system_change_data);
			return $this->db->insert_id();
		}// end of public function add($fin_system_change_data)
		
		public function get_via_special_part($special_part)
		{
			$this->load->database();
			$query = $this->db->get_where('fin_system_change', array('special_part' => $special_part));
			return $query->row_array();
		}// end of public function get_via_special_part($special_part)
		
		public function get_via_request_id($request_id)
		{
			$this->load->database();
			$query = $this->db->get_where('fin_system_change', array('request_id' => $request_id));
			return $query->row_array();
		}// end of public function get_via_request_id($request_id)
		
		public function update($request_id, $fin_system_change_data)
		{
			$this->load->database();
			$this->db->where('request_id', $request_id);
			$this->db->update('fin_system_change', $fin_system_change_data);
		}// end of public function update($request_id, $fin_system_change_data)
		
		public function delete($request_id)
		{
			$this->load->database();
			$this->db->delete('fin_system_change', array('request_id' => $request_id));
		}// end of public function delete($request_id)
	}// end of class Fin_Password_Change extends CI_Model
?>