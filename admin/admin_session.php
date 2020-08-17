<?php
include '../includes/config.php';

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$admin_check=$_SESSION['login_admin'];

$query = "SELECT username,id FROM admin_credits WHERE username='$admin_check'";
$result = mysqli_query($db,$query);

$row=mysqli_fetch_array($result);

$loggedin_session=$row['username'];
$loggedin_id=$row['id'];

if(!isset($loggedin_session) || $loggedin_session==NULL) {
 header("Location: ../index.php");
}
?>
