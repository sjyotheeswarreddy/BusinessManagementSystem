<?php 
session_start();
require_once("config.php");
if (isset($_POST['submit'])) {
 $email = mysqli_real_escape_string($con,$_POST['email']);
 $password = mysqli_real_escape_string($con,$_POST['password']);
 $res=mysqli_query($con,"SELECT * FROM admin WHERE UserName='$email' AND Password='$password'");
 if($row=mysqli_num_rows($res) > 0){
  $_SESSION['ADMIN_LOGIN'] = 'YES';
  header('location: admin/merchant_admin.php');
    die();
 }else{
        echo "<script>";
        echo "alert('UserName or Password Mis-Match');";
        echo "window.location.href='admin_login.php';";
        echo "</script>";
 }
 
}

?>





<style type="text/css">
	.dropbtn {
  background-color: transparent;
  color: white;
  padding: 6px;
  width: 120px;
  font-size: 16px;
  border:2px solid linear-gradient(rgba(11, 223, 238, 0.911),rgba(77, 212, 14, 0.911));
  border-radius: 50px;
  margin-right: 50px;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: none;
  min-width: 200px;
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: transparent;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: transparent;}
/*-------------------LOGIN CSS----------------------------*/
.cs_modal {
    background-color: #fef1f2;
    text-align: center;
}
.btn_1{
  background: none; 
  border: none; 
  width: 100%;
  cursor: pointer;
}
.modal-content {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 50%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 0.3rem;
    outline: 0;
    margin-left: 25%;
    margin-top: 15%;
}
*, ::after, ::before {
    box-sizing: border-box;
}
user agent stylesheet
div {
    display: block;
}
.modal-title{
  background-color: #3d31cd;
  padding: 8px;
  font-size: 32px;
  color: white;
}
.form-group{
  width: 80%;
  margin-left: 10%;
  margin-top: 30px;
  margin-bottom: 0px;
}
.form-control{
  width: 100%;
  padding: 8px;
}
.form-group-1{
  width: 80%;
  margin-left: 10%;
  background-color: #3d31cd;
  padding: 8px;
  margin-top: 30px;
  color: white;
}
@media only screen and (max-width: 1200px) {
  .modal-content {
    margin-top: 20%;

    }
}
@media only screen and (max-width: 900px) {
  .modal-content {
    margin-top: 25%;

    }
}
@media only screen and (max-width: 767px) {
  .modal-content {
    margin-top: 35%;

    }
}

/*-------------------------------------LOGIN CSS COMPLETE-------------------------------*/
</style>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/cryptocurrency/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Mar 2022 17:22:52 GMT -->
<head>
<title>Admin Login</title>
<meta charset="UTF-8">
<meta name="description" content="Cryptocurrency Landing Page Template">
<meta name="keywords" content="cryptocurrency, unica, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="img/favicon.ico" rel="shortcut icon" />

<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

<link rel="stylesheet" href="css/bootstrap.min.css%2bfont-awesome.min.css%2bthemify-icons.css%2banimate.css%2bowl.carousel.css%2bstyle.css.pagespeed.cc.JWs9dCHR3I.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />

<link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
<link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />


<link rel="stylesheet" href="vendors/scroll/scrollable.css" />

<link rel="stylesheet" href="css/metisMenu.css">

<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<script nonce="cd465345-d57a-4de9-83f0-5c9ac5ce27ae">(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>
<body>

<div id="preloder">
<div class="loader"></div>
</div>

<header class="header-section clearfix">
<div class="container-fluid">
<a href="index.php" class="site-logo">
<img src="img/logo.png" alt="">
</a>
<div class="responsive-bar"><i class="fa fa-bars"></i></div>
<a href="#" class="user"><i class="fa fa-user"></i></a>
<!-- <a href="#" class="site-btn">Sign Up Free</a> -->
<nav class="main-menu">
<ul class="menu-list" style="color:#2d1967;">
<li ><a href="index.php" style="color: #2d1967;">Home</a></li>
<li><a href="#"  style="color: #2d1967;">About Us</a></li>
<li><a href="#"  style="color: #2d1967;">Features</a></li>
<li><a href="#"  style="color: #2d1967;">Contact</a></li>
</nav>
</div>
</header>


<section class="container-fluid text-center" style="height: 100%; background-image: url(./img/hero-bg_2.png);"> 
<div class="container text-center"> 
<div class="row"> 
<div class="modal-content cs_modal" >
<div class="modal-header justify-content-center theme_bg_1" >
<h5 class="modal-title text_white" >Admin Login</h5>
</div>
<div class="modal-body" >
<form method="post">
<div class="form-group" >
<input type="email" class="form-control" name="email" placeholder="Enter your email" required>
</div>
<div class="form-group" >
<input type="password" name="password" class="form-control" placeholder="Password" required>
</div>
<button name="submit" class="btn_1">
<div class="form-group-1" >
Login
</div>
</button>
<p>Need an account? <a data-toggle="modal" data-target="#sing_up" data-dismiss="modal" href="#"> Sign Up</a></p>
</form>
</div>
</div>
</div>
</div>
 </section>




<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-3.2.1.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script>//<![CDATA[
/* =================================
------------------------------------
	Cryptocurrency - Landing Page Template
	Version: 1.0
 ------------------------------------ 
 ====================================*/


'use strict';


$(window).on('load', function() {
	/*------------------
		Preloder
	--------------------*/
	$(".loader").fadeOut(); 
	$("#preloder").delay(400).fadeOut("slow");

});

(function($) {

	/*------------------
		Navigation
	--------------------*/
	$('.responsive-bar').on('click', function(event) {
		$('.main-menu').slideToggle(400);
		event.preventDefault();
	});


	/*------------------
		Background set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});

	
	/*------------------
		Review
	--------------------*/
	var review_meta = $(".review-meta-slider");
    var review_text = $(".review-text-slider");


    review_text.on('changed.owl.carousel', function(event) {
		review_meta.trigger('next.owl.carousel');
	});

	review_meta.owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		items: 3,
		center: true,
		margin: 20,
		autoplay: true,
		mouseDrag: false,
	});


	review_text.owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		items: 1,
		margin: 20,
		autoplay: true,
		navText: ['<i class="ti-angle-left"><i>', '<i class="ti-angle-right"><i>'],
		animateOut: 'fadeOutDown',
    	animateIn: 'fadeInDown',
	});



	 /*------------------
		Contact Form
	--------------------*/
    $(".check-form").focus(function () {
        $(this).next("span").addClass("active");
    });
    $(".check-form").blur(function () {
        if ($(this).val() === "") {
            $(this).next("span").removeClass("active");
        }
    });


})(jQuery);


//]]></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"6e5393c468224ae1","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/cryptocurrency/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Mar 2022 17:23:01 GMT -->
</html>
