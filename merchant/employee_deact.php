<?php
  
    // Connect to database 
    require_once("config.php");
  
    // Check if id is set or not, if true,
    // toggle else simply go back to the page
    if (isset($_GET['id'])){
  
        // Store the value from get to 
        // a local variable "course_id"
        $sno=$_GET['id'];
  
        // SQL query that sets the status to
        // 0 to indicate deactivation.
       
       
            $sql="UPDATE employeedetails SET 
            status=0 WHERE id='$sno'";
           
        
    mysqli_query($con,$sql);
        
  
        // Execute the query
        
    }
  
    // Go back to course-page.php
    header('location: employee_view.php');
?>