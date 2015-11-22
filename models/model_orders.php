<?php

class Model_orders extends CI_Model {

	public function vieworder(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$cid = $session_data['cid'];
		}else{
			header("Location:/ci/index.php/con_login");
		}
		$query = $this->db->query("SELECT * from orders where cid = ".$cid);
		return $query->result();
	}
	public function viewdetail($orderid){
		$query = $this->db->query("SELECT orderdetails.*, products.pname from orderdetails, products where orderdetails.productid = products.pid and orderdetails.orderid = ".$orderid);
		echo "<h3>Order detail</h3>";
		echo "<table border = '1' style = 'width:300px; border-collapse:collapse; text-align: center'>";
		echo "<tr><th>Shoe</th> <th>Price</th><th>Quantity</th><tr>";
		foreach($query->result() as $row){
			echo "<tr><td>".$row->pname."</td>";
			echo "<td>$".$row->productprice."</td>";
			echo "<td>".$row->productqty."</td></tr>"; 
		}


	//	return $query->result();

	}


}