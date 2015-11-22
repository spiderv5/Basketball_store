<?php

class Model_checkout extends CI_Model {

	public function userinfo(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$cid = $session_data['cid'];
		}else{
			header("Location:http://cs-server.usc.edu:19045/ci/index.php/con_login");
		}
		$query = $this->db->query("Select * from customers where cid = ".$cid);
		return $query->result();
	}

	//Function: put the products into cart
	public function checkout() {
		//Retrive customer id
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$cid = $session_data['cid'];
		}


		//Update customer's information first
		$cardnumb=$name=$address=$usercity=$userstate=$saddress=$susercity=$suserstate="";
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

        $data=array('useremail'=>$useremail,'cardnumb'=>$cardnumb, 'name' => $name, 'address' => $address, 'usercity' => $usercity, 'userstate' =>$userstate, 'saddress' => $saddress, 'susercity' => $susercity, 'suserstate' => $suserstate);
        $this->db->where('cid', $cid);
        $this->db->update('customers',$data);


		//Retrive product id	
		$total = 0;
		$query = $this->db->query("Select * from mycart where cid = ".$cid);
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   { 
		   	$total += ($row->pnumb)*($row->pprice);
		   }
		}


		$date = date('Y-m-d');
		//Add order into the order and orderdetail table
		$neworder = array('cid' =>$cid, 'orderdate'=> $date, 'totalcost'=>$total,'cardnumb'=>$cardnumb, 'name' => $name, 'address' => $address, 'usercity' => $usercity, 'userstate' =>$userstate, 'saddress' => $saddress, 'susercity' => $susercity, 'suserstate' => $suserstate);


		//$oinsert = "INSERT INTO orders (cid, orderdate, totalcost, cardnumb, name, address, usercity, userstate, saddress, susercity, suserstate)  VALUES 
		//			('$cid', '$date', '$total', '$cardnumb', '$name', '$address', '$usercity', '$userstate', '$saddress', '$susercity', '$suserstate')";

		//Start tranction to make sure get the right order id
		$this->db->trans_start();
		//$query = $this->db->query($oinsert);

		//Use active record to avoid SQL injection
		$this->db->insert('orders', $neworder);

		$orderid = $this->db->insert_id();
					
		//Insert order detail information to order detail table
		//This one does not need to worry about SQL injection
		$sel = "SELECT * from mycart where cid = ".$cid;
		$query = $this->db->query($sel);
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   { 
				$pid = $row->pid;
				$price = $row->pprice;
				$qty = $row->pnumb;
				$spec = $row->spec;
				$doinsert = "INSERT INTO orderdetails (orderid, productid, productprice, productqty, spec) 
						VALUES ('$orderid', '$pid', '$price', '$qty', '$spec')";
				$queryb = $this->db->query($doinsert);
			}

		}
		$this->db->trans_complete();
		//Delete mycart after place the order
		$del = "DELETE from mycart where cid = ".$cid;
		$query = $this->db->query($del);
		//notifiy the user that order has been placed.
		$this->session->set_userdata("checkout", "yes");
		if($query)
			{
				return TRUE;
			}
			else {
				header("Location:http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/login");
			}
	}


		
}