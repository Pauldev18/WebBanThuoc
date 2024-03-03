<?php
  session_start();
  include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Fruitables - Vegetable Website Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
    rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Spinner Start -->
  <div id="spinner"
    class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->


  <!-- Navbar start -->
  <!-- Navbar start -->
  <div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
      <div class="d-flex justify-content-between">
        <div class="top-info ps-2">
          <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
              class="text-white">123 Street, New York</a></small>
          <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
              class="text-white">Email@Example.com</a></small>
        </div>
        <div class="top-link pe-2">
          <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
          <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
          <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
        </div>
      </div>
    </div>
    <div class="container px-0">
      <nav class="navbar navbar-light bg-white navbar-expand-xl">
        <a href="index.php" class="navbar-brand">
          <h1 class="text-primary display-6">Fruitables</h1>
        </a>
        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarCollapse">
          <span class="fa fa-bars text-primary"></span>
        </button>
        <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
          <div class="navbar-nav mx-auto">
            <a href="index.php" class="nav-item nav-link ">Home</a>
            <a href="shop.php" class="nav-item nav-link active">Shop</a>

            
            <a href="testimonial.php" class="nav-item nav-link">Testimonial</a>
          </div>
          <?php
            // Kiểm tra xem $_SESSION["cart_item"] có tồn tại và là một mảng không
            if(isset($_SESSION["cart_item"]) && is_array($_SESSION["cart_item"])) {
                // Nếu tồn tại và là một mảng, thực hiện các thao tác với nó ở đây
                $count = count($_SESSION["cart_item"]);
                // Tiếp tục xử lý biến $_SESSION["cart_item"]
            } else {
                // Nếu không tồn tại hoặc không phải một mảng, thực hiện xử lý phù hợp (ví dụ: gán giá trị mặc định cho biến)
                $count = 0; // Hoặc thực hiện các thao tác khác tùy thuộc vào yêu cầu của bạn
            }
          ?>
          
          <?php

            // Kiểm tra xem session 'cid' đã tồn tại hay không
            if(isset($_SESSION['cid'])) {
                // Nếu tồn tại session 'cid', hiển thị div chứa nút tìm kiếm, giỏ hàng và nút đăng nhập
                echo '<div class="d-flex m-3 me-0">
                        <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                          data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                        <a href="/WebBanThuoc/cart.php" class="position-relative me-4 my-auto">
                          <i class="fa fa-shopping-bag fa-2x"></i>
                          <span
                            class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                            style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?php echo $count?></span>
                        </a>
                        <a href="profile.php" class="my-auto">
                          <i class="fas fa-user fa-2x"></i>
                        </a>
                      </div>';
            } else {
                // Nếu không tồn tại session 'cid', hiển thị nút đăng nhập
                echo '<div class="d-flex m-3 me-0"><a href="login.php"><button type="button" class="btn btn-success">Đăng nhập</button></a> </div>';
            }
            ?>


        </div>
      </nav>
    </div>
  </div>
  <!-- Navbar End -->


  <!-- Modal Search Start -->
  <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex align-items-center">
          <div class="input-group w-75 mx-auto d-flex">
            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
            <span id="search-icon-search" class="input-group-text p-3" onclick="click()"><i class="fa fa-search"
                id="search-icon"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Search End -->


  <!-- Single Page Header start -->
  <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Shop</h1>
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Pages</a></li>
      <li class="breadcrumb-item active text-white">Profile</li>
    </ol>
  </div>
  <!-- Single Page Header End -->
  <?php
    if(isset($_SESSION["cid"])){
        $cid = $_SESSION["cid"];
        $result = $conn -> query("select * from nguoidung where MaNguoiDung = ". $cid);
        $row = $result -> fetch_assoc();
    }
  ?>
 <?php

