<?php
$username = 'root'; // 將使用者名放在第二個參數位置
$servername = 'localhost'; // 將主機名放在第一個參數位置
$password = '';
$dbname = 'blog';

$conn = new mysqli($servername, $username, $password, $dbname); // 正確順序的 mysqli 构造函數
$conn->query("SET NAMES UTF8");
if ($conn->connect_error) {
    die("connection failed:" . $conn->connect_error);
}
