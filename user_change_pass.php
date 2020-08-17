<?php include 'server.php';
include 'includes/config.php';
include('session.php');
if(isset($_POST['change_student_pass']))
{
    $current_password=sha1($_POST['current_password']);
    $new_password=sha1($_POST['new_password']);


    $id=$loggedin_id;

    $query=mysqli_query($db,"SELECT password FROM students where password='$current_password' && id='$id'");
    $num=mysqli_fetch_array($query);

    if($num>0)  
    {
        $con=mysqli_query($db,"UPDATE students set password= '$new_password' where id='$id'");
        header ('location: user_dashboard.php');
    }else{
        echo "<script>alert('Unable to change');</script>";
    }


}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/CSS/user_header.css">
    <link rel="stylesheet" href="assets/CSS/user_change_pass.css">
    <link rel="stylesheet" href="assets/CSS/footer.css">
    <script src="assets/JS/change_stud_pass.js"></script>
</head>
<body>

<?php include 'includes/user_header.php'; ?>

    <div class="col-10" id="student_change_pass">
        <h3>Student Change Password</h3>
    </div>

    <div class="container_form">
        <form method="post" name="change_stud_pass" >

        <div class="col-12" id="change_pass_header">
            <h3>Change Password</h3>
        </div>

        <div class="form-group">
            <label for="current_password">Current Password<span class="text-danger"> *</span></label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>

        <div class="form-group">
            <label for="new_password">New Password<span class="text-danger"> *</span></label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password<span class="text-danger"> *</span></label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit" class="btn btn-primary" name="change_student_pass">Change Password</button>

        </form>
    </div>
    

<?php include 'includes/footer.php'; ?>

</body>

</html>




