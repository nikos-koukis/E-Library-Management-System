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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/CSS/user_header.css">
    <link rel="stylesheet" href="assets/CSS/user_dashboard.css">
    <link rel="stylesheet" href="assets/CSS/footer.css">

</head>
<body>

<?php include 'includes/user_header.php'; ?>

    <div class="col-10" id="user_header">
            <h3>User Dashboard</h3>
    </div>

    <div class="container_form">
        <form method="post">

        <?php
        $query= "SELECT * FROM students where id=$loggedin_id";
        $result=mysqli_query($db,$query);
        if($result){
            foreach ($result as $row){
        ?>

        <div class="col-12" id="profile_header">
            <h3>My profile</h3>
        </div>

        <div class="form-group">
            <label for="username">My Name</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username'];?>" readonly>
        </div>

        <div class="form-group">
            <label for="email">My Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>" readonly>        
        </div>

        <div class="form-group">
            <label for="phone">My Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone'];?>" readonly>
        </div>

        <div class="form-group">
            <label for="reg_date">Registration Date</label>
            <input type="text" class="form-control" id="reg_date" name="reg_date" value="<?php echo $row['reg_date'];?>" readonly>
        </div>

        <div class="form-group">
            <label for="upd_date">Last Updation Date</label>
            <input type="text" class="form-control" id="upd_date" name="upd_date" value="<?php echo $row['upd_date'];?>" readonly>
        </div>
        <?php 
            }
        }
        ?>
        </form>
        <a href="delete_user_acc.php" onclick="return confirm('Are you sure you want to delete permanently your account?');"><button class="btn btn-danger"><i class="fa fa-trash"></i> Delete My Profile</button>
    </div>
    
    

</body>

<?php include 'includes/footer.php'; ?>

</html>


