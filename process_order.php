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
  if($ordernote == ''){
    $sql = "INSERT INTO hoadonbanthuoc (firstname, lastname, address, city,  country, mobile, email, OrderNote, totalprice) 
    VALUES ('$firstname', '$lastname', '$address', '$city', '$country', '$mobile', '$email', '', '$totalPrice')";
   
  }else{
    $sql = "INSERT INTO hoadonbanthuoc (firstname, lastname, address, city,  country, mobile, email, OrderNote, totalprice) 
    VALUES ('$firstname', '$lastname', '$address', '$city', '$country', '$mobile', '$email', '$ordernote', '$totalPrice')";
    
  }
  echo $sql;
  if($conn -> query($sql) === TRUE){
    header("Location: contact.php"); // Redirect to a success page
    exit();
  }else{
    header("Location: 404.php"); // Redirect to a success page
    exit();
  }
  $conn->close();
?>