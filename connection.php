<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crudopt";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
    //echo "Connected Successfully";

}
else{
    echo "Connect Failed".mysqli_connect_error();
}
?>