if (!isset($_SESSION["CustomerDetail_edit_error"])) {
    $_SESSION["CustomerDetail_edit_error"] = " ";
}
if (!isset($_SESSION["Password_edit_error"])) {
    $_SESSION["Password_edit_error"] = " ";
}
?>
  <!-- Fruits Shop Start-->
  <div class="container fruite py-5">
  <center>
        <font color=red><?php echo $_SESSION["CustomerDetail_edit_error"]; ?></font>
    </center>
  <div class="user-content row">
            <div class="side-menu col-md-3 sol-sm-12">
                <div class="submenu">
                    <ul>
                        <li class="subc font">
                            <a class="btn-custom" onclick="document.getElementById('id01').style.display='block'"
                                href="#">Chỉnh sửa thông tin cá nhân</a>
                        </li>
                        <li class="subc font">
                            <a class="btn-custom" onclick="document.getElementById('id02').style.display='block'"
                                href="#">Đổi mật khẩu</a><br>
                        </li>
                        <li class="subc font">
                            <a class="btn-custom" onclick="document.getElementById('donhang').style.display='block'"
                                href="#history">Đơn hàng của tôi</a>
                        </li>
                        <li class="subc font">
                            <a class="btn-custom" href="actionLogout.php">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="information col-md-9 sol-sm-12">
                <div class="information-user">
                    <h5 class="font title-infor">THÔNG TIN CỦA TÔI </h5>
                    <p class="font"><span class="font title-infor">Họ Và Tên:</span>
                        <?php echo $row['TenNguoiDung'] ?>
                    </p>
                    <p class="font"><span class="font title-infor ">Email:</span>
                        <?php echo $row['Email'] ?>
                    </p>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>


            </div>
        </div>
  </div>
  <!-- Fruits Shop End-->
<!-- Modal chỉnh sửa mật khẩu -->
<div id="id02" class="modal">
  <form class="modal-content animate" action="Password_edit_action.php?cid=<?php echo $row['MaNguoiDung'] ?>" method="post">
      <div class="imgcontainer">
          <span onclick="document.getElementById('id02').style.display='none'" class="close"
              title="Close Modal">&times;</span>
      </div>

      <div class="input-content">
          <label for="address"><b>Mật khẩu cũ:</b></label>
          <input class="login-input" type="text" name="txtOldpassword" id="psw" required>

          <label for="address"><b>Mật khẩu mới:</b></label>
          <input class="login-input" type="text" name="txtNewpassword1" id="psw" required>

          <label for="address"><b>Xác nhận mật khẩu mới:</b></label>
          <input class="login-input" type="text" name="txtNewpassword2" id="psw" required>
      </div>
      <div class="group-button row">
          <div class="col-md-2 col-sm-0"></div>
          <button type="button" class="btn btn-outline-danger col-md-3"
              onclick="document.getElementById('id02').style.display='none'">Huỷ</button>
          <div class="col-md-2 col-sm-0"></div>
          <button type="submit" class="btn btn-success col-md-3">Cập Nhật</button>
          <div class="col-md-2 col-sm-0"></div>
      </div>
  </form>
</div>
  <!-- Modal chỉnh sửa thông tin cá nhân -->
  <div id="id01" class="modal">

<form class="modal-content animate" action="CustomerDetail_edit_action.php?cid=<?php echo $row['MaNguoiDung'] ?>" method="post">
    <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close"
            title="Close Modal">&times;</span>
    </div>

    <div class="input-content">

        <label for="phone"><b>Họ và tên:</b></label>
        <input class="login-input" type="text" value="<?php echo $row['TenNguoiDung'] ?>" name="txtHoTen"
            id="psw" required>

        <label for="gender"><b>Email:</b></label>
        <input class="login-input" type="text" value="<?php echo $row['Email'] ?>" name="txtCemail"
            id="psw" required>


    </div>
    <div class="group-button row">
        <div class="col-md-2 col-sm-0"></div>
        <button type="button" class="btn btn-outline-danger col-md-3"
            onclick="document.getElementById('id01').style.display='none'">Huỷ</button>
        <div class="col-md-2 col-sm-0"></div>
        <button type="submit" class="btn btn-success col-md-3">Cập Nhật</button>
        <div class="col-md-2 col-sm-0"></div>
    </div>
</form>
</div>

