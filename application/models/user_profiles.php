<?php
	class User_Profiles extends CI_Model
	{
		public function login($login, $password)
		{
			$this->load->database();
			$this->db->select('user_id, login, email, first_name, last_name, status, email_verified');
			$this->db->where('login', $login);
			$this->db->where('password', md5($password));
			$this->db->from('user_profiles');
			$query = $this->db->get();
			return $query->row_array();
		}// end of public function login($login, $password)
		
		public function add($user_data)
		{
			$this->load->database();
			$this->db->insert('user_profiles', $user_data);
			return $this->db->insert_id();
		}// end of public function add($user_data)
		
		public function update($user_id, $user_data)
		{
			$this->load->database();
			$this->db->where('user_id', $user_id);
			$this->db->update('user_profiles', $user_data);
		}// end of public function update($user_id, $user_data)
		
		public function delete($user_id)
		{
			$this->load->database();
			$this->db->delete('user_profiles', array('user_id' => $user_id));
		}// end of public function delete($user_id)
		
		public function password_check($password, $user_id)
		{
			$this->load->database();
			$query = $this->db->get_where('user_profiles', array('password' => md5($password), 'user_id' => $user_id));
			if(count($query->result()) > 0)
				return true;
			else
				return false;
		}// end of public function password_check($password, $user_id)
		
		public function fin_password_check($fin_password, $user_id)
		{
			$this->load->database();
			$query = $this->db->get_where('user_profiles', array('fin_password' => md5($fin_password), 'user_id' => $user_id));
			if(count($query->result()) > 0)
				return true;
			else
				return false;
		}// end of public function password_check($password, $user_id)
		
		public function login_available($login)
		{
			$this->load->database();
			$query = $this->db->get_where('user_profiles', array('login' => $login));
			if(count($query->result()) > 0)
			{
				// means the username exists - return false
				return false;
			}
			else
			{
				return true;
			}
		}// end of public function login_available($login)
		
		public function email_available($email)
		{
			$this->load->database();
			$query = $this->db->get_where('user_profiles', array('email' => $email));
			if(count($query->result()) > 0)
			{
				// means the email exists - return false
				return false;
			}
			else
			{
				return true;
			}
		}// end of public function email_available($email)
		
		public function sponsor_available($sponsor_login)
		{
			$this->load->database();
			$query = $this->db->get_where('user_profiles', array('login' => $sponsor_login));
			if(count($query->result()) > 0)
			{
				// means the username exists - return false
				return true;
			}
			else
			{
				return false;
			}
		}// end of public function sponsor_available($sponsor_login)
		
		public function get_fin_system($user_id)
		{
			$this->load->database();
			$this->db->select('ok_pay_wallet, pm_wallet');
			$this->db->where('user_id', $user_id);
			$this->db->from('user_profiles');
			$query = $this->db->get();
			return $query->row_array();
		}// end of public function get_fin_system($user_id)
		
		public function get_user_by_md5_id($md5_user_id)
		{
			$this->load->database();
			$query = $this->db->query("SELECT email FROM user_profiles WHERE md5(user_id)='".$md5_user_id."'");
			return $query->row_array();
		}// end of public function get_user_by_md5_id($md5_user_id)
		
		public function get_user_by_md5_email($md5_email)
		{
			$this->load->database();
			$query = $this->db->query("SELECT * FROM user_profiles WHERE md5(email)='".$md5_email."'");
			return $query->row_array();
		}// end of public function get_user_by_md5_email($md5_email)
		
		public function get_user_by_email($email)
		{
			$this->load->database();
			$query = $this->db->get_where('user_profiles', array('email' => $email));
			return $query->row_array();
		}// end of public function get_user_by_email($email)
		
		public function get_user_by_login($login)
		{
			$this->load->database();
			$query = $this->db->get_where('user_profiles', array('login' => $login));
			return $query->row();
		}// end of public function get_user_by_login($login)
		
		public function get_user_by_id($user_id)
		{
			$this->load->database();
			$query = $this->db->get_where('user_profiles', array('user_id' => $user_id));
			return $query->row();
		}// end of public function get_user_by_id($user_id)
                
		public function is_in_globalmatrix($id){
			$res = false;
			$query=$this->db->get_where('global_matrix',array('login_id'=>$id));
		   foreach($query->result() as $row){
			   $res=true;
		   }
		   return $res;
		}// end of public function is_in_globalmatrix($id)
		
		public function is_admin($id){
			$res=false;
			$data=array('id'=>$id);
			$uid = $this->db->get_where('admin_info',$data);
			if($uid->num_rows() > 0){
				$res=true;
			}
			return $res; // test
		}// end of public function is_admin()
		
		
		public function add_to_globalmatrix($id){
			$date = date("Y-m-d",time());
			$mon = date("m",strtotime($date));
			$year = date("Y",strtotime($date));
			$day = date("d",strtotime($date));
			$num = cal_days_in_month(CAL_GREGORIAN, $mon, $year);
			$num -= $day;
			   $this->db->insert('global_matrix',array('login_id'=>$id,'days'=>$num));
			   $this->db->insert('dreams_come_true',array('login_id'=>$id));
			   $this->db->where('user_id',$id);
			   $data=array('status'=>1);
			   $this->db->update('user_profiles',$data);
			   
		}// end of public function add_to_globalmatrix
		
		
		public function get_all_users()
		{
			$this->db->order_by('in_global_matrix', 'desc');
			$this->db->where('parent_id', 0);
			$query=$this->db->get('user_profiles');
			$rows = $query->result();
			return $rows; // result
		}

		public function users_in_global_matrix()
		{
			$this->load->database();
			$query = $this->db->query("SELECT up.login AS `login` FROM user_profiles up INNER JOIN global_matrix gm ON up.user_id=gm.login_id ORDER BY gm.id ASC");
			return $query->result_array();
		}
		
		public function users_in_m1()
		{
			$this->load->database();
			$query = $this->db->query("SELECT up.login AS `login` FROM user_profiles up INNER JOIN m1 ON up.user_id=m1.login_id ORDER BY m1.id ASC");
			return $query->result_array();
		}
		
		public function users_in_m2()
		{
			$this->load->database();
			$query = $this->db->query("SELECT up.login AS `login` FROM user_profiles up INNER JOIN m2 ON up.user_id=m2.login_id ORDER BY m2.id ASC");
			return $query->result_array();
		}
		
		public function users_in_m3()
		{
			$this->load->database();
			$query = $this->db->query("SELECT up.login AS `login` FROM user_profiles up INNER JOIN m3 ON up.user_id=m3.login_id ORDER BY m3.id ASC");
			return $query->result_array();
		}
		
		public function users_in_m4()
		{
			$this->load->database();
			$query = $this->db->query("SELECT up.login AS `login` FROM user_profiles up INNER JOIN m4 ON up.user_id=m4.login_id ORDER BY m4.id ASC");
			return $query->result_array();
		}
		
		public function get_sponsor($login)
		{
			$this->load->database();
			$this->db->select('sponsor_login');
			$this->db->where('login', $login);
			$query = $this->db->get('user_profiles');
			return $query->row();
		}// end of public function get_sponsor($login)
		
		public function get_rewards_array()
		{
			$this->load->database();
			$this->db->select('reward');
			$this->db->order_by('level', 'ASC');
			$query = $this->db->get('reward_scheme');
			return $query->result_array();
		}// end of public function get_rewards_array()
		
		public function add_reward_balance($login, $reward_amount)
		{
			$this->load->database();
			$this->db->query("UPDATE user_profiles SET credit=credit+$reward_amount WHERE login='".$login."'");
		}// end of public function add_reward_balance($login, $reward_amount)
		
		public function transfer_reward_balance($user_id, $reward_amount)
		{
			$this->load->database();
			$this->db->query("UPDATE user_profiles SET credit=credit+$reward_amount WHERE user_id='".$user_id."'");
		}// end of public function transfer_reward_balance($user_id, $reward_amount)
		
		public function add_to_m1($user_id)
		{
			$this->load->database();
			$this->db->simple_query("INSERT INTO m1 (login_id, lines_added, users_added) VALUES ($user_id, 0, 0)");
		}// end of public function add_to_m1($user_id)
		
		public function is_user_in_m1($user_id)
		{
			$this->load->database();
			$query = $this->db->get_where('m1', array('login_id'=>$user_id));
			if(count($query->result_array()) > 0)
				return true;
			else
				return false;
		}// end of public function is_user_in_m1($user_id)
		
		public function get_m1_data($user_id)
		{
			$this->load->database();
			$query = $this->db->get_where('m1', array('login_id' => $user_id));
			return $query->row();
		}// end of public function get_m1_data($user_id)
		
		public function update_m1($login_id, $lines_added, $users_added)
		{
			$this->load->database();
			$query = "UPDATE m1 SET lines_added=lines_added+$lines_added, users_added=users_added+$users_added WHERE login_id=$login_id";
			//echo $query;
			$this->db->simple_query($query);
		}// end of public function update_m1($login_id, $lines_added, $users_added)
		
		public function add_to_m2($user_id)
		{
			$this->load->database();
			$this->db->simple_query("INSERT INTO m2 (login_id, lines_added, users_added) VALUES ($user_id, 0, 0)");
		}// end of public function add_to_m2($user_id)
		
		public function is_user_in_m2($user_id)
		{
			$this->load->database();
			$query = $this->db->get_where('m2', array('login_id'=>$user_id));
			if(count($query->result_array()) > 0)
				return true;
			else
				return false;
		}// end of public function is_user_in_m2($user_id)
		
		public function get_m2_data($user_id)
		{
			$this->load->database();
			$query = $this->db->get_where('m2', array('login_id' => $user_id));
			return $query->row();
		}// end of public function get_m2_data($user_id)
		
		public function update_m2($login_id, $lines_added, $users_added)
		{
			$this->load->database();
			$query = "UPDATE m2 SET lines_added=lines_added+$lines_added, users_added=users_added+$users_added WHERE login_id=$login_id";
			//echo $query;
			$this->db->simple_query($query);
		}// end of public function update_m2($login_id, $lines_added, $users_added)
		
		public function add_to_m3($user_id)
		{
			$this->load->database();
			$this->db->simple_query("INSERT INTO m3 (login_id, lines_added, users_added) VALUES ($user_id, 0, 0)");
		}// end of public function add_to_m3($user_id)
		
		public function is_user_in_m3($user_id)
		{
			$this->load->database();
			$query = $this->db->get_where('m3', array('login_id'=>$user_id));
			if(count($query->result_array()) > 0)
				return true;
			else
				return false;
		}// end of public function is_user_in_m3($user_id)
		
		public function get_m3_data($user_id)
		{
			$this->load->database();
			$query = $this->db->get_where('m3', array('login_id' => $user_id));
			return $query->row();
		}// end of public function get_m3_data($user_id)
		
		public function update_m3($login_id, $lines_added, $users_added)
		{
			$this->load->database();
			$query = "UPDATE m3 SET lines_added=lines_added+$lines_added, users_added=users_added+$users_added WHERE login_id=$login_id";
			//echo $query;
			$this->db->simple_query($query);
		}// end of public function update_m3($login_id, $lines_added, $users_added)
		
		public function add_to_m4($user_id)
		{
			$this->load->database();
			$this->db->simple_query("INSERT INTO m4 (login_id, lines_added, users_added) VALUES ($user_id, 0, 0)");
		}// end of public function add_to_m4($user_id)
		
		public function is_user_in_m4($user_id)
		{
			$this->load->database();
			$query = $this->db->get_where('m4', array('login_id'=>$user_id));
			if(count($query->result_array()) > 0)
				return true;
			else
				return false;
		}// end of public function is_user_in_m4($user_id)
		
		public function get_m4_data($user_id)
		{
			$this->load->database();
			$query = $this->db->get_where('m4', array('login_id' => $user_id));
			return $query->row();
		}// end of public function get_m4_data($user_id)
		
		public function update_m4($login_id, $lines_added, $users_added)
		{
			$this->load->database();
			$query = "UPDATE m4 SET lines_added=lines_added+$lines_added, users_added=users_added+$users_added WHERE login_id=$login_id";
			//echo $query;
			$this->db->simple_query($query);
		}// end of public function update_m3($login_id, $lines_added, $users_added)
		
		public function get_reinvest_users()
		{
			$this->load->database();
			$this->db->select("user_id, parent_id, credit");
			$this->db->where('parent_id !=');
			$query = $this->db->get('user_profiles');
			return $query->result();
		}// end of public function get_reinvest_users()
	}// end of class User_Profiles extends CI_Model
?>