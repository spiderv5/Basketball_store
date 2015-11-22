<?php
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$cid = $session_data['cid'];
			$logname = $session_data['username'];
			$logname = "Welcome, ".$logname."<br>";
		}
		else{
			$logname = "";
		}

		if($addtocart = $this->session->userdata('addtocart')){
				$addtocart = "Items have been added.<br>";
				$this->session->unset_userdata('addtocart');
		}else {
			$addtocart = "";
			} 

		if($checkouted = $this->session->userdata('checkout')){
				$orderplace = "You order has been placed.<br>";
				$this->session->unset_userdata('checkout');
		}else {
			$orderplace = "";
		}

?>
<!DOCTYPE HTML> 
<html>
<head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>$(document).ready(function(){
	var width = screen.width;
	if (width>640) {
		$("body").css({"background-color": "#CCCCCC"});
		$("h1").css({"text-align":"center","color":"blue"});
		$(".subhead").css({"position":"relative", "right":"1.5in","float":"right"});
		$(".first").css({"float":"left", "width":"95%"});
		$(".second").css({"float":"left", "width":"95%"});
		$(".category").css({"margin":"5px","padding":"5px","border-width":"3px", "border-style":"solid", "border-color":"orange","float":"left","text-align":"center","width":"100%","height":"4.1in","overflow":"auto"});
		$(".shoes, .special").css({"margin":"5px","padding":"5px","border-width":"1px", "border-style":"solid", "border-color":"blue","float":"left","text-align":"center","width":"3in","height":"2.8in"});
		$(".noti").css({"color":"red"});
		$(".name").css({"font-weight":"bold"});
		$(".price").css({"color":"red"});
		$(".err").css({"color":"red"});
		$(".categoryname").css({"color":"red","font-weight":"bold"});
		$(".kakaxi").css({"position":"absolute","top":"0in","right":"0in", "width":"60","height":"50"});
		$(".pics").css({"display":"inline","margin":"5px"});
	}else{
		$("body").css({"background-color": "#CCCCCC"});
		$("h1").css({"text-align":"center","color":"blue"});
		$(".subhead").css({"position":"relative", "right":"0in","float":"right"});
		$(".first").css({"float":"left", "position":"relative","top":"0.1in","left":"0in","width":"100%"});
		$(".second").css({"float":"left", "left":"0in","width":"100%"});
		$(".category").css({"margin":"5px","padding":"5px","border-width":"3px", "border-style":"solid", "border-color":"orange","float":"left","text-align":"center","width":"100%","height":"4in","overflow":"auto"});
		$(".shoes, .special").css({"margin":"5px","padding":"5px","border-width":"1px", "border-style":"solid", "border-color":"blue","float":"left","text-align":"center","width":"100%","height":"3.2in"});
		$(".noti").css({"color":"red"});
		$(".name").css({"font-weight":"bold"});
		$(".price").css({"color":"red"});
		$(".err").css({"color":"red"});
		$(".categoryname").css({"color":"red","font-weight":"bold"});
		$(".kakaxi").hide();
		$(".pics").css({"display":"inline","margin":"5px"});

	}

});
</script>

</head>

<body>
<div class='head'><a href="con_kakaxi"><h1>Kakaxi's Shoe Shop</h1></a>
<div class='subhead'>
<span style="color: blue" class="welcome"><?php echo $logname ?></span>
<span style= "color: red" class= "noti"><?php echo $addtocart ?><?php echo $orderplace ?></span>
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/index">Kakaxi</a>	
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/createnew">Register</a>
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/login">Login</a>
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/mycart">My cart</a>
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/myorders">My orders</a>
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/editprofile">Edit profile</a>
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/logout">Logout</a>

</div>
</div>


<img class='kakaxi' src="http://cs-server.usc.edu:19045/kakaxi.jpg" />


<div class='first'>
<h2>Special sales</h2>
