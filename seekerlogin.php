<?php 

session_start();

$con = mysqli_connect('localhost', 'root', '');
if($con == false) {
    die("Error couldn't connect to database" . mysqli_connect_error());
}
mysqli_select_db($con,'seekers');
$userName = $_POST['Name'];
$email = $_POST['Email'];
$password = $_POST['psw'];

$s = "select * from seeker where email = '$email' && password = '$password'";
$res = mysqli_query($con,$s);
$num = mysqli_num_rows($res);
if($num == 1) {
    header('location:home.php');
}
else {
    header('location:seeker.html');
}

?>