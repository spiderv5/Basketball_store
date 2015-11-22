<?php

class Model_addtocart extends CI_Model {

	//Function: put the products into cart
	public function addtocart() {
		//Retrive customer id
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$cid = $session_data['cid'];
		}
		//Retrive product id
		$pid = $this->input->post('pid');
		$sale = $this->input->post('sale');		
		$query = $this->db->query("Select * from products where pid = ".$pid);
		foreach ($query->result() as $row){
			  $price = $row->pprice;
			  $qty = $this->input->post($row->pname);
		}


//Check it's a special sale or normal sale

		if($sale == "normal")
		{
			$query = $this->db->query("Select * from mycart where spec = 0 and pid =".$pid. " and cid = ".$cid);
		}else if($sale = "sale") {
			$query = $this->db->query("Select * from mycart where spec = 1 and pid =".$pid. " and cid = ".$cid);
		}

		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row){
  				  $oldqty = $row->pnumb;
  				  $qty = $qty + $oldqty;
  				}

			if($sale == "normal"){
				$insert = "UPDATE mycart set pnumb = '$qty', spec = 0 WHERE spec = 0 and pid = '$pid' and cid = '$cid'";
			}else if($sale = "sale"){
				$insert = "UPDATE mycart set pnumb = '$qty', spec = 1 WHERE spec = 1 and pid = '$pid' and cid = '$cid'";
			}

		}else {
			if($sale == "normal"){
				$insert = "INSERT INTO mycart (cid, pid, pnumb, pprice, spec) VALUES ($cid, $pid, $qty, $price, 0)";
			}
			else if($sale = "sale"){
				$query = $this->db->query("Select * from specproducts where pid = ".$pid);
				foreach ($query->result() as $row){
				  $price = $row->specpprice;
				}
				$insert = "INSERT INTO mycart (cid, pid, pnumb, pprice, spec) VALUES ($cid, $pid, $qty, $price, 1)";
			}
		}


		$query= $this->db->query($insert);
		$success = $this->db->affected_rows();
		if($success>0)
		{
			$this->session->set_userdata('addtocart', "yes");
			return TRUE;
	//		header("Location:http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi");
		}
	}

	//Function: retrive all the products in the cart
	public function viewcart(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$cid = $session_data['cid'];
		}else{
			header("Location:http://cs-server.usc.edu:19045/ci/index.php/con_login");
		}
		$query = $this->db->query("Select mycart.*, products.pname from mycart, products where mycart.pid = products.pid and mycart.cid = ".$cid);
		return $query->result();

	}

//change the quantity of the product
	public function updatecart(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$cid = $session_data['cid'];
		}else{
			header("Location:http://cs-server.usc.edu:19045/ci/index.php/con_login");
		}
		$pid = $this->input->post('pid');
		$qty = $this->input->post('changenumb');
		if($query = $this->db->query("UPDATE mycart set pnumb = '$qty' WHERE pid = '$pid' and cid = '$cid'")){
			$this->session->set_userdata("updatecart", "yes");
			return true;
		}
	}

	//Delete the selected product
	public function deletecart(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$cid = $session_data['cid'];
		}else{
			header("Location:http://cs-server.usc.edu:19045/ci/index.php/con_login");
		}
		$pid = $this->input->post('pid');
		if($query = $this->db->query("DELETE from mycart WHERE pid = '$pid' and cid = '$cid'")){
			$this->session->set_userdata("updatecart", "yes");
			return true;
		}
	}

//CLear the cart
	public function emptycart(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$cid = $session_data['cid'];
		}else{
			header("Location:http://cs-server.usc.edu:19045/ci/index.php/con_login");
		}
		if($query = $this->db->query("DELETE from mycart WHERE cid = '$cid'")){
			$this->session->set_userdata("updatecart", "yes");
			return true;
		}
	}

}