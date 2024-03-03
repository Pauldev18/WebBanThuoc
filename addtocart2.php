<?php
    session_start();
    $pid = $_GET["productID"];
    require_once("connect.php");
    $product = $conn->query("select * from thuoc where MaThuoc=" . $pid) or die($conn->error);
    $r[] = $product->fetch_assoc();
    $itemArray = array($r[0]["code"] => array("MaThuoc" => $r[0]["MaThuoc"], "code" => $r[0]["code"], "TenThuoc" => $r[0]["TenThuoc"], "price" => $r[0]["GiaTien"], "SoLuong" => 1, "image" => $r[0]["Anh"]));

    // Set header for JSON
    header('Content-Type: application/json');

    // Encode $itemArray as JSON and echo it
    

    $check = false;
    if(!empty($_SESSION["cart_item"]))
    {
        if(in_array($r[0]["code"], array_keys($_SESSION["cart_item"]))){
            foreach($_SESSION["cart_item"] as $k => $v){
                if($r[0]["MaThuoc"] == $_SESSION["cart_item"][$k]["MaThuoc"]){
                    $_SESSION["cart_item"][$k]["SoLuong"] += 1;
                    $check = true;
                    break;
                    header("Location: shop-detail.php?productID=" . $pid); // Redirect to a success page
                    exit();
                }
            }
        }
        else{
            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
        }
    }
    else{
        $_SESSION["cart_item"] = $itemArray;
        header("Location: shop-detail.php?productID=" . $pid); // Redirect to a success page
        exit();
    }
   
    header("Location: shop-detail.php?productID=" . $pid); // Redirect to a success page
    exit();

?>
