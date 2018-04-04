<?php
session_start();
	
	$db= mysqli_connect("localhost","root","","authentication");
	
	if(isset($_POST['register_btn'])){
		
		$username=mysqli_real_escape_string($db,$_POST['username']);
		$email=mysqli_real_escape_string($db,$_POST['email']);
		$password=mysqli_real_escape_string($db,$_POST['password']);
		$password2=mysqli_real_escape_string($db,$_POST['password2']);
		$contact=mysqli_real_escape_string($db,$_POST['contact']);
		$add=mysqli_real_escape_string($db,$_POST['address']);
		$event=mysqli_real_escape_string($db,$_POST['dropdown']);
		
		
		
		
		
			
			
		 if(strcmp($password,$password2)==0){
			
			
			$password=md5($password);
			if(strcmp($event,"aarohan")==0){
			$sql1="INSERT INTO `aarohan`(`username`,`email`,`contact`) VALUES('$username','$email','$contact')";
			$sql="INSERT INTO `users`(`username`,`email`,`password`,`contact`,`address`) VALUES('$username','$email','$password','$contact','$add')";
			mysqli_query($db,$sql1);
			mysqli_query($db,$sql);
			$_SESSION['message']="You are now logged in";
			$_SESSION['username']=$username;
			header("Location:home.php");
			}
		    if(strcmp($event,"bizquiz")==0){
				$sql1="INSERT INTO `bizquiz`(`username`,`email`,`contact`) VALUES('$username','$email','$contact')";
			$sql="INSERT INTO `users`(`username`,`email`,`password`,`contact`,`address`) VALUES('$username','$email','$password','$contact','$add')";
			mysqli_query($db,$sql1);
			mysqli_query($db,$sql);
			$_SESSION['message']="You are now logged in";
			$_SESSION['username']=$username;
			header("Location:home.php");
			}
			
		 }
		  else{
			echo '<script>alert("The Two Password Do Not Match....Redirecting to page again!")</script>';
		  }
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/style2.css" rel='stylesheet' type='text/css' />
<title>REGISTRATION</title>
</head>
<body>
<div class="ab1">
		<ul>
		<li><a href="index.html">HOME</a></li>
		<li style="float:right"><a href="login.php">LOGIN</a></li>
		</ul>
		</div>
	
	<div class="main">
	
	
	
		
      <h2>||...REGISTRATION FORM...||</h2>
	  <?php
		if(isset($_SESSION['message'])){
			echo "<div class = 'ab3'>".$_SESSION['message']."</div>";
			unset($_SESSION['message']);
		}
		?>
		<form method="post" action="signup.php">
		<fieldset>
		<legend><div class="ab2"><img src="images/logob.png"></div></legend>
		   <div class="lable">
		        <div class="col_1_of_2 span_1_of_2"><input type="text" class="text" name="username" placeholder="UserName"></div>
               <!-- <div class="col_1_of_2 span_1_of_2"><input type="text" class="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}"></div>-->
                    <div class="clear"> </div> 
		   </div>
		   <div class="lable-2">
				
		        <select name = "dropdown" id="eventname">
				<option value="">Select Event</option>
				<option value="aarohan">AAROHAN</option>
				<option value="bizquiz">BIZ-QUIZ</option>
				<option value="ideapropel">IDEA PROPEL</option>
				</select>
				<input type="text" name="contact" class="text" placeholder="Contact No.">
		        <input type="email" name="email" class="text" placeholder="abc@gmail.com">
		        <input type="password" class="text" name="password" placeholder="Password">
				<input type="password" class="text" name="password2" placeholder="Password Again">
				<textarea rows="8" name="address" id="styled" placeholder="College Address"></textarea>
				
		   </div>
		   
		   <div class="submit">
			  <input type="submit" name="register_btn" value="Register" >
		   </div>
		   <div class="clear"> </div>
		   </fieldset>
		</form>
		<br>
		<br>
		<br>
		<!-----//end-main---->
	</div>
		
</body>
</html>