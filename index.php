<?php require_once('./conn.php'); ?>
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
        <div class="article">
            <?php
            $sql = "SELECT * FROM articles ORDER BY create_at DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $title = $row['title'];
                    echo "<div class='article'>";
                    echo " <h1><a href='./article.php?id=$id'>$title</a></h1>";
                    echo "</div>";
                }
            }
            ?>



        </div>
</body>

</html>