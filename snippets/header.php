
<nav class="col-sm-12 navbar navbar-expand-lg navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav mr-auto">
            <li class="active"><a href="#">Home</a></li>
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                if (!isset($_SESSION['is_agency']) || !$_SESSION['is_agency']) {
                    echo '<li><a href="favorites.php">Favorites Cities</a></li> ';
                    echo '<li><a href="favorite_sights.php">Favorite Sights</a></li> ';
                } else {
                    echo '<li><a href="your_sights.php">Your Sights</a></li> ';
                }
            }
            ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                if (isset($_SESSION['is_agency']) && $_SESSION['is_agency'] == true){
                    echo '<li><a href="insert-sight.php">Insert Sight</a></li> ';
                }
                echo '<li><a href="#">'.$_SESSION['email'].'</a></li> ';
            }
            else {
                echo '<li><a href="login.php">Login</a></li>
                    <li><a href="registration.php">Signup</a></li>
                    <li>&emsp;</li>
                    <li><a href="agency-registration.php">Signup as an Agency</a></li>';
            }
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                echo '<li><a href="logout.php">Logout</a></li> ';
            }
            ?>

        </ul>
    </div>
</nav>