<!-- Đơn hàng của tôi -->
        <div id="history" class="container-fluid table-order ">
            <br>
            <div class="table-responsive-md" id="donhang" style="display: none; margin: 0 5%;">
                <p class="font" style="font-weight: bold; font-size: large;">Các Đơn Hàng Đã Đặt:</p>
                <?php
                if(isset($_SESSION["cid"])){
                    $customerID = $_SESSION['cid'];
                }

                // Fetch order history for the customer, excluding orders with status "Hủy đơn"
                $query = "SELECT * FROM chitiethoadon join hoadonbanthuoc on chitiethoadon.MaHoaDon = hoadonbanthuoc.MaHoaDon
                                        join thuoc on chitiethoadon.MaThuoc = thuoc.MaThuoc
                                        join nguoidung on hoadonbanthuoc.MaNguoiDung = nguoidung.MaNguoiDung
                                        WHERE nguoidung.MaNguoiDung=" . $customerID;
                $result33 = $conn -> query($query);
                $row = $result33 -> fetch_assoc();
                if ($result33->num_rows > 0) {
                    echo '<table class="table table-hover  table-bordered" >';
                    echo '<thead class="thead-dark">';
                    echo '<tr><th class="tr">Order id</th>
                                            <th  class="tr">Order date</th>
                                            <th  class="tr">Total amount</th>
                                            <th  class="tr">Status</th>
                                    </tr>';

                    echo '</thead>';
                    while ($row = $result33->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td><a href="#orderDetailsContainer" class="orderDetailsLink" data-rid="' . $row['MaHoaDon'] . '">' . $row['MaHoaDon'] . '</a></td>';
                        echo '<td>' . $row['NgayTaoHoaDon'] . '</td>';
                        echo '<td>' . $row['totalprice'] . '</td>';
                        echo '<td>Đang giao hàng</td>';

                        // Check order status (case-insensitive) and display the appropriate action
                    
                        echo '</tr>';
                    }

                    echo '</table>';
                } else {
                    echo 'No orders found.';
                }
                ?>
                <br>
            </div>
        </div>

        <br>
    <div id="orderDetailsContainer" class="container-fluid table-order " style="width: 90%;margin-left: 75px;"
    align=center>


    </div>
  <br><br><br><br>


  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
      <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
        <div class="row g-4">
          <div class="col-lg-3">
            <a href="#">
              <h1 class="text-primary mb-0">Fruitables</h1>
              <p class="text-secondary mb-0">Fresh products</p>
            </a>
          </div>
          <div class="col-lg-6">
            <div class="position-relative mx-auto">
              <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
              <button type="submit"
                class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white"
                style="top: 0; right: 0;">Subscribe Now</button>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="d-flex justify-content-end pt-3">
              <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                  class="fab fa-twitter"></i></a>
              <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                  class="fab fa-facebook-f"></i></a>
              <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                  class="fab fa-youtube"></i></a>
              <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i
                  class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row g-5">
        <div class="col-lg-3 col-md-6">
          <div class="footer-item">
            <h4 class="text-light mb-3">Why People Like us!</h4>
            <p class="mb-4">typesetting, remaining essentially unchanged. It was
              popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
            <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="d-flex flex-column text-start footer-item">
            <h4 class="text-light mb-3">Shop Info</h4>
            <a class="btn-link" href="">About Us</a>
            <a class="btn-link" href="">Contact Us</a>
            <a class="btn-link" href="">Privacy Policy</a>
            <a class="btn-link" href="">Terms & Condition</a>
            <a class="btn-link" href="">Return Policy</a>
            <a class="btn-link" href="">FAQs & Help</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="d-flex flex-column text-start footer-item">
            <h4 class="text-light mb-3">Account</h4>
            <a class="btn-link" href="">My Account</a>
            <a class="btn-link" href="">Shop details</a>
            <a class="btn-link" href="">Shopping Cart</a>
            <a class="btn-link" href="">Wishlist</a>
            <a class="btn-link" href="">Order History</a>
            <a class="btn-link" href="">International Orders</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="footer-item">
            <h4 class="text-light mb-3">Contact</h4>
            <p>Address: 1429 Netus Rd, NY 48247</p>
            <p>Email: Example@gmail.com</p>
            <p>Phone: +0123 4567 8910</p>
            <p>Payment Accepted</p>
            <img src="img/payment.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Copyright Start -->
  <div class="container-fluid copyright bg-dark py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All
            right reserved.</span>
        </div>
        <div class="col-md-6 my-auto text-center text-md-end text-white">
          <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
          <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
          <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
          Designed By <a class="border-bottom" href="https://www.facebook.com/iamdeveloper18">PaulDev</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Copyright End -->



  <!-- Back to Top -->
  <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
      class="fa fa-arrow-up"></i></a>


  <!-- JavaScript Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>

  <script>
    $(document).ready(function () {
        // Attach a click event to the order details links
        $('.orderDetailsLink').on('click', function (e) {
            e.preventDefault();

            // Get the order ID from the data-rid attribute
            var rid = $(this).data('rid');

            // Make an AJAX request to fetch the order details
            $.ajax({
                type: 'GET',
                url: 'Order_history_detail.php', // Adjust the URL if needed
                data: { rid: rid },
                success: function (data) {
                    // Update the orderDetailsContainer with the fetched data
                    $('#orderDetailsContainer').html(data);
                },
                error: function () {
                    alert('Error loading order details.');
                }
            });
        });
    });

