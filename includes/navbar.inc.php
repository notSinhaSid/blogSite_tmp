<nav>
    <div class="navbar">
      <div class="logo"><a href="#">Tez-Blogs</a></div>
      <ul class="menu">
      <li><a href="./index.php">Home</a></li>
        <?php
          $sql = "SELECT * FROM blogcat";
          $result = $conn->prepare($sql);
          $result->execute();
          if($result->rowCount()>0)
          {
            foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row)
            {
              $catName = $row['catName'];
              echo <<<HTML
                <li><a href="./{$catName}.php">{$catName}</a></li>
              HTML;
            }
          }
        ?>
      </ul>
    </div>
  </nav>
 