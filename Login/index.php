<?php
include 'connect.php';
session_start();
$_SESSION['msg'] = '';


  if (isset($_POST['submit'])) {
  
         	$username = mysqli_real_escape_string($conn, $_POST['a_name']);
          	$password = mysqli_real_escape_string($conn, $_POST['password']);


            if ($username == "admin" && $password == "admin" ) {
              header("location:admin/admin.php");
            }
            else
          {        

           $sql = "SELECT * FROM register WHERE a_name='$username'";
           $result = mysqli_query($conn, $sql);
           $resultcheck = mysqli_num_rows($result);
           if ($resultcheck < 1) {

           	  $_SESSION['msg'] = "User not valid"; 

           }

          else
          {
           	if($row = mysqli_fetch_assoc($result))
           	{
              
            	if($password == $row['password'] AND $row['a_verify'] == '1')
           		{

           			$_SESSION['a_id'] = $row['a_aadhar'];
                header("location:applicant/index.php");
                
           		}
           		elseif($row['a_verify'] == 'n')
           		{
           			$_SESSION['msg'] = "User request rejected";
           		}
              else
              {
                $_SESSION['msg'] = "User not verified";
              }
           	}
          } 
        } 
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login-Palliative care unit</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Trendy Login Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
<!-- //web font -->
</head>
<body>
	
	<!-- main -->

	</div>
	<div class="agileits-main"> 
	<div class="w3top-nav">	
				<div class="w3top-nav-left">	
					<h1>Palliative Care Unit</h1>
				</div>	
				<div class="w3top-nav-right">
					<a href="http://localhost/pcu/index.html" class="new" >Home</a> 
				</div>
				<div class="clear"></div>
			</div>	
		<div class="header-main">
		<h2>Login Now</h2>
		<?php if (isset($_SESSION['msg'])); { ?>
		<div class="msg" style="background-color: red;  color: white;">
			<?php echo $_SESSION['msg']; } ?>
		</div>
			<div class="header-bottom">
				<div class="header-right w3agile">

					<div class="header-left-bottom agileinfo">
						<form action="" method="POST">
							<div class="icon1">
								<input type="text" name="a_name" autocomplete="off" placeholder="Applicant Name" required=""/>
							</div>
							<div class="icon1">
								<input type="password" name="password"  autocomplete="off" placeholder="Password" required=""/>
							</div>
							<div class="login-check">
								 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Keep me logged in</label>
							</div>
							<div class="bottom">
								<input type="submit" name="submit" value="Login" />
							</div>
							<p class="Register"><a href="Register/index.php">Register!</a></p>
					</form>	
					</div>
				</div>
			</div>
	</div>

	</div>	
	<!-- //main -->
</body>
</html>