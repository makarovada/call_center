<?php
require('header.php');
require('db.php');
?>
<!-- для аномалий -->
<form method="POST" action="comment_anomalies.php?id=<?php echo $_GET["id"]; ?>">
    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Комментарий к аномалии <?php echo $_GET["id"]; ?></label>
      <textarea name="com_anomal" class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div><br>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
<?php
require('footer.php');

?>