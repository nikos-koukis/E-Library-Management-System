<?php 
include '../includes/config.php';
include 'admin_server.php';
?>
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
    <link rel="stylesheet" href="assets/CSS/header.css">
    <link rel="stylesheet" href="assets/CSS/footer.css">
    <link rel="stylesheet" href="assets/CSS/add_category.css">
    <script src="assets/JS/add_category.js"></script>
    
    <title>Administrator</title>
</head>
<body>

    <?php include 'includes/header.php'; ?> 

    <div class="col-10" id="category-header">
        <h3>Add Category</h3>
    </div>

    <div class="container_form">
        <form method="post" name="category_form" >

        <div class="col-12" id="form_header">
            <h3>Category Info</h3>
        </div>

        <div class="form-group">
            <label for="category_name">Category Name<span class="text-danger"> *</span></label>
            <input type="text" class="form-control" id="category_name" name="category_name" required>
            <p class="category_exists"><?php echo $name_exists?></p>
        </div>
            
        <label for="status">Status</label>
        <div class="form-check">
            <input type="radio" name="exampleRadios" id="active_radio" value="1" checked>
            <label id="active_label">Active</label>
        </div>

        <div class="form-check">
            <input type="radio" name="exampleRadios" id="inactive_radio" value="0">
            <label id="inactive_label">Inactive</label>
        </div>

        <button type="submit" class="btn btn-primary" name="add_category">Add Category</button>

        </form>
    </div>

</body>
<?php include '../includes/footer.php'; ?> 
</html>