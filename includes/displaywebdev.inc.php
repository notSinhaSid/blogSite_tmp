<?php
$blogCat=1;
$sql = "SELECT * FROM blogpost_tb WHERE blogCat=:blogCat ORDER BY blogId DESC LIMIT 10";
$result = $conn->prepare($sql);
$result->bindParam(':blogCat', $blogCat, PDO::PARAM_INT);
$result->execute();

if($result->rowCount()>0)
{
    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row)
    {
        echo '<div class="card h-100" style="width: 18rem;">';
        echo '<img src="./admin/assets/images/'.$row['blogImg'].'" class="card-img-top" alt="...">';
        echo '<div class="card-body">';
          echo '<h5 class="card-title">'.$row['blogTitle'].'</h5>';
          echo  '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>';
          echo '<form action="" method ="POST"><input type ="hidden" value="'.$row['blogId'].'" name="blogId"><a href="./public/webdev/webdev.'.$row['blogId'].'.php" class="btn btn-outline-info">Read More</a>';
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