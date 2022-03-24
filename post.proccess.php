<?php

include('includes/class-autoload.inc.php');

$posts = new Posts;

if(isset($_POST['submit'])){
    $title = $_POST['post-title'];
    $body = $_POST['post-content'];
    $author = $_POST['post-author'];

    $posts->addPost($title, $body, $author);

    header("Location: {$_SERVER['HTTP_REFERER']}");


}else if(isset($_POST['update'])){
    $title = $_POST['post-title'];
    $body = $_POST['post-content'];
    $author = $_POST['post-author'];
    $id = $_GET['id'];

    $posts->updatePost($title, $body, $author, $id);

    header("Location: http://php-crud-oop");

}else if($_GET['send'] === 'del'){
    $id = $_GET['id'];

    $posts->deletePost($id);

    header("Location: http://php-crud-oop");

}

