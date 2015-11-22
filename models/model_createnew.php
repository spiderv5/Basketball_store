<?php

class Model_createnew extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }

	public function loadfile() {
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$cid = $session_data['cid'];
			$query = $this->db->query("Select * from customers where cid=".$cid);
		return $query->result();
		}
	}

	public function createnew(){

		$cardnumb=$name=$address=$usercity=$userstate=$saddress=$susercity=$suserstate="";
		$username = htmlspecialchars($this->input->post('username', TRUE));

		$query = $this->db->query("select * from customers where username = '$username'");
		if ($query->num_rows() > 0){
			$this->session->set_userdata('duplicatename', "YES");
			return false;
		}

		$password = htmlspecialchars($this->input->post('password', TRUE));
		if($this->input->post('useremail')){
			$useremail = trim(stripslashes(htmlspecialchars($this->input->post('useremail', TRUE))));
		}

		if($this->input->post('cardnumb')){
			$cardnumb = trim(stripslashes(htmlspecialchars($this->input->post('cardnumb', TRUE))));
		}
		if($this->input->post('name')){
			$name = trim(stripslashes(htmlspecialchars($this->input->post('name', TRUE))));
		}
		if($this->input->post('address')){
			$address = trim(stripslashes(htmlspecialchars($this->input->post('address', TRUE))));
		}
		if($this->input->post('usercity')){
		$usercity = trim(stripslashes(htmlspecialchars($this->input->post('usercity', TRUE))));
		}
		if($this->input->post('userstate')){
		$userstate = trim(stripslashes(htmlspecialchars($this->input->post('userstate', TRUE))));
		}
		if($this->input->post('saddress')){
			$saddress = trim(stripslashes(htmlspecialchars($this->input->post('saddress', TRUE))));
		}
		if($this->input->post('susercity')){
			$susercity = trim(stripslashes(htmlspecialchars($this->input->post('susercity', TRUE))));
		}
		if($this->input->post('suserstate')){
			$suserstate = trim(stripslashes(htmlspecialchars($this->input->post('suserstate', TRUE))));
		}

//Use active record to avoid SQL injection
        $data=array('username'=>$username, 'password'=>$password, 'useremail'=>$useremail,'cardnumb'=>$cardnumb, 'name' => $name, 'address' => $address, 'usercity' => $usercity, 'userstate' =>$userstate, 'saddress' => $saddress, 'susercity' => $susercity, 'suserstate' => $suserstate);
       
        if($this->db->insert('customers',$data))
      	{
        	$this->session->set_userdata('createnew', "YES");

        	$sess_array = array(
		         'cid' => $this->db->insert_id(),
		         'username' => $username
		       );
     		$this->session->set_userdata('logged_in', $sess_array);
        	return true;
    	} else{
    		return false;
    	}
	}
}