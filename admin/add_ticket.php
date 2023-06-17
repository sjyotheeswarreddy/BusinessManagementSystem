<?php
include_once('menu_admin.php');
error_reporting("0");
?>
<?php
session_start();
error_reporting(0);
require_once("config.php");
if (!isset($_SESSION['Sno'])) {
    header("location:./admin_login.php");
}
?>
<?php
 error_reporting(0);
 require_once("config.php");
 $query = mysqli_query($con, "SELECT * from  merchant");
 while ($data = mysqli_fetch_array($query)) {
$sno = $data['id'];

error_reporting(0);
require_once("config.php");
if(isset($_POST["submit"])){
$user_id=$sno;
$issue_type =$_POST['Problem_Name'];
$message =$_POST['message'];
$files = $_FILES['img'];
 $filename = $files['name'];
 $filetmp = $files['tmp_name'];    
 $folder = 'assets'.$filename;
 move_uploaded_file($filetmp, $folder);
//$status='1';

$sql = mysqli_query($con, "INSERT INTO  addsupport(user_id,issue_type,message,pro_img) VALUES('$user_id','$issue_type','$message','$folder')");
if ($sql) {
            echo '<script type="text/javascript">';
            echo 'alert("Added Successfully...");';
            echo 'window.location.href="view_ticket.php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Failed to Add...");';
            echo 'window.location.href="add-ticket.php";';
            echo '</script>';
        }


}

?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from technext.github.io/material_able/form-elements-component.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 06:38:23 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <title>Merchant</title>
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
                                            <h5 class="m-b-10">Tickets Add</h5>
                                            
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
                                                        <label class="col-sm-2 col-form-label  "><h4>Add Tickets</h4></label>
                                                          </div>
                                                    <div class="card-block">
                                                        
                                                <form  class="font-weight-bold" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label class= text-primary class= text-uppercase">Issue type</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="Problem_Name" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label class= text-primary class= text-uppercase">Issue discription</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="message" class="form-control" placeholder="Type your issue discription">
                                                                </div>
                                                            </div>
                                                          
                                                            
                                                           
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label class= text-primary class= text-uppercase">Upload Profile Image</label>
                                                                <div class="col-sm-10">
                                                                    <input type="file" name="img" class="form-control" style="height: 70px; border: none;">
                                                                </div>
                                                            </div>
                                                             <center><button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button></center>
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
