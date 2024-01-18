<?php
include("db.php");

if($_GET["label"]<>0 && $_POST["name_cl"]<>''){
    $result = mysqli_query($connect, "UPDATE clusters SET name = 
        \"".mysqli_escape_string($connect, $_POST["name_cl"])."\" WHERE id=".$_GET["label"]
    );
    
    
}

header("Location: cluster.php?type=cluster&label=".$_GET["label"]);
?>