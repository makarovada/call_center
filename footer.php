</div>
<div class="container">
      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="dataset.php" class="nav-link px-2 text-body-secondary">Датасет</a></li>
          <li class="nav-item"><a href="cluster.php?type=cluster" class="nav-link px-2 text-body-secondary">Кластеры</a></li>
          <li class="nav-item"><a href="cluster.php?type=noise" class="nav-link px-2 text-body-secondary">Шумы</a></li>
          <?php if($_SESSION['role']==1):?>
            <li class="nav-item"><a href="registration.php" class="nav-link px-2 text-body-secondary">Регистрация</a></li>
          <?php endif;?>
        </ul>
        <p class="text-center text-body-secondary"><a href="https://ai.mos.ru/">Источник больших данных</a><br><a href="https://bootswatch.com/zephyr/">Источник css</a></p>
      </footer>
    </div>
  </body>  
</html>