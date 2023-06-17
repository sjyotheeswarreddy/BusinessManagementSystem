<?php
session_start();
error_reporting(0);
require_once("config.php");
if (!isset($_SESSION['Sno'])) {
    header("location:./admin_login.php");
}
?>
<?php
include_once('menu_admin.php');
error_reporting("0");
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from technext.github.io/material_able/bs-basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 06:38:23 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <title>Merchant View</title>
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
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
                                            <h5 class="m-b-10">Merchants View</h5>
                                           
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
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Basic table card start -->
                                        <div class="card">
                                            
                                           
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>View Merchants</h4>
                                                
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
                                                        <thead class="bg-primary text-center">
                                                            <tr>
                                                                <th>sno</th>
                                                                <th>company Name</th>
                                                                <th>Name</th>
                                                                <th>Address</th>
                                                                <th>phone</th>
                                                                <th>email</th>
                                                                <th>Action</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                <?php
                                $i = 1;
                                error_reporting(0);
                                require_once("config.php");

                                $query = mysqli_query($con, "SELECT * from  merchant");
                                while ($data = mysqli_fetch_array($query)) {
                                    $sno = $data['id'];
                                    $name = $data['businessname'];
                                    $hname = $data['headname'];
                                    $address = $data['Address'];
                                    $phonenumber = $data['phonenumber'];
                                    $email = $data['email'];
                                    
                                   
                                    



                                ?>
                                    <tr style="border-bottom: 1px solid black;">
                                        <td style="text-align: center;background-color:white"><?php echo $i; ?></td>
                                        <td style="text-align: center;background-color:white"><?php echo $name; ?></td>
                                        <td style="text-align: center;background-color:white"><?php echo $hname; ?></td>
                                        <td style="text-align: center;background-color:white"><?php echo $address; ?></td>
                                        <td style="text-align: center;background-color:white"><?php echo $phonenumber; ?></td>
                                        <td style="text-align: center;background-color:white"><?php echo $email; ?></td>
                                                     
                                        

                                    <td ><a href="merchant_update.php?id=<?php echo $sno; ?>" ><i class="fas fa-edit fa-2x" style='font-size: inherit;' id="update"></i></a>
     <a href="delete_merchant.php?id=<?php echo $sno; ?>" ><i class="fas fa-trash fa-1x" id="delete"></i></a>
                                     <!-- <td style="text-align: center;background-color:white;margin-top: 15px;"> -->
                 <?php 
                    if($data['status']=="1") 
  
                         echo 
"<a href=deact.php?id=".$data['id']."><i class='fas fa-solid green fa-2x fa-eye' style='color:green;font-size: inherit;'></i></a>";
                    else 
                        echo 
"<a href=act.php?id=".$data['id']."><i class='fas fa-solid red fa-2x fa-eye-slash' style='color:red;font-size: inherit;'></i></a>";
                    ?>

                                    </td>

     

                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                            </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Hover table card end -->
                                        <!-- Contextual classes table starts -->
                                       
                                        <!-- Background Utilities table end -->
                                    </div>
                                    <!-- Page-body end -->
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


<!-- Mirrored from technext.github.io/material_able/bs-basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 06:38:23 GMT -->
</html>
