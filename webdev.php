<?php
include('./database/dbconnection.inc.php');
?>

<?php
include('./includes/header.inc.php');
require('./includes/navbar.inc.php');
?>
<div class="container-show">
    <div class="row">
            <?php
                require('./includes/displaywebdev.inc.php');
            ?>
    </div> 
</div>
<?php
include('./includes/footer.inc.php');
?>