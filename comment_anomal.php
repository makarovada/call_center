<?php
require('db.php');
require('session.php');

if($_POST["com_anomal"]!=''){
  $query = "INSERT INTO anomalies (id_user, id_appeal, comment) 
  VALUES (?, ?, ?)";
  $stmt = $connect->prepare($query);
  $stmt->bind_param('iis', $_SESSION["user"], $_GET["id"], mysqli_escape_string($connect, $_POST["com_anomal"]));
  $stmt->execute();
  header("Location: anomalie.php?id=".$_GET["id"]);
  exit; 
}
?>