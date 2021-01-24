
<div class="container mt-5">
    <h1>Do you really want to delete!</h1>
    <p>Bạn chắc chăn muốn xóa mặt hàng: <?php echo $_REQUEST['name']?></p>
<form action="" method="post">
    <a class="btn btn-outline-primary me-3" href="index.php" role="button">Exit</a>
    <input type="text" name="action" value="delete" hidden>
    <input type="text" name="id" value="<?php echo $_REQUEST['id']?>" hidden>
    <input class="btn btn-outline-danger" type="submit" value="Delete">
</form>
</div>
