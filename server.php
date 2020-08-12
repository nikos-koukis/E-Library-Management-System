<?php

include 'includes/config.php'; 


//--------------------------------------admin login ------------------------------------------

if (isset($_POST['admin_login'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $password = sha1($password);
    $query = "SELECT * FROM admin_credits WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db,$query);
    if (mysqli_num_rows($result) == 1){
        
        header ('location: admin/index.php');
    }
}

//--------------------------------------user signup ------------------------------------------

if (isset($_POST['signup'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

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
    header( "refresh:1;url=index.php" );

}
?>