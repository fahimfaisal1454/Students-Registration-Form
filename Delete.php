<?php
include("connection.php");
$id= $_GET['id'];
$query = "DELETE FROM form Where ID='$id'";
$data = mysqli_query($conn, $query);

if($data)
{
     echo "<script>alert('Your data has been updated successfully')</script>";   
    ?>  
               <meta http-equiv="refresh" 
                content="0; url = http://localhost/CRUD/list.php" />
                
                <?php
}
else{
    echo "Record Not Deleted";
}
?>