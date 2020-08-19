<?php include 'admin/admin_server.php';
include 'session.php';
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
    <link rel="stylesheet" href="assets/CSS/user_header.css">
    <link rel="stylesheet" href="assets/CSS/manage_borrows.css">
    <link rel="stylesheet" href="assets/CSS/footer.css">
</head>
<body>

    <?php include 'includes/user_header.php'; ?>

    <div class="col-10" id="borrow-header">
        <h3>Borrow Book</h3>
    </div>

    <div class="container_form">
        <form method="post" name="book_form" >
        <?php 
            $book_name_id=intval($_GET['book_name_id']);
            $query = " SELECT books.id,books.book_name,category.category_name,authors.author_name,books.isbn,books.price,books.status,books.creation_date,books.updation_date
            from books inner join category on books.category_id=category.id inner join authors on books.author_id=authors.id
            WHERE books.id='$book_name_id'";
            $result = mysqli_query($db,$query);
            if($result){
                foreach ($result as $row2){              
        ?> 

        <div class="col-12" id="form_header">
            <h3>Βorrowing Info</h3>
        </div>

        <div class="form-group">
            <label for="username">Student Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username'];?>"  readonly>
        </div>

        <div class="form-group">
            <label for="book_name">Name of Book</label>
            <input type="text" class="form-control" id="book_name" name="book_name" value="<?php echo $row2['book_name'];?>"  readonly>
        </div>

        <div class="form-group">
            <label for="category_name">Category of Book</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $row2['category_name'];?>"  readonly>
        </div>

        <div class="form-group">
            <label for="author_name">Author of Book</label>
            <input type="text" class="form-control" id="author_name" name="author_name" value="<?php echo $row2['author_name'];?>"  readonly>
        </div>
        
        <div class="form-group">
            <label for="isbn_book">Isbn of Book</label>
            <input type="text" class="form-control" id="isbn_book" name="isbn_book" value="<?php echo $row2['isbn'];?>"  readonly>
        </div>

        <div class="form-group">
            <label for="borrow_date">Borrow Date</label>
            <?php $date = date('Y-m-d H:i'); ?>
            <input type="datetime" class="form-control" id="date" name="borrow_date" name="borrow_date" value="<?= $date ?>" readonly>
        </div>
        
        <?php }} ?>

        <button type="submit" class="btn btn-primary" name="borrow_book">Borrow Book</button>

        </form>
    </div>


    <?php include 'includes/footer.php'; ?>

</body>

</html>