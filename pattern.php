<!doctype html>
<html>
  <head>
      <title><?=$title?></title>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="bootstrap.min.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Служба поддержки Правительства Москвы</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#">Описание</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Датасет</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Статистика</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Авторизация</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
        <?=$content;?>
    </div>
    <div class="container">
      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Описание</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Датасет</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Статистика</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Авторизация</a></li>
        </ul>
        <p class="text-center text-body-secondary">Источник больших данных - https://ai.mos.ru/<br>Источник css - https://bootswatch.com/zephyr/</p>
      </footer>
    </div>
  </body>  
</html>