<?php

if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$city = $_POST['city'];

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'mytutor';

$conn = mysqli_connect($host,$user,$pass,$dbname);

$sql = "INSERT INTO student(name,email,mobile,city) values ('$name','$email','$mobile','$city')";
mysqli_query($conn,$sql);

}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
</head>

<body>
<form action="#" method="POST">
	Name : <input type="text" name="name"><br>
	Email : <input type="email" name="email"><br>
	Mobile : <input type="number" name="mobile"><br>
	City : <input type="text" name="city"><br>
<input type="submit" name="submit" value="Send Data">
</form>
</body>
</html>