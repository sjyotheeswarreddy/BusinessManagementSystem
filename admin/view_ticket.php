<?php
include_once('menu_admin.php');
error_reporting("0");
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from technext.github.io/material_able/bs-basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 06:38:23 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <title>View Tickets</title>
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
        @media only screen and (max-width: 425px){
        .center{
            margin-left: 11% !important;
            /* margin-top: 20px; */
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
                                            <h5 class="m-b-10">Tickets View</h5>
                                           
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
                                                <h4>View Tickets</h4>
                                                
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
                                                        <thead class="bg-primary text-uppercase text-center"> 
                                                            <tr>
                                                                <th>sno</th>
                                                                <th>NAME</th>
                                                                <th>ISSUE TYPE</th>
                                                                <th>DISCRIPTION</th>
                                                               <!-- <th>type</th>
                                                                <th>discription</th>-->
                                                                <th>image</th>
                                                               <th>Actions</th>



                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                <?php
                                $i = 1;
                                error_reporting(0);
                                require_once("config.php");

                                $query = mysqli_query($con, "SELECT addsupport.*,merchant.headname from addsupport,merchant where addsupport.user_id=merchant.id");
                                while ($data = mysqli_fetch_array($query)) {
                                    $sno = $data['id'];
                                    $issue_type = $data['issue_type'];
                                    $message = $data['message'];
                                    $pro_img = $data['pro_img'];
                                    //$phonenumber = $data['phonenumber'];
                                    //$email = $data['email'];
                                    $status = $data['status'];
                                   $hname = $data['headname']; 
                                    



                                ?>
                                    <tr style="border-bottom: 1px solid black;">
                                        <td style="text-align: center;background-color:white"><?php echo $i; ?></td>
                                        <td style="text-align: center;background-color:white"><?php echo $hname; ?></td>
                                        <td style="text-align: center;background-color:white"><?php echo $issue_type; ?></td>
                                        <td style="text-align: center;background-color:white"><?php echo $message; ?></td>
                                    <td style="text-align: center;background-color:white"><img src="../merchant/<?php echo $pro_img; ?>"style="width: 50px;height: 50px; border-radius: 50%;"></td>
                                       <!-- <td style="text-align: center;background-color:white"><?php echo $phonenumber; ?></td>
                                        <td style="text-align: center;background-color:white"><?php echo $email; ?></td>-->
                                                     
                                        <td class="text-center">
<div class="dropdown action-label text-center">


<select class="center"  onchange="window.location='status_check1.php?id='+this.value;" id="quotstatus<?php echo $i ?>">
  <option></option>
  <option class="dropdown-item" <?php if($status == 'Completed') {?> selected="selected"<?php } ?> value="<?php echo $data['id'] ?>,Completed">Completed</option>
  
  <option class="dropdown-item" <?php if($status == 'Pending') {?> selected="selected"<?php } ?> value="<?php echo $data['id'] ?>,Pending">Pending</option>   
 </select>
</div>
</div>
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
