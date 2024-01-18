<?php
$page='users';
require('header.php');


if (!empty($_POST)) {
  $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $query = "SELECT * FROM users WHERE login=?";
  $stmt = $connect->prepare($query);
  $stmt->bind_param('s', $_POST['login']);
  $stmt->execute();
  $result = $stmt->get_result();
  if (mysqli_num_rows($result) == 0 && $_POST['password']==$_POST['password_repeat']) {
      $query = "INSERT INTO users (login, password, name) VALUES (?, ?, ?)";
      $stmt = $connect->prepare($query);
      $stmt->bind_param('sss', $_POST['login'], $hashedPassword, $_POST['name']);
      $stmt->execute();
      header("Location: users.php");
      exit;
  } 
  elseif ($_POST['password']!=$_POST['password_repeat']) {
    echo '<br><div class="alert alert-dismissible alert-danger">';
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
    echo 'Неверно введенный пароль.';
    echo '</div>';
  }
  else {
    echo '<br><div class="alert alert-dismissible alert-danger">';
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
    echo 'Пользователь с таким логином уже существует.';
    echo '</div>';
  }
}
?>

<div class="col-md-7 col-lg-8 m-auto">
<br><button type="button" class="btn btn-primary" onclick="document.location='users.php'">Назад</button><br><br>
<h4 class="mb-3">Регистрация сотрудника</h4>
<br>
<form class="needs-validation" method="POST">
  <div class="row g-3">
    <div class="col-12">
      <label for="login" class="form-label">ФИО</label>
        <input type="text" class="form-control" id="login" name="name" placeholder="" required>
    </div>

    <div class="col-12">
      <label for="login" class="form-label">Логин</label>
        <input type="text" class="form-control" id="login" name="login" placeholder="" required>
    </div>

    
    <div class="col-12">
      <label for="address" class="form-label">Пароль</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="" required>
    </div>

    <div class="col-12">
      <label for="password_repeat" class="form-label">Повторить пароль</label>
      <input type="password" class="form-control" id="password_repeat" name="password_repeat" placeholder="" required>
    </div>
   
  </div>
  <br>

  <button class="btn btn-primary w-100 py-2" type="submit">Зарегистрировать сотрудника</button>
</form>
</div>
<?php
require('footer.php');

?>
