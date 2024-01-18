<?php
$page='users';
require('header.php');
?>
<br>
<h4 class="mb-3">Данные о сотрудниках</h4>
<br><button type="button" class="btn btn-primary" onclick="document.location='registration.php'">Регистрация</button><br>
<br>
<table class="table table-hover">
  <tbody>
    <?php 
    $query = "SELECT * FROM users WHERE role>1 ORDER BY name";
    
    $stmt = $connect->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<th scope='row'>".$row["name"]."</th>";
            echo "<td><a href=\"update_user.php?id=".$row["id"]."\">Изменить</a></td>";
            echo "<td><a href=\"delete_user.php?id=".$row["id"]."\">Удалить</a></td>";
            echo "</tr>";
        }
    }                    
    ?>
  </tbody>
</table>

<?php
require('footer.php');
?>