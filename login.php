<?php
session_start();
	
	$db= mysqli_connect("localhost","root","","authentication");
	
	if(isset($_POST['login_btn'])){
		
		$username=mysqli_real_escape_string($db,$_POST['username']);
		$password=mysqli_real_escape_string($db,$_POST['password']);
		//$email=mysqli_real_escape_string($db,$_POST['email']);
		
		
		
		//if((empty($_POST[$username])||(empty($_POST[$password]))){
			//echo '<script>alert("Please Fill UserName and Password")</script>';
	    //}
		//else{
			$password=md5($password);
			$sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result=mysqli_query($db,$sql);
			if(mysqli_num_rows($result)==1){
				$_SESSION['message']="You are now logged in";
				$_SESSION['username']=$username;
				header("Location:home2.php");
			}else{
				$_SESSION['message']="Invalid Username/Password";
			}
		//}
	}
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/style2.css" rel='stylesheet' type='text/css' />
<title>LOGIN</title>
</head>
<body>
<div class="ab1">
		<ul>
		<li><a href="index.html">HOME</a></li>
		<li style="float:right"><a href="signup.php">Register</a></li>
		</ul>
		</div>
	
	<div class="main">
	
	
	
		
      <h2>||...USER LOGIN...||</h2>
	  <?php
		if(isset($_SESSION['message'])){
			echo "<div class = 'ab3'>".$_SESSION['message']."</div>";
			unset($_SESSION['message']);
		}
		?>
		<form method="post" action="login.php">
		<fieldset>
		<legend><div class="ab2"><img src="images/logob.png"></div></legend>
		   <div class="lable">
		        <div class="col_1_of_2 span_1_of_2"><input type="text" class="text" name="username" placeholder="UserName"></div>
            </div>
		   <div class="lable-2">
				 <input type="password" class="text" name="password" placeholder="Password">
							
		   </div>
		   
		   <div class="submit">
			  <input type="submit" name="login_btn" value="Login" >
		   </div>
		   
		   </fieldset>
		</form>
		
		<!-----//end-main---->
	</div>
		
</body>
</html>