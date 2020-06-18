<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<form action="" method="post">
		Username: <input type="text" name="name"/><br/>
		<br/>
		Password: <input type="password" name="password"/><br/>
		<input type="submit" name="submit" value="register" />
	</form>
	<?php
	$conn = new mysqli("localhost:3306", "root", "", "database");
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	if(isset($_POST["submit"])){
		$name= $_POST["name"];
		$password= $_POST["password"];
		$password=md5($password);
		$sql="INSERT INTO information (name,password) VALUES('".$name."','".$password."')";
		// $sql="INSERT INTO information (name,password) VALUES('dai3','123')";
		$result = $conn->query($sql);
	}
	?>
</body>
</html>