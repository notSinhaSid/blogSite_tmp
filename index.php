<?php
include('./database/dbconnection.inc.php');
?>

<?php
include('./includes/header.inc.php');
require('./includes/navbar.inc.php');
?>
<!-- image slider div -->
<div class='container'>

<div class="ism-slider" data-transition_type="fade" data-play_type="loop" data-image_fx="zoompan" data-buttons="false" data-radios="false" data-radio_type="thumbnail" id="blogSlider">
  <ol>
    <li>
    <a href="" target="_blank">
      <img src="ism/image/slides/_u/1745054746042_57413.jpg">
      <div class="ism-caption ism-caption-0">"Quality is more important than quantity. One home run is much better than two doubles." – Steve Jobs</div>
    </a>
    </li>
    <li>
      <img src="ism/image/slides/_u/1745054552729_849398.jpg">
      <div class="ism-caption ism-caption-0">My slide caption text</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1745054849015_24439.jpg">
      <div class="ism-caption ism-caption-0">My slide caption text</div>
    </li>
    <li>
    <a href="" target="_blank">
      <img src="ism/image/slides/_u/1745054552729_849398.jpg">
      <div class="ism-caption ism-caption-0">My slide caption text</div>
    </a>
    </li>
  </ol>
</div>
<!--  card section -->
<div class="container-cards">
    <div class="row">
        <div class="col-lg-4">
        <div class="card text-center h-100" style="background-color:#ffffff;">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="public/logos/logo1.jpg" class="img-thumbnail" />
            <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
            </a>
        </div>

        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the
            card's content.
            </p>

            <a href="./android.php" class="btn btn-primary">Read More</a>
        </div>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="card text-center h-100" style="background-color:#ffffff;">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="public/logos/logo2.jpg" class="img-thumbnail" />
            <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
            </a>
        </div>

        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the
            card's content.
            </p>

            <a href="./webdev.php" class="btn btn-primary">Read More</a>
        </div>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="card text-center h-100" style="background-color:#ffffff;">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="public/logos/logo3.jpg" class="img-thumbnail" />
            <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
            </a>
        </div>

        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the
            card's content.
            </p>

            <a href="./aiml.php" class="btn btn-primary">Read More</a>
        </div>
        </div>
        </div>
    </div>
</div>

<?php
include('./includes/footer.inc.php');
?>