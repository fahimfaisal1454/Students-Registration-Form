<?php include("connection.php"); 
error_reporting(0);
$id= $_GET['id'];
$query = "SELECT * FROM form where ID='$id'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$results = mysqli_fetch_assoc($data);
$language = $results['language'];
$language1 = explode(",",$language);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update List</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <div class="container"> 
        <form action = "#" method="POST">
        <div class="title">Update Students Details</div>
    
    <div class ="form">
        <div class ="input_Field" >
            <label>First Name</label>
            <input type="text" value="<?= $results['First_Name'] ?>" class="input" name="fname" placeholder="Enter First Name" required>
        </div> 
        <div class ="input_Field" >
            <label>Last Name</label>
            <input type="text" value="<?=$results['LastName']?>" class="input" name ="lname" placeholder="Enter Last Name" required>
        </div> 
        <div class ="input_Field" >
            <label>Password</label>
            <input type="password" value="<?= $results['Password'] ?>" class="input" name ="password" placeholder="Enter Password"  required>
        </div> 
        <div class ="input_Field" >
            <label>Confirm Password</label>
            <input type="password" value="<?= $results['ConfirmPassword'] ?>" class="input" name ="cpassword" placeholder="ConfirmPassword" required>
        </div> 
        <div class ="input_Field" >
            <label>Gender</label>
            <div class="custom_select"">
                <select name="gender">
            <option value="">select</option>

            <option value="male"<?php if($results['Gender'] == 'male'){echo 'selected';}?>>Male</option>
                <option value="female"<?php if($results['Gender'] == 'female'){echo 'selected';}?>>female</option>
                <option value="other" <?php if($results['Gender'] == 'other'){echo 'selected';}?>>Other</option>
            </select>
            </div>
        </div> 
        <div class ="input_Field" >
            <label>Email-Address</label>
            <input type="text" value="<?= $results['EmailAddress'] ?>" class="input" name ="email" placeholder="Enter Email" required>
        </div>       
          <div class ="input_Field" >
            <label>Phone Number</label>
            <input type="text" value="<?= $results['PhoneNumber'] ?>" class="input" name= "phone" placeholder="Enter Contact number" required>
        </div> 
        <div class ="input_Field" >
            <label style= "margin-right: 1px;">Background</label>
            <input type="radio" name="r1" value="<?= $results['Background'] ?>"  required style= "margin-left: 5px;"
            <?php
            if($results['Background'] == "Science")
            {
                echo 'checked';
            }

            ?>> <lable style= "margin-left: 2px;">Science</lable>

            <input type="radio" name="r1" value="<?= $results['Background'] ?>"  required style= "margin-left: 5px;"
            <?php
            if($results['Background'] == "Commerce")
            {
                echo 'checked';
            }

            ?>
            > <lable style= "margin-left: 2px;">Commerce</lable>

            <input type="radio" name="r1" value="<?= $results['Background'] ?>"  required style= "margin-left: 5px;"
            <?php
            if($results['Background'] == "Arts")
            {
                echo 'checked';
            }

            ?>
            > <lable style= "margin-left: 2px;">Arts</lable>
            <input type="radio" name="r1" value="<?= $results['Background'] ?>"  required style= "margin-left: 5px;"
            <?php
            if($results['Background'] == "Diploma")
            {
                echo 'checked';
            }

            ?>
            > <lable style= "margin-left: 2px;">Diploma</lable>
        </div>
                <div class ="input_Field" >
            <label style= "margin-right: 1px;">Languages</label>
            <input type="checkbox" name="language[]" value = "Bangla"   style= "margin-left: 5px;"
            <?php
            if(in_array("Bangla", $language1))
            {
                echo 'checked';
            }
            ?>
            > 
            <lable style= "margin-left: 2px;">Bangla</lable>

            <input type="checkbox" name="language[]" value = "English"   style= "margin-left: 5px;"
            <?php
            if(in_array("English", $language1))
            {
                echo 'checked';
            }
            ?>
            > 
            <lable style= "margin-left: 2px;">English</lable>

            <input type="checkbox" name="language[]" value = "German"   style= "margin-left: 5px;"
            <?php
            if(in_array("German", $language1))
            {
                echo 'checked';
            }
            ?>
            >
             <lable style= "margin-left: 2px;">German</lable>
            
        </div>
        <div class ="input_Field" >
            <label>Address</label>
          <textarea class= "textarea" name="address"><?php echo $results['Address']; ?></textarea>
        </div> 
        <div class ="input_Field " >
           <label class="check" >
            <input type="checkbox" required> 
            <span class="checkmark"></span>
           </label> 
           <p>Agree to terms and conditions</p>    
    </div> 
    <div class= input_Field>
        <input type="submit" value="Update" class ="btn" name="update">
    </div>
    </form>

</body>
</html>
<?php

$data="";
    if(isset($_POST['update']))
    {
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

        $query = "UPDATE form SET First_Name='$first_name',LastName='$last_name',Password='$password',ConfirmPassword='$cpassword',Gender='$gender',EmailAddress='$email',PhoneNumber='$phone',Background='$background',Language='$lang1',Address='$address' WHERE ID='$id'";
        //echo $query;
        //die();
        
        if(mysqli_query($conn, $query))
        {
            echo "<script>alert('Your data has been updated successfully')</script>";
            ?>
                <meta http-equiv="refresh" 
                content="0; url = http://localhost/CRUD/list.php" /> 
            <?php
        }
        else
        {
            echo "failed";
        }
    }
?>



