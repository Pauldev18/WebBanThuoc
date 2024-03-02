<?php
// Khởi động phiên
session_start();

// Xóa tất cả các biến session
session_unset();

// Hủy phiên
session_destroy();
header("Location: login.php"); // Redirect to a success page
exit();
?>
