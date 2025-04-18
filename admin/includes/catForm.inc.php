<form action="" method="POST" class="form-group">
<div class="mb-3">
    <label for="catName" class="form-label">Add Category</label>
    <input type="text" class="form-control" id="catName" aria-describedby="catName" name="catName">
    <div id="catName" class="form-text">Explore new category</div>
</div>
<button type="submit" class="btn btn-sm btn-outline-info" name="addCatbtn">Add Category</button>
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['addCatbtn']))
{
    if(empty($_POST['catName']))
    {
        echo "Please decide the newer category";
    }
    else
    {
        $catName = strtolower($_POST['catName']);

        $check ="SELECT * FROM blogcat WHERE catName =:catName";
        $stmt=$conn->prepare($check);
        $stmt->bindParam(':catName', $catName, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount()==1)
        {
            echo '<script>window.alert("Category exists. Please add different Category")</script>';
        }
        else{
            $sql = "INSERT INTO blogcat(catName)VALUES(:catName)";
            $result=$conn->prepare($sql);
            $result->bindParam(':catName', $catName, PDO::PARAM_STR);

            $result->execute();
            // header('Location: ./dashboard.php');
            echo '<script>location.href="./dashboard.php"</script>';
        }
    }
}
?>