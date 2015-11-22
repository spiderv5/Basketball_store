<?php

?>
<!DOCTYPE HTML> 
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	var width = screen.width;
	if (width<=640) {
		$("body").css({"background-color": "#CCCCCC"});
		$("h1").css({"text-align":"center","color":"blue"});
		$(".subhead").css({"position":"relative", "right":"0in","float":"right"});
		$("img").hide();
		$(".noti").css({"color":"red","position":"absolute","right":"0in","top":"0.1in"});
		$(".pos").css({"margin":"0.02in"});
		$(".total").css({"color":"red","font-weight":"bold"});
		$(".first").css({"float":"left", "position":"relative","top":"0.1in","left":"0in","width":"2.5in"});
		$(".second").css({"float":"left","position":"relative","top":"1in","right":"0.1in", "background-color":"white"});
		$(".name").css({"font-weight":"bold"});	
		$(".price, .err, .error").css({"color":"red"});	
		$(".newcustomer").css({"float":"left","position":"relative","top":"0.01in","left":"0in","width":"100%"})
		$(".submit").css({"position":"relative","left":"0.15in"});
	}else{

		$("body").css({"background-color": "#CCCCCC"});
		$("h1").css({"text-align":"center","color":"blue"});
		$(".subhead").css({"position":"relative", "right":"1.5in","float":"right"});
		$("img").css({"position":"absolute", "top":"0in","left":"0in"});
		$(".noti").css({"color":"red","position":"absolute","right":"1.5in","top":"1.5in"});
		$(".pos").css({"margin":"0.5in"});
		$(".total").css({"color":"red","font-weight":"bold"});
		$(".first").css({"float":"left", "position":"absolute","top":"2in","left":"2in","width":"6in"});
		$(".second").css({"float":"right","position":"absolute","top":"2.5in","right":"1in", "background-color":"white"});
		$(".name").css({"font-weight":"bold"});	
		$(".price, .err, .error").css({"color":"red"});	
		$(".newcustomer").css({"float":"left","position":"absolute","top":"1in","left":"2in","width":"6in"})
		$(".submit").css({"position":"relative","left":"1.5in"});
		}


