<?php
	class Presentation_images_model extends CI_Model
	{
		public function get_all()
		{
			$this->load->database();
			$this->db->order_by('image_id', 'desc');
			$query = $this->db->get('presentation_images');
			return $query->result();
		}// end of public function get_all()
		
		public function get_all_active()
		{
			$this->load->database();
			$this->db->order_by('image_order', 'asc');
			$this->db->where('status', 1);
			$query = $this->db->get('presentation_images');
			return $query->result();
		}// end of public function get_all_active()
		
		public function get_presentation_images_details($image_id)
		{
			$this->load->database();
			$query = $this->db->get_where('presentation_images', array('image_id' => $image_id));
			return $query->row();
		}// end of public function get_ad_details($id)
		
		public function add($presentation_image_data)
		{
			$this->load->database();
			$this->db->insert('presentation_images', $presentation_image_data);
			return $this->db->insert_id();
		}// end of public function add($presentation_image_data)
		
		public function update($image_id, $presentation_image_data)
		{
			$this->load->database();
			$this->db->where('image_id', $image_id);
			$this->db->update('presentation_images', $presentation_image_data);
		}// end of public function update($image_id, $presentation_image_data)
		
		public function delete($image_id)
		{
			$this->load->database();
			$this->db->delete('presentation_images', array('image_id' => $image_id));
		}// end of public function delete($image_id)
                
                public function get_link(){
                    $this->load->database();
                    $query=$this->db->get_where('settings',array('id'=>10));
                    $link="";
                    foreach($query->result() as $row){
                        $link=$row->value;
                    }
                    return $link;
                }
	}// end of class Presentation_images_model extends CI_Model
?>