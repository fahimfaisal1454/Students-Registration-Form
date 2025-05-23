<html>
   <head>
      <title >List</title>
      <style>
         body {
            background-color: greenyellow;
         }
         table {
            background-color: white;
            border-collapse: collapse;
            
         }
         .update
         {
            background-color: rgb(104, 247, 37);
            color: white;
            font-weight: bold;
            cursor: pointer;
           
            padding: 5px;
            border: 0px;
            outline: none;
            border-radius: 7px;
          }
          .update:hover{
            background-color: green;
          }
          .delete
         {
            background-color: red;
            color: white;
            font-weight: bold;
            cursor: pointer;
           
            padding: 5px;
            border: 0px;
            outline: none;
            border-radius: 7px;
          }
          .delete:hover{
            background-color: darkred
          }
         th, td {
            padding: 5px;
            text-align: left;
            border-bottom: 1px solid #ddd;
         }
         th {
            background-color:rgb(104, 247, 37);
            color: white;
         }
      </style>
   </head>


<?php
include("connection.php");
error_reporting(0);
$query = "SELECT * FROM form";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);


 
//echo $total;
if($total != 0)
{
   ?>
   <h2 align="center" >List of all Students</h2>
   <center>
   <table border="3" cellspacing="7" width="100%">
      <tr>
         <th ">ID</th>
         <th style="width: 3%;">Photo</th>
      <th style="width: 3%;">First Name</th>
      <th style="width: 3%;">Last Name</th>
      <th style="width: 3%;">Password</th>
      <th style="width: 3%;">Confirm Password</th>
      <th style="width: 3%;">Gender</th>
      <th style="width: 3%;">Email Address</th>
      <th style="width: 3%;">Phone Number</th>
      <th style="width: 3%;">Background</th>
      <th style="width: 3%;">Language</th>
      <th style="width: 3%;">Address</th>
      <th ">Operation</th>
      </tr>
   <?php
while($results = mysqli_fetch_assoc($data))
{
 echo      " <tr>
 <td>".$results['ID']."</td>
 <td><img src='".$results['Photo']."'height='50px' width='100px' ></td>
<td>".$results['First_Name']."</td>
<td>".$results['LastName']."</td>
<td>".$results['Password']."</td>
<td>".$results['ConfirmPassword']."</td>
<td>".$results['Gender']."</td>
<td>".$results['EmailAddress']."</td>
<td>".$results['PhoneNumber']."</td>
<td>".$results['Background']."</td>
<td>".$results['Language']."</td>
<td>".$results['Address']."</td>
<td><a href='update.php?id=$results[ID]' target='_blank'><input type='submit' value='Update' class='update'></a>
<a href='delete.php?id=$results[ID]' target='_blank'><input type='submit' value='Delete' class='delete' onclick='return checkdelete()'></a></td>
 </tr>";
}
}
else {"no records";
}

?>
</table>
</center>
<script>
   function checkdelete()
   {
      return confirm('Are you sure you want to delete?');
      
   }
</script>