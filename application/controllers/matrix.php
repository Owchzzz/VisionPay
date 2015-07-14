<?
class matrix extends CI_Controller {

		public function login_check()
		{
			if(!$this->session->userdata('user_id'))
			{
				redirect('user/login/1');
			}// end of if(!$this->session->userdata('user_id'))
		}// end of public function login_check()
		
        public function m1_750()
        {
			$this->login_check();
			$data['matrix_name']="M1 - 750";
			$this->load->helper('sponsor_helper');
			$this->load->model('user_profiles', 'up');
			$data['matrix_users'] = $this->up->users_in_global_matrix();
			
			$total_users = count($data['matrix_users']);
			$limit = 0;
			for($i=0; $i<$total_users; $i++)
			{
				$limit = $limit + pow(2, $i);
				if($limit >= $total_users)
				{
					$limit = $i;
					break;
				}
			}
			$data['logged_in_user'] = $this->session->userdata('login');
			$data['limit'] = $limit;
			$this->load->view('my_matrix', $data);
			/*
			$this->login_check();
			$data['matrix_name']="Мечты сбываются М1 (750)";
			$data['ownlogin']=$this->session->userdata('login');
			$data['maxtrix_type']="m1_750";
			$query = $this->db->query('SELECT * FROM user_profiles WHERE login="'.$data['ownlogin'].'";');
			$row = $query->row_array();
			$data['sponsor']=$row['sponsor_login'];
			$data['myrefs']=$this->myrefs($data['ownlogin'],"");
			$data['myrefs']=$this->flat_array($data['myrefs']);
			$data['myrefs']=$this->ordering($data['myrefs']);
            $this->load->view('global_matrix',$data);
			*/
        }
	
	public function m1_other()
        {
			$this->login_check();
			$data['matrix_name']="M1 - 750";
			$this->load->helper('sponsor_helper');
			$this->load->model('user_profiles', 'up');
			$data['matrix_users'] = $this->up->users_in_global_matrix();
			
			$total_users = count($data['matrix_users']);
			$limit = 0;
			for($i=0; $i<$total_users; $i++)
			{
				$limit = $limit + pow(2, $i);
				if($limit >= $total_users)
				{
					$limit = $i;
					break;
				}
			}
			$data['logged_in_user'] = $_GET['login'];
			$data['limit'] = $limit;
			$this->load->view('my_matrix', $data);
		
	}
		
		public function m2_2200()
        {
			$this->login_check();
			$data['matrix_name']="M2 - 2200";
			$this->load->helper('sponsor_helper');
			$this->load->model('user_profiles', 'up');
			$data['matrix_users'] = $this->up->users_in_m2();
			
			$total_users = count($data['matrix_users']);
			$limit = 0;
			for($i=0; $i<$total_users; $i++)
			{
				$limit = $limit + pow(2, $i);
				if($limit >= $total_users)
				{
					$limit = $i;
					break;
				}
			}
			$data['logged_in_user'] = $this->session->userdata('login');
			$data['limit'] = $limit;
			$this->load->view('my_matrix_m2', $data);
		}// end of public function m2_2200()
		
	
	public function m2_other()
        {
			$this->login_check();
			$data['matrix_name']="M2 - 2200";
			$this->load->helper('sponsor_helper');
			$this->load->model('user_profiles', 'up');
			$data['matrix_users'] = $this->up->users_in_m2();
			
			$total_users = count($data['matrix_users']);
			$limit = 0;
			for($i=0; $i<$total_users; $i++)
			{
				$limit = $limit + pow(2, $i);
				if($limit >= $total_users)
				{
					$limit = $i;
					break;
				}
			}
			$data['logged_in_user'] = $_GET['login'];
			$data['limit'] = $limit;
			$this->load->view('my_matrix_m2', $data);
		}
	
		public function m3_6600()
        {
			$this->login_check();
			$data['matrix_name']="M3 - 6600";
			$this->load->helper('sponsor_helper');
			$this->load->model('user_profiles', 'up');
			$data['matrix_users'] = $this->up->users_in_m3();
			
			$total_users = count($data['matrix_users']);
			$limit = 0;
			for($i=0; $i<$total_users; $i++)
			{
				$limit = $limit + pow(2, $i);
				if($limit >= $total_users)
				{
					$limit = $i;
					break;
				}
			}
			$data['logged_in_user'] = $this->session->userdata('login');
			$data['limit'] = $limit;
			$this->load->view('my_matrix_m3', $data);
		}// end of public function m3_6600()
	
