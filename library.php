<?php include 'admin/admin_server.php';

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
    <link rel="stylesheet" href="assets/CSS/library.css">
    <link rel="stylesheet" href="assets/CSS/footer.css">
</head>
<body>

<?php include 'includes/user_header.php'; ?>

<?php
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }

        $num_per_page = 05;
        $start_from = ($page-1)*05;

        $query = " SELECT books.id,books.book_name,category.category_name,authors.author_name,books.isbn,books.price,books.status
        from books inner join category on books.category_id=category.id inner join authors on books.author_id=authors.id
        limit $start_from, $num_per_page";
        $result = mysqli_query($db,$query);
        ?>

        <div class="content-wrapper ">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">List of Books</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover " >
                            <thead>
                                <tr>
                                    <th>Book Name</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Isbn</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php 
                                if($result){
                                    foreach ($result as $row){
                            ?>
                            <tbody >
                                <tr >
                                    <td><?php echo $row['book_name']; ?></td>
                                    <td><?php echo $row['category_name']; ?></td>
                                    <td><?php echo $row['author_name']; ?></td>
                                    <td><?php echo $row['isbn']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td >
                                        <?php if($row['status']==1){
                                        echo "Active";
                                        }else{
                                            echo "Inactive";
                                        } ?>
                                    </td>
                                    <td>
                                    <?php if($row['status']==1) {?>
                                     <a href="manage_borrows.php?book_name_id=<?php echo $row['id'];?>"><button class="btn btn-primary"><i class="fa fa-check"></i> Borrow</button>
                                    <?php } else {?> 
                                    <a href=""><button class="btn btn-danger disabled" style="cursor: not-allowed ;"><i class="fa fa-times"></i> Not Available</button>
                                    <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                            <?php 
                                }
                            }
                            ?>
                        
                            </table>
                        </div>
                        <?php

                            $pr_query = "select * from books";
                            $pr_result = mysqli_query($db,$pr_query);
                            $total_record = mysqli_num_rows($pr_result);

                            $total_page = ceil($total_record/$num_per_page);

                            if($page>1){
                                echo "<a href='library.php?page=".($page-1)."' class='btn btn-danger'><i class='fa fa-arrow-circle-left'></i> Previous</a>";
                            }

                            for($i=1; $i<$total_page; $i++){
                                echo "<a href='library.php?page=".$i."' class='btn btn-primary'>$i</a>";
                            }

                            if($i>$page){
                                echo "<a href='library.php?page=".($page+1)."' class='btn btn-danger'><i class='fa fa-arrow-circle-right'></i> Next</a>";
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>




    <?php include 'includes/footer.php'; ?>
</body>

</html>