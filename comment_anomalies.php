<?php
include("db.php");

if($_POST["com_anomal"]!=''){
    $result = mysqli_query($connect, "UPDATE anomalies SET comment = 
        \"".mysqli_escape_string($connect, $_POST["com_anomal"])."\" WHERE id=".$_GET["id"]
    );
    
    
}

header("Location: cluster.php?type=noise");
?>