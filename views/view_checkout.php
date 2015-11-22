<!DOCTYPE HTML> 
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
		$(".second").css({"float":"right","position":"absolute","top":"2.5in","right":"1in", "background-color":"white"});
		$(".name").css({"font-weight":"bold"});	
		$(".price, .err").css({"color":"red"});	
		$(".newcustomer").css({"float":"left","position":"absolute","top":"1in","left":"2in","width":"8in"});
	}else{
		$("body").css({"background-color": "#CCCCCC"});
		$("h1").css({"text-align":"center"});
		$(".subhead").css({"position":"relative", "right":"0in","float":"right"});
		$("img").hide();
		$(".noti").css({"color":"red","position":"absolute","right":"0in","top":"0.1in"});
		$(".pos").css({"margin":"0.01in"});
		$(".total").css({"color":"red","font-weight":"bold"});
//		$(".first").css({"float":"left", "position":"absolute","top":"0in","left":"0in","width":"2.5in"});
//		$(".second").css({"float":"right","position":"absolute","top":"2.5in","right":"1in", "background-color":"white"});
		$(".name").css({"font-weight":"bold"});	
		$(".price, .err").css({"color":"red"});	
		$(".newcustomer").css({"float":"left","position":"relative","top":"0in","left":"0in","width":"100%"});
	}


 	$('#profile').on('submit', function(v){
        v.preventDefault();
        $(".error").hide();
		
		namereg = /^[a-zA-Z0-9]*$/;
        emailreg = /([\w\-]+\@[\w\-]+\.[\w\-]+)/;
	    var username = $("#username").val();
	    var password = $("#password").val();
	   	var passwordb = $("#passwordb").val();
	   	var useremail =$("#useremail").val();
	   	var name = $("#name").val();
	   	var cardnumb =$("#cardnumb").val();
		var address =$("#address").val();
		var usercity =$('#usercity').val();
		var userstate = $('#userstate').val();
		var saddress = $('#saddress').val();
		var susercity =$('#susercity').val();
		var suserstate = $('#suserstate').val();

		Error ="";

	   	if (useremail=="") {
	     	$('#useremailr').html('<span class="error"> Please input email</span>');
	     	Error = "Error";
	   	}else if(!useremail.match(emailreg)){
			$('#useremailr').html('<span class="error"> Please input correct email</span>');
			Error = "Error";
	   	}


	   	rnamereg = /^[a-zA-Z ]*$/;
	   	if(name==""){
			$('#namer').html('<span class="error"> Please input name on card</span>');
	     		Error = "Error";
	     }else if(!name.match(rnamereg)){
	   			$('#namer').html('<span class="error"> Please enter correct name </span>');
	   			Error = "Error";
	   	}
	 

	   	numbreg = /^[0-9]*$/;
	   	if(cardnumb==""){
			$('#cardnumbr').html('<span class="error"> Please input your card number</span>');
	     		Error = "Error";
	    }else if(!cardnumb.match(numbreg)){
	   			$('#cardnumbr').html('<span class="error"> Please enter correct cardnumb </span>');
	   			Error = "Error";
	   	}

		addressreg = /^[a-zA-Z0-9 \#]*$/;
	   	if(address==""){
	   		$("#addressr").html('<span class="error"> Please input your address</span>');
	   		Error="Error";
	   	}else if (!address.match(addressreg)) {
	   		$("#addressr").html('<span class="error"> Please correct address, no special charactor is allowed.</span>');
	   		Error="Error";
	   	};

	   	if(usercity==""){
	   		$("#usercityr").html('<span class="error"> Please input your city</span>');
	   		Error="Error";
	   	}else if (!usercity.match(addressreg)) {
	   		$("#usercityr").html('<span class="error"> Please correct city, no special charactor is allowed.</span>');
	   		Error="Error";
	   	};

	   	if(userstate==""){
	   		$("#userstater").html('<span class="error"> Please input your State</span>');
	   		Error="Error";
	   	}else if (!userstate.match(addressreg)) {
	   		$("#userstater").html('<span class="error"> Please correct State, no special charactor is allowed.</span>');
	   		Error="Error";
	   	};


	   	if(saddress==""){
	   		$("#saddressr").html('<span class="error"> Please input your address</span>');
	   		Error="Error";
	   	}else if (!saddress.match(addressreg)) {
	   		$("#saddressr").html('<span class="error"> Please correct address, no special charactor is allowed.</span>');
	   		Error="Error";
	   	};

	   	if(susercity==""){
	   		$("#susercityr").html('<span class="error"> Please input your city</span>');
	   		Error="Error";
	   	}else if (!usercity.match(addressreg)) {
	   		$("#susercityr").html('<span class="error"> Please correct city, no special charactor is allowed.</span>');
	   		Error="Error";
	   	};


	   	if(suserstate==""){
	   		$("#suserstater").html('<span class="error"> Please input your State</span>');
	   		Error="Error";
	   	}else if (!suserstate.match(addressreg)) {
	   		$("#suserstater").html('<span class="error"> Please correct State, no special charactor is allowed.</span>');
	   		Error="Error";
	   	};


		if(Error== ""){
	     		this.submit();
	   	}else{
	   		$("#err1").val("Please input your information follow the instrution.");
	   	}

    });

});



