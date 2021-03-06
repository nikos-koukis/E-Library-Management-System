<?php include 'server.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
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
    <link rel="stylesheet" href="assets/CSS/header.css">
    <link rel="stylesheet" href="assets/CSS/signup.css">
    <link rel="stylesheet" href="assets/CSS/footer.css">
    <script src="assets/JS/signup.js"></script>
</head>
<body>

<?php include 'includes/header.php'; ?>

    <div class="col-10" id="user-header">
        <h3>User Sign UP</h3>
    </div>

    <div class="container_form">
        <form method="post" name="signup_form" id="signup_form"">

        <div class="col-12" id="signup_form_header">
            <h3>Sign Up Form</h3>
        </div>

        <div class="form-group">
            <label for="username">Enter Username<span class="text-danger"> *</span></label>
            <input type="text" class="form-control" id="username" name="username"  >
            <p class="error_form" id="username_error"></p>
            <p class="success_form" id="username_success"></p>
        </div>

        <div class="form-group">
            <label for="email">Enter Email<span class="text-danger"> *</span></label>
            <input type="email" class="form-control" id="email" name="email" >
            <p class="error_form" id="email_error"></p>
            <p class="success_form" id="email_success"></p>
        </div>

        <div class="form-group">
            <label for="phone">Enter Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" >
            <div class="phone_error"></div>
            <p class="error_form" id="phone_error"></p>
            <p class="success_form" id="phone_success"></p>
        </div>
            
        <div class="form-group">
            <label for="password">Password<span class="text-danger"> *</span></label>
            <input type="password" class="form-control" id="password" name="password" >
            <p class="error_form" id="password_error"></p>
            <p class="success_form" id="password_success"></p>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password<span class="text-danger"> *</span></label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" >
            <p class="error_form" id="confirm_password_error"></p>
            <p class="success_form" id="confirm_password_success"></p>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" onclick="show_password()">
            <label class="form-check-label" for="show_password">Show Password</label>
        </div>

        <button type="submit" class="btn btn-primary" name="signup">Register</button>
        </form>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>