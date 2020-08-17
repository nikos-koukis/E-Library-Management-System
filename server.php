<?php

include('includes/config.php');

if(!isset($_SESSION)) 
{ 
    session_start(); 
}


//--------------------------------------admin login ------------------------------------------

if (isset($_POST['admin_login'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $password = sha1($password);
    $query = "SELECT * FROM admin_credits WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db,$query);
    if (mysqli_num_rows($result) == 1){

        $_SESSION['login_admin']= $username;
        header ('location: admin/index.php');
    }else{
        echo "<script>alert('Invalid');</script>";
    }
    
}

//--------------------------------------user signup ------------------------------------------

if (isset($_POST['signup'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

    $check_username = "SELECT * FROM students WHERE username='$username'";
    $check_username_res = mysqli_query($db,$check_username);

    $check_email = "SELECT * FROM students WHERE email='$email'";
    $check_email_res = mysqli_query($db,$check_email);
    
    if(mysqli_num_rows($check_username_res)>0){
        echo "<script>alert('Username already exists. Please try again!');</script>";
    }else if(mysqli_num_rows($check_email_res)>0){
        echo "<script>alert('Email already exists. Please try again!');</script>";
    }else{

    $password = sha1($password);
    $query = "INSERT INTO students (username, email, phone, password) 
    VALUES ('$username', '$email', '$phone', '$password')";
    $result = mysqli_query($db,$query);
    $username = '';
    $email = '';
    $phone = '';

    // ------------ RESET AUTO_INCREMENT FOR BETTER VIEW--------------------------------------------
    
    $query2 = "SET @autoid :=0";
    $result2 = mysqli_query($db,$query2);
    
    $query3 = "UPDATE students set id = @autoid := (@autoid+1)"; 
    $result3 = mysqli_query($db,$query3);
    
    $query4 = "ALTER TABLE students AUTO_INCREMENT=1";
    $result4 = mysqli_query($db,$query4);
    header( "refresh:1;url=login.php" );
}
}

//--------------------------------------user login ------------------------------------------

if (isset($_POST['user_login'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $password = sha1($password);
    $query = "SELECT * FROM students WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db,$query);
    if (mysqli_num_rows($result) == 1){

        $_SESSION['login_user']=$username;
        header ('location: user_dashboard.php');
    }else{
        echo "<script>alert('Invalid');</script>";
    }
}


?>