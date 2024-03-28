<?php
require_once("./conn.php");

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$category_id = $_POST['category_id'];;

if (empty($title)) {
    die('Title is empty');
} elseif (empty($content)) {
    die('Content is empty');
} elseif (empty($category_id)) {
    die('Category ID is empty');
}


$sql = "UPDATE articles SET title='$title', content='$content', category_id=$category_id
 WHERE id=$id";
$result = $conn->query($sql);

if ($result) {
    header("Location:./admin.php");
} else {
    die("failed." . $conn->error);
}
