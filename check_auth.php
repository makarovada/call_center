<?php
require("session.php");
if(!$session_user){
	echo '<br><div class="alert alert-dismissible alert-danger">';
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
    echo 'Необходимо авторизоваться.';
    echo '</div>';
	exit;
}
?>