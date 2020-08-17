<?php
include 'includes/config.php';

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$user_check=$_SESSION['login_user'];

$query = "SELECT username,id FROM students WHERE username='$user_check'";
$result = mysqli_query($db,$query);

$row=mysqli_fetch_array($result);

$loggedin_session=$row['username'];
$loggedin_id=$row['id'];

if(!isset($loggedin_session) || $loggedin_session==NULL) {
 header("Location: login.php");
}
?>
