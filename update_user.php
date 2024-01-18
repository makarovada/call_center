<?php
$page='signup';
require('header.php');


if (!empty($_POST)) {
  $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

  if ($_POST['password']==$_POST['password_repeat']) {
      $query = "UPDATE users SET password=?, name=? WHERE id=?";
      $stmt = $connect->prepare($query);
      $stmt->bind_param('sss', $hashedPassword, $_POST['name'], $_GET['id']);
      $stmt->execute();
      header("Location: dataset.php");
      exit;
  } 
  else {
    echo '<br><div class="alert alert-dismissible alert-danger">';
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
    echo 'Неверно введенный пароль.';
    echo '</div>';
  }
}

$query = "SELECT * FROM users WHERE id=?";  
$stmt = $connect->prepare($query);
$stmt->bind_param('i', $_GET["id"]);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $login = $row['login'];
    }
}
?>
<br>
<div class="col-md-7 col-lg-8 m-auto">
<h4 class="mb-3">Изменение данных сотрудника</h4>
<br>
<form class="needs-validation" method="POST">
  <div class="row g-3">
    <div class="col-12">
      <label for="login" class="form-label">ФИО</label>
        <input type="text" class="form-control" id="login" name="name" value='<?php echo $name;?>' required>
    </div>

    <div class="col-12">
        <label for="login" class="form-label">Логин</label>
        <input type="text" class="form-control" id="login" name="login" value='<?php echo $login;?>' disabled="">
    </div>

    
    <div class="col-12">
      <label for="address" class="form-label">Пароль</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="col-12">
      <label for="password_repeat" class="form-label">Повторить пароль</label>
      <input type="password" class="form-control" id="password_repeat" name="password_repeat" required>
    </div>
   
  </div>
  <br>

  <button class="btn btn-primary w-100 py-2" type="submit">Зарегистрировать сотрудника</button>
</form>
</div>
<?php
require('footer.php');
?>
