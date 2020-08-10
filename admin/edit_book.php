<?php include 'admin_server.php'; ?> 
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
    <link rel="stylesheet" href="assets/CSS/footer.css">
    <link rel="stylesheet" href="assets/CSS/edit_book.css">
    <script src="assets/JS/edit_book.js"></script>
    <title>Administrator</title>
</head>
<body>

    <?php include 'includes/header.php'; ?> 
    
    

    <div class="col-10" id="edit_book_header">
        <h3>Edit Book</h3>
    </div>

    <div class="container_form">
        <form method="post" name="edit_book_form" >

        <?php 
            $edit_book_id=intval($_GET['edit_book_id']);
            $query = " SELECT books.id,books.book_name,category.category_name,authors.author_name,books.isbn,books.price,books.creation_date,books.updation_date
            from books inner join category on books.category_id=category.id inner join authors on books.author_id=authors.id
            WHERE books.id='$edit_book_id'";
            $result = mysqli_query($db,$query);
            if($result){
                foreach ($result as $row){              
        ?> 

        <div class="col-12" id="form_header">
            <h3>Book Info</h3>
        </div>

        <div class="form-group">
            <label for="book_name">Book Name<span class="text-danger"> *</span></label>
            <input type="text" class="form-control" id="book_name" name="book_name" value="<?php echo $row['book_name'];?>" required>
        </div>

        <div class="form-group">
            <label for="category_name">Category<span class="text-danger"> *</span></label>
            <select name="category_name" required>
            <option value="<?php echo $row['id'];?>"> <?php echo $row['category_name'];?></option>
                <?php
                    $status=1;
                    $query2 = "SELECT * FROM category where status='$status'";
                    $result2 = mysqli_query($db,$query2);
                    if($result2){
                        foreach ($result2 as $row2){ ?>
                        <option value="<?php echo $row2['id'];?>"><?php echo $row2['category_name'];?></option>
                <?php }} ?>
            </select>
        </div>

        <div class="form-group">
            <label for="author_name">Author<span class="text-danger"> *</span></label>
            <select name="author_name" required>
            <option value="<?php echo $row['id'];?>"> <?php echo $row['author_name'];?></option>
                <?php
                    $query3 = "SELECT * FROM authors";
                    $result3 = mysqli_query($db,$query3);
                    if($result3){
                        foreach ($result3 as $row3){ ?>
                        <option value="<?php echo $row3['id'];?>"><?php echo $row3['author_name'];?></option>
                <?php }} ?>
            </select>
        </div>

        <div class="form-group">
            <label for="isbn">Isbn<span class="text-danger"> *</span></label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $row['isbn'];?>" required>
        </div>

        <div class="form-group">
            <label for="price">Price<span class="text-danger"> *</span></label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price'];?>" required>
        </div>

        <?php }} ?>

        <button type="submit" class="btn btn-primary" name="edit_book">Edit Book</button>

        </form>
    </div>

    
</body>
<?php include '../includes/footer.php'; ?> 
</html>