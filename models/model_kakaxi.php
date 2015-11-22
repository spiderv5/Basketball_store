<?php

class Model_kakaxi extends CI_Model {


	public function showshoe() {
			$query = $this->db->query("Select products.pid, products.pname, products.pprice, products.pdesc, products.pics, productcategories.pcatname,
			specproducts.* from products, specproducts, productcategories 
				where products.pid = specproducts.pid and products.pcatid = productcategories.pcatid group by products.pname");

		return $query->result();

	}

}