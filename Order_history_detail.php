<?php
session_start();
include "connect.php"; // Include your database connection file

// Check if the customer is logged in
if (!isset($_SESSION["cid"])) {
    // The customer is not logged in
    // You may want to redirect them to the login page or handle it accordingly
    header("Location: login.php");
    exit();
}

// Get customer ID from the session
$customerID = $_SESSION['cid'];
$rid_from_url = $_GET['rid'];

// Fetch order history for the customer, excluding orders with status "Hủy đơn"
$query = "SELECT * FROM chitiethoadon 
          JOIN hoadonbanthuoc ON chitiethoadon.MaHoaDon = hoadonbanthuoc.MaHoaDon
          JOIN thuoc ON chitiethoadon.MaThuoc = thuoc.MaThuoc
          JOIN nguoidung ON hoadonbanthuoc.MaNguoiDung = nguoidung.MaNguoiDung
          WHERE nguoidung.MaNguoiDung = '" . $customerID . "' AND hoadonbanthuoc.MaHoaDon = '" . $rid_from_url . "'";

$result = $conn -> query($query);

// Check if there are orders    
if ($result->num_rows > 0) {
    $orders = []; // Array to store orders
    
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row; // Store each row in the orders array
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <style>
        /* Your CSS styles go here */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Order Deatils</h2>
    <?php
    if (isset($orders) && !empty($orders)) {
        echo '<table border="1">';
        echo '<tr><th>Product name</th><th>Order date</th><th>Sell price</th><th>Quantity</th></tr>';

        foreach ($orders as $order) {
            echo '<tr>';
            echo '<td>' . $order['TenThuoc'] . '</td>';
            echo '<td>' . $order['NgayTaoHoaDon'] . '</td>';
            echo '<td>' . $order['GiaTien'] . '</td>';
            echo '<td>' . $order['SoLuong'] . '</td>';
            // Check order status (case-insensitive) and display the appropriate action
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No orders found.';
    }
    ?>
</body>
</html>
