<?php
// session_start();
if(!isset($_SESSION['isAdmin']))
{
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['signin']))
    {
        // include('blogsite_tmp\database/dbconnection.inc.php');
    
        if(empty($_POST['adminEmail'])||empty($_POST['adminPass']))
        {
            header('Location: ./index.php');
        }
        else{
            $sql ="SELECT * FROM admindetails_tb WHERE adminEmail = :adminEmail AND adminPass=:adminPass";
            $result = $conn->prepare($sql);
            
            $result->bindParam(':adminEmail', $adminEmail, PDO::PARAM_STR);
            $result->bindParam(':adminPass', $adminPass, PDO::PARAM_STR);
    
            $adminEmail = strip_tags($_POST['adminEmail']);
            $adminPass = strip_tags($_POST['adminPass']);

            $result->execute();

            if($result->rowCount()==1)
            {
                session_start();
                $_SESSION['adminEmail']=$adminEmail;
                $_SESSION['isAdmin']=TRUE;
                header('Location: ./dashboard.php');
            }
        }
    }
}
else
{
    header('Location: ./dashboard.php');
}

?>