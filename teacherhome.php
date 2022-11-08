<?php
session_start();
error_reporting(0);
    if(!isset($_SESSION['username']))
    {
        header("location:index.php");
    }
    elseif($_SESSION['usertype']=='admin')
    {
        header("location:index.php");
    }

?>
<html>
<head>
	<title>Teacher panel</title>
	<link rel="stylesheet" type="text/css" href="css/admin-style.css">
		<!----------------------------------------sidebar code------------------------------------->
		<?php
      	include 'teacher_sidebar.php';
      	?>
        <!------------------------------------------------------------------------------------------>
</head>
    <body>
       
        <div class="content">
        	
        </div>
    </body>
</html>