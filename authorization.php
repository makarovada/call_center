<?php
require('header.php');
require('db.php');

if (!empty($_POST)) {
  $query = "SELECT * FROM users WHERE login=?";
  $stmt = $connect->prepare($query);
  $stmt->bind_param('s', $_POST['login']);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if (mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);
      if (password_verify($_POST['password'], $user['password'])) {
          session_start();
          $_SESSION["user_id"] = $user['user_id'];
          $_SESSION["role"] = $user['role'];
          header("Location: dataset.php");
          exit;
      }
      else{
        echo '<br><div class="alert alert-dismissible alert-danger">';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
        echo 'Неверно введенный пароль.';
        echo '</div>';
      }
  }
  else{
    echo '<br><div class="alert alert-dismissible alert-danger">';
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
    echo 'Неверно введенный логин.';
    echo '</div>';
  }
}

?>
<main class="form-signin w-50 m-auto">
<form method="POST">
 <br><br><br>
  <h1 class="h3 mb-3 fw-normal">Авторизация</h1>

  <div class="form-group">
  <label for="exampleInputEmail1" class="form-label mt-4">Логин</label>
  <input type="text" class="form-control" name="login" placeholder="Login" required>
</div>
<div class="form-group">
  <label for="exampleInputPassword1" class="form-label mt-4">Пароль</label>
  <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
</div>
<br><br>
<button type="submit" class="btn btn-primary w-100 py-2">Войти</button>
<br><br>
</form>
</main>
<?php
require('footer.php');

?>


