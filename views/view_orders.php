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


<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	var width = screen.width;
	if (width>640) {
		$("body").css({"background-color": "#CCCCCC"});
		$("h1").css({"text-align":"center"});
		$(".subhead").css({"position":"relative", "right":"1.5in","float":"right"});
		$("img").css({"position":"absolute", "top":"0in","left":"0in"});
		$(".noti").css({"color":"red","position":"absolute","right":"1.5in","top":"1.5in"});
		$(".pos").css({"margin":"0.5in"});
		$(".total").css({"color":"red","font-weight":"bold"});
		$(".first").css({"float":"left", "position":"absolute","top":"2in","left":"2in","width":"6in"});
		$(".second").css({"position":"absolute","top":"2.5in","right":"1in"});
	}else{
		$("body").css({"background-color": "#CCCCCC"});
		$("h1").css({"text-align":"center"});
		$(".subhead").css({"position":"relative", "right":"0in","float":"right"});
		$("img").hide();
		$(".noti").css({"color":"red","position":"relative","right":"0in","bottom":"0.5in"});
		$(".total").css({"color":"red","font-weight":"bold"});
		$(".first").css({"float":"left", "position":"relative","top":"0in","left":"0in","width":"100%"});
		$(".second").css({"float":"left", "position":"relative","top":"0in","right":"0in","width":"100%"});
	}	
	$("button").click(function()
	{
		$.ajax({
			type: "POST",
			url:"http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/showdetail",
			data: {orderid:$(this).attr('id')},
			dataType: "text",
			cache:false,
			success: 
			function(data){
				$("#myDiv").html(data);
			}
		});
		return false;
    });
});
</script>
</head>



<body>
<div class='head'><a href="con_kakaxi"><h1>Kakaxi's Shoe Shop</h1></a>
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
echo '<div class="first">';
echo "<h3>My orders</h3><br>";
echo "<table border = '1' style = 'width:300px; border-collapse:collapse; text-align: center'><tr><th>Order date<th>Total cost</th><th>Detail</th></tr>";
foreach($orders as $row){
	echo "<tr><td>".$row->orderdate."</td>";
	echo "<td><span style='color:red'>$".$row->totalcost."</span></td>";
	echo "<td><button id ='".$row->orderid."' onclick= 'showdetail(this)'>Detail</button></td></tr>";
}
echo "</table>";
echo "</div>";
echo "<div class='second' id = 'myDiv'>";
echo "</div>";


?>