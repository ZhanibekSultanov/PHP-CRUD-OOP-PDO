<?php
require_once("./templates/header.php");
include('./includes/class-autoload.inc.php');

$posts = new Posts;
$post = $posts->editPost($_GET['id']);

?>

<div class="text-center my-4">
    <h3>Edit Post</h3>
</div>

<div class="row">
    <div class="col-md-7 mx-auto">
    <form action="post.proccess.php?id=<?= $post['id'] ?>" method="post">
            <div class="form-group">
                <label for="">Title: </label>
                <input class="form-control" type="text" name="post-title" required value="<?= $post['title'] ?>">
            </div>
            <div class="form-group">
                <label for="">Content: </label>
                <textarea class="form-control" type="text" name="post-content" required><?= $post['body'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Author: </label>
                <input class="form-control" type="text" name="post-author" required value="<?= $post['author'] ?>">
            </div>
                <a href="index.php" type="button" class="btn btn-secondary my-4">Back</a>
                <button type="submit" name="update" class="btn btn-primary">Update post</button>
            </div>
        </form>
    </div>
</div>
<?php
require_once("./templates/footer.php");
?>
