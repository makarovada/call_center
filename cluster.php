<?php
require('header.php');
require('db.php');
?>
<br>
<h4 class="mb-3">Данные о кластере</h4>
<div class="form-group">
<!-- для кластеров -->
<?php if ($_GET["type"]=='cluster'):?>
<div class="row g-3">

    <div class="col-sm-4">
    <div class="btn-group">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle='dropdown'>Номер кластера<span class='caret'></span></button>
        <ul class='dropdown-menu'>
            <?php
            $typeQuery = "SELECT DISTINCT label FROM appeals WHERE label<>0 ORDER BY label";
            $result = $connect->query($typeQuery);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li><a class='dropdown-item' href='?label=" .$row['label']. "&type=cluster'>" . $row['label'] . "</a></li>";
                }
            }
            $label = isset($_GET['label']) ? $_GET['label'] : 0;

            
            ?>
        </ul></div></div>
    <div class="col-sm-8">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Название кластера" aria-label="Название кластера" aria-describedby="button-addon2">
        <button class="btn btn-primary" type="button" id="button-addon2">Изменить</button>
        </div>
    </div>
</div>
</div>

<?php endif;?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Время звонка</th>
      <th scope="col">Голосовое меню</th>
      <th scope="col">Нахождение в очереди</th>
      <th scope="col">Общение с оператором</th>
      <th class="table-primary" scope="col">Постобработка</th>
      <th scope="col">Тематика обращения</th>
      <th class="table-primary" scope="col">Основная тема</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($label <> 0) {
        $query = "SELECT * FROM (SELECT * FROM appeals WHERE label=?) AS a JOIN dictionary ON appeal_num=id ORDER BY postProcessingTime, appeal_num";
    
        $stmt = $connect->prepare($query);
        $stmt->bind_param('i', $label);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<th scope='row'>".$row["id_appeal"]."</th>";
                echo "<td>".$row["dateTime"]."</td>";
                echo "<td>".$row["voiceMenu"]."</td>";
                echo "<td>".$row["queueTime"]."</td>";
                echo "<td>".$row["withOperatorTime"]."</td>";
                echo "<td class='table-primary'>".$row["postProcessingTime"]."</td>";
                echo "<td>".$row["appeal"]."</td>";
                echo "<td class='table-primary'>".$row["theme"]."</td>";
                echo "</tr>";
            }
        } 
    }
    ?>
  </tbody>
</table>
<!-- для аномалий -->
<?php if ($_GET["type"]=='noise'):?>

<form>
    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Комментарии к аномалии</label>
      <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
<form>
<?php endif;?>

<?php
require('footer.php');

?>