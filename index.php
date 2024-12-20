<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: login");
    }

    $username = $_SESSION["user"];
?>

<!doctype html>
    <html lang="en">
    <head>        
        <title>Cibong Laundry</title>
	    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/sidebar.css">        
    </head>
    <body> 
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#menu-toggle" id="menu-toggle">cibong laundry</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-user"></span>
                            <b>
                                <?php echo $username;?>
                            </b>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="login/logout.php">Log Out <span class="glyphicon glyphicon-off"></span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Wrapper -->
        <div id="wrapper">            

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    
                    <li>
                        <a href="laundry-masuk"><span class="glyphicon glyphicon-list-alt"></span> Laundry Masuk</a>
                    </li>
                    <li>
                        <a href="laundry-keluar"><span class="glyphicon glyphicon-shopping-cart"></span> Laundry Keluar</a>
                    </li>                    
                    
                </ul>
            </div>
           

        </div>
        <!-- /#wrapper -->               

        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        ?>

        <script src="js/jquery-1.12.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>