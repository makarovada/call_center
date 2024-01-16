<?php
require('header.php');
?>
<br>
<h4 class="mb-3">Данные о кластере</h4>
<div class="form-group">
<!-- для кластеров -->
<div class="row g-3">

    <label for="exampleSelect1" class="form-label mt-1">Кластер</label>
    <div class="col-sm-4">
        <select class="form-select" id="exampleSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>
    <div class="col-sm-8">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Название кластера" aria-label="Название кластера" aria-describedby="button-addon2">
        <button class="btn btn-primary" type="button" id="button-addon2">Изменить</button>
        </div>
    </div>
</div>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Время звонка</th>
      <th scope="col">Голосовое меню</th>
      <th scope="col">Нахождение в очереди</th>
      <th scope="col">Общение с оператором</th>
      <th scope="col">Постобработка</th>
      <th scope="col">Тематика обращения</th>
      <th scope="col">Основная тема</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Active</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column contentColumn contentColumn contentColumn contentColumn contentColumn contentColumn contentColumn contentColumn content</td>
    </tr>
  </tbody>
</table>
<!-- для аномалий -->
<form>
    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Комментарии к аномалии</label>
      <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
<form>
<?php
require('footer.php');

?>