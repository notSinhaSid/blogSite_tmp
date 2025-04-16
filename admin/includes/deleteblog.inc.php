<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['remove']))
{
    $blogId = $_POST['blogId'];
    $sql ="SELECT * FROM blogpost_tb WHERE blogId =:blogId";
    $result =$conn->prepare($sql);
    $result->bindParam(':blogId', $blogId, PDO::PARAM_INT);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $delImg = $row['blogImg'];
    unlink('./assets/images/'.$delImg);
    // $result->close();

    $delstmt= "DELETE * FROM blogpost_tb WHERE blogId =:blogId";
    $result= $conn->prepare($sql);
    $result->bindParam(':blogId', $blogId, PDO::PARAM_INT);

    $result->execute();

    header('Location: ./dashboard.php');
    exit();
}
?>