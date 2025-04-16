<?php
require('../database/dbconnection.inc.php');
session_start();
if(isset($_SESSION['isAdmin']))
{
    $adminEmail = $_SESSION['adminEmail'];
}
else{
    header('Location: ./index.php');
    exit();
}
?>

<?php
include('includes/header.inc.php');
?>
</head>
<body>

<?php
include('includes/navbar.inc.php');
?>

<?php
include('includes/footer.inc.php')
?>