</script>
</head>

<body>
<?php
	$err = $success = "";
	$nameErr = $emailErr = $passwordErr=$cardnumbErr=$usernameErr="";
	$addresserr=$usercityerr=$userstaterr="";
	$saddresserr=$susercityerr=$suserstaterr="";
	$username = $password = $passworda =$passwordb = $email = $cardnumb = $name = $address = $usercity = $userstate = "";
	$saddress = $susercity = $suserstate = "";
	
	if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$cid = $session_data['cid'];
			$logname = $session_data['username'];
			$logname = "Welcome, ".$logname."<br>";
		}
		else{
			$logname = "";
		}

	
	foreach ($userinfo as $row)
		{
			$username = $row->username;
			$password = $row->password;
			$email = $row->useremail;
			$cardnumb = $row->cardnumb;
			$name = $row->name;
			$address = $row->address;
			$usercity = $row->usercity;
			$userstate = $row->userstate;
			$saddress = $row->saddress;
			$susercity = $row->susercity;
			$suserstate = $row->suserstate;
		}
?>


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

<div class="newcustomer" id="newcustomer">
	<h2>Checkout</h2>
	<span class="err" id = "err1"><?php echo $err;?></span><br>
	<span class="err"><?php echo $success;?></span>
	<form action="checkout" id="profile" method="POST">
	Name on card: <input type="text" name="name" id="name" value="<?php echo $name ?>"><span id="namer" class="err">*</span><br>
	E-mail: <input type="text" name="useremail" id="useremail" value="<?php echo $email ?>"><span id="useremailr" class="err">*</span><br>
	Credit Card number: <input type="text" name="cardnumb" id="cardnumb" value="<?php echo $cardnumb ?>"><span id="cardnumbr" class="err">*</span><br>
	Billing Address:<br> 
	Street: <input type="text" name="address" id="address" value="<?php echo $address ?>"><span id="addressr" class="err">*</span><br>
	City:<input type="text" name="usercity" id="usercity" value="<?php echo $usercity ?>"><span id="usercityr" class="err">*</span><br>
	State: <input type="text" name="userstate" id="userstate" value="<?php echo $userstate ?>"><span id="userstater" class="err">*</span><br>

	Shipping Address: <br>
	Street: <input type="text" name="saddress" id="saddress" value="<?php echo $saddress ?>"><span id="saddressr" class="err">*</span><br>
	City:<input type="text" name="susercity" id="susercity" value="<?php echo $susercity ?>"><span id="susercityr" class="err">*</span><br>
	State: <input type="text" name="suserstate" id="suserstate" value="<?php echo $suserstate ?>"><span id="suserstater" class="err">*</span><br>
	<a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi/mycart">Back</a>	<span class="submit"><input type="submit" id= "Place Order" value="Place order"></span>
	</form>
</div>

</body>
</html>