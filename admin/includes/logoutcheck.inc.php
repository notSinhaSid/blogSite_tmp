<?php
include('../database/dbconnection.inc.php');
session_start();
session_unset();
session_destroy();

header('Location: ../index.php');
?>