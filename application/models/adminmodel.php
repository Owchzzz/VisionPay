<?php

class Adminmodel extends CI_Model{
    public function load_banners(){
                    
                    $query=$this->db->get('banners');
                    $output="No banners found";
                    if($query->num_rows() > 0){
                        $output="";
                    }
                    foreach($query->result() as $row){
                        $type = $row->banner_size;
                        $query2=$this->db->get_where('banner_sizes',array('banner_size_id'=>$type));
                        $nytpe="";
                        $filepath=$row->file_path;
                        $addedon=$row->added_on;
                        $banner_id=$row->banner_id;
                        $del = lang('delete');
                        if($del == ''){
                            $del="Delete";
                        }
                        $stat=$row->status;
                        foreach($query2->result() as $row2){
                            $ntype=$row2->banner_size;
                        }
                        $output.="<tr><td><img src=\"$filepath\" /></td><td>$addedon</td><td>$stat</td><td><a href=\"/admin/bannerdel/$banner_id\">$del</a></td></tr>";
                    }
                    $data['tablebanner']=$output;
                    return $data;
                }
                
                public function select_bannersize(){
                    $query=$this->db->get('banner_sizes');
                    $data=array();
                    $data['select'] = "";
                    foreach($query->result() as $row){
                        $banner_size_id=$row->banner_size_id;
                        $banner_size=$row->banner_size;
                        $data['select'].="<option value=\"$banner_size_id\">$banner_size</option>";
                    }
                    return $data;
                }
                
      public function add_banners(){
          
          $query=$this->db->get('banners');
          $id=0;
          foreach($query->result() as $row){
              $id=$row->banner_id;
          }
          $id++;
          $banner_size = $this->input->post('banner-size');
          $data=array('banner_size'=>$banner_size);
          $info="";
          $ext="";
          $newname="";
          $target="";
          $filepath="";
          if($_FILES["file"]["error"] < 1){
             $ext = substr($_FILES['file']['name'], strpos($_FILES['file']['name'],'.'), strlen($_FILES['file']['name'])-1); 
              $newname = $id.''.$ext;
              $target = "/var/www/visionclab/data/www/visionclab.com/media/banners/".$newname;
              $filepath="/media/banners/".$newname;
              move_uploaded_file($_FILES['file']['tmp_name'], $target);
          }
          $date=date("Y-m-d H:i:s",time());
          $data['file_path'] = $filepath;
          $data['added_on'] = $date;
          $data['status'] = 1;
          $this->db->insert('banners',$data);
          redirect('/admin/banner','refresh');
      }
      
      public function del_banner($id=null){
          $this->db->where('banner_id',$id);
          $this->db->delete('banners');
          redirect('/admin/banner','refresh');
      }
      
      public function load_withdrawals(){
          $query=$this->db->get('pending_withdrawals');
          $output="";
          $pending=lang('pending');
          $mark=lang('mark_as_completed');
          $delthis=lang('delete_this_transaction');
          $completed=lang('completed');
          $error=lang('error');
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
                      $ostat="$pending";
                      $menu="<a href=\"/admin/changetransactstatus/2/$tid\">$mark</a> | <a href=\"/admin/deltransact/$tid\">Delete this transaction</a>";
                      break;
                  case 2:
                      $ostat="$completed";
                      $menu="<a href=\"/admin/deltransact/$tid\">$delthis</a>";
                      break;
                  default:
                      $ostat="$error";
                      $menu="<a href=\"/admin/deltransact/$tid\">$delthis</a>";
                      break;
                  
              }
              $uid=$row->user_id;
              $amt=$row->amt;
              $login= "";
              $query2=$this->db->get_where('user_profiles',array('user_id'=>$uid));
              $okpay=$pmwallet="";
              foreach($query2->result() as $row2){
                  $login=$row2->login;
                  $okpay=$row2->ok_pay_wallet;
                  $pmwallet=$row2->pm_wallet;
              }
              $output.="<tr><td>$outdate</td><td>$ostat</td><td>$login ($uid)</td><td>$amt</td><td>$okpay</td><td>$pmwallet</td><td>$menu</td></tr>";
          }
          return $output;
      }
      
      public function load_site_access(){
          $query=$this->db->get('admin_info');
          $data=array();
          foreach($query->result() as $row){
              if($row->id == 1){
                  $data['password'] = $row->value;
              }else if($row->id == 2){
                  $data['login'] = $row->value;
              }
          }
          return $data;
          
      }
      
      public function save_site_access(){
          $login=$this->input->post('login');
          $pass=$this->input->post('pass');
          $query=$this->db->get_where('admin_info',array('id'=>1));
          foreach($query->result() as $row){
              $origpass=$row->value;
          }
          if($pass != $origpass){
              $pass=md5($pass);
          }   
          $data=array('value'=>$login);
          $this->db->where('id','2');
          $this->db->update('admin_info',$data);
          $data=array('value'=>$pass);
          $this->db->where('id','1');
          $this->db->update('admin_info',$data);
          redirect('/admin/edituserpass');
      }
      
}