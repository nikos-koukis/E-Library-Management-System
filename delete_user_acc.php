<?php include 'server.php';
include 'includes/config.php';
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Library System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="assets/CSS/user_header.css">
    <link rel="stylesheet" href="assets/CSS/delete_user_acc.css">
    <link rel="stylesheet" href="assets/CSS/footer.css">
</head>
<body>


    <div id="contentbox" >
        <?php
            $id=$loggedin_id;
            $sql="DELETE FROM students WHERE id='$id'";
            $result=mysqli_query($db,$sql);
            if($result){
            echo " <div>";
            echo "Your Account Deleted Sucessfully.";
            echo " <a href='login.php' >Click here</a> to go back. ";
            echo "</div> ";
            } elseif(!isset($loggedin_session) || $loggedin_session==NULL) {
                header("Location: login.php");} else {
                    echo  "<script>alert('Unable to delete Your Account');</script>";
                }
        ?>
    </div>
    <?php include 'includes/footer.php'; ?>

</body>

</html>