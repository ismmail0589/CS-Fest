<?php
session_start();
include "db/connect.php";
$id = $_GET["updateid"];
$type_query = "SELECT * FROM `participants` WHERE `participants`.`p_id` =$id";
$run_query = mysqli_query($con, $type_query);
$row = mysqli_fetch_array($run_query); 
$name = $row['fullname'];
$email = $row['email'];
$mobile = $row['mobile'];
$college = $row['college'];
$branch = $row['branch'];
if (isset($_POST["signup_button"])) {

	
	$full_name = $_POST["full_name"];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$college = $_POST['college'];
	$branch = $_POST['branch'];
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

if(empty($full_name)  || empty($email)  ||
	empty($mobile) ) {
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($name,$full_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $full_name is not valid..!</b>
			</div>
		";
		exit();
	}
	
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>
		";
		exit();
	}
	//existing email address in our database
		$sql = "UPDATE `participants` SET `fullname` = '$full_name', `email` = '$email', `mobile` = '$mobile', `college` = '$college', `branch` = '$branch' WHERE `participants`.`p_id` =$id";
		
		if(mysqli_query($con,$sql)){
			echo "register_success";
			echo "<script> location.href='admin.php'; </script>";
            exit;
		}
	}
	
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
	<style>
		.btn:hover{
			background-color: cornflowerblue;
		}
		.btn{
			display: flex;
			justify-content: center;
			border-radius: 8px;
		}
		h3{
			text-align: center;
			color: aliceblue;
		}
		body{
			background-image: url('R.jpeg');
        background-position: center;
        background-size: cover;
      }
	  form{
		margin: 0 auto;
	  }

		</style>
</head>
<body>
	<center>
<div class="mt-5 ml-15 row block-9">
	       <div class="dabba"></div>
          <div class="pl-md-5 col-md-6 pr-md-5  ">
			<h3>UPDATE</h3>
            <form method="post" class="was-validated">
              <div class="form-group row" >
                <input type="text" name="full_name" class="form-control field-border mt-3 ms-5" placeholder="Your Name" value=<?php
                echo $name;?> required>
              </div>
                
              
              <div class="form-group row">
                <input type="email" name="email" class="form-control field-border mt-3 ms-5 me-5" placeholder="Your Email" value=<?php
                echo $email;?> required>
              </div>
              <div class="form-group row">
                <input type="text" class="form-control field-border mt-3 ms-5" name="mobile" placeholder="mobile" value=<?php
                echo $mobile;?> required>
              </div>
              <div class="form-group row">
                <input type="text" class="form-control field-border mt-3 ms-5" name="college" placeholder="college" value=<?php
                echo $college;?> required>
              </div>
              <div class="form-group row">
                <input type="text" class="form-control field-border mt-3 ms-5" name="branch" placeholder="branch" value=<?php
                echo $branch;?> required>
              </div>
              
              <div class="form-group ">
                <input  value="Update" type="submit" name="signup_button" class="btn btn-primary py-3 px-5 btn mt-3 update" required>
              </div>
            </form>
          
          </div>

          <div class="col-md-6" id="map"></div>
        </div>
		</center>
</body>
</html>