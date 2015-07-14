<?php
	class faqs_model extends CI_Model
	{
		public function get_all()
		{
			$this->load->database();
			$this->db->order_by('faq_id', 'desc');
			$query = $this->db->get('faqs');
			return $query->result();
		}// end of public function get_all()
		
		public function get_all_active()
		{
			$this->load->database();
			$this->db->order_by('order', 'asc');
			$this->db->where('status', 1);
			$query = $this->db->get('faqs');
			return $query->result();
		}// end of public function get_all_active()
		
		public function get_faq_details($faq_id)
		{
			$this->load->database();
			$query = $this->db->get_where('faqs', array('faq_id' => $faq_id));
			return $query->row();
		}// end of public function get_faq_details($faq_id)
		
		public function add($faq_data)
		{
			$this->load->database();
			$this->db->insert('faqs', $faq_data);
			return $this->db->insert_id();
		}// end of public function add($faq_data)
		
		public function update($faq_id, $faq_data)
		{
			$this->load->database();
			$this->db->where('faq_id', $faq_id);
			$this->db->update('faqs', $faq_data);
		}// end of public function update($faq_id, $faq_data)
		
		public function delete($faq_id)
		{
			$this->load->database();
			$this->db->delete('faqs', array('faq_id' => $faq_id));
		}// end of public function delete($id)
	}// end of class faqs_model extends CI_Model
?>