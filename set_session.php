<?php
session_start(); // Bắt đầu session

if(isset($_GET['id'])) {
    $id = $_GET['id']; // Lấy giá trị id từ yêu cầu GET

    // Gán giá trị của biến id cho biến session
    $_SESSION["indexCateID"] = $id;
}
?>
