<?php
	class Testimonials_model extends CI_Model
	{
		public function add($testimonial_data)
		{
			$this->load->database();
			$this->db->insert('testimonials', $testimonial_data);
			return $this->db->insert_id();
		}// end of public function add($testimonial_data)
		
		public function get_testimonials_main($count)
		{
			$this->load->database();
			$this->db->order_by('testimonial_id', 'desc');
			$this->db->limit($count);
			$this->db->where('status', 1);
			$query = $this->db->get('testimonials');
			return $query->result();
		}// end of public function get_testimonials_main($count)
		
		public function get_testimonials_count()
		{
			$this->load->database();
			return $this->db->count_all('testimonials');
		}// end of public function get_testimonials_count()
		
		public function get_testimonials($result_start, $result_limit)
		{
			$this->load->database();
			$this->db->limit($result_limit, $result_start);
			$this->db->order_by('testimonial_id', 'desc');
			$this->db->where('status', 1);
			$query = $this->db->get('testimonials');
			return $query->result();
		}// end of public function get()
		
		public function get_all()
		{
			$this->load->database();
			$this->db->order_by('testimonial_id', 'desc');
			$query = $this->db->get('testimonials');
			return $query->result();
		}// end of public function get_all()
		
		public function update($testimonial_id, $testimonial_data)
		{
			$this->load->database();
			$this->db->where('testimonial_id', $testimonial_id);
			$this->db->update('testimonials', $testimonial_data);
		}// end of public function update($testimonial_id, $testimonial_data)
		
		public function delete($testimonial_id)
		{
			$this->load->database();
			$this->db->delete('testimonials', array('testimonial_id' => $testimonial_id));
		}// end of public function delete($testimonial_id)
	}// end of class Testimonials_model extends CI_Model
?>