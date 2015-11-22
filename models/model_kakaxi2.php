<?php

class Model_kakaxi2 extends CI_Model {

	public function showshoe2($pcatid) {

		$query = $this->db->query("Select products.*, productcategories.pcatname 
			     		from products, productcategories where products.pcatid = productcategories.pcatid and productcategories.pcatid=".$pcatid);
		return $query->result();

	}

//	public function insert1($data){
//		$this->db->insert("products", $data);
		//$this->db->insert_batch("products", $data);
}