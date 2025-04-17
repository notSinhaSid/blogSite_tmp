<?php
$blogCat=1;
$sql = "SELECT * FROM blogpost_tb WHERE blogCat=:blogCat ORDER BY blogTime DESC LIMIT 10";
$result = $conn->prepare($sql);
$result->bindParam(':blogCat', $blogCat, PDO::PARAM_INT);
$result->execute();

if($result->rowCount()>0)
{
    // echo "There are content in the webdev blogs";
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        echo '<div class="col-lg-3 col-md-6">';
        echo '<div class="card h-100">';
        echo '<img src="./admin/assets/images/'.$row['blogImg'].'" class="img-thumbnail" alt="...">';
        echo '<div class="card-body d-flex flex-column">';
        echo '<h5 class="card-title">'.$row['blogTitle'].'</h5>';
        echo '</div>';
        echo '<div class="card-footer">
                <form action="" method="POST" enctype="">
                <input type="hidden" name="blogId" value="'.$row['blogId'].'">
                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View Content</button>
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
                </div>
                </form>
                </div>';
        echo '</div>';
        echo '</div>';
    }
    
}
else
{
    echo '<div class="card" aria-hidden="true">';
    echo '<img src="..." class="card-img-top" alt="...">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title placeholder-glow">';
        echo '<span class="placeholder col-6"></span>';
        echo '</h5>';
        echo '<p class="card-text placeholder-glow">';
        echo '<span class="placeholder col-7"></span>';
        echo '<span class="placeholder col-4"></span>';
        echo '<span class="placeholder col-4"></span>';
        echo '<span class="placeholder col-6"></span>';
        echo '<span class="placeholder col-8"></span>';
        echo '</p>';
    echo '<a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>';
    echo '</div>';
    echo '</div>';
}
?>