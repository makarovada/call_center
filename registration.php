<?php
require('header.php');
require('db.php');
?>
<br>
<div class="col-md-7 col-lg-8 m-auto">
<h4 class="mb-3">Регистрация сотрудника</h4>
<br>
<form class="needs-validation" novalidate="">
  <div class="row g-3">
    <div class="col-sm-4">
      <label for="firstName" class="form-label">Имя</label>
      <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
    </div>

    <div class="col-sm-4">
      <label for="lastName" class="form-label">Фамилия</label>
      <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
    </div>

    <div class="col-sm-4">
      <label for="SecondName" class="form-label">Отчество</label>
      <input type="text" class="form-control" id="SecondName" placeholder="" value="" required="">
    </div>

    <div class="col-12">
      <label for="email" class="form-label">Почта</label>
      <input type="email" class="form-control" id="email" placeholder="">
    </div>

    <div class="col-12">
      <label for="login" class="form-label">Логин</label>
        <input type="text" class="form-control" id="login" placeholder="" required="">
    </div>

    
    <div class="col-12">
      <label for="address" class="form-label">Пароль</label>
      <input type="password" class="form-control" id="password" placeholder="" required="">
    </div>

    <div class="col-12">
      <label for="password_repeat" class="form-label">Повторить пароль</label>
      <input type="password" class="form-control" id="password_repeat" placeholder="">
    </div>
   
  </div>
  <br>

  <button class="btn btn-primary w-100 py-2" type="submit">Зарегистрировать сотрудника</button>
</form>
</div>
<?php
require('footer.php');

?>
