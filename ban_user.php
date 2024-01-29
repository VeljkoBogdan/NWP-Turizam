<?php
session_start();
require_once "functions.php";
require_once "snippets/ban_check.php";

if (!isset($_SESSION['is_admin'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <?php include_once('snippets/links.php'); ?>

</head>
<body>
<?php include('snippets/header.php'); ?>

<br><br>
<div class="form col-sm-8">
    <div class="content">
        <h4 class="text-center">Ban / Unban a user</h4>
        <form class="form-horizontal form" action="confirmation.php" method="POST" onsubmit="return validateAdminForm()">
            <div class="form-group">
                <label class="control-label col-sm-2 text-left" for="inputData">ID or Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputData" name="inputData" placeholder="Enter ID or Email">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" id="admin-ban" name="admin-ban" class="btn btn-primary">Ban / Unban</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="script.js" rel="script"></script>
<?php include('snippets/footer.php'); ?>
</body>
</html>