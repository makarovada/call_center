<?php
$page='noise';
require('header.php');
?>
<br><button type="button" class="btn btn-primary" onclick="document.location='cluster.php?type=noise'">Назад</button><br>

<?php
echo "<br><h4 class='mb-3'>Аномалия ".$_GET["id"]."</h4><br>";
$query = "SELECT * FROM (SELECT * FROM appeals WHERE id_appeal=?) AS a JOIN dictionary ON appeal_num=id";

$stmt = $connect->prepare($query);
$stmt->bind_param('i', $_GET["id"]);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<table class='table'><tbody>";
      echo "<tr><th scope='col'>Дата и время звонка</th><td>".$row["dateTime"]."</td></tr>";
      echo "<tr><th scope='col'>Длительность голосового меню, сек</th><td>".$row["voiceMenu"]."</td></tr>";
      echo "<tr><th scope='col'>Длительность нахождения абонента в очереди, сек</th><td>".$row["queueTime"]."</td></tr>";
      echo "<tr><th scope='col'>Длительность общения с оператором, сек</th><td>".$row["withOperatorTime"]."</td></tr>";
      echo "<tr><th scope='col'>Длительность постобработки, сек</th><td>".$row["postProcessingTime"]."</td></tr>";
      echo "<tr><th scope='col'>Тематика обращения</th><td>".$row["appeal"]."</td></tr>";
      echo "<tr><th scope='col'>Основная тема</th><td>".$row["theme"]."</td></tr>";
      echo "</tbody></table>";
    }
}
?>
<br><h4 class='mb-3'>Исследование аномалии</h4>
<?php
  $query = "SELECT * FROM anomalies JOIN users ON anomalies.id_user=users.id WHERE id_appeal=?";

  $stmt = $connect->prepare($query);
  $stmt->bind_param('i', $_GET["id"]);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<table><tbody>";
        echo "<tr'><th scope='col' style='width: 150px;'>Сотрудник </th><td>".$row["name"]."</td></tr>";
        echo "<tr><th scope='col'>Комментарий </th><td>".$row["comment"]."</td></tr>";
        echo "<tr><th scope='col'>_</th><td> </td></tr>";
        echo "</tbody></table>";
      }
  }
  else{ echo "<p>Комментариев не обнаружено.</p>";}
?>

<form method="POST" action="comment_anomal.php?id=<?php echo $_GET["id"]; ?>">
    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Описание аномалии <?php echo $_GET["id"]; ?></label>
      <textarea name="com_anomal" class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div><br>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
<?php
require('footer.php');

?>