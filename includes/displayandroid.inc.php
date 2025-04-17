<?php
$blogCat=4;
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
        echo '<img src="./admin/assets/images/'.$row['blogImg'].'" class="card-img-top" alt="...">';
        echo '<div class="card-body d-flex flex-column">';
        echo '<h5 class="card-title">'.$row['blogTitle'].'</h5>';
        echo '</div>';
        echo '<div class="card-footer">
                <form action="" method="POST" enctype="">
                <input type="hidden" name="blogId" value="'.$row['blogId'].'">
                <button class="btn btn-sm btn-outline-info btn-block mt-auto">Read More</button></form>
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