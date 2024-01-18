<?php
require("db.php");
require("session.php");
require("check_auth.php");

$query = "DELETE FROM users WHERE id=?";
$stmt = $connect->prepare($query);
$stmt->bind_param('i', $_GET["id"]);
$stmt->execute();
$result = $stmt->get_result();
        
header("Location: users.php");
?>