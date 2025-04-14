<?php
// include('../database/dbconnection.inc.php');

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['add']))
{
    require_once('../../database/dbconnection.inc.php');
    if(empty($_POST['authName'])||empty($_POST['blogCat'])||empty($_POST['blogTitle'])||empty($_FILES['blogImg'])||empty($_POST['blogContent']))
    {
        echo "Fill all fields";
    }
    else
    {
        $sql = "INSERT INTO blogpost_tb(authName, blogCat, blogTitle, blogImg, blogContent, blogTime)VALUES(:authName, :blogCat, :blogTitle, :blogImg, :blogContent, :blogTime)";

        $result = $conn->prepare($sql);

        $result->bindParam(':authName', $authName, PDO::PARAM_STR);
        $result->bindParam(':blogCat', $blogCat, PDO::PARAM_STR);
        $result->bindParam(':blogTitle', $blogTitle, PDO::PARAM_STR);
        $result->bindParam(':blogImg',$blogImg, PDO::PARAM_LOB);
        $result->bindParam(':blogContent', $blogContent, PDO::PARAM_STR);
        $result->bindParam(':blogTime', $blogTime, PDO::PARAM_STR);

        $authName =strip_tags($_POST['authName']);
        $blogCat =strip_tags($_POST['blogCat']);
        $blogTitle = strip_tags($_POST['blogTitle']);

        $blogImg = $_FILES['blogImg']['name'];
        $blogImg_tmp_name = $_FILES['blogImg']['tmp_name'];
        $blogImg_size = $_FILES['blogImg']['size'];

        $blogContent=strip_tags($_POST['blogContent']);
        $blogTime = date('d/m/y');

        $extension = explode(".",$blogImg);
        $permit_ext =array("jpeg","jpg","png","avif");

        if($blogImg_size>15728640)
        {
            echo "File size to large";
        }
        else{
            if(in_array($extension[1], $permit_ext))
            {
                move_uploaded_file($blogImg_tmp_name,"../assets/images/".$blogImg);

                $result->execute();

                header('Location: ../addBlog.php');
            }
            else
            {
                echo "not the supported file format";
            }
            $conn->close($result);
        }
    }
}

//this is for update the blog content
else if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updatewebdev']))
{
    require_once('../../database/dbconnection.inc.php');
    if(empty($_POST['authName'])||empty($_POST['blogCat'])||empty($_POST['blogTitle'])||empty($_FILES['blogImg'])||empty($_POST['blogContent']))
    {
        echo "Fill all fields";
    }
    else
    {
        $sql = "UPDATE blogpost_tb SET authName=:authName, blogCat=:blogCat, blogTitle=:blogTitle, blogImg =:blogImg, blogContent=:blogContent, blogTime=:blogTime WHERE blogId =:blogId";

        $result = $conn->prepare($sql);

        $result->bindParam(':authName', $authName, PDO::PARAM_STR);
        $result->bindParam(':blogCat', $blogCat, PDO::PARAM_STR);
        $result->bindParam(':blogTitle', $blogTitle, PDO::PARAM_STR);
        $result->bindParam(':blogImg',$blogImg, PDO::PARAM_LOB);
        $result->bindParam(':blogContent', $blogContent, PDO::PARAM_STR);
        $result->bindParam(':blogTime', $blogTime, PDO::PARAM_STR);
        $result->bindParam(':blogId', $blogId, PDO::PARAM_INT);

        $authName =strip_tags($_POST['authName']);
        $blogCat =strip_tags($_POST['blogCat']);
        $blogTitle = strip_tags($_POST['blogTitle']);

        $blogImg = $_FILES['blogImg']['name'];
        $blogImg_tmp_name = $_FILES['blogImg']['tmp_name'];
        $blogImg_size = $_FILES['blogImg']['size'];

        $blogContent=strip_tags($_POST['blogContent']);
        $blogTime = date('d/m/y');

        $blogId = $_POST['blogId'];

        $extension = explode(".",$blogImg);
        $permit_ext =array("jpeg","jpg","png","avif");

        if($blogImg_size>15728640)
        {
            echo "File size to large";
        }
        else{
            if(in_array($extension[1], $permit_ext))
            {
                move_uploaded_file($blogImg_tmp_name,"../assets/images/".$blogImg);

                $result->execute();

                header('Location: ../addBlog.php');
            }
            else
            {
                echo "not the supported file format";
            }
            $conn->close($result);
        }
    }
}
?>