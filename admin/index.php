<?php
    include('../database/dbconnection.inc.php');
    require_once('includes/logincheck.inc.php');
?>

<?php
    include('./includes/header.inc.php');
?>
<link rel="stylesheet" href="../admin/assets/css/index.css">

<div id="login">
  <form action="" method="POST">
    <h1>Sign In</h1>
    <input type="email" placeholder="admin email" name="adminEmail">
    <input type="password" placeholder="Password" name="adminPass">
    <button type="submit" name="signin">Sign in</button>
    <?php if(isset($singin_err)){echo $singin_err;}?>
  </form>
</div>
  

<?php
    include('./includes/footer.inc.php');
?>