<?php 
include '../includes/config.php';
?>
<header>
    <h3>E Library Management System</h3>
    <img src="../assets/img/logo.jpg" >
    <nav class="navbar navbar-expand-lg navbar-light black">
            <div class="container">
                <button id="btn_toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto w-100 justify-content-end" id="menu-top">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">DASHBOARD</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" >CATEGORIES</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="add_category.php">ADD CATEGORY</a>
                                <a class="dropdown-item" href="manage_category.php">MANAGE CATEGORY</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" >AUTHORS</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="add_author.php">ADD AUTHOR</a>
                                <a class="dropdown-item" href="manage_authors.php">MANAGE AUTHORS</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" >BOOKS</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="add_book.php">ADD BOOK</a>
                                <a class="dropdown-item" href="manage_books.php">MANAGE BOOKS</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="students.php">STUDENTS</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            $query = "SELECT * FROM admin_credits";
                            $result = mysqli_query($db,$query);
                            if($result){
                                foreach ($result as $row){
                            ?>
                            <a class="nav-link" href="change_password.php?admin_id=<?php echo $row['id'];?>">CHANGE PASSWORD</a>
                        </li>
                                <?php }} ?>
                        <a href="logout.php" class="btn btn-danger btn-sm" id="btn_logout"><i class="fa fa-sign-out"></i> Log Out</a>
                    </ul>
                </div>
            </div>
        </nav>
</header>