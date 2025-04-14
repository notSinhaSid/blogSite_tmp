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
?>
<form action="./includes/blogAdd.inc.php" method="post" class=" form-group mt-3" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="AuthorName" class="form-label">Author's Name</label>
        <input type="text" name="authName" class="form-control" value="<?php if(isset($row['authName'])){echo $row['authName'];}?>">
    </div>
    <div class="mb-3">
        <label for="BlogCategory" class="form-label">Blog Category</label>
        <select name="blogCat" id="" class="form-select">
            <option value="disabled">Select a Category</option>
            <option value="1"<?php if(isset($row['blogCat']) &&($row['blogCat']=="1")) {echo "selected";}?> name="WebDev">WebDev</option>
            <option value="2" <?php if(isset($row['blogCat']) &&($row['blogCat']=="2")) {echo "selected";}?> name="DevOps">DevOps</option>
            <option value="3" <?php if(isset($row['blogCat']) &&($row['blogCat']=="3")) {echo "selected";}?> name="AIML">AIML</option>
            <option value="4" <?php if(isset($row['blogCat']) &&($row['blogCat']=="4")) {echo "selected";}?> name="Android">Android</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="BlogTitle" class="form-label">Blog Title</label>
        <input type="text" name="blogTitle" class="form-control" value="<?php if(isset($row['blogTitle'])){echo htmlspecialchars($row['blogTitle']);}?>">
    </div>
    <div class="mb-3">
        <label for="blogImg" class="form-label">Blog Post image</label>
        <input class="form-control form-control-sm" id="blogImg" type="file" name="blogImg">
        <img src="<?php if(isset($row['blogImg'])){echo "./assets/images/".$row['blogImg'];}?>" alt="" class="form-control"s style="height:150px; width:auto;">
    </div>
    <div class="mb-3">
        <label for="BlogContent" class="form-label">Blog Content</label>
        <textarea type="text" rows="10" cols="50" name="blogContent" class="form-control"><?php if(isset($row['blogContent'])){echo $row['blogContent'];}?></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-md btn-outline-success offset-lg-4" name="add">Create</button>
        <input type="text" name="blogId" value="<?php if(isset($blogId)){echo $blogId;}?>">
        <button type="submit" class="btn btn-md btn-outline-secondary offset-lg-1" name="updatewebdev">Update</button>
    </div>
</form>
