<?php include 'server.php';
?>
<header>
    <h3>E Library Management System</h3>
    <img src="assets/img/logo.jpg" >
        <nav class="navbar navbar-expand-lg navbar-light black">
            <div class="container">
                <button id="btn_toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto w-100 justify-content-end" id="menu-top">
                        <li class="nav-item">
                            <a class="nav-link" href="user_dashboard.php">MY PROFILE <i class="fa fa-user" aria-hidden="true"></i></a>
                        </li><span>|</span>
                        <li class="nav-item">
                            <a class="nav-link" href="user_change_pass.php">CHANGE PASSWORD <i class="fa fa-lock"></i></a>
                        </li><span>|</span>
                        <a href="user_logout.php" class="btn btn-danger btn-sm" id="btn_logout" name="user_logout"><i class="fa fa-sign-out"></i> Log Out</a>
                    </ul>
                </div>
            </div>
        </nav>
</header>