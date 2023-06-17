<?php
require_once("config.php");
include_once('menu.php');
error_reporting("0");

?>

<?php
session_start();
error_reporting(0);
require_once("config.php");
 $id = $_GET['id'];

if (isset($_POST['submit'])) {

$sql = mysqli_query($con, "SELECT * FROM productdetails WHERE id='$id'");
$row = mysqli_fetch_assoc($sql);
$img= $row ['productimage'];



 $productname = mysqli_real_escape_string($con,$_POST['productname']);
 $hsnnumber = mysqli_real_escape_string($con, $_POST['hsnnumber']);
 //$gnumber = mysqli_real_escape_string($con,$_POST['gnumber']);
 $availablequantity = mysqli_real_escape_string($con, $_POST['availablequantity']);
$purchaseprice = mysqli_real_escape_string($con, $_POST['purchaseprice']);
 $productprice = mysqli_real_escape_string($con, $_POST['productprice']);
 $category= mysqli_real_escape_string($con,$_POST['productcategory']);
 $GST = mysqli_real_escape_string($con,$_POST['GST']);
 $productdescription = mysqli_real_escape_string($con,$_POST['productdescription']);
//  $productcategory = mysqli_real_escape_string($con,$_POST['productcategory']);
//  $status = 'a';
//  $businessname = $username;
 $files = $_FILES['productimage'];
 $filename = $files['name'];
 $filetmp = $files['tmp_name']; 
 if ($filename != '') {
        $folder = 'product/'.$filename;
        move_uploaded_file($filetmp, $folder);
        unlink($img);
    }   else{
        $folder = $img;
    }
 
 
 //$bproof = mysqli_real_escape_string($con, $_POST['bproof']);
 //$blogo = mysqli_real_escape_string($con, $_POST['blogo']);
// $sql= mysqli_query($con,"UPDATE productdetails SET productname='$productname',hsnnumber='$hsnnumber',availablequantity='$availablequantity',purchaseprice='$purchaseprice',productprice='$productprice',category='$category',GST='$GST',productdescription='$productdescription',productcategory='$productcategory',productimage='$folder' WHERE id='$id'");
$query=mysqli_query($con, "UPDATE productdetails SET productname = '$productname',hsnnumber = '$hsnnumber',availablequantity = '$availablequantity', purchaseprice = '$purchaseprice',productprice ='$productprice',GST ='$GST', productdescription ='$productdescription', category = '$category', productimage = '$folder' WHERE id ='$id'");

//header('location: view_merchant.php');
if ($query) {
        echo '<script type="text/javascript">';
        echo 'alert("Updated Successfully...");';
        echo 'window.location.href="catologue_view.php";';
        echo '</script>';
    } 

}



$sql = mysqli_query($con, "SELECT * FROM productdetails WHERE id='$id'");
$row = mysqli_fetch_assoc($sql);
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

</head>

<body>
    
<div class="pcoded-content ml-0">
                        <!-- Page-header start -->
                                      
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Catologues Add</h5>
                                            
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
                                                    <div class=" bg-primary text-white card-header">
                                                        <h5 class="text-white">Add Catologue</h5>
                                                          </div>
                                                    <div class="card-block">
                                                        
                                                        <form method="post" class="font-weight-bold" enctype="multipart/form-data">
                                                            <div class="form-group row mt-3">
                                                                <label class="col-sm-2 col-form-label text-primary">Product Name :</label>
                                                                <div class="col-sm-10">
                                                                  <input type="text" name="productname" value="<?php echo $row ['productname'];?>" class="form-control" placeholder="productName">
                                                                </div>
                                                              </div>
                                                              <input type="hidden" name="id">
                                                              <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label text-primary">HSN Number:</label>
                                                                <div class="col-sm-10">
                                                                  <input type="text" name="hsnnumber" value="<?php echo $row ['hsnnumber'];?>"class="form-control" placeholder="hsnnumber">
                                                                </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label text-primary">Availablequantity :</label>
                                                                <div class="col-sm-10">
                                                                  <input type="text" name="availablequantity"value="<?php echo $row ['availablequantity'];?>" class="form-control" placeholder="availablequantity">
                                                              </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label text-primary">purchase price :</label>
                                                                <div class="col-sm-10">
                                                                  <input type="text" name="purchaseprice" value="<?php echo $row ['purchaseprice'];?>" class="form-control" placeholder="purchaseprice">
                                                                </div>
                                                            </div>
                                                              <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label text-primary">Product Price :</label>
                                                                <div class="col-sm-10">
                                                                  <input type="text" name="productprice" value="<?php echo $row ['productprice'];?>" class="form-control" placeholder="productPrice">
                                                                </div>
                                                              </div>
                                                              <!-- <div class="form-group row">
                                                                <label class="col-sm-5 col-form-label">Discount % :</label>
                                                                <div class="col-sm-5">
                                                                  <input type="text" name="discount" value="<?php //echo $discount; ?>" class="form-control" placeholder="Discount %">
                                                                </div>
                                                              </div> -->
                                                              <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label text-primary">GST % :</label>
                                                                <div class="col-sm-10">
                                                                  <input type="text" name="GST" value="<?php echo $row ['GST'];?>" class="form-control" placeholder="GST">
                                                                </div>
                                                              </div>
                                                            
                                                              <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label text-primary">Product Desc :</label>
                                                                <div class="col-sm-10">
                                                                  <input type="text" name="productdescription" value="<?php echo $row ['productdescription'];?>" class="form-control" placeholder="productDesc">
                                                                </div>
                                                              </div>
                                                            
                                                              <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label text-primary">Category :</label>
                                                                <div class="col-sm-10">
                                                                  <input type="text" name="productcategory" value="<?php echo $row ['category'];?>" class="form-control" placeholder="category">
                                                                </div>
                                                              </div>
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-labelv text-primary">Product Image :</label>
                                                                <div class="col-sm-10">
                                                                 <input type="file" name="productimage" value="" class="form-control" placeholder="productImage" style="height:70px; border: none;">
                                                                    <!-- <input type="file" name="productimage" class="form-control"> -->
                                                                </div>
                                                            </div>
                                                             <center><button name="submit" type="submit" class="btn btn-primary waves-effect waves-light">Submit</button></center>
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
