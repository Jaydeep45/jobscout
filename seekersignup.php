<?php 

session_start();
header('location:seeker.html');

$con = mysqli_connect('localhost', 'root', '');
if($con == false) {
    die("Error couldn't connect to database" . mysqli_connect_error());
}
mysqli_select_db($con,'seekers');
$userName = $_POST['Name'];
$email = $_POST['Email'];
$password = $_POST['psw'];

$s = "select * from seeker where email = '$email'";
$res = mysqli_query($con,$s);
$num = mysqli_num_rows($res);
if($num == 1) {
    echo "You already have an account";
}
else {
    $reg = "insert into seeker (name, email, password) values ('$userName','$email','$password')";
    mysqli_query($con,$reg);
    echo "You have an account now!";
}

?>