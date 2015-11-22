<?php session_start();
class Con_kakaxi extends CI_Controller{


	public function __construct()
     {
            parent::__construct();
            $this->load->model('model_login','',TRUE); 
     }

 //Display all the products    
	public function index()
	{
			$this->load->library('session');

            $this->load->view("view_kakaxi");
            //Load special sales           
            $this->load->model("model_kakaxi");
			$data['result']= $this->model_kakaxi->showshoe();
			$this->load->view('view_specials', $data);

			//Load regurlar products

			$query = $this->db->query("SELECT * FROM productcategories");
			if ($query->num_rows() > 0)
			{
			   foreach ($query->result() as $row)
			   {
		            $this->load->model("model_kakaxi2");
		            //$this->model_kakaxi2->showshoe2();
					$data['result2']= $this->model_kakaxi2->showshoe2($row->pcatid);
					$data['catname'] = $row->pcatname;
					$this->load->view('view_shoes', $data);

				}
			}
			echo "</div>";

	}

	public function login(){
	$this->load->helper(array('form'));
	   if($this->session->userdata('logged_in')){
	   		$this->session->unset_userdata('logged_in');
	   		$this->session->sess_destroy();
	   }
	   $this->load->view('view_login');
	}



	 public function checklogin()
	 {
	   //This method will have the credentials validation
	   $this->load->library('form_validation');

	   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

	   if($this->form_validation->run() == FALSE)
	   {
	     //Field validation failed.  Redirected to login page
	     $this->load->view('view_login');
	   }
	   else
	   {
	    //Success lead to Kakaxi, redirect to shopping site
	    $this->index();
	   }

	 }

	 public function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $username = $this->input->post('username');

	   //query the database
	   $result = $this->model_login->login($username, $password);

	   if($result)
	   {
	     $sess_array = array();
	     foreach($result as $row)
	     {
	       $sess_array = array(
	         'cid' => $row->cid,
	         'username' => $row->username
	       );
	       $this->session->set_userdata('logged_in', $sess_array);
	     }
	     return TRUE;
	   }
	   else
	   {
	     $this->session->set_userdata('loginfail', 'failed');
	     return false;
	   }
	 }
	


//Load the mycart information
	public function mycart(){
		if($session_id = $this->session->userdata('logged_in'))
		 {
			$this->load->model('model_addtocart');
			$data['cart'] = $this->model_addtocart->viewcart();
			$this->load->view('view_mycart', $data);		   
		}
		else{
			$this->login();
		}

	}

//Allow user to logout
	public function logout(){
		if($session_data = $this->session->userdata('logged_in'))
		 {	
		   	$this->session->unset_userdata('logged_in');
   			$this->session->sess_destroy();
		   	$this->load->view('view_login');
		}
		else{
			$this->load->view('view_login');
		}
	 }


	 public function createnew(){
	 	if($session_data = $this->session->userdata('logged_in'))
		 {	
		   	$this->session->unset_userdata('logged_in');
   			$this->session->sess_destroy();
   		}
	 	$this->load->view('view_createnew');
	 }

	 public function createnew2(){
	 	$create =false;
		$this->load->helper('form');
	    $this->load->helper('html');
	    $this->load->model('model_createnew');
	    if($this->input->post())
	    {
	    	$create=$this->model_createnew->createnew($this->input->post()); 
	    }
	    if($create){
	    	$data['newcustomer']=$this->model_createnew->loadfile();
	    	$this->load->view('view_createnew', $data);
	    }else{
	    	$this->load->view('view_createnew');	
	    }

	 }


//Display user information
	 public function editprofile(){
	 	if($this->session->userdata('logged_in')){
	 		$session_data = $this->session->userdata('logged_in');
	 		$data['cid'] = $session_data['cid'];
	 		$this->load->model("model_editprofile");
	 		$data['result3'] = $this->model_editprofile->loadfile($data);
	 		$this->load->view('view_editprofile', $data);
	 	}else{
		$this->login();
		}
	 }

//Update the user information, write it into database	 
	public function editprofile2(){
		$edit =false;
		$this->load->helper('form');
	    $this->load->helper('html');
	    $this->load->model('model_editprofile');
	    if($this->input->post())
	    {
	    	$edit=$this->model_editprofile->editfile($this->input->post()); 
	    }
	    if($edit){
	    	$this->editprofile();
	    }
	 }


//This function allows user to add products into cart

	 public function addtocart(){
	 	$this->load->helper('form');
	    $this->load->helper('html');
	    $logedin = $this->session->userdata('logged_in');
	    
	 	if($logedin){
			$session_data = $this->session->userdata('logged_in');
			$cid = $session_data['cid'];
			$this->load->model('model_addtocart');
			$addtocart = $this->model_addtocart->addtocart($this->input->post());
		}else{
			$this->login();
			return false;
		}

		if($addtocart == TRUE){
			$this->index();
		}

	 }
//Update the quantity of product
	public function updatecart(){
		$updatecart = false;
		$this->load->helper('form');
	    $this->load->helper('html');
	    $this->load->model('model_addtocart');
	   	if($this->input->post())
	    {
	    	$updatecart = $this->model_addtocart->updatecart($this->input->post()); 
	    }
	    if($updatecart){
	    	$this->mycart();
	    }
	}

//Delete one type of product in the cart
	public function deletecart(){
		$this->load->helper('html');
		$this->load->helper('form');
	    $this->load->model('model_addtocart');
	    if($this->input->post())
	    {
	    	$deletecart = $this->model_addtocart->deletecart($this->input->post()); 
	    }
	    if($deletecart){
	    	$this->mycart();
	    }
	}

//Empty all the cart
	public function emptycart(){
		$this->load->model('model_addtocart');
		$emptycart = $this->model_addtocart->emptycart();
		$this->mycart();

	}


//Allow user to checkout
	public function checkoutaddress(){

		$this->load->model('model_checkout');
		$data['userinfo'] = $this->model_checkout->userinfo();
		$this->load->view('view_checkout', $data);
	}

	public function checkout(){
		$this->load->helper('form');
	    $this->load->helper('html');
	    $this->load->model('model_checkout');
	    if($this->input->post())
	    {
	    	$checkout = $this->model_checkout->checkout($this->input->post()); 
	    }
	    if($checkout ==true){
	    	$this->index();
	    }
	}


	public function myorders(){
		if($session_id = $this->session->userdata('logged_in'))
		 {
			$this->load->model('model_orders');
			$data['orders'] = $this->model_orders->vieworder();
			$this->load->view('view_orders', $data);	   
		}
		else{
			$this->login();
		}
	} 

	public function showdetail(){
		$this->load->model('model_orders');
	    if($this->input->post())
	    {
	    	$orderid = $this->input->post("orderid");
			$data['orderdetail'] = $this->model_orders->viewdetail($orderid);
	    }
	}


//Part of the code cited from: http://www.codefactorycr.com/login-with-codeigniter-php.html
}