//Validation
	 $('#profile').on('submit', function(v){
	 	$(".error").hide();
        v.preventDefault();
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
		nameErr = emailErr = passwordErr=cardnumbErr=usernameErr="";
		addresserr=usercityerr=userstaterr="";
		saddresserr=susercityerr=suserstaterr="";

	    if(username==''){
	    	$('#usernamer').html('<span class="err"> Please enter your username </span>'); 
	     	Error = "Error";
	    }else{
	     	if(!username.match(namereg)){
	     	 $('#usernamer').html('<span class="err"> Only letter and number are allowed for username </span>'); 
	     	 Error = "Error";
	     	}
	     }

	    if (password==""||passwordb=="") {
	     	$('#passwordr').html('<span class="err"> Please input password</span>');
	     	Error = "Error";
	   	}else if(password != passwordb){
	   		 $('#passwordr').html("Passwords don't match.");
	   		 Error = "Error";
	   	}else{
	    		if (!password.match(namereg)) {
	     		  $('#passwordr').html("Only letter and number are allowed for password.");
	     		  Error = "Error";
	    		 }
	   		}

	   	if (useremail=="") {
	     	$('#useremailr').html(' Please input email.');
	     	Error = "Error";
	   	}else if(!useremail.match(emailreg)){
			$('#useremailr').html('<span class="err"> Please input correct email</span>');
			Error = "Error";
	   	}


	   	rnamereg = /^[a-zA-Z ]*$/;
	   	if(name!=""){
	   		if(!name.match(rnamereg)){
	   			$('#namer').html('<span class="err"> Please enter correct name </span>');
	   			Error = "Error";
	   		}
	   	}
	   	numbreg = /^[0-9]*$/;
	   	if(cardnumb!=""){
	   		if(!cardnumb.match(numbreg)){
	   			$('#cardnumbr').html('<span class="err"> Please enter correct cardnumb </span>');
	   			Error = "Error";
	   		}
	   	}


		addressreg = /^[a-zA-Z0-9 \#]*$/;
	   	if(address!=""){
	   		if (!address.match(addressreg)) {
	   		$("#addressr").html('<span class="err"> Please correct address, no special charactor is allowed.</span>');
	   		Error="Error";
	   		}
	   	};

	   	if(usercity!=""){
	   		if (!usercity.match(addressreg)) {
	   		$("#usercityr").html('<span class="err"> Please correct city, no special charactor is allowed.</span>');
	   		Error="Error";
	   		}
	   	};

	   	if(userstate!=""){
	   		if (!userstate.match(addressreg)) {
	   		$("#userstater").html('<span class="err"> Please correct State, no special charactor is allowed.</span>');
	   		Error="Error";
	   		}
	   	};


	   	if(saddress!=""){
	   		if (!saddress.match(addressreg)) {
	   		$("#saddressr").html('<span class="err"> Please correct address, no special charactor is allowed.</span>');
	   		Error="Error";
	   		}
	   	};

	   	if(susercity!=""){
	   		if (!usercity.match(addressreg)) {
	   		$("#susercityr").html('<span class="err"> Please correct city, no special charactor is allowed.</span>');
	   		Error="Error";
	   		}
	   	};


	   	if(suserstate!=""){
	   		if (!suserstate.match(addressreg)) {
	   		$("#suserstater").html('<span class="err"> Please correct State, no special charactor is allowed.</span>');
	   		Error="Error";
	   		}
	   	};


	   	if(Error == ""){
	     		this.submit();
	   	}else{
	   		$("#err1").val("Please input your information follow the instrution.");
	   	}




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

	$nameErr = $emailErr = $passwordErr=$cardnumbErr=$usernameErr="";
	$addresserr=$usercityerr=$userstaterr="";
	$saddresserr=$susercityerr=$suserstaterr="";
	$username = $password = $passworda =$passwordb = $email = $cardnumb = $name = $address = $usercity = $userstate = "";
	$saddress = $susercity = $suserstate = $success = $err="";

	if($duplicatename = $this->session->userdata('duplicatename')){
		$err = "Username has been taken, please another one.";
		$this->session->unset_userdata('duplicatename');
	}
	if($updated = $this->session->userdata('createnew')){
		$success = "You profile has been created.";
		$this->session->unset_userdata('createnew');
	}
	
	if(isset($newcustomer)){
		foreach($newcustomer as $row){
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
	}

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
	<h3>Register new user</h3>
	<span class="err" id = "err1"><?php echo $err;?></span><br>
	<span class="err"><?php echo $success;?></span>
	<form action="createnew2" id="profile" method="POST">
	Username: <input type="text" name="username" id="username" value="<?php echo $username ?>"><span id = "usernamer" class="err">*</span><br>
	Password: <input type="password" name="password" id="password" value="<?php echo $password ?>"><span id = "passwordr" class="err">*</span><br>
	Confirm password: <input type="password" name="passwordb" id="passwordb" value="<?php echo $passwordb ?>"><span class="err">*</span><br>
	E-mail: <input type="text" name="useremail" id="useremail" value="<?php echo $email ?>"><span id ="useremailr" class="err">*</span><br>
	Credit Card number: <input type="text" name="cardnumb" id="cardnumb" value="<?php echo $cardnumb ?>"><span id ="cardnumb" class="err"></span><br>
	Name on card: <input type="text" name="name" id="name" value="<?php echo $name ?>"><span id ="namer" class="err"></span><br>
	Billing Address:<br> 
	Street: <input type="text" name="address" id="address" value="<?php echo $address ?>"><span id="addressr" class="err"></span><br>
	City:<input type="text" name="usercity" id="usercity" value="<?php echo $usercity ?>"><span id="usercityr" class="err"></span><br>
	State: <input type="text" name="userstate" id="userstate" value="<?php echo $userstate ?>"><span id="userstater" class="err"></span><br>

	Shipping Address: <br>
	Street: <input type="text" name="saddress" id="saddress" value="<?php echo $saddress ?>"><span id="saddressr" class="err"></span><br>
	City:<input type="text" name="susercity" id="susercity" value="<?php echo $susercity ?>"><span id="susercityr" class="err"></span><br>
	State: <input type="text" name="suserstate" id="suserstate" value="<?php echo $suserstate ?>"><span id="suserstater" class="err"></span><br>
	<span class="back"><a href="http://cs-server.usc.edu:19045/ci/index.php/con_kakaxi">Back</a></span> <span class="submit"><input type="submit" id= "Update" value="Register"></span>
</form>
</div>


</body>
</html>