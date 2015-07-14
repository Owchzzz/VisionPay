<?php
	class Text_advertising_model extends CI_Model
	{
		public function get_all()
		{
			$this->load->database();
			$this->db->order_by('id', 'desc');
			$query = $this->db->get('text_advertising');
			return $query->result();
		}// end of public function get_all()
		
		public function get_all_active()
		{
			$this->load->database();
			$this->db->order_by('id', 'desc');
			$this->db->where('status', 1);
			$query = $this->db->get('text_advertising');
			return $query->result();
		}// end of public function get_all_active()
		
		public function get_ad_details($id)
		{
			$this->load->database();
			$query = $this->db->get_where('text_advertising', array('id' => $id));
			return $query->row();
		}// end of public function get_ad_details($id)
		
		public function add($text_ad_data)
		{
			$this->load->database();
			$this->db->insert('text_advertising', $text_ad_data);
			return $this->db->insert_id();
		}// end of public function add($text_ad_data)
		
		public function update($id, $text_ad_data)
		{
			$this->load->database();
			$this->db->where('id', $id);
			$this->db->update('text_advertising', $text_ad_data);
		}// end of public function update($id, $text_ad_data)
		
		public function delete($id)
		{
			$this->load->database();
			$this->db->delete('text_advertising', array('id' => $id));
		}// end of public function delete($id)
	}// end of class Programs_model extends CI_Model
?>