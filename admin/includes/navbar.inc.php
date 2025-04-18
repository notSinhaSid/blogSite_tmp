<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">Tez-Blogs</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./addBlog.php">Add / Create</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Review
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./webdevshow.inc.php">Web Dev Zone</a></li>
            <li><a class="dropdown-item" href="./devops.inc.php">DevOps Zone</a></li>
            <li><a class="dropdown-item" href="./aimlshow.inc.php">AI-ML Zone</a></li>
            <li><a class="dropdown-item" href="./androidshow.inc.php">Android Zone</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="Logout" action="./includes/logoutcheck.inc.php" method="POST">
        <button class="btn btn-outline-danger" type="submit">Logout</button>
      </form>
    </div>
  </div>
</nav>