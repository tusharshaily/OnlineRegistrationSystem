<?php
session_start();
	

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
		<li style="float:right"><a href="logout.php">LOGOUT</a></li>
		</ul>
		</div>
		<?php
		if(isset($_SESSION['message'])){
			echo "<div class = 'ab3'>".$_SESSION['message']."</div>";
			unset($_SESSION['message']);
		}
		?>
	
	<div class="main">
	
	
	
		
      <h2> Welcome <?php echo $_SESSION['username']; ?> </h2>
	   
	
		<!-----//end-main---->
	</div>
		
</body>
</html>