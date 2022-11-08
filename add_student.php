<?php
session_start();
error_reporting(0);
    if(!isset($_SESSION['username']))
    {
        header("location:index.php");
    }
    elseif($_SESSION['usertype']=='student')
    {
        header("location:index.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="sgs";

    $conn=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_student']))
    {
       $enroll=$_POST['enroll'];
	   $firstname=$_POST['firstname'];
	   $lastname=$_POST['lastname'];
       $email=$_POST['email'];
       $phone=$_POST['phone'];
       $password=$_POST['password'];
       $usertype='student';

       $check="	SELECT * FROM studentlist WHERE enroll='$enroll'";

       $check_user=mysqli_query($conn,$check);

       $row_count=mysqli_num_rows($check_user);

       if ($row_count==1) 
       {
       		echo "<script type='text/javascript'>
       	alert('Username Already Exist')
       	</script>";
       }

       else
       {


       $sql="INSERT INTO studentlist(enroll,firstname,lastname,email,phone,usertype,password) 	VALUES ('$enroll','$firstname','$lastname','$email','$phone','$usertype','$password')";

       $result=mysqli_query($conn,$sql);

       if($result)
       {
       	echo "<script type='text/javascript'>
       	alert('Data Uploaded Successfully')
       	</script>";
       }
       else
       {
       	echo "upload failed";
       }
   	}
    }
?>
<html>
<head>
	<title>Admin panel</title>
	<link rel="stylesheet" type="text/css" href="css/admin-style.css">
	<style type="text/css">
		label
		{
			display: inline-block;
			text-align: right;
			width: 100px;
			padding-top: 10px;
			padding-bottom: 10px;
			font-size: 16px;
		}
		.btn
		{
			padding: 5px 10px;
			background: #fff;
			border-color: #de3163;
			border-radius: 30px;
		}
		.btn:hover{
			background: #de3163;
			color: #fff;
			border-radius: 30px;
		}
		.div_deg
		{
			background-color: #fcf4a3;
			width: 500px;
			padding-top: 70px;
			padding-bottom: 50px;
			border-radius: 40px;
		}
	</style>
</head>
    <body>
    	<!----------------------------------------sidebar code------------------------------------->
      	<?php
      	include 'admin_sidebar.php';
      	?>
        <!------------------------------------------------------------------------------------------>
        <div class="content">
        	<center>
        	<h1>Add Student</h1>
        	<div class="div_deg">
        		<form method="POST" action="#">
				<div>
        				<label>Enroll No.</label>
        				<input type="text" name="enroll" required>
        			</div>
        			<div>
        				<label>First Name</label>
        				<input type="text" name="firstname" required>
        			</div>
					<div>
        				<label>Last Name</label>
        				<input type="text" name="lastname" required>
        			</div>
        			<div>
        				<label>Email</label>
        				<input type="text" name="email" required>
        			</div>

        			<div>
        				<label>Phone</label>
        				<input type="text" name="phone" required>
        			</div>

        			<div>
        				<label>Password</label>
        				<input type="text" name="password" required>
        			</div>
        			<br><br>
        			<div>
        				<input type="submit" class="btn" name="add_student" value="Add Student">
        			</div>
        		</form>
        	</div>
        </center>
        </div>
    </body>
</html>