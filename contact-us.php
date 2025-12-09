
<?php

if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$city = $_POST['city'];


$host = 'sanalico_formdb';
$user = 'sanalico_formdb';
$pass = ' Lql3^[=q!ush'; 
$dbname = 'formdb';

$conn = mysqli_connect($host,$user,$pass,$dbname);

$sql = "INSERT INTO student(name,email,mobile,city) values ('$name','$email','$mobile','$city')";
mysqli_query($conn,$sql);

}

?>

