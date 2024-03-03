<?php 
	session_start();
	require("connect.php");
	$cid = $_REQUEST["cid"];
	$old = $_POST["txtOldpassword"];
    $new1 = $_POST["txtNewpassword1"];
    $new2 = $_POST["txtNewpassword2"];
	
	$sql = "select * from nguoidung where MatKhau='".$old."' and MaNguoiDung=$cid";
	$result = $conn->query($sql) or die($conn->error);
	if ($result->num_rows==0){
		$_SESSION["CustomerDetail_edit_error"]="Mật khẩu cũ bạn nhập không đúng!";
		header("Location:profile.php");
	} else if($new1 != $new2) {
        $_SESSION["CustomerDetail_edit_error"]="Mật khẩu bạn nhập lại không trùng khớp!";
		header("Location:profile.php");
    }
    else {
		$sql_update="update nguoidung set 
						MatKhau = '$new1'
						where MaNguoiDung=$cid";
		$conn->query($sql_update) or die($conn->error);
		$conn->close();
		$_SESSION["CustomerDetail_edit_error"]="Cập nhật mật khẩu mới thành công!";
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