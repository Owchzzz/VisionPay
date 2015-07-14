<?php
	class Programs_model extends CI_Model
	{
		public function get_all()
		{
			$this->load->database();
			$this->db->order_by('program_id', 'asc');
			$query = $this->db->get('programs');
			return $query->result();
		}// end of public function get_all()
		
		public function get_programs_main($count)
		{
			$this->load->database();
			$this->db->where('status', 1);
			$this->db->limit($count);
			$this->db->order_by('program_order', 'asc');
			$query = $this->db->get('programs');
			return $query->result();
		}// end of public function get_programs_main($count)
		
		public function get_program_details($program_id)
		{
			$this->load->database();
			$query = $this->db->get_where('programs', array('program_id' => $program_id));
			return $query->row();
		}// end of public function get_program_details($program_id)
		
		public function update($program_id, $program_data)
		{
			$this->load->database();
			$this->db->where('program_id', $program_id);
			$this->db->update('programs', $program_data);
		}// end of public function update($program_id, $program_data)
	}// end of class Programs_model extends CI_Model
?>