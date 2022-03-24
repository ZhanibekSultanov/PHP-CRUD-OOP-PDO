    <?php
        include('./includes/class-autoload.inc.php');
        require_once('./templates/header.php');

    ?>

<!-- Button trigger modal -->
<div class="text-center">
    <button type="button" class="my-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
        Create Post
    </button>
</div>


<!-- Modal -->
<div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="post.proccess.php" method="post">
            <div class="form-group">
                <label for="">Title: </label>
                <input class="form-control" type="text" name="post-title" required>
            </div>
            <div class="form-group">
                <label for="">Content: </label>
                <textarea class="form-control" type="text" name="post-content" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Author: </label>
                <input class="form-control" type="text" name="post-author" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Add post</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>    


<div class="row">
    <?php 
        $posts = new Posts();
    ?>
    <?php
        if($posts->getPost()) : 
    ?>
        <?php
            foreach($posts->getPost() as $post) :
        ?>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post['title'] ?></h5>
                        <p class="card-text">
                            <?= $post['body'] ?>                        
                        </p>
                        <h6 class="card-subtitle text-muted text-end">Author: <?= $post['author'] ?></h6>
                        <a href="editForm.php?id=<?= $post['id']?>" class="btn btn-warning">Edit</a>
                        <a href="post.proccess.php?id=<?= $post['id']?>&send=del" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php
            endforeach;
        ?>
    <?php
        else :  
    ?>
        <p class="mx-auto text-center">post is empty</p>
    <?php 
        endif;
    ?>
</div>

    <?php
        require_once('./templates/footer.php');
    ?>