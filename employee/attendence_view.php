<?php
session_start();
require_once("config.php");
if (!isset($_SESSION['EMPLOYEE_LOGIN'])) {
    header("location:../employee_login.php");
}
?>
<?php
error_reporting(0);
require_once("config.php");
if (!isset($_SESSION['EMPLOYEE_LOGIN'])) {
    header("location:../employee_login.php");
}

?>
<?php
// error_reporting(0);
require_once("config.php");

  $admin = $_SESSION['EMPLOYEE_LOGIN'];
  $userid=$_SESSION['MERCHANT_LOGIN'];


$qw = mysqli_query($con, "select * from  employeedetails where empid='$admin'");
$res=mysqli_fetch_assoc($qw);
  $name1 = $res['empname'];
  $image=$res['empimg'];

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
  .date {
    /* margin-top: 25%; */
    margin-left: 23px;
                width: 155px;
                height: 29px;
                margin-top: 10px;
                margin-right: 21px;
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
                            <img class="img-fluid" src="assets/images/kudika.png" alt="Theme-Logo" />
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
                                            <h5 class="m-b-10">Attendence View</h5>
                                           
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
                                                <h5> View Attendence </h5><br>
                                                <div>
                                                <div class="form-group row" id="employee_select">
    <label for="employeeid" class="col-sm-2 col-form-label" hidden>Select EmpID :</label>
      <select id="employeeselect" name="employeeid" hidden>
        <option value='' disabled selected>--Select--</option>
    <?php 
    require_once('config.php');
    $query = mysqli_query($con, "SELECT * FROM employeedetails WHERE empid='$admin'"); 
     while($row = mysqli_fetch_array($query)){
    ?>
        <option value="<?php echo $row['empid'];?>" <?php if(isset($_GET['mysession'])){if($row['empid']==$_GET['mysession']){echo 'selected';}} ?>><?php echo $row['empid'];?> - <?php echo $row['empname']; ?></option>
    <?php }?>
      </select>
      <input type="hidden" id="myempid" <?php echo $admin;?> name="myempid"></input>
</div>

<div id="session_start_id" hidden></div>

<div class="form-group row" id="one">
    <label class="col-sm-2 col-form-label">Select Month :</label>
    <input type="month" name="mymonth" id="mymonth" class="date" >&nbsp;&nbsp;
    <button type="button" name="mybutton" id="mybutton" class="bg-primary rounded">Submit</button>
</div>
</div>
<div class="border mb-5 p-5 bg-white rounded">
<div class="QA_table mb_30">

<table class="table table-responsive table-bordered" id="mytable" style="width:890px;">
<thead class="bg-primary">
<tr id="appendtr" class="">
<th scope="col" colspan="1" class="text-light font-weight-bolder rounded-left">S.No</th>
<th scope="col" colspan="1" class="text-light font-weight-bolder">Emp ID</th>
<th scope="col" colspan="1" class="text-light font-weight-bolder">Month</th>
<div class="text-light ">
<?php
for($it=1;$it<=31;$it+=1){
    echo "<th scope='col' colspan='1' ><span id='myth$it' >$it</span ></th>";
}
?>
</div>
</tr>
</thead>

<tbody>
<?php
$i = 1;
require_once("config.php");
$mysid='';
if(isset($_GET['mysession'])){
    $mysid=$_GET['mysession'];

$array = array();
$stime = '';
$sql = mysqli_query($con, "SELECT * FROM attendance WHERE empid = '".$mysid."' and status='0'");
while ($data = mysqli_fetch_array($sql)) {
    $id=$data['empid'];
    $stime = $data['starttime'];
    // $stime=explode(" ", $data['starttime'])[0];
    // $stime=explode("-", $stime)[2];
    array_push($array, $stime);
    $i++;
}
$mylength=count($array);

$holiarray = array();
$sdate = '';
$q = mysqli_query($con, "SELECT * FROM holidays WHERE merchant_id = ".$userid."");
while ($d = mysqli_fetch_array($q)) {
    $sdate = $d['date'];
    // $stime=explode(" ", $data['starttime'])[0];
    // $stime=explode("-", $stime)[2];
    array_push($holiarray, $sdate);
}
?>
<tr>
<td > 1</td>
<td ><?php echo $mysid; ?></td> 
<td ><span id='setmonth'>-</span></td>
<?php
for($it=1;$it<=31;$it+=1){
    echo "<td ><span id='mytd$it'>-</span></td>";
}
}
?>
</tr>

<?php 
    if(!isset($_GET['mysession'])){
        $i=0;
        $getmyeid = '';
        $esql = mysqli_query($con, "SELECT * from employeedetails WHERE merchant_id=".$userid."");
        while($edata = mysqli_fetch_array($esql)){
            $i++;
            $getmyeid = $edata['empid'];
?>
<tr>
<td > <?php echo $i; ?> </td>
<td ><?php echo $edata['empid']; ?></td> 
<?php 
        $spesql = mysqli_query($con, "SELECT * from attendance WHERE empid='".$getmyeid."' and merchant_id=".$userid."");
        
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d H:i:s");
        $getmonth = explode(" ", $date)[0];
        //echo "<script>alert('".$getmonth."');</script>";
        $mymon = array();
        $mymon = explode("-", $getmonth);
        $getmonth = $mymon[0]."-".$mymon[1];
        echo "<td >$getmonth</td>";

        $holiarray = array();
        $sdate = '';
        $q = mysqli_query($con, "SELECT * FROM holidays WHERE merchant_id = ".$userid."");
        while ($d = mysqli_fetch_array($q)) {
            $sdate = explode(" ", $d['date'])[0];
            $sdate = explode("-", $sdate)[2];
            // $stime=explode(" ", $data['starttime'])[0];
            // $stime=explode("-", $stime)[2];
            array_push($holiarray, $sdate);
        }

        $getalldates = array();
        while($spedata=mysqli_fetch_array($spesql)){
            $getmon = explode(" ", $spedata['starttime'])[0];
            $mymon = explode("-", $getmon);
            $getmon = $mymon[0]."-".$mymon[1];
            if($getmon==$getmonth){
                array_push($getalldates, $mymon[2]);
            }
        }
        for($it=1;$it<=31;$it+=1){
            $getday = strtotime($getmonth."-".$it);
            $getd = date('D', $getday);

            if(in_array($it, $getalldates)){
                echo "<td >P</td>";
            }
            elseif($getd=='Sun'||in_array($it, $holiarray)||in_array("0".$it, $holiarray)){
                echo "<td >H</td>";
            }
            else{
                echo "<td >-</td>";
            }
        }
        ?>
        
        </tr>
<?php    }
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

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
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
    <script type="text/javascript" src="assets/js/jquery/jquery-3.4.1.min.js"></script>
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
    
   
</script>
 <script type="text/javascript">
       $('#mybutton').click(function(){
        var ite=1;
        for(ite=1;ite<=31;ite++){
            var mytdid="#mytd"+(ite);
            $(mytdid).text('-');
        }

        var month = $("#mymonth").val();
        $("#setmonth").text(month);
        //console.log(month);
        var startdate = month+"-01";
        //var startdate1 = month+"-01";
        var enddate = month+"-31";
        //console.log(startdate+" "+enddate);
        var sd1 = new Date(startdate);
        var sd = new Date(startdate);
        var ed = new Date(enddate);
        //console.log(sd1);
        var myday = sd1.toString().split(" ")[0]
        var mymonth = sd1.toString().split(" ")[1];
        var mydate = sd1.toString().split(" ")[2];
        // for(var i=sd;i<=ed;i.setDate(i.getDate()+1)){
        //     console.log(i);
        // }
        var loop= new Date(startdate);
        const final1=[];
        const final2=[];
        while(loop<=ed){
            //console.log(loop);
            const myarray = loop.toString().split(" ");
            if(myarray[1]==mymonth){
                final1.push(myarray[0]);
                final2.push(myarray[2]);
                //console.log(myarray[1]==mymonth);
            }
            //console.log(myarray[0]+" "+myarray[1]);
            var newloop=loop.setDate(loop.getDate()+1);
            loop=new Date(newloop);
        }
        var mylength="<?php echo $mylength; ?>";
        //alert(mylength);
        var indexarr=<?php echo '["'.implode('", "', $array). '"]' ?>;
        const temparr=[];
        var my=0;
        while(my<indexarr.length){
            var tempdate=new Date(indexarr[my]);
            //console.log(indexarr[my]+" "+tempdate);
            if((tempdate.toString().split(" ")[1])==mymonth){
                var ntemp=tempdate.toString().split(" ")[2];
                temparr.push(ntemp);
            }
            my++;
        }
        //alert(indexarr[0]);

        var holiarr=<?php echo '["'.implode('", "', $holiarray). '"]' ?>;
        var h=0;
        var holist = [];
        while(h<holiarr.length){
            var tempd = holiarr[h].split("-")[2];
            var finald = holiarr[h].split("-")[0]+"-"+holiarr[h].split("-")[1];
            if(month==finald){
                holist.push(tempd);
            }
            h++;
        }
        //alert(holiarr+" "+holist);

        var n=0;
        while(n<final1.length){
            var myid="#myth"+(n+1);
            var myval=($(myid).text()).split(",")[0]+','+final1[n];
            //console.log(myid+" "+myval);
            $(myid).text(myval);
            
            //console.log(temparr.indexOf("0"+(n)));
            if(temparr.length>0){
                if(temparr.indexOf(final2[n])!=-1||temparr.indexOf("0"+(final2[n]))!=-1){
                    var mytdid="#mytd"+(n+1);
                    $(mytdid).text('P');
                }
            }
            if(final1[n]=='Sun'){
                var mytdid="#mytd"+(n+1);
                $(mytdid).text('H');
            }
            if(holist.length>0){
                if(holist.indexOf(final2[n])!=-1||holist.indexOf("0"+(final2[n]))!=-1){
                    var mytdid="#mytd"+(n+1);
                    $(mytdid).text('H');
                }
            }
            n++;
        }
    });
    </script>

<script type="text/javascript">
    //$(document).ready(function(){
    //$('#mytable').DataTable({
    //language: {
    //paginate: {
    //next: '&#8594;', // or '→'
    //previous: '&#8592;' // or '←' 
    //}
//}
//});
//
//
    //$("#employeeselect").change(function(){
        //$('#myempid').val();
        //myval=$('#myempid').val().split(" - ")[0];
        //console.log(myval);
        //window.location.href="attendence_view.php?mysession="+myval;
        //$.session.set("mysession",myval);
         //alert(Hi);
        //jQuery('#session_start_id').load("viewattend.php?mysession=sag181");
    //});
    //$.myquery = function(){
        //$('#attendtr').append("<th>hey</th>");
            //alert("here");
    //};
    //function getdates(){
        //console.log("here");
        //$.myquery();
    //}
//
    //$('#mybutton').click(function(){
        //$('#mytable #appendtr').append($("<th scope='col' colspan='1'>"));
        //$('#mytable thead tr>th:last').html("hell");
        //console.log("hmm");
    //});
//
//
//
//
//
    //$('#mybutton').click(function(){
//        
        //var ite=1;
        //for(ite=1;ite<=31;ite++){
            //var mytdid="#mytd"+(ite);
            //$(mytdid).text('-');
        //}
//
        //var month = $("#mymonth").val();
        //$("#setmonth").text(month);
        ////console.log(month);
        //var startdate = month+"-01";
        ////var startdate1 = month+"-01";
        //var enddate = month+"-31";
        ////console.log(startdate+" "+enddate);
        //var sd1 = new Date(startdate);
        //var sd = new Date(startdate);
        //var ed = new Date(enddate);
        ////console.log(sd1);
        //var myday = sd1.toString().split(" ")[0]
        //var mymonth = sd1.toString().split(" ")[1];
        //var mydate = sd1.toString().split(" ")[2];
        //// for(var i=sd;i<=ed;i.setDate(i.getDate()+1)){
        ////     console.log(i);
        //// }
        //var loop= new Date(startdate);
        //const final1=[];
        //const final2=[];
        //while(loop<=ed){
            ////console.log(loop);
            //const myarray = loop.toString().split(" ");
            //if(myarray[1]==mymonth){
                //final1.push(myarray[0]);
                //final2.push(myarray[2]);
                ////console.log(myarray[1]==mymonth);
            //}
            ////console.log(myarray[0]+" "+myarray[1]);
            //var newloop=loop.setDate(loop.getDate()+1);
            //loop=new Date(newloop);
        //}
        //var mylength="<?php echo $mylength; ?>";
        ////alert(mylength);
        //var indexarr=<?php echo '["'.implode('", "', $array). '"]' ?>;
        //const temparr=[];
        //var my=0;
        //while(my<indexarr.length){
            //var tempdate=new Date(indexarr[my]);
            ////console.log(indexarr[my]+" "+tempdate);
            //if((tempdate.toString().split(" ")[1])==mymonth){
                //var ntemp=tempdate.toString().split(" ")[2];
                //temparr.push(ntemp);
            //}
            //my++;
        //}
        ////alert(indexarr[0]);
//
        //var holiarr=<?php echo '["'.implode('", "', $holiarray). '"]' ?>;
        //var h=0;
        //var holist = [];
        //while(h<holiarr.length){
            //var tempd = holiarr[h].split("-")[2];
            //var finald = holiarr[h].split("-")[0]+"-"+holiarr[h].split("-")[1];
            //if(month==finald){
                //holist.push(tempd);
            //}
            //h++;
        //}
        ////alert(holiarr+" "+holist);
//
        //var n=0;
        //while(n<final1.length){
            //var myid="#myth"+(n+1);
            //var myval=($(myid).text()).split(",")[0]+','+final1[n];
            ////console.log(myid+" "+myval);
            //$(myid).text(myval);
//            
            ////console.log(temparr.indexOf("0"+(n)));
            //if(temparr.length>0){
                //if(temparr.indexOf(final2[n])!=-1||temparr.indexOf("0"+(final2[n]))!=-1){
                    //var mytdid="#mytd"+(n+1);
                    //$(mytdid).text('P');
                //}
            //}
            //if(final1[n]=='Sun'){
                //var mytdid="#mytd"+(n+1);
                //$(mytdid).text('H');
            //}
            //if(holist.length>0){
                //if(holist.indexOf(final2[n])!=-1||holist.indexOf("0"+(final2[n]))!=-1){
                    //var mytdid="#mytd"+(n+1);
                    //$(mytdid).text('H');
                //}
            //}
            //n++;
        //}
    //});
//});
</script>

</body>
<!-- Mirrored from technext.github.io/material_able/bs-basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 06:38:23 GMT -->
</html>
