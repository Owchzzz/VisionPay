<?php

class Profilemodel extends CI_Model{
    public function load_data($uid){
        $this->db->where('user_id',$uid);
        $query=$this->db->get('user_profiles');
        $result = $query->row_array();
        return $result;
    }
    
    public function update_data($uid){
        $this->db->where('user_id',$uid);
        $data=array('sponsor_login'=>$this->input->post('sponsor_login'),
                    'first_name'=>$this->input->post('f_name'),
                    'last_name'=>$this->input->post('l_name'),
                    'login'=>$this->input->post('username'),
            'email'=>$this->input->post('email'),
            'phone'=>$this->input->post('phone'),
            'skype'=>$this->input->post('skype'),
            'country'=>$this->input->post('country'),
            'city'=>$this->input->post('city'),
            'street'=>$this->input->post('street'),
            'house'=>$this->input->post('house'),
            'flat'=>$this->input->post('flat'),
            'post_code'=>$this->input->post('post_code'),
            'ok_pay_wallet'=>$this->input->post('ok_pay_wallet'),
            'pm_wallet'=>$this->input->post('pm_wallet'),
            
                    );
        $this->db->update('user_profiles',$data);
        redirect('/user/profile');
    }
}