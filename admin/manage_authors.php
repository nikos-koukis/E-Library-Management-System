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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/CSS/header.css">
    <link rel="stylesheet" href="assets/CSS/footer.css">
    <link rel="stylesheet" href="assets/CSS/manage_authors.css">

    <title>Administrator</title>
</head>
<body>
            <?php include 'includes/header.php'; ?> 

            <?php

            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }

            $num_per_page = 05;
            $start_from = ($page-1)*05;

            $query = "SELECT * FROM authors limit $start_from, $num_per_page";
            $result = mysqli_query($db,$query);
            ?>

            <div class="content-wrapper ">
                <div class="container">
                <div class="row pad-botm">
                <div class="col-md-12">
                <h4 class="header-line">Manage Authors</h4>
            
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover " >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Author</th>
                                <th>Creation Date</th>
                                <th>Updation Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php 
                            if($result){
                                foreach ($result as $row){
                        ?>
                        <tbody >
                            <tr >
                                <td><?php echo "Author_ID_" . $row['id']; ?></td>
                                <td><?php echo $row['author_name']; ?></td>
                                <td><?php echo $row['creation_date']; ?></td>
                                <td><?php echo $row['updation_date']; ?></td> 
                                <td>
                                    <a href="edit_author.php?edit_auth_id=<?php echo $row['id'];?>"><button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button> 
                                    <a href="manage_authors.php?del_auth_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this author?');" >  <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
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

                    $pr_query = "select * from authors";
                    $pr_result = mysqli_query($db,$pr_query);
                    $total_record = mysqli_num_rows($pr_result);

                    $total_page = ceil($total_record/$num_per_page);

                    if($page>1){
                        echo "<a href='manage_authors.php?page=".($page-1)."' class='btn btn-danger'><i class='fa fa-arrow-circle-left'></i> Previous</a>";
                    }

                    for($i=1; $i<$total_page; $i++){
                        echo "<a href='manage_authors.php?page=".$i."' class='btn btn-primary'>$i</a>";
                    }

                    if($i>$page){
                        echo "<a href='manage_authors.php?page=".($page+1)."' class='btn btn-danger'><i class='fa fa-arrow-circle-right'></i> Next</a>";
                    }

                ?>
            </div>
            </div>
            </div>
            </div>
    </body>
    <?php include '../includes/footer.php'; ?> 
</html>