</script>

</body>

</html>
<style>
    /*PopUp Update Data Customer*/
.input-content {
	padding: 16px;
}
.input-content label{
	margin-left: 8ex;
	margin-bottom: 2px;
}
.input-content .login-input{
	width: 75%;
	padding: 10px 12px;
	margin: 1% 12.5%;
	display: inline-block;
	border-top: 1.4px solid #eee;
	border-left: 1.8px solid #ddd;
	box-sizing: border-box;
}
  
  /* Extra styles for the cancel button */
  .cancelbtn {
	width: auto;
	padding: 10px 18px;
	background-color: #f44336;
  }
  
  /* Center the image and position the close button */
  .imgcontainer {
	text-align: center;
	margin: 10px 0 12px 0;
	position: relative;
  }
  
  img.avatar {
	width: 40%;
	border-radius: 50%;
  }
 
  span.psw {
	float: right;
	padding-top: 16px;
  }
  
  /* The Modal (background) */
  .modal {
	display: none; /* Hidden by default */
	position: fixed; /* Stay in place */
	z-index: 12; /* Sit on top */
	left: 0;
	top: 0;
	width: 100%; /* Full width */
	height: 80%; /* Full height */
	overflow: auto; /* Enable scroll if needed */
	background-color: rgb(0,0,0); /* Fallback color */
	background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	margin-top: 140px;
  }
  
  /* Modal Content/Box */
  .modal-content {
	background-color: #fefefe;
	margin: 1% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
	border: 1px solid #888;
	width: 40%; /* Could be more or less, depending on screen size */
	height: 85%;
  }
  
  /* The Close Button (x) */
 .modal .modal-content .close {
	position: absolute;
	right: 25px;
	top: 0;
	color: #000;
	font-size: 35px;
	font-weight: bold;
  }
  
  .modal .modal-content .close:hover,
  .modal .modal-content .close:focus {
	color: red;
	cursor: pointer;
  }
  
  /* Add Zoom Animation */
  .animate {
	-webkit-animation: animatezoom 0.6s;
	animation: animatezoom 0.6s
  }
  
  @-webkit-keyframes animatezoom {
	from {-webkit-transform: scale(0)} 
	to {-webkit-transform: scale(1)}
  }
	
  @keyframes animatezoom {
	from {transform: scale(0)} 
	to {transform: scale(1)}
  }
  
  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
	span.psw {
	   display: block;
	   float: none;
	}
	.cancelbtn {
	   width: 100%;
	}
  }

  /* Content User.php*/
.content .user-content .side-menu{
	  margin-bottom: 3%;
  }
