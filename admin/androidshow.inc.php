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
<h3>This is page to display the Android blogs and news</h3>
<?php include('./includes/footer.inc.php');?>