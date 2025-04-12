<?php
require('../database/dbconnection.inc.php');
session_start();
if(isset($_SESSION['isAdmin']))
{
    $adminEmail=$_SESSION['adminEmail'];
}
else
{
    header('Location: ./index.php');
}
?>

<?php include('./includes/header.inc.php');
include('./includes/navbar.inc.php');
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-2">
            <h3>This is for content</h3>
            <?php include('includes/webdevblog.inc.php');?>
        </div>
    </div>
</div>
<?php include('./includes/footer.inc.php');?>