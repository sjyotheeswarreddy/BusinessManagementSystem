<?php
session_start();
require_once("config.php");

?>
<?php
error_reporting(0);
require_once("config.php");
if (!isset($_SESSION['MERCHANT_LOGIN'])) {
    header("location:../merchant_login.php");
}

?>
<?php 
require_once("config.php");
$userid=$_SESSION['MERCHANT_LOGIN'];

$sql = mysqli_query($con, "SELECT * FROM merchant WHERE id='$userid'");
while ($data = mysqli_fetch_array($sql)) {
    $username = $data['businessname'];
    $image=$data['myfile'];
    $manid = $data['id'];
  }
  ?>
  <?php
require_once("config.php");
//  $cusname = $_POST['cusname'];
//  $cusgst = $_POST['cusgst'];
//  $prodname = $_POST['prodname'];
//  $prodquantity = $_POST['prodquantity'];
//  $prodprice = $_POST['prodprice'];

if(isset($_POST["submit"])){
    $number = count($_POST["prodname"]); 
 //echo "<script>console.log('$pname')</script>";
 //echo "<script>console.log('".$number."');</script>";
   

 if($number > 0)  
 {  
     $mysql = mysqli_query($con, "SELECT MAX(quotation_id)  FROM quotation");
while ($mydata = mysqli_fetch_array($mysql)) {
    $quotenum = $mydata['MAX(quotation_id)']+1;
}
 $date = date("y-m-d H:i:s");
$userid=$_SESSION['MERCHANT_LOGIN'];
    for($i=0; $i<$number; $i++)  
    {
   $cusname= $_POST["cusname"][$i]; 
   $cusgst=$_POST["cusgst"][$i]; 
   $cusaddress=$_POST["cusaddress"][$i];
   $prodname = $_POST["prodname"][$i]; 
   $prodquantity=$_POST["prodquantity"][$i]; 
   $prodgst=$_POST["prodgst"][$i]; 
   $prodprice=$_POST["prodprice"][$i]; 
   $totalprice=$_POST["totalprice"][$i]; 

  $sql1 = mysqli_query($con,"INSERT INTO quotation (user_id, quotation_id, submitdate, customername, customergst, customeraddress, product, quantity, productgst, productprice, grandtotal, status) VALUES('$userid', '$quotenum', '$date','$cusname', '$cusgst', '$cusaddress', '$prodname', '$prodquantity', '$prodgst', '$prodprice', '$totalprice', 'Pending')"); 
//$total = ($_POST["prodquantity"][$i])*($_POST["prodprice"][$i]);
         
        // if($_POST["prodname"][$i]!='--Select--' And $_POST["prodquantity"][$i]!=0){
        //     $result[$c] = mysqli_query($con, $sql); 
        //     //echo $c;
        //     $c=$c+1;
        // }
    }
   
}
        
if($sql1) { 
        echo '<script type="text/javascript">';
        echo 'alert("Purchase order added...");';
        //echo 'window.location.href="purchase_order.php";';
        echo '</script>';
    }
    else  
    {       echo '<script type="text/javascript">';
        echo 'alert("Failed to add Purchase order...! Please add Purchase order");';
        //echo 'window.location.href="purchase_order.php";';
        echo '</script>';
        }

}
?>
<?php

require_once("config.php");

$userid = $_SESSION['MERCHANT_LOGIN'];

$qw = mysqli_query($con, "select * from  merchant where id='$userid'");
$res=mysqli_fetch_assoc($qw);
 $name1 = $res['headname'];




