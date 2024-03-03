<?php 
	session_start();
	require("connect.php");
	$cid = $_REQUEST["cid"];
	$cname = $_POST["txtHoTen"];
    $cemail = $_POST["txtCemail"];
	
	$sql = "select * from nguoidung where Email='".$cemail."' and MaNguoiDung<>$cid";
	$result = $conn->query($sql) or die($conn->error);
	if ($result->num_rows>0){
		$_SESSION["CustomerDetail_edit_error"]="Số điện thoại bạn muốn thay đổi đã được đăng ký!";
		header("Location:profile.php");
	} else {
		$sql_update="update nguoidung set 
						TenNguoiDung = '$cname',
                        Email = '$cemail'
						where MaNguoiDung=$cid";
		$conn->query($sql_update) or die($conn->error);
		$conn->close();
		$_SESSION["CustomerDetail_edit_error"]="Update success!";
		header("Location:profile.php");
	}
?>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	</body>
</html>