	public function m3_other()
        {
			$this->login_check();
			$data['matrix_name']="M3 - 6600";
			$this->load->helper('sponsor_helper');
			$this->load->model('user_profiles', 'up');
			$data['matrix_users'] = $this->up->users_in_m3();
			
			$total_users = count($data['matrix_users']);
			$limit = 0;
			for($i=0; $i<$total_users; $i++)
			{
				$limit = $limit + pow(2, $i);
				if($limit >= $total_users)
				{
					$limit = $i;
					break;
				}
			}
			$data['logged_in_user'] = $_GET['login'];
			$data['limit'] = $limit;
			$this->load->view('my_matrix_m3', $data);
		}
		
		public function my_matrix()
		{
			$this->login_check();
			$data['matrix_name']="Глобальная матрица";
			$this->load->helper('sponsor_helper');
			$this->load->model('user_profiles', 'up');
			$data['matrix_users'] = $this->up->users_in_global_matrix();
			
			$total_users = count($data['matrix_users']);
			$limit = 0;
			for($i=0; $i<$total_users; $i++)
			{
				$limit = $limit + pow(2, $i);
				if($limit >= $total_users)
				{
					$limit = $i;
					break;
				}
			}
			$data['logged_in_user'] = $this->session->userdata('login');
			$data['limit'] = $limit;
			$this->load->view('my_matrix', $data);
		}// end of public function my_matrix()
	
		public function global_matrix()
        {
			$this->login_check();
			$data['matrix_name']="Глобальная матрица";
			$this->load->helper('sponsor_helper');
			$this->load->model('user_profiles', 'up');
			$data['matrix_users'] = $this->up->users_in_global_matrix();
			
			$total_users = count($data['matrix_users']);
			$limit = 0;
			for($i=0; $i<$total_users; $i++)
			{
				$limit = $limit + pow(2, $i);
				if($limit >= $total_users)
				{
					$limit = $i;
					break;
				}
			}
			$data['logged_in_user'] = $this->session->userdata('login');
			$data['limit'] = $limit;
			$this->load->view('my_matrix', $data);
			/*
			$this->login_check();
			$data['matrix_name']="Глобальная матрица";
			$data['ownlogin']=$this->session->userdata('login');
			$query = $this->db->query('SELECT * FROM user_profiles WHERE login="'.$data['ownlogin'].'";');
			$row = $query->row_array();
			$data['sponsor']=$row['sponsor_login'];
			$data['maxtrix_type']="global";
			$query = $this->db->query('SELECT * FROM global_matrix WHERE login_id="'.$row['user_id'].'";');
			$row = $query->row_array();
			$data['myrefs']=$this->myrefs($data['ownlogin'],"");
			$data['myrefs']=$this->flat_array($data['myrefs']);
			$data['myrefs']=$this->ordering($data['myrefs']);
			$data['pay_day']=$row['pay_date'];
			$this->load->view('global_matrix',$data);
			*/
        }
		
		
		public function myrefs($login,$users){
			if (empty($users)){
				$users=array();
			}

			$query = $this->db->query('SELECT login FROM user_profiles WHERE sponsor_login="'.$login.'";');
			foreach ($query->result() as $row)
			{
    			$login=$row->login;
				$query2 = $this->db->query('SELECT * FROM user_profiles WHERE login="'.$login.'";');
				$row2 = $query2->row_array();
				$login_id=$row2['user_id'];
				$query2 = $this->db->query('SELECT * FROM global_matrix WHERE login_id="'.$login_id.'";');
				$row2 = $query2->row_array();
				if (!empty($row2)){
				$id=$row2['id'];
				}
				if (!empty($id)){
				array_push($users, $login);
				$addit=$this->myrefs($login,$users);
				array_push($users, $addit);
				}
			}
			return $users;
			}
	
		public function flat_array($array) { 
			foreach ($array as $value) { 
			if(is_array($value)) { 
			$result=array_merge($result,$this->flat_array($value)); 
		} 
		else 
		{ 
			$result[]=$value; 
		} 
		} 
		$result=array_unique($result);
		$result = array_values($result);
		return $result; 
		} 
	
	
	public function ordering($result){
			$wherequery='login="'.$result[0].'" ';
			
			for ($i=1;!empty($result[$i]);$i++){
				$wherequery=$wherequery.'OR login="'.$result[$i].'" ';
			}
		$result2=array();	
		$query = $this->db->query('SELECT login FROM user_profiles WHERE '.$wherequery.' ORDER by user_id ASC;');
			foreach ($query->result() as $row)
			{
    			$login=$row->login;
				array_push($result2, $login);
			}	
		return $result2;
	}
	
}
?>