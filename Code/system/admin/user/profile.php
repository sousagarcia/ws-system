<?php

session_start();

include "../../../includes/functions.php";
include "../../../includes/config.php";
session_checker();

if($_SESSION['system_user_level'] == 0){

	header('location: ../system/user/');
}

if($_SESSION['system_user_level'] == 1){


}

$sql = mysql_query ("Select * From system_user where id_system_user='".@$_GET['id']."'"); 
$exibe = mysql_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>WouSoftware - User</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../../../layout/w3css/4/w3.css">
<link rel="stylesheet" href="../../../../layout/lib/w3-theme-black.css">
<link rel="stylesheet" href="../../../../layout/css/font-awesome.min.css">

<style>
img{max-width:100%;height:auto;}
</style>

</head> 
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
     <a href="../../../admin/" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Painel de Controle </a>
	 <a href="../../../logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-in"></i></a>
   
  </div>
</div>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" style="z-index:3;width:250px;margin-top:43px;" id="mySidebar">
   <div class="w3-card-4" style="width:100%">
    <header class="w3-container w3-light-grey">     
	   <center><i class="glyphicon glyphicon-user"></i><h6><?php echo $_SESSION['system_user_name']; ?> </h6></center>	
<center><img src="../../../../layout/images/WouSoftware.png" alt="Avatar" style="width:100px"></center>	   
    </header>
	<br/>	
  </div>
  
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 class="w3-bar-item"><b>Menu</b></h4>
<h5><a class="w3-bar-item w3-button w3-hover-black" href="../user/"><i class="fa fa-user"></i>  User</a>
	<a class="w3-bar-item w3-button w3-hover-black" href="../support/"><i class="fa fa-comment"></i>  Support</a>
	<a class="w3-bar-item w3-button w3-hover-black" href="../software/"><i class="fa fa-window-maximize"></i>  Software</a>
	<a class="w3-bar-item w3-button w3-hover-black" href="../validation/"><i class="fa fa-key"></i>  Validation</a></h5>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

  <div class="w3-row">
  
  	<header class="w3-container" style="padding-top:45px">
	<h5><i class="fa fa-users"></i>  User - Profile</h5>
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-black w3-card-4">
        <div class="w3-display-container">
          <img src='../user/images/banner.jpg' style='width:100%' alt='Avatar'>		  
          <div class="w3-display-bottomleft w3-container w3-text-black">
          </div>
        </div>
        <div class="w3-container">
          <hr>
		  <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-black"></i><?php echo @$exibe['system_user_email']; ?></p>
          <p><i class="fa fa-phone-square fa-fw w3-margin-right w3-large w3-text-black"></i><?php echo @$exibe['system_user_phone']; ?></p>
          <hr>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <h2 class="w3-text-black w3-padding-16">
		<i class='fa fa-user fa-fw w3-margin-right w3-xxlarge w3-text-black'></i><?php echo @$exibe['system_user_name']; ?></h2>
        <div class="w3-container">
    
	<div class="w3-panel w3-green">   
	<h3><i class="fa fa-check"></i>  Cliente</h3>
	<p><?php echo @$exibe['system_user_text']; ?></p>
	</div><p>

		<i class="fa fa-address-card-o fa-fw w3-margin-right"></i>CPF/CNPJ: <?php echo @$exibe['system_user_code']; ?><p>
		<i class="fa fa-calendar fa-fw w3-margin-right"></i>Data de Nascimento: <?php echo @$exibe['system_user_date']; ?><p>	
        <hr>
		  
	  
		<div class="w3-container">
        <p>Detalhes</p>
        <p>
        <center>
		<span class="w3-tag w3-small w3-theme-d5"><i class="fa fa-level-up" aria-hidden="true"></i> <?php echo @$exibe['system_user_level']; ?></span>
        <span class="w3-tag w3-small w3-theme-d1"><i class="fa fa-check" aria-hidden="true"></i> <?php echo @$exibe['system_user_status']; ?></span>
		<span class="w3-tag w3-small w3-theme-l1"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> <?php echo @$exibe['system_user_date_register']; ?></span>
        <span class="w3-tag w3-small w3-theme-l2"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php echo @$exibe['system_user_date_login']; ?></span>
		<span class="w3-tag w3-small w3-theme-l3"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo @$exibe['system_user_ip']; ?></span></center>
		</p>
		</div>
		
        </div>
        <div class="w3-container">
      <div class="w3-card-2 w3-round w3-white w3-hide-small w3-responsive">

      </div>
	  
        </div>
        <div class="w3-container">
<br/>

        
        </div>
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>

<!--<footer class="w3-container w3-padding-5 w3-light-grey w3-center">
  <div class="w3-xlarge w3-section ">
    <h6><a href="https://www.facebook.com/wousoftware/"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="http://www.twitter.com/wousoftware"><i class="fa fa-twitter w3-hover-opacity"></i></a>
    <a href="https://www.youtube.com/channel/UCTvjF-nToNWtsZNJIaIu5ow"><i class="fa fa-youtube w3-hover-opacity"></i></a>
	<i>Copyright ?? 2014-2017 / All Rights Reserved <a href="WouSoftware" title="WouSoftware" target="_blank" class="w3-hover-text-black">WouSoftware.com</a><h6/></i>
  </div>
</footer> -->

</div>
<script>
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>