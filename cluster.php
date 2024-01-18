<?php
$label = isset($_GET['label']) ? $_GET['label'] : 0;
$type_cluster = $_GET['type'];
$label_dropdown = isset($_GET['label']) && $_GET['label']<>0 ? $_GET['label'] : 'Номер кластера';
$id_dropdown = isset($_GET['id']) ? $_GET['id'] : 'id аномалии';

$page=$type_cluster;

require('header.php');

$query = "SELECT name FROM clusters WHERE id=?";
        
$stmt = $connect->prepare($query);
$stmt->bind_param('i', $label);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
    $name = $row['name'];

  }
}
?>
<style>
  .dropdown-menu {
    max-height: 200px;
    overflow-y: auto;
  }
</style>

<br>
<!-- для кластеров -->
<?php if ($type_cluster=='cluster'):?>
<h4 class="mb-3">Данные о кластере <?php if($label<>0){echo $name;}?></h4>
<div class="form-group">
<div class="row g-3">

    <div class="col-sm-4">
      <div class="btn-group">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle='dropdown'><?php echo $label_dropdown;?> <span class='caret'></span></button>
        <ul class='dropdown-menu'>
            <?php
            $typeQuery = "SELECT DISTINCT label FROM appeals WHERE label<>0 ORDER BY label";
            $result = $connect->query($typeQuery);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li><a class='dropdown-item' href='?label=" .$row['label']. "&type=cluster'>" . $row['label'] . "</a></li>";
                }
            }
            
            ?>
        </ul></div></div>
        <div class="col-sm-8">
          <form method="POST" action="name_cluster.php?type=cluster&label=<?php echo $label; ?>">
            <div class="input-group mb-3">
              <input type="text" name="name_cl" class="form-control" placeholder="Название кластера">
              <button class="btn btn-primary" type="submit">Изменить</button>
            </div>
          </form>
        </div>   
      </div>
</div>
<?php endif;?>


<!-- для аномалий -->
<?php if ($type_cluster=='noise'):?>
  <h4 class="mb-3">Аномалии</h4>
  <br>
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
    if ($type_cluster == 'noise' || $label<>0) {
        if($label<>0){
          $query = "SELECT * FROM (SELECT * FROM appeals WHERE label=?) AS a JOIN dictionary ON appeal_num=id ORDER BY rand() LIMIT 50";
        }
        else{
          $query = "SELECT * FROM (SELECT * FROM appeals WHERE label=?) AS a JOIN dictionary ON appeal_num=id ORDER BY id_appeal";
        }
    
        $stmt = $connect->prepare($query);
        $stmt->bind_param('i', $label);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if($type_cluster == 'cluster'){
                    echo "<tr>";
                }
                else{
                    echo "<tr onclick=\"document.location='anomalie.php?id=".$row["id_appeal"]."'\">";
                }
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


<?php
require('footer.php');

?>