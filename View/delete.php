<center>
    <h1>Do you want to delete this task?</h1>
    <h3><?php echo $task->title; ?></h3>
    <form action="index.php?page=delete" method="post">
        <input type="hidden" name="id" value="<?php echo $task->id; ?>"/>
        <div class="form-group">
            <input type="submit" value="Delete" class="btn btn-danger"/>
            <a class="btn btn-default" href="index.php">Cancel</a>
        </div>
    </form>
</center>