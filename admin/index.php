<?php include '../includes/config.php'; ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/CSS/header.css">
    <link rel="stylesheet" href="assets/CSS/index.css">
    <link rel="stylesheet" href="assets/CSS/footer.css">

    <title>Administrator</title>
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <div class="col-10" id="admin_header">
        <h3>Admin Dashboard</h3>
    </div>


    <div class="dashboard_container">

      <div class="col-md-2 category">
            <div class="alert alert-info back-widget-set text-center">
              <i class="fa fa-list-alt fa-4x"></i>
              <?php
                  $active_status = 1;
                  $inactive_status = 0;
                  $query ="SELECT count(id) from category where status='$active_status'";
                  $result = mysqli_query($db,$query);
                  $query2 ="SELECT count(id) from category where status='$inactive_status'";
                  $result2 = mysqli_query($db,$query2);
              ?>
              <h6>Active Categories: <?php while ($row = mysqli_fetch_array($result)) {
                      echo $row[0];
                    }?>
              </h6>
              <h6>Inactive Categories: <?php while ($row = mysqli_fetch_array($result2)) {
                      echo $row[0];
                    }?>
              </h6>
            </div>
      </div>

      <div class="col-md-2 authors">
            <div class="alert alert-info back-widget-set text-center">
              <i class="fa fa-user fa-4x"></i>
              <?php
                  $query ="SELECT count(id) from authors";
                  $result = mysqli_query($db,$query);

              ?>
              <h6> <?php while ($row = mysqli_fetch_array($result)) {
                      echo $row[0];
                    }?>
              </h6>Authors
            </div>
      </div>

      <div class="col-md-2 books">
            <div class="alert alert-info back-widget-set text-center">
              <i class="fa fa-book fa-4x"></i>
              <?php
                  $query ="SELECT count(id) from books";
                  $result = mysqli_query($db,$query);

              ?>
              <h6> <?php while ($row = mysqli_fetch_array($result)) {
                      echo $row[0];
                    }?>
              </h6>Books
            </div>
      </div>

      <div class="col-md-2 students">
            <div class="alert alert-info back-widget-set text-center">
              <i class="fa fa-users fa-4x"></i>
              <?php
                  $active_students = 1;
                  $inactive_students = 0;
                  $query ="SELECT count(id) from students where status='$active_students'";
                  $result = mysqli_query($db,$query);
                  $query2 ="SELECT count(id) from students where status='$inactive_students'";
                  $result2 = mysqli_query($db,$query2);
              ?>
              <h6>Active Students: <?php while ($row = mysqli_fetch_array($result)) {
                      echo $row[0];
                    }?>
              </h6>
              <h6>Inactive Students: <?php while ($row = mysqli_fetch_array($result2)) {
                      echo $row[0];
                    }?>
              </h6>
            </div>
      </div>
      
    </div>

</body>
<?php include '../includes/footer.php'; ?>
</html>