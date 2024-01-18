<?php
require("db.php");
require("session.php");
require("check_auth.php");

mysqli_query($connect, "DELETE FROM users WHERE id=".$_GET["id"]);
        
header("Location: users.php");
?>