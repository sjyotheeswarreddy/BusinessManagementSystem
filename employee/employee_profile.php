
<?php
session_start();
error_reporting(0);
require_once("config.php");
if (!isset($_SESSION['EMPLOYEE_LOGIN'])) {
    header("location:../employee_login.php");
}
 $admin = $_SESSION['EMPLOYEE_LOGIN'];
 $userid=$_SESSION['MERCHANT_LOGIN'];

$qw = mysqli_query($con, "select * from  employeedetails where empid='$admin'");
$res=mysqli_fetch_assoc($qw);
  $name1 = $res['empname'];
  $image=$res['empimg'];

?>
<?php
session_start();
// error_reporting(0);
require_once("config.php");
$empid=$_SESSION['EMPLOYEE_LOGIN'];
$userid=$_SESSION['MERCHANT_LOGIN'];
$query1=mysqli_query($con,"SELECT * from employeedetails where empid='$empid'");
$res=mysqli_fetch_assoc($query1);
$empname=$res['empname'];
// $UserName1=$_SESSION['UserName'];
require_once("config.php");
$query = mysqli_query($con, "SELECT * from 	employeedetails where empid ='$empid'");
while ($res = mysqli_fetch_assoc($query)) {
$UserName = $res['empid'];
$bName = $res['businessname'];
$Address = $res['empadd'];
$role = $res['emprole'];
$empname = $res['empname'];
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from technext.github.io/material_able/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 06:37:54 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <title>Kudika</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  

        <style type="text/css">
        .fixed-button {
            display: none;
        }

      @media only screen and (max-width: 425px) {
  #profile {
    display: inline;
    margin-left: 35px;
    margin-right: 14px;
    }
    #profile1 {
    display: inline;
    margin-left: 71px;
    margin-right: 14px;
    }
    #profile2 {
    display: inline;
    margin-left: 128px;
    margin-right: 14px;
  
    }
    #profile3 {
    display: inline;
    margin-left: 52px;
    margin-right: 14px;
    }
    #profile4 {
    display: inline;
    margin-left: 102px;
    margin-right: 14px;
    }
    #profile5 {
    display: inline;
    margin-left: 102px;
    margin-right: 14px;
    }
}
@media only screen and (max-width: 425px) {
#two {
    display: inline;
}
}

 
    </style>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="employee_index.html">
                            <img class="img-fluid" src="assets/images/old logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                               <!-- <a href="#!" class="waves-effect waves-light">
                                    <i class="ti-bell"></i>
                                    <span class="badge bg-c-red"></span>
                                </a>-->
                                <ul class="show-notification">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user"><?php echo $name1?></h5>
                                                <p class="notification-msg">Admin</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Joseph William</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <img src="<?php echo $image?>" class="img-radius" alt="User-Profile-Image">
                                    <span><?php echo $name1?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <!--<li class="waves-effect waves-light">
                                        <a href="#!">
                                            <i class="ti-settings"></i> Settings
                                        </a>
                                    </li>-->
                                    <li class="waves-effect waves-light">
                                        <a href="employee_profile.php">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                   <!-- <li class="waves-effect waves-light">
                                        <a href="email-inbox.html">
                                            <i class="ti-email"></i> My Messages
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="auth-lock-screen.html">
                                            <i class="ti-lock"></i> Lock Screen
                                        </a>
                                    </li>-->
                                    <li class="waves-effect waves-light">
                                        <a href="employee_login.php">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            

            

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-80 img-radius" src="<?php echo $image?>" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details"><?php echo $name1;?><i class="fa fa-caret-down"></i></span>
                                    </div>
                                </div>
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="employee_profile.php">
                                                <i class="ti-user"></i>View Profile
                                            </a>
                                            <!--<a href="#!"><i class="ti-settings"></i>Settings</a>-->
                                            <a href="employee_login.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            

                            <div class="pcoded-navigation-label"></div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="employee_index.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>

                            
                            
                       
                                </li>
                            </ul>
                            
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="payslips_view.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>SP</b></span>
                                        <span class="pcoded-mtext">Pay Slips</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="holidays_view.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-receipt"></i><b>P</b></span>
                                        <span class="pcoded-mtext">Holidays</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            
                             <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                            <a href="attendence_view.php?mysession=<?php echo $admin; ?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-id-badge"></i></span>
                                                <span class="pcoded-mtext">Attendance</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                     
                                            </a>
                                        </li>
                                    </ul>
                                 </li>
                               
                            </ul>


                        </div>
                    </nav>
    
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Profile details</h5>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <!-- Page body start -->
                                    <div class="page-body">
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="bg-primary text-white card-header">
                                                        <h4 class="text-white font-weight-bold">Profile</h4>
                                                          </div>
                                                          <div class="card-block table-border-style">
                                                    <table class="table table-hover table-bordered">
                                                        <thead class="bg-primary text-uppercase text-center"> 
                                                        <form class="font-weight-bold" method="GET" enctype="multipart/form-data">
                                                            <div class="form-group row" id="two">
                                                                <label class="col-sm-3 col-form-label  text-primary font-weight-bold" id="profile">Employee Name:</label><?php echo $empname; ?>
                                                            </div>
                                                           <div class="form-group row" id="two">
                                                                <label class="col-sm-3 col-form-label text-primary font-weight-bold" id="profile1">UserName :</label><?php echo $UserName; ?>
                                                                <div class="col-sm-9">
                                                            </div>
                                                          </div>
                                                            <div class="form-group row" id="two">
                                                                <label class="col-sm-3 col-form-label text-primary font-weight-bold" id="profile2">Role :</label><?php echo $role; ?>
                                                                <div class="col-sm-10">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row "id="two">
                                                                <label class="col-sm-3 col-form-label text-primary font-weight-bold" id="profile3">Business Name :</label><?php echo $bName; ?>
                                                                <div class="col-sm-10">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row "id="two" >
                                                                <label class="col-sm-3 col-form-label text-primary font-weight-bold" id="profile4">Address :</label><?php echo $Address; ?>
                                                                <div class="col-sm-10">
                                                                </div>
                                                            </div>
                                                            <!-- <button class="msg-btn"><input type="submit"name="submit" value="Update" ></button> -->

                                                           <a href="update.php?updateid=<?php echo $empid; ?>"><center><button type="button" class="btn btn-primary waves-effect waves-light">Edit</button></center></a>                                                           <!-- <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label class= text-primary class= text-uppercase">Head Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="headname" class="form-control" >
                                                                </div>
                                                            </div>


                                                             <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label class= text-primary class= text-uppercase">Business Proof</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="businessproof" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label class= text-primary class= text-uppercase">Password</label>
                                                                <div class="col-sm-10">
                                                                    <input type="password" name="password" class="form-control" >
                                                                </div>
                                                            </div>
                                                            
                                                           <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label class= text-primary class= text-uppercase">Select Box</label>
                                                                <div class="col-sm-10">
                                                                    <select name="select" class="form-control">
                                                                        <option value="opt1">Select Gender</option>
                                                                        <option value="opt2">Male</option>
                                                                        <option value="opt3">Female</option>
                                                                       
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                           
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label class= text-primary class= text-uppercase">Upload Profile Image</label>
                                                                <div class="col-sm-10">
                                                                    <input type="file" name="myfile" class="form-control">
                                                                </div> 
                                                            </div>-->
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- Basic Form Inputs card end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->
                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


 
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Custom js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>


<!-- Mirrored from technext.github.io/material_able/form-elements-component.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 06:38:23 GMT -->
</html>
