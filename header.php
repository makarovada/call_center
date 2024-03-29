<?php
require("db.php");
require("session.php");
?>
<!doctype html>
<html>
  <head>
      <title><?=$title?></title>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="bootstrap.min.css" />
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="dataset.php">Служба поддержки Правительства Москвы</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class='<?php if($page=='dataset'){ echo "nav-link active";} else{ echo "nav-link";}?>' href="dataset.php">Датасет</a>
            </li>
            <li class="nav-item">
              <a class='<?php if($page=='cluster'){ echo "nav-link active";} else{ echo "nav-link";}?>' href="cluster.php?type=cluster">Кластеры</a>
            </li>
            <li class="nav-item">
              <a class='<?php if($page=='noise'){ echo "nav-link active";} else{ echo "nav-link";}?>' href="cluster.php?type=noise">Шумы</a>
            </li>
            <?php if($_SESSION['role']==1):?>
              <li class="nav-item">
                <a class='<?php if($page=='users'){ echo "nav-link active";} else{ echo "nav-link";}?>' href="users.php">Сотрудники</a>
              </li>
            <?php endif;?>
            
          </ul>
        </div>
      </div>
    </nav>
    <?php require("check_auth.php");?>
    <div class="container">
