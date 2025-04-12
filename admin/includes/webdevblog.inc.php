<?php
// this code has some error , need to check that , not showing the data on screen
$sql="SELECT * FROM blogpost_tb WEHRE blogCat = :blogCat";

$result=$conn->prepare($sql);

$result->bindParam(':blogCat', $blogCat, PDO::PARAM_INT);

$blogCat=1;

$result->execute();

if($result->rowCount()>0)
{
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Blog Id</th>';
    echo '<th>Blog Image</th>';
    echo '<th>Author Name</th>';
    echo '<th>Blog Title</th>';
    echo '<th>Blog Content</th>';
    echo '<th>Posted on</th>';
    echo '</tr>';
    echo '</thead>';
    echo '</table>';
}

?>