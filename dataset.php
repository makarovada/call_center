<?php
$page='dataset';
require('header.php');
?>
<br>
<h4 class="mb-3">Данные о звонках</h4>
<br>
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
    </tr>
  </thead>
  <tbody>
    <?php
    $objectsPerPage = 100;
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    
    $offset = ($currentPage - 1) * $objectsPerPage;
    $typeFilter = isset($_GET['type']) ? $_GET['type'] : '';
    
    $query = "SELECT * FROM appeals LIMIT ? OFFSET ?";
    
    $stmt = $connect->prepare($query);
    $stmt->bind_param('ii', $objectsPerPage, $offset);
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
            echo "<td>".$row["postProcessingTime"]."</td>";
            echo "<td>".$row["appeal"]."</td>";
            echo "</tr>";
        }
    }                    
    ?>

  </tbody>
</table>
<?php
$query = "SELECT COUNT(*) AS total FROM appeals";
$stmt = $connect->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalObjects = $row['total'];
}

$totalPages = ceil($totalObjects / $objectsPerPage);
echo "<div class='pagination'>";
echo "<li class='page-item'><a class='page-link' href='?page=1&type=$typeFilter'>Первая страница</a></li>";
if ($currentPage > 1) {
    $prevPage = $currentPage - 1;
    echo "<li class='page-item'><a class='page-link' href='?page=$prevPage&type=$typeFilter'>Предыдущая страница</a></li>";
}

if ($currentPage < $totalPages) {
    $nextPage = $currentPage + 1;
    echo "<li class='page-item'><a class='page-link' href='?page=$nextPage&type=$typeFilter'>Следующая страница</a></li>";
}
echo "<li class='page-item'><a class='page-link' href='?page=$totalPages&type=$typeFilter'>Последняя страница</a></li>";
echo "</div>";
?>

<?php
require('footer.php');
?>