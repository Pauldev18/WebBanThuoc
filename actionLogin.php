<?php
    session_start();
    include("connect.php");
    $pass = $_POST["password"];
    $email = $_POST["email"];
   
    $result = $conn -> query("SELECT * FROM nguoidung WHERE MatKhau = '" . $pass . "' AND Email = '" . $email . "'");
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $_SESSION["cid"] = $row["MaNguoiDung"];
        header("Location: index.php"); // Redirect to a success page
        exit();
    }
    else{
        $_SESSION["error"] = "Tài khoản hoặc mật khẩu không chính xác";
        header("Location: login.php"); // Redirect to a success page
        exit();
    }
    
?>