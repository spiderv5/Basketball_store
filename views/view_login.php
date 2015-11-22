<?php
    $loginfail = $this->session->userdata('loginfail');
    if($loginfail){
        $loginfail = "<span class='err'>Invalid username or password.</span>";
        $this->session->unset_userdata('loginfail');
    }else {
        $loginfail = "";
      } 

?>


<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>$(document).ready(function(){
  var width = screen.width;
  if (width>640) {
    $("body").css({"background-color": "#CCCCCC"});
    $("h1").css({"text-align":"center", "color":"blue"});
    $("img").css({"position":"absolute","top":"1in","left":"2.4in", "width":"500","height":"375"});
    $(".err").css({"color":"red"});
    $(".form").css({"position":"absolute","top":"2.5in","right":"3.5in","font-size":"1.5em"});
    $(".submit").css({"position":"relative","left":"2in"});
  }else{
    $("body").css({"background-color": "#CCCCCC"});
    $("h1").css({"text-align":"center", "color":"blue"});
    $("img").hide();
    $(".err").css({"color":"red"});
    $(".form").css({"position":"relative","top":"2in","left":"1in","font-size":"5em"});
    $(".submit").css({"position":"relative","left":"0.5in"});

  }



});
</script>
</head>
<body> 

<a href="con_kakaxi"><h1>Kakaxi's Shoes Shop</h1></a>
<img src='http://cs-server.usc.edu:19045/kakaxi.jpg'>
<div class="form">
    <?php echo $loginfail ?>
    <form action='checklogin' id="login" method="POST">
    <label for="username">Username:</label><input type="text" size="20" name="username" id="username"/>
     <br>
    <label for="password">Password:</label><input type="password" size="20" name="password" id="passowrd"/>
     <br>
    <span class='submit'><input type='submit' name = 'submit' value='Login'></span>
  </div>
</form>
</body>
</html>