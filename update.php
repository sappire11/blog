<?php require_once('./conn.php');
$id = $_GET['id'];
$sql = "SELECT * FROM articles where id=" . $id;
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql_category = "SELECT * FROM categories ORDER BY created_at DESC";
$result_category = $conn->query($sql_category);
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
    <h1>編輯文章</h1>
    <form method="POST" action="handle_update.php">
        <div>標題:<input name="title" value="<?php echo $row['title'] ?>" /></div>
        <div>內容:<textarea rows="40" name="content"><?php echo $row['content'] ?></textarea></div>
        <div>
            分類: <select name="category_id">
                <?php
                while ($row_category = $result_category->fetch_assoc()) {

                    $id = $row_category["id"];
                    $name = $row_category["name"];
                    $is_checked = $row['category_id'] === $id ? "selected" : "";
                    echo "<option value='$id' $is_checked>
                        $name</option>";
                }
                ?>

            </select>
        </div>
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
        <input type="submit" />
    </form>
</body>

</html>