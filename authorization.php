<?php
require('header.php');
?>
<main class="form-signin w-50 m-auto">
<form>
 <br><br><br>
  <h1 class="h3 mb-3 fw-normal">Авторизация</h1>

  <div class="form-group">
  <label for="exampleInputEmail1" class="form-label mt-4">Логин</label>
  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Login">
</div>
<div class="form-group">
  <label for="exampleInputPassword1" class="form-label mt-4">Пароль</label>
  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="off">
</div>
<br><br>
<button type="submit" class="btn btn-primary w-100 py-2">Войти</button>
<br><br>
</form>
</main>
<?php
require('footer.php');

?>


