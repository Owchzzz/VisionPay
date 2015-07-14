<?php	
	class Reset_password extends CI_Model
	{
		public function add($password_reset_data)
		{
			$this->load->database();
			$this->db->insert('reset_password', $password_reset_data);
			return $this->db->insert_id();
		}// end of public function add($reset_password_data)
		
		public function get_by_email($email)
		{
			$this->load->database();
			$query = $this->db->get_where('reset_password', array('email' => $email));
			return $query->row_array();
		}// end of public function get_by_email($email)
		
		public function get_by_md5($md5)
		{
			$this->load->database();
			$query = $this->db->get_where('reset_password', array('md5' => $md5));
			return $query->row_array();
		}// end of public function get_by_special_part($special_part)
		
		public function update($request_id, $reset_password_data)
		{
			$this->load->database();
			$this->db->where('request_id', $request_id);
			$this->db->update('reset_password', $reset_password_data);
		}// end of public function update($request_id, $reset_password_data)
		
		public function delete($request_id)
		{
			$this->load->database();
			$this->db->delete('reset_password', array('request_id' => $request_id));
		}// end of public function delete($request_id)
	}// end of class Reset_password extends CI_Model
?>