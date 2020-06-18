<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
	<meta charset="utf-8">
	<?php
	if(isset($_POST['login'])){
		if($_POST['username']==null)	echo ("nhap username di<br/>");
		else $u = $_POST['username'];
		if($_POST['password']==null)	echo ("nhap password di<br/>");
		else $p=$_POST['password'];
		if($u && $p){
			$conn= new mysqli("localhost:3306", "root", "", "database");
			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql="select * from information where name='".$u."' and password='".$p."'";
			$result = $conn->query($sql);

			if($result->num_rows == 0)	
				echo ("username or password is correct, try again");
			else 
				echo ("login successful!");
			$conn->close();

		}

	}
	?>
</head>
<body>
	<form action="login.php" method="post">
		Username: <input type="text" name="username"/><br/>
		<br/>
		Password: <input type="password" name="password"/><br/>
		<input type="submit" name="login" value="Login"/>
	</form>
</body>
</html>