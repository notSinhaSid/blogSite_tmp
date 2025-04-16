<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['remove']))
{
    //get blogId before any query
    $blogId = $_POST['blogId'];
    try
    {
        $sql ="SELECT blogImg FROM blogpost_tb WHERE blogId =:blogId";
        $result = $conn->prepare($sql);
        $result->bindParam(':blogId', $blogId, PDO::PARAM_INT);
        $result->execute();
        $row=$result->fetch(PDO::FETCH_ASSOC);

        if($row && !empty($row['blogImg']))
        {
            $delImgPath= './assets/images/'.$row['blogImg'];
            if(file_exists($delImgPath))
            {
                unlink($delImgPath);
            }
        }

        $delstmt = "DELETE FROM blogpost_tb WHERE blogId =:blogId";
        $delRes = $conn->prepare($delstmt);
        $delRes->bindParam(':blogId', $blogId, PDO::PARAM_INT);
        $delRes->execute();
        header('Location: ./dashboard.php');
        exit();
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
?>