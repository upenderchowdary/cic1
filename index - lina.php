<!DOCTYPE html>
<html>
	<head>
		<title>Login Form</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		
		<style type='text/css'>
			.form-signin
			{
				max-width: 330px;
				padding: 15px;
				margin: 0 auto;
			}
			.form-signin .form-signin-heading, .form-signin .checkbox
			{
				margin-bottom: 10px;
			}
			.form-signin .checkbox
			{
				font-weight: normal;
			}
			.form-signin .form-control
			{
				position: relative;
				font-size: 16px;
				height: auto;
				<!-- margin-left:16%; -->
				padding: 10px;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}
			.form-signin .form-control:focus
			{
				z-index: 2;
			}
			.form-signin input[type="text"]
			{
				margin-bottom: -1px;
				border-bottom-left-radius: 0;
				border-bottom-right-radius: 0;
			}
			.form-signin input[type="password"]
			{
				margin-bottom: 10px;
				border-top-left-radius: 0;
				border-top-right-radius: 0;
			}
			.account-wall
			{
				max-width:100%;
				max-height:100%;
				margin-top: 20px;
				padding: 40px 0px 20px 0px;
				background-color: #f7f7f7;
				-moz-box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.3);
				-webkit-box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.3);
				box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.3);
			}
			.login-title
			{
				color: #555;
				font-size: 18px;
				font-weight: 400;
				display: block;
			}
			.logo
			{
				margin-left:23%;
				margin-bottom:10%;
			}
			.need-help
			{
				margin-top: 10px;
			}
			.new-account
			{
				display: block;
				margin-top: 10px;
			}
		</style>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js
		'></script>
		<script type='text/javascript'>
			$(function() {
				$('form input').keypress(function (e) {
					if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) 
					{
						$('#submit').click();
						false;
					} 
					else
					{
						return true;
					}
				});
			});
		</script>
	</head>

	<body>
		<div class="container">
		<div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in to continue</h1>
            <div class="account-wall">
				<img class="logo" src="ils.png" alt="ILS" />
                <form class="form-signin" method="post" name="loginform">
					<input type="email" name="loginEmail" id="loginEmail" placeholder="Email"  class="form-control" required autofocus />
					<input type="password" name="loginPwd" id="loginPwd" class="form-control" placeholder="Password" required autofoucs />
					<br>
					<input type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" value="Sign in" />
                    <a class="pull-left" href="design\designtemplates\forgotpwd.php" class="text-center new-account">Forgot Password</a>
					<a class="pull-right" href="design\designtemplates\signup.php" class="text-center new-account">New User </a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
		session_start();
		include("config/database.php");

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
			/* echo "<script type='text/javascript'>
			function gologin()
			{
				var email=document.getElementById('loginEmail').value;
				var pwd=document.getElementById('loginPwd').value;
				 if(email == 'user@infinitelinked.com' && pwd == 'user')
				{
					window.location = 'design/designtemplates/accordioncollapse.html';
				}
				else if(email == 'admin@infinitelinked.com' && pwd == 'admin')
				{
					window.location = 'design/designtemplates/datatable.php';
				}
				else
				{
					alert('email id or password is incorrect');
					//alert('email id or password is incorrect');
					$('#loginEmail').focus();
					$('#loginEmail').val('');
					$('#loginPwd').val('');
				} 
			}
			</script>"; */
			
			if(isset($_POST['loginEmail']) && isset($_POST['loginPwd']))
			{ 
				$emailid=$_POST['loginEmail'];
				//echo $emailid;
				$psw=$_POST['loginPwd'];
				//echo $psw;
				$sql_userid = "SELECT userid from users where email_id='$emailid' and password='$psw'";
				$result_id = $conn->query($sql_userid);
				$num_row_id = $result_id->fetch_assoc();
				//var_dump($num_row_id['userid']);
				$_SESSION['usersid'] = $num_row_id['userid'];
				$sql = "SELECT role from users where email_id='$emailid' and password='$psw'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0)
				{
					$num_row = $result->fetch_assoc();
					var_dump($num_row);
					if($num_row["role"]=='user')
					{
						header('Location:design/designtemplates/acc.php');
					}	
					else
					{
						header('Location:design/designtemplates/datatable.php');
					}
				}	
				else
				{
					echo "user id and password is wrong";
				} 
			}
?>