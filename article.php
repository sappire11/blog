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
    <title>Blog 部落格</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="./index.php">首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about.php">關於我</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="single-article">
            <h1><?php echo $title; ?></h1>
            <h2>分類: <?php echo $row['name']; ?></h2>
            <p><?php echo $content; ?></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>