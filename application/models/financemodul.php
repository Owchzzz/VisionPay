<?php

class Financemodul extends CI_Model{
    public function load_recent_transactions($userid){
        $query=$this->db->get_where('pending_withdrawals',array('user_id'=>$userid));
        $output="";
        foreach($query->result() as $row){
            $d=$row->date;
              $outdate="";
              if($d != ""){
                $outdate = date("Y-m-d",strtotime($row->date));
              }else{
                  $outdate="";
              }
              $stat=$row->status;
              $ostat="";
              $menu="";
              $tid=$row->id;
              switch($stat){
                  case 1:
                      $ostat="Pending";
                      $menu="<a href=\"/admin/changetransactstatus/2/$tid\">Mark as Completed</a> | <a href=\"/admin/deltransact/$tid\">Delete this transaction</a>";
                      break;
                  case 2:
                      $ostat="Completed";
                      $menu="<a href=\"/admin/deltransact/$tid\">Delete this transaction</a>";
                      break;
                  default:
                      $ostat="Error";
                      $menu="<a href=\"/admin/deltransact/$tid\">Delete this transaction</a>";
                      break;
                  
              }
              $uid=$row->user_id;
              $amt=$row->amt;
              $output.="<li><span>$outdate</span><span>$ostat</span><span>$amt</span></li>";
        }
        return $output;
    }
    
    public function load_payment_info($userid){
        $query=$this->db->get_where('user_profiles',array('user_id'=>$userid));
        $data=array();
        $data['okpayinfo'] = "";
        $data['perfectmoneyinfo'] = "";
        foreach($query->result() as $row){
            $data['okpayinfo'] = $row->ok_pay_wallet;
            $data['perfectmoneyinfo'] = $row->pm_wallet;
        }
        if($data['okpayinfo'] == ""){
            $data['okpayinfo'] = "None";
        }
        if($data['perfectmoneyinfo'] == ""){
            $data['perfectmoneyinfo'] = "None";
        }
        return $data;
    }
    
    public function check_financialpass($userid,$pass){
        $query=  $this->db->get_where('user_profiles',array('user_id'=>$userid));
        foreach($query->result() as $row){
            if(md5($pass) === $row->fin_password){
                return true;  
            }
           
        }
        return false;
    }
    
    public function check_credit($userid,$amt){
        $query=$this->db->get_where('user_profiles',array('user_id'=>$userid));
        foreach($query->result() as $row){
            if($row->credit >= $amt){
                return true;
            }
        }
        return false;
        }
    
    public function add_withdrawal($userid,$amt){
        $date=date("Y-m-d",time());
        $data=array('user_id'=>$userid,'amt'=>$amt,'status'=>1,'date'=>$date);
        $this->db->insert('pending_withdrawals',$data);
        $query=$this->db->get_where('user_profiles',array('user_id'=>$userid));
        $data=array();
        foreach($query->result() as $row){
            $credit=$row->credit;
            $credit-=$amt; 
        }
        $data=array('value'=>$credit);
        $this->db->where('user_id',$userid);
            $this->db->update('user_profiles');
        redirect('/user/success_withdrawal');
    }
    
    
}
