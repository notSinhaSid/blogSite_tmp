<?php
$sql= "SELECT * FROM blogpost_tb WHERE blogCat=:blogCat";

$blogCat =4;

$result=$conn->prepare($sql);

$result->bindParam(':blogCat', $blogCat, PDO::PARAM_INT);

$result->execute();

if($result->rowCount()>0)
{
    echo '<table class="table table-hover table-borderless">';
    echo '<thead>';
    echo '<tr class="align-middle">';
    echo '<th>Blog Id</th>';
    echo '<th>Blog Image</th>';
    echo '<th>Author Name</th>';
    echo '<th>Blog Title</th>';
    echo '<th>View Blog Content</th>';
    echo '<th>Posted on</th>';
    echo '<th>Delete</th>';
    echo '<th>Edit</th>';
    echo '</tr>';
    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row)
    {
        echo '<tr class="align-middle">';
        echo '<td>'.$row['blogId'].'</td>';
        echo '<td><img src="./assets/images/'.$row['blogImg'].'" style="height: 100px; width: 150px;"></td>';
        echo '<td>'.$row['authName'].'</td>';
        echo '<td class="text-uppercase">'.$row['blogTitle'].'</td>';
        //this was for the content section of the blog
        echo '<td><button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View Content</button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">'.$row['blogTitle'].'</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content">
                    '.$row['blogContent'].'
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div></td>';
        echo '<td>'.$row['blogTime'].'</td>';
        echo '<td><form method="POST" class="form-group" action="">
                    <input type="hidden" value='.$row['blogId'].' name="blogId">
                    <button class="btn btn-danger btn-block p-2" name="remove" type="submit"><i class="fa-solid fa-xmark"></i></button>
                    </form></td>';
        echo '<td><form method="POST" class="form-group" action="./addBlog.php">
                    <input type="hidden" value='.$row['blogId'].' name="blogId">
                    <button class="btn btn-warning btn-sm btn-block p-2" name="edit" type="submit"><i class="fa-regular fa-pen-to-square"></i></button>
                    </form></td>';
        echo '</tr>';
    }
    echo '</thead>';
    echo '</table>';

    unset($result);
}
else
{
    echo "No record found yet";
}
?>

<?php
include_once('deleteblog.inc.php');
?>