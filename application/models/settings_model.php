<?php
	class Settings_model extends CI_Model
	{
		public function get_all()
		{
			$this->load->database();
			$query = $this->db->get('settings');
			return $query->result();
		}// end of public function get_all()
		
		public function add($settings_data)
		{
			$this->load->database();
			$this->db->insert('settings', $settings_data);
			return $this->db->insert_id();
		}// end of public function add($settings_data)
		
		public function update($name, $settings_data)
		{
			$this->load->database();
			$this->db->where('name', $name);
			$this->db->update('settings', $settings_data);
		}// end of public function update($id, $settings_data)
		
		public function delete($id)
		{
			$this->load->database();
			$this->db->delete('settings', array('id' => $id));
		}// end of public function delete($image_id)
		
		public function load_terms_conditions()
		{
			$this->load->database();
			$query = $this->db->get_where('content', array('id' => 3));
			return $query->row();
		}// end of public function load_terms_conditions()
		
		public function update_content($id, $content_data)
		{
			$this->load->database();
			$this->db->where('id', $id);
			$this->db->update('content', $content_data);
		}// end of public function update_content($id, $content_data)
	}// end of class Settings_model extends CI_Model
?>