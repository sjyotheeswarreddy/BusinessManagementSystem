
<?php
session_start();
include_once('menu_employee.php');
error_reporting("0");
if (!isset($_SESSION['EMPLOYEE_LOGIN'])) {
    header("location:../employee_login.php");
}
$empid=$_SESSION['EMPLOYEE_LOGIN'];
$userid=$_SESSION['MERCHANT_LOGIN'];
$updateid=$_GET['updateid'];
?>
<?php

if(isset($_POST['select'])) {

$businessname=$_POST['businessname'];
$address=$_POST['address'];
$role=$_POST['PhoneNumber'];
$head_Name=$_POST['head_Name'];




$sql=mysqli_query($con,"UPDATE employeedetails set businessname='$businessname', empadd='$address', emprole='$role', empname='$head_Name' WHERE  empid= '$updateid'");


if ($sql) {
        echo '<script type="text/javascript">';
        echo 'alert(" Successfully...");';
        echo 'window.location.href="employee_profile.php";';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to Register...");';
        echo 'window.location.href="employee_profile.php";';
        echo '</script>';
    }

}
?>
<?php
session_start();
//error_reporting(0);
require_once("config.php");

require_once("config.php");
$query = mysqli_query($con, "SELECT * from employeedetails where empid ='$updateid'");
while ($res = mysqli_fetch_array($query)) {
$UserName = $res['empid'];
$bName = $res['businessname'];
$Address = $res['empadd'];
$role = $res['emprole'];
$empname = $res['empname'];
}

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
    <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">

    <style type="text/css">
        .fixed-button {
            display: none;
        }
    
    @media only screen and (max-width: 425px){
        #up{
            margin-left: 1% !important;
        }
    }
    @media only screen and (max-width: 1115px){
        #upd {
                    display: block;}
                    #up{
            margin-left: 1% !important;
                    }
        
    }
</style>
</head>

<body>
    
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Edit Profile</h5>
                                            
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
                                                        <h4 class="text-white font-weight-bold">Profile Edit</h4>
                                                          </div>
                                                          <div class="card-block table-border-style">
                                                    <table class="table table-hover table-bordered">
                                                        <thead class="bg-primary text-uppercase text-center"> 
                                                        <form method="POST" class="font-weight-bold" enctype="multipart/form-data">
                                                            <div class="form-group row" id="upd">
                                                                <label class="col-sm-0 col-form-label text-primary font-weight-bold ml-3 ">Employee Name:</label>
                                                            <div class="col-sm-10">

                                                                <input type="text"  name="head_Name" class="form-control " style="margin-left:4% " id="up" value="<?php echo $empname; ?>">
                                                            </div>
                                                        </div>                                                        
                                                           <div class="form-group row"id="upd">
                                                                <label class="col-sm-0 col-form-label  text-primary font-weight-bold  ml-3">User Name :</label>
                                                                <div class="col-sm-10">

                                                                <input type="text"  name="UserName" class="form-control " style="margin-left:8%" id="up"value="<?php echo $UserName; ?>">
                                                            </div>
                                                          </div>
                                                            <div class="form-group row"id="upd">
                                                                <label class="col-sm-0 col-form-label text-primary font-weight-bold ml-3"> Role:</label>
                                                                <div class="col-sm-10">

                                                                <input type="text"  name="PhoneNumber" class="form-control" style="margin-left:14%"id="up"value="<?php echo $role; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row"id="upd">
                                                                <label class="col-sm-0 col-form-label text-primary font-weight-bold ml-3">Business Name :</label>
                                                                <div class="col-sm-10">

                                                                <input type="text"  name="businessname" class="form-control "style="margin-left:4%"id="up" value="<?php echo $bName;  ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row"id="upd">

                                                                <label class="col-sm-0 col-form-label text-primary font-weight-bold ml-3 ">Address :</label>
                                                            <div class="col-sm-10"> 
                                                                    
                                                                <input type="text"  name="address" class="form-control " style="margin-left:10%"id="up" value="<?php echo $Address; ?>">
                                                                </div>
                                                            </div>

                                                             <!-- <div class="form-group row">
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
                                                            <center><button type="submit" name="select" class="btn btn-primary waves-effect waves-light">Update</button></center>
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
    <?php 
require_once("db.php");

?> 

 
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