?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from technext.github.io/material_able/form-elements-component.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 06:38:23 GMT -->
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
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
     <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <style type="text/css">
        .fixed-button {
            display: none;
        }
        @media only screen and (max-width:425px) {
            #Quantity{
                margin-left: -23px;
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
                        <a href="merchant_index.php">
                            <img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" />
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
                                            <img class="d-flex align-self-center img-radius" src="<?php echo $image; ?>" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user"><?php echo $businessname; ?></h5>
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
                                    <img src="<?php echo $image; ?>" class="img-radius" alt="User-Profile-Image">
                                    <span><?php echo $name1?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    
                                    <li class="waves-effect waves-light">
                                        <a href="profile.php">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="subscriptiondetails.php">
                                            <i class="ti-settings"></i> Subscriptions
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="logout.php">
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
                                    <img class="img-80 img-radius" src="<?php echo $image; ?>" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details"><?php echo $name1?><i class="fa fa-caret-down"></i></span>
                                    </div>
                                </div>
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="profile.php"><i class="ti-user"></i>Profile</a>
                                            <a href="subscriptiondetails.php"><i class="ti-settings"></i>subscriptiondetails</a>
                                            <a href="logout.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
<!--
                            <div class="p-15 p-b-0">
                                <form class="form-material">
                                    <div class="form-group form-primary">
                                        <input type="text" name="footer-email" class="form-control">
                                        <span class="form-bar"></span>
                                        <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                                    </div>
                                </form>
                            </div>
-->
                            <div class="pcoded-navigation-label"></div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="merchant_index.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>UM</b></span>
                                        <span class="pcoded-mtext">Catalogue</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="./catologue_view.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">View</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="./catologue_add.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Add</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
<!--    
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="breadcrumb.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Breadcrumbs</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="button.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Button</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="accordion.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Accordion</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="tabs.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Tabs</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="color.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Color</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="label-badge.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Label Badge</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="tooltip.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Tooltip And Popover</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="typography.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Typography</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="notification.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Notifications</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
-->
                                </li>
                            </ul>
                            
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>UM</b></span>
                                        <span class="pcoded-mtext">Quotations</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="./quotation_view.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">View</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="./quotation_add.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Add</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                 </li>
                               
                            </ul>
                            
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>UM</b></span>
                                        <span class="pcoded-mtext">Invoices</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="./invoice_view.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">View</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="./invoice_add.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Add</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                 </li>
                               
                            </ul>
                            
                             <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>UM</b></span>
                                        <span class="pcoded-mtext">Payments</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="./payments_history.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">payments History</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                 </li>
                               
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>UM</b></span>
                                        <span class="pcoded-mtext">Expenses</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="./expenses_view.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">View</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="./expenses_add.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Add</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                 </li>
                               
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>UM</b></span>
                                        <span class="pcoded-mtext">Organization</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="pcoded-hasmenu">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext">Employees</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="./employee_view.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext">View</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="./employee_add.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext">Add</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- </ul> -->
                                        <li class="pcoded-hasmenu">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Holidays</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="./holidays_view.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext">View</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="./holidays_add.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext">Add</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="pcoded-hasmenu">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Attendence</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="./attendence_view.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext">View</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="./attendence_add.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext">Add</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="pcoded-hasmenu">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Payslips</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="./payslips_view.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext">View</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="./payslips_add.php" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext">Add</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                 </li>
                               
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>UM</b></span>
                                        <span class="pcoded-mtext">Support</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="tickets_view.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">View Tickets</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="./tickets_add.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Add Tickets</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                 </li>
                               
                            </ul>
<!--
                            <div class="pcoded-navigation-label">Pages</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-id-badge"></i><b>A</b></span>
                                        <span class="pcoded-mtext">Pages</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="auth-normal-sign-in.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Login</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="auth-sign-up.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Registration</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="sample-page.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-sidebar-left"></i><b>S</b></span>
                                                <span class="pcoded-mtext">Sample Page</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
-->
                        </div>
                    </nav>
                 
    
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Quotations Add</h5>
                                            
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
                                                        <h5 class="text-white">Add Quotations</h5>
                                                          </div>
                                                    <div class="card-block">
                                                        
                                                        <form class="font-weight-bold" method="post" id="add_form">
                                                            <div class="form-group row mt-3">
                                                                <label class="col-sm-2 col-form-label text-primary">Customer Name :</label>
                                                                <div class="col-sm-10">
                                                                  <input type="text" name="customername" id="customername" class="form-control" placeholder="customerName">
                                                                </div>
                                                              </div>
                                                            
                                                              <div class="form-group row">
                                                                <label for="customergst" class="col-sm-2 col-form-label text-primary">Customer GST No :</label>
                                                                  <div class="col-sm-10">
                                                                  <input type="text" name="customergst" id="customergst"  class="form-control" placeholder="customergst">
                                                                </div>
                                                              </div>
                                                            



                                                              <div class="form-group row">
                                                                <label for="customeraddress" class="col-sm-2 col-form-label text-primary">Customer Address :</label>
                                                                  <div class="col-sm-10">
                                                                  <input type="text" name="customeraddress" id="customeraddress" class="form-control" placeholder="Address">
                                                                </div>
                                                              </div>
                                                            
                                                              <div class="form-group row" id="products_select">
                                                            
                                                                <label for="productname" class="col-sm-2 col-form-label text-primary">Select products :</label>
                                                                  <div class="col-sm-10" >
                                                                  <select class="form-control" id="selectProduct" name="productname">
                                                                    <option value='' disabled selected>--Select--</option>
                                                                <?php 
                                                        

                                                                $query = mysqli_query($con, "SELECT * FROM productdetails WHERE status = 'a' and businessname='$username'"); 
                                                                 while($row = mysqli_fetch_array($query)){
                                                                ?>
                                                                    <option value="<?php echo $row['productprice'];?>,<?php echo $row['productname'];?>,<?php echo $row['id'];?>,<?php echo $row['GST'];?>" ><?php echo $row['productname'];?></option>
                                                                <?php }?>
                                                                  </select>
                                                                </div>
                                                                <div class="form-group row" >
                                                                    <label for="quantity" class="col-sm-5 ml-3 mt-3 col-form-label text-primary">Quantity :</label>
                                                                    <div class="col-sm-6"id="Quantity">
                                                                        <input type="number" class="form-control mt-3 ml-4" name="quantity" id="quantity" value="0" min="0">
                                                                      </div>
                                                                  </div>
                                                                <div class="col-sm-10 mt-3">
                                                                  <input type="hidden" class="form-control" name="productid" id="productid">
                                                                </div>
                                                            
                                                                <div class="col-sm-10 mt-3">
                                                                  <input type="hidden" class="form-control" name="productgst" id="productgst">
                                                                </div>
                                                            
                                                                 <div class="col-sm-10 ">
                                                                  <input type="hidden" class="form-control" name="productprice" id="productprice">
                                                                  <button style="background:green; border: none; box-sizing: border-box;border-radius: 5px;" class="btn" type="button" id="add_to_cart" >
                                                                  ADD MORE </button> 
                                                                </div>
                                                                
                                                                <div class="col-sm-2 mt-2 text-center">
                                                                  <input type="hidden" name="productname" id="productshow">      
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                             <div style="clear:both"></div>  
                                                                            <br/>  
                                                                            <h3>Order Details</h3>  
                                                                            <div class="table-responsive">  
                                                                                 <table class="table table-responsive table-bordered" style="border: 1px solid black;" id="mytable">  
                                                                                    <thead>
                                                                                      <tr>  
                                                                                           <th width="30%" style="border: 1px solid black; text-align: center;">Item Name</th>  
                                                                                           <th width="5%" style="border: 1px solid black; text-align: center;">Quantity</th>  
                                                                                           <th width="30%" style="border: 1px solid black; text-align: center;">Price</th>  
                                                                                           <th width="30%" style="border: 1px solid black; text-align: center;">Total Price(+GST)</th>  
                                                                                           <th width="5%" style="border: 1px solid black; text-align: center;">Action</th>  
                                                                                      </tr>  
                                                                                    </thead>
                                                                                     
                                                                                 </table>  
                                                                            
                                                             <div class="row text-center">
                                                            <div class="col-sm-12 "> 
                                                                   <!-- <button class="btn btn-success" id="addNew" >ADD NEW</button> -->
                                                            </div>
                                                            </div> 
                                                            
                                                              <div class="form-group row mt-2">
                                                                <!-- <label class="col-sm-5 col-form-label">Total Amount :</label> -->
                                                                <div class="col-sm-5">
                                                                  <input type="hidden" id="grandtotal" name="grandtotal" class="form-control" placeholder="Total">
                                                                </div>
                                                                </table>
                                                              </div>
                                                              </div>
                                                             <center><button class="btn btn-primary waves-effect waves-light" name="submit">Submit</button></center>
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
    

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
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



    <script type="text/javascript">    
    
$("#add_to_cart").click(function(){
  if($("#mytable tbody").length==0){
    $("#mytable").append("<tbody></tbody>");
  }
  var len = $("#mytable tbody tr").length;
  var custname = $("#customername").val();
  var custgst = $("#customergst").val();
  var custaddress = $("#customeraddress").val();
  var pri = $("#productprice").val();
  var gst =  $("#productgst").val();
  var tot = parseInt(pri)*parseInt($("#quantity").val());
  //var totprice = ($("#quantity").val()*($("#productprice").val()+($("#productprice").val()*$("#productgst").val()/100)));
  var totprice = (parseInt(gst)*(tot)/100)+(tot);
 // console.log(custname+""+custgst+""+totprice);
  $("#mytable tbody").append("<tr>"+"<td><input type='text' value='"+$("#selectProduct option:selected").text()+"' name='prodname[]' id='prodname' readonly></input></td>"
    +"<td><input type='number' name='prodquantity[]' id='prodquantity' value="+$("#quantity").val()+" readonly></input></td>"+"<td><input type='number' name='prodprice[]' id='prodprice' value="+$("#productprice").val()+" readonly></input></td>"
    +"<td><input type='number' name='totalprice[]' id='totalprice' value="+totprice+" readonly></input></td>"
    +"<td><button type='button' class='btn btn-danger remove'>Remove</button></td>"+"</tr><input type='hidden' name='cusname[]' value='"+custname+"'><input type='hidden' name='cusgst[]' value='"+custgst+"'><input type='hidden' name='cusaddress[]' value='"+custaddress+"'><input type='hidden' name='prodgst[]' value='"+gst+"'>");

  formclear();


  $(".remove").click(function(){
  $(this).parents("tr").remove();
});

function formclear(){
  $("#selectProduct").val("");
  $("#quantity").val(0);
}
});
</script>
<script type="text/javascript">

  $(document).ready(function(){

    // $('#add_cart').click(function(){            
    //        $.ajax({  
    //             url:"updatecart.php",  
    //             method:"POST",  
    //             data:$("#add_form").serialize(),  
    //             success:function(data)  
    //             {  
    //                  alert(data);  
    //             }  
    //        });  
    //   });

  $("#selectProduct").change(function(){
    var price = $(this).children("option:selected").val().split(',')[0];
    var productname = $(this).children("option:selected").val().split(',')[1];
    var proid = $(this).children("option:selected").val().split(',')[2];
    var progst = $(this).children("option:selected").val().split(',')[3];

    console.log(proid);

    var priceshow = $("#productprice").val(price);
    var productname1 = $("#productshow").val(productname);
    var prodid = $('#productid').val(proid);
    var prodgst = $('#productgst').val(progst);
    

    $("#quantity").change(function(){
    var price = $("#productprice").val();
    var qty = $("#quantity").val();
    var progst = $("#productgst").val();
    var pricetotal = (parseInt(price*qty)+parseInt(price*qty*progst/100));
    var grandtotal = $("#grandtotal").val(pricetotal);

  });

  });

  });

</script>
</body>


<!-- Mirrored from technext.github.io/material_able/form-elements-component.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 06:38:23 GMT -->
</html>
