<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Operation</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container"> 
        <form action = "#" method="POST" enctype="multipart/form-data">
        <div class="title">Registration Form</div>
    
    <div class ="form">
    <div class ="input_Field" >
            <label style="outline: none">Upload</label>
            <input type="file" name="uploadfile" style=" width: 50%;"> <br> <br>
        </div> 
        <div class ="input_Field" >
            <label>First Name</label>
            <input type="text" class="input" name="fname" placeholder="Enter First Name" required>
        </div> 
        <div class ="input_Field" >
            <label>Last Name</label>
            <input type="text" class="input" name ="lname" placeholder="Enter Last Name" required>
        </div> 
        <div class ="input_Field" >
            <label>Password</label>
            <input type="password" class="input" name ="password" placeholder="Enter Password"  required>
        </div> 
        <div class ="input_Field" >
            <label>Confirm Password</label>
            <input type="password" class="input" name ="cpassword" placeholder="Confirm Password" required>
        </div> 
        <div class ="input_Field" >
            <label>Gender</label>
            <div class="custom_select"">
                <select name="gender">
            <option value="">select</option>    
            <option value="male">Male</option>
                <option value="female">female</option>
                <option value="other">Other</option>
            </select>
            </div>
        </div> 
        <div class ="input_Field" >
            <label>Email-Address</label>
            <input type="text" class="input" name ="email" placeholder="Enter Email" required>
        </div>       
          <div class ="input_Field" >
            <label>Phone Number</label>
            <input type="text" class="input" name= "phone" placeholder="Enter Contact number" required>
        </div> 
        <div class ="input_Field" >
            <label style= "margin-right: 1px;">Background</label>
            <input type="radio" name="r1" value = "Science"  required style= "margin-left: 5px;"> <lable style= "margin-left: 2px;">Science</lable>

            <input type="radio" name="r1" value = "Commerce"  required style= "margin-left: 5px;"> <lable style= "margin-left: 2px;">Commerce</lable>

            <input type="radio" name="r1" value = "Arts"  required style= "margin-left: 5px;"> <lable style= "margin-left: 2px;">Arts</lable>
            <input type="radio" name="r1" value = "Diploma"  required style= "margin-left: 5px;"> <lable style= "margin-left: 2px;">Diploma</lable>
        </div>
        <div class ="input_Field" >
            <label style= "margin-right: 1px;">Languages</label>
            <input type="checkbox" name="language[]" value = "Bangla"   style= "margin-left: 5px;"> <lable style= "margin-left: 2px;">Bangla</lable>

            <input type="checkbox" name="language[]" value = "English"   style= "margin-left: 5px;"> <lable style= "margin-left: 2px;">English</lable>

            <input type="checkbox" name="language[]" value = "German"   style= "margin-left: 5px;"> <lable style= "margin-left: 2px;">German</lable>
            
        </div>
        <div class ="input_Field" >
            <label>Address</label>
          <textarea class= "textarea" name="address"></textarea>
        </div> 
        <div class ="input_Field " >
           <label class="check" >
            <input type="checkbox" required> 
            <span class="checkmark"></span>
           </label> 
           <p>Agree to terms and conditions</p>    
    </div> 
    <div class= input_Field>
        <input type="submit" value="Register" class ="btn" name="submit">
    </div>
    </form>

</body>
</html>
<?php

$data="";
    if(isset($_POST['submit']))
    {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder ="images/.$filename";
        move_uploaded_file($tempname, $folder);


        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $background = $_POST['r1'];
        $language = $_POST['language'];
        $lang1 = implode(",",$language);
        $address = $_POST['address'];


       $query = "INSERT INTO form (Photo,First_Name,LastName,Password,ConfirmPassword,Gender,EmailAddress,PhoneNumber,Background,Language,Address) values ('$folder','$first_name','$last_name','$password','$cpassword','$gender','$email','$phone','$background','$lang1','$address');
        ";
        //echo $query;
        //die();
        
        if(mysqli_query($conn, $query))
        {
            //echo "data inserted successfully";
        }
        else
        {
            echo "failed";
        }
    }
?>



