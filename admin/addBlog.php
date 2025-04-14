<?php
include('../database/dbconnection.inc.php');
session_start();
if(isset($_SESSION['isAdmin']))
{
    $adminEmail = $_SESSION['adminEmail'];
}
else
{
    header('Location: ./index.php');
}
?>

<?php
include('./includes/header.inc.php');
include('./includes/navbar.inc.php');
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
        <h3 class="text-center">Create new blog!</h3>
        <?php
            if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['edit']))
            {
                $sql ="SELECT * FROM blogpost_tb WHERE blogId = :blogId";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':blogId', $blogId, PDO::PARAM_INT);
                $blogId = $_POST['blogId'];
                $stmt->execute();
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                // print_r($row);

            }
            require('./includes/blogForm.inc.php');
        ?>
        </div>
    </div>
</div>
<?php
require('./includes/blogAdd.inc.php');
require('./includes/footer.inc.php');
?>