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
?>

<!DOCTYPE HTML> 
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>$(document).ready(function(){
	var width = screen.width;
	if (width>640) {
		$("body").css({"background-color": "#CCCCCC"});
		$("h1").css({"text-align":"center"});
		$(".subhead").css({"position":"relative", "right":"1.5in","float":"right"});
		$("img").css({"position":"absolute", "top":"0in","left":"0in"});
		$(".noti").css({"color":"red","position":"absolute","right":"1.5in","top":"1.5in"});
		$(".pos").css({"margin":"0.5in"});
		$(".total").css({"color":"red","font-weight":"bold"});
		$(".first").css({"float":"left", "position":"absolute","top":"1.5in","left":"3in","width":"8in", "border-color":"black","border-weight":"1px"});
		$(".second").css({"float":"right","position":"absolute","top":"1.5in","right":"1.5in"});
	}else{
		$("body").css({"background-color": "#CCCCCC"});
		$("h1").css({"text-align":"center"});
		$(".subhead").css({"position":"relative", "right":"0in","float":"right"});
		$("img").hide();
		$(".noti").css({"color":"red","relative":"absolute","right":"0in","top":"0.3in"});
		$(".total").css({"color":"red","font-weight":"bold"});
		$(".first").css({"float":"left", "width":"100%", "border-color":"black","border-weight":"1px"});
		$(".second").css({"float":"left", "width":"100%", "position":"relative", "bottom":"-0.5in"});

	}



	});

</script>
</head>

<body>
<div class='head'><a href="con_kakaxi/index"><h1>Kakaxi's Shoe Shop</h1></a>
<div class='subhead'>
<span style="color: blue" class="welcome"><?php echo $logname ?></span>
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/index">Kakaxi</a>	
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/createnew">Register</a>
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/logout">Login</a>
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/mycart">My cart</a>
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/myorders">My orders</a>
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/editprofile">Edit profile</a>
<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/logout">Logout</a>
</div></div>
<img src='http://cs-server.usc.edu:19045/kakaxi.jpg' width='180' height='150'>

<?php

	$success ="";
	if($updated = $this->session->userdata('updatecart')){
		$success = "<span style='color: red'>You cart has been updated.</span>";
		$this->session->unset_userdata('updatecart');
	}

	if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$cid = $session_data['cid'];
		}




echo '<div class="first">';
echo '<h2>My shopping cart</h2>';
echo $success."<br><br>";
echo '<table>';
echo "<tr><th>Shoe</th><th>Quantity</th><th>Update</th><th>Price</th><th>Delete</th>";
$total = 0;
foreach($cart as $row){
	echo "<tr><td><form action = 'updatecart?shoeid=".$row->pid."' method = 'POST'>";
	echo "<span class='pos'>" . $row->pname. "</span></td>";
	echo "<td><span><input type='text' size='2' name='changenumb' value=" .$row->pnumb."></span>";
	echo "<input type = 'hidden' name='pid' value=".$row->pid."></td>";
	echo "<td><span><input type='submit' value = 'Change'></span></td>";
	echo "<td><span class='pos' style='color: red'>$" .$row->pprice."</span></td></form>";
	$total += ($row->pnumb)*($row->pprice);
	echo "<td><form action = 'deletecart?shoeid=".$row->pid."' method = 'POST'><input type = 'hidden' name='pid' value=".$row->pid."><input type='submit' value = 'Delete'></form></td>";
//	echo "</form>";
}
echo '</table>';
echo '<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/emptycart">Empty Cart</a>';
echo '</div>';
if($total != 0){
	$this->session->set_userdata('total', $total);
	echo "<div class='second'>";
	echo "<form action='checkoutaddress?cid".$cid."' method = 'POST'>
	The total is: <span class='total'>$";
	echo "<input type = 'hidden' name='total' value=".$total.">";
	echo $total;
	echo "</span><br>";
	echo "<input type='submit' value = 'Check out'></form></div>";
}

?>

</body>
</html>