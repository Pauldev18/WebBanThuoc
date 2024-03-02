<?php
  session_start();
  include("connect.php");
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $country = $_POST["country"];
  $mobile = $_POST["mobile"];
  $email = $_POST["email"];
  $ordernote = $_POST["ordernotes"];
  $totalPrice = $_POST["totalprice"];
  $MaNguoiDung = $_SESSION["cid"];
  if($ordernote == ''){
    $sql = "INSERT INTO hoadonbanthuoc (MaNguoiDung, firstname, lastname, address, city,  country, mobile, email, OrderNote, totalprice) 
    VALUES ('$MaNguoiDung', '$firstname', '$lastname', '$address', '$city', '$country', '$mobile', '$email', '', '$totalPrice')";
   
  }else{
    $sql = "INSERT INTO hoadonbanthuoc (MaNguoiDung, firstname, lastname, address, city,  country, mobile, email, OrderNote, totalprice) 
    VALUES ('$MaNguoiDung', '$firstname', '$lastname', '$address', '$city', '$country', '$mobile', '$email', '$ordernote', '$totalPrice')";
    
  }
  echo $sql;
  if($conn -> query($sql) === TRUE){
    $last_insert_id = $conn->insert_id;
    if(isset($_SESSION["cart_item"])){
      foreach($_SESSION["cart_item"] as $item){
        $MaThuoc = $item["MaThuoc"];
        $SoLuong = $item["SoLuong"];
        $conn->query("INSERT INTO chitiethoadon(MaHoaDon, MaThuoc, SoLuong) VALUES (
          '$last_insert_id', '$MaThuoc', '$SoLuong')");
      }
    }
  
    header("Location: contact.php"); // Redirect to a success page
    exit();
  }else{
    header("Location: 404.php"); // Redirect to a success page
    exit();
  }
  $conn->close();
?>