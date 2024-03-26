<?php require_once('./conn.php');
$sql = "SELECT * FROM categories ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>新增文章</h1>
    <form method="POST" action="handle_add.php">
        <div>標題:<input name="title" /></div>
        <div>內容:<textarea name="content"></textarea></div>
        <div>
            分類: <select name="category_id">
                <?php
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $name = $row["name"];

                    echo "<option value=''>$name</option>";
                }
                ?>

            </select>
        </div>
        <input type="submit" />
    </form>
</body>

</html>