.content .user-content .side-menu .username {
	border: 2px solid #000;
	width: 80%;
	margin-left: 11%;
	background-color: #222222;
	color: white;
	padding-top: 3%;
	padding-bottom: 3%;
} 
.content .user-content .side-menu .username .fa-user-circle{
	font-size: 23px; 
	padding-left: 22%;
}
.content .user-content .side-menu .submenu {
	border: 2px solid #000;
	width: 80%;
	margin-left: 11%;
	padding: 0;
} 
.content .user-content .side-menu .submenu ul{
	margin: 0;
	padding: 0;
}
.content .user-content .table-order{
	width: 80%;
	margin: 2% 10%;
}
.content .user-content .table-order .table {
	border: 1px solid rgb(99, 97, 97);
	width: 100%; 
	text-align: center;
	border-radius: 3px;
} 
.content .user-content .table-order .table tr .name-product .name_product_content{
	float:left;
	color: #000;
}
.content .user-content .table-order .table tr .id_order a {
	font-weight: bold;
	font-size: 20px;
	color: #000;
}
.subc{
	list-style-type: none;
	display: block;
	padding: 5%;
	border: 1px solid wheat;
	text-align: center;
}

.subc:hover{
	background-color: lightblue;
	color: rgb(226, 19, 64);
	transition: 1s all;
	font-weight: bolder;

}
.information-user {
	border: 2px dotted black; 
	margin-left: 11%;
	width: 80%; padding-top: 3%;
	padding-bottom: 2%; padding-left: 3%;
	padding-right: 3%; border-radius: 5px;}
.information .btn-outline-primary {
	margin-left: 11%;
	
}
.information-user .title-infor{
	font-weight: bold; font-size: 18px;
}
.name-product{
	width: 32%;
	padding-left: 2ex;
	padding-right: 2ex;
}


.content p{
	font-weight: lighter;
}

.td
{
	width: 15%;
	padding: 0.7em;
	background-color: rgb(214, 214, 214);
}


.tr
{
	width: 8%;
	padding: 0.7em;
	background-color: rgb(214, 214, 214);
}
.tongtien
{
	width: 15%;
	padding: 0.7em;
}
.user-content{
	padding: 3ex;
	margin-left: 0%;
	overflow: hidden;
}

/* Chi Tiet Hoa Don*/
.wrapper{
	width: 80%;
	margin:0 10%;
}

.detail-order-table .wrapper .order_summary tr>td, 
.detail-order-table .wrapper .order_summary tr>th {
    border: 1px solid #ddd;
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
    font-weight: normal;
}
.order_avail {
    text-align: center;
}
.img_order {
    vertical-align: top;
    max-width: 100%;
}
.detail-order-table .wrapper .order_summary{
	border: 1px solid #555;
}
.detail-order-table .wrapper .order_summary > thead, 
.detail-order-table .wrapper .order_summary > tfoot {
    background: #f7f7f7;
    font-size: 16px;
}
.detail-order-table .wrapper .order_summary td.order_product {
    width: 120px;
    padding: 15px;
}
.page-order .order_description {
    font-size: 14px;
}
.page-order .product-name {
    font-size: 16px;
}
.detail-order-table .wrapper .order_summary td {
    vertical-align: middle!important;
    padding: 20px;
}
.detail-order-table .wrapper .order_summary a {
    color: #666;
    text-decoration: none;
	outline: none !important;
}

.detail-order-table .wrapper .order_summary .price {
    text-align: right;
}
.detail-order-table .wrapper .order_summary .action {
    text-align: center;
}
.detail-order-table .wrapper .order_summary .action a {
    background: url(https://i.imgur.com/wBgtljO.png) no-repeat center center;
    font-size: 0;
    height: 9px;
    width: 9px;
    display: inline-block;
    line-height: 24px;
}
.detail-order-table .wrapper .order_summary tfoot {
    text-align: right;
}


/*Respondsive*/
@media screen and (max-width: 900px) {
	.font, .information-user .title-infor{
		font-size: 16.5px;
	}
}
@media screen and (max-width: 800px) {
	.font, .information-user .title-infor {
		font-size: 15px;
	}
}
@media screen and (max-width: 700px) {
	.font, .information-user .title-infor {
		font-size: 14px;
	}
}
@media screen and (max-width: 600px) {
	.font, .information-user .title-infor{
		font-size: 13px;
	}
}
@media screen and (max-width: 500px) {
	.font, .information-user .title-infor{
		font-size: 13.5px;
	}
}
@media screen and (max-width: 430px) {
	.font, .information-user .title-infor{
		font-size: 12px;
	}
}
@media screen and (max-width: 300px) {
	.font, .information-user .title-infor {
		font-size: 10.4px;
	}
}
</style>