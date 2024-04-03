<?php
require_once('./conn.php');
$id = $_GET['id'];
$sql = "SELECT articles.id, articles.title, articles.content, categories.name 
        FROM articles 
        LEFT JOIN categories ON articles.category_id = categories.id 
        WHERE articles.id=" . $id;
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$title = $row['title'];
$content = $row['content'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog 部落格</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="nav">
        <h1>Blog</h1>
        <a class="active" href="./index.php">首頁</a>
        <a href="./about.php">關於我</a>
    </nav>
    <div class="container">
        <div class="single-article">
            <h1><?php echo $title; ?></h1>
            <h2>分類:<?php echo $row['name']; ?></h2>
            <p><?php echo $content; ?></p>
        </div>
    </div>
</body>

</html>