<?php

class Testmodel extends CI_Model{
    public function processsuccess(){
        $tin = $this->input->post('ok_txn_id');
        $inv = $this->input->post('ok_invoice');
        $price = $this->inpu->post('ok_item_1_price');
        $type = $this->input->post('ok_item_1_custom_value');
        $program = $this->input->post('ok_item_1_name');
        $userid= $this->input->post('ok_item_2_custom_value');
        $valid=true;
        $uid=0;
        $query=$this->db->get('transactions');
        foreach($query->result() as $row){
            $test=$row->tin;
            $test2=$row->inv;
            if($test == $tin){
                $valid=false;
            }
            if($test2 == $inv){
                $valid=false;
            }
        }
        
        if($valid == true){
            $data=array('tin'=>$tin,'inv'=>$inv);
            
            $this->db->where('user_id',$this->session->userdata('user_id'));
            $query=$this->db->get('user_profiles');
            foreach($query->result as $row){
                $data['user_id'] = $row->user_id;
                $uid=$row->user_id;
            }
            $this->db->insert('transactions',$data);
            $date = date("d.m.Y",time());
            $data=array('login_id'=>$uid,'pay_date'=>$date);
            $this->db->insert('global_matrix');
            $data=array('login_id'=>$uid,'type'=>$type);
            $this->db->insert('dreams_come_true');
            
            $data=array('program'=>$program);
            $this->db->where('user_id',$uid);
            $this->db->update('user_profiles',$data);
        }
    }
    
    public function processPerfectMoneySuccess(){
        $tin = $this->input->post('ok_txn_id');
        $inv = $this->input->post('ok_invoice');
        $price = $this->inpu->post('ok_item_1_price');
        $type = $this->input->post('ok_item_1_custom_value');
        $program = $this->input->post('ok_item_1_name');
        $valid=true;
        $uid=0;
        $query=$this->db->get('transactions');
        foreach($query->result() as $row){
            $test=$row->tin;
            $test2=$row->inv;
            if($test == $tin){
                $valid=false;
            }
            if($test2 == $inv){
                $valid=false;
            }
        }
        
        if($valid == true){
            $data=array('tin'=>$tin,'inv'=>$inv);
            
            $this->db->where('user_id',$this->session->userdata('user_id'));
            $query=$this->db->get('user_profiles');
            foreach($query->result as $row){
                $data['user_id'] = $row->user_id;
                $uid=$row->user_id;
            }
            $this->db->insert('transactions',$data);
            $date = date("d.m.Y",time());
            $data=array('login_id'=>$uid,'pay_date'=>$date);
            $this->db->insert('global_matrix');
            $data=array('login_id'=>$uid,'type'=>$type);
            $this->db->insert('dreams_come_true');
            
            $data=array('program'=>$program);
            $this->db->where('user_id',$uid);
            $this->db->update('user_profiles',$data);
        }
    }
}