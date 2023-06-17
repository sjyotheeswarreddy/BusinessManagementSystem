
<?php 
session_start();
if (!isset($_SESSION['EMPLOYEE_LOGIN'])) {
    header("location:../employee_login.php");
}
$userid = $_SESSION['EMPLOYEE_LOGIN'];
include_once('menu_employee.php');
error_reporting(0);
require_once("config.php");
$sql = mysqli_query($con, "SELECT * FROM employeedetails WHERE empid='$userid'");
$name = '';
while ($data = mysqli_fetch_array($sql)) {
    $username = $data['businessname'];
    $image=$data['empimg'];
    $manid = $data['empid'];
    $name = $data['empname'];
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
    </style>
    
</head>

<body>
     <div class="pcoded-content">
                        <!-- Page-header start -->
                      <!---->  <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Dashboard</h5>
                                            <p class="m-b-0">Welcome to </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index-2.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="main_content_iner ">
<div class="container-fluid p-0 ">
<div class="row ">
<div class="col-lg-12">
<div class="single_element">
<div class="quick_activity">
<div class="row">
<div class="col-12">
<div class="count_content border mb-3 p-3 bg-white rounded">

<div class="quick_activity_wrap">

<div>


<h3 style="color:DodgerBlue;" >Welcome Back,</h3>
<div>
</br>
<a href="checkin.php?id=<?php echo $manid; ?>" class="notification_btn ml-5 p-2" style="background-color: #00fa9a;">Check-IN</a>
<?php
$mysql = mysqli_query($con, "SELECT * FROM attendance WHERE empid='".$userid."' and endtime=''");
$attendid=0;
while ($mydata = mysqli_fetch_array($mysql)) {
    $attendid=$mydata['id'];
}
?>
<a href="checkout.php?id=<?php echo $attendid; ?>" class="notification_btn p-2" style="background-color: #fa8072;">Check-OUT</a>
</div>
</div>
</div>
</div>
               <!-- Page-header end -->
                            <div class="pcoded-inner-content">
                                <!-- Main-body start -->
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <!-- Page-body start -->
                                        <div class="page-body">
                                            <!-- Basic table card start -->
                                            <div class="card">
                                          <!-- Hover table card start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Work Details</h5>
                                                     <div class="card-header-right">
                                                        <ul class="list-unstyled card-option">
                                                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                                            <li><i class="fa fa-refresh reload-card"></i></li>
                                                            <li><i class="fa fa-trash close-card"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-block table-border-style">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-bordered">
                                                            <thead class="bg-primary  text-center">
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Start Time</th>
                                                                    <th>End Time</th>
                                                                    <th>Total Time</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-center">
<?php
$i = 1;
require_once("config.php");


$sql = mysqli_query($con, "SELECT * FROM attendance WHERE empid = '".$userid."' and status='a'");
while ($data = mysqli_fetch_array($sql)) {
    $id=$data['id'];
    $start = $data['starttime'];
    $end = $data['endtime'];
   // $totaltime=$end-$start;
        $total      = strtotime($end) - strtotime($start);
       // $hours      = floor($total / 60 / 60);
        //$minutes    = round(($total - ($hours * 60 * 60)) / 60);
if($end!=''){
        $hours = floor($total  / 3600);
$minutes = floor(($total  / 60) % 60);
$seconds = $total  % 60;
}

?>
<tr>
<td > <?php echo $i; ?> </td>
<td ><?php echo $start; ?></td> 
<td ><?php if($end==''){echo "---";} else{echo $end; } ?></td>
<td ><?php echo "$hours:$minutes:$seconds"; ?></td>
<td >Working</td>
</tr>

<?php 
$i++;
}
?>

<?php
$itt = 1;
require_once("config.php");
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
//$date = explode($date," ")[0];
$getdate = array();
$getdate = explode(" ",$date);

$sql = mysqli_query($con, "SELECT * FROM attendance WHERE empid = '".$userid."' and status='0'");
while ($data = mysqli_fetch_array($sql)) {
    if(explode(" ",$data['starttime'])[0]==$getdate[0]){
        $id=$data['id'];
        $start = $data['starttime'];
        $end = $data['endtime'];
        //$totaltime=$end-$start;
        if($end!=''){
        $total      = strtotime($end) - strtotime($start);
        $hours = floor($total  / 3600);
$minutes = floor(($total  / 60) % 60);
$seconds = $total  % 60;
        
}
?>
<tr>
<td > <?php echo $itt; ?> </td>
<td ><?php echo $start; ?></td> 
<td ><?php if($end==''){echo "---";} else{echo $end; } ?></td>
<td ><?php echo "$hours:$minutes:$seconds";?></td>
<td >Logged out</td>
</tr>

<?php 
$itt++;
    }
}
?>
<?php
require_once('db.php');
?>
</tbody>
                                                           
                                                        </table>
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

    <!-- slimscroll js -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js"></script>

    <script type="text/javascript" src="assets/js/script.js"></script>
</body>


<!-- Mirrored from technext.github.io/material_able/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 06:38:06 GMT -->
</html>
