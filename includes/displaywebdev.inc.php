<?php
$blogCat=1;
$sql = "SELECT * FROM blogpost_tb WHERE blogCat=:blogCat ORDER BY blogId DESC LIMIT 10";
$result = $conn->prepare($sql);
$result->bindParam(':blogCat', $blogCat, PDO::PARAM_INT);
$result->execute();

if($result->rowCount()>0)
{
    echo '<table class="table table-hover table-borderless">';
    echo '<thead>';
    echo '<tr class="align-middle">';
    echo '<th>Blog Image</th>';
    echo '<th>Author Name</th>';
    echo '<th>Blog Title</th>';
    echo '<th>View Blog Content</th>';
    echo '<th>Posted on</th>';
    echo '</tr>';
    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row)
    {
        echo '<tr class="align-middle">';
        // echo '<td>'.$row['blogId'].'</td>';
        echo '<td><img src="./admin/assets/images/'.$row['blogImg'].'" style="height: 100px; width: 150px;"></td>';
        echo '<td>'.$row['authName'].'</td>';
        echo '<td class="text-uppercase">'.$row['blogTitle'].'</td>';
        //this was for the content section of the blog
        echo '<td><button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Read More</button>
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
        echo '</tr>';
    }
    echo '</thead>';
    echo '</table>';
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