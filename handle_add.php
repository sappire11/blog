<?php
require_once("./conn.php");

$title = $_POST['title'];
$content = $_POST['content'];
$category_id = $_POST['category_id'];

if (empty($title)) {
    die('Title is empty');
} elseif (empty($content)) {
    die('Content is empty');
} elseif (empty($category_id)) {
    die('Category ID is empty');
}


$sql = "INSERT INTO articles(title,content,category_id) VALUES('$title',
'$content',$category_id)";
$result = $conn->query($sql);

if ($result) {
    header("Location:./admin.php");
} else {
    die("failed." . $conn->error);
}
