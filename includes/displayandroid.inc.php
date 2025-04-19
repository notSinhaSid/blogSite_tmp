<?php
$blogCat=4;
$sql = "SELECT * FROM blogpost_tb WHERE blogCat=:blogCat ORDER BY blogTime DESC LIMIT 10";
$result = $conn->prepare($sql);
$result->bindParam(':blogCat', $blogCat, PDO::PARAM_INT);
$result->execute();

if($result->rowCount()>0)
{
    // echo "There are content in the webdev blogs";
   foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $blogId = $row['blogId'];
    $blogTitle = $row['blogTitle'];
    $blogContent = $row['blogContent'];
    $blogImg = $row['blogImg'];
    $blogTime = $row['blogTime'];

    // Generate unique IDs
    $modalId = "modal-" . $blogId;
    $labelId = "label-" . $blogId;

    echo <<<HTML
    <div class="col-lg-3 col-md-6">
        <div class="card h-100 ">
            <img src="./admin/assets/images/{$blogImg}" class="img-thumbnail" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{$blogTitle}</h5>
                <button type="button" class="btn btn-outline-primary btn-sm mt-auto"
                    data-bs-toggle="modal"
                    data-bs-target="#{$modalId}">
                    Read More
                </button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="{$modalId}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{$labelId}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="{$labelId}">{$blogTitle}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {$blogContent}
                </div>
                <div class="modal-footer">
                    <small class="text-muted">Posted on: {$blogTime}</small>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    HTML;
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