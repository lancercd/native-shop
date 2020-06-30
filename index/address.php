<?php
require_once('../server/function.php');

// is_logged();

$is_logged = lc_get_current_user()? true: false;

$avatar = '';
$uid = 0;
$nickname = '';


if($is_logged){
    $uid = $_SESSION['uid'];
    $avatar = $_SESSION['avatar'];
    $nickname = $_SESSION['nickname'];
}

$current_page = 'self_info';
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>收货地址</title>

	<link rel="stylesheet" type="text/css" href="./css/address.css">
	<link rel="stylesheet" type="text/css" href="../public/css/responses/address.css">
	<link rel="stylesheet" type="text/css" href="./css/test-all.css">
</head>
<body>

	<!-- start header -->
    <?php require_once('./components/header.php') ?>
    <!-- end header -->

	<div class="container">
		<div class="main">
			<div class="left-menu">
				<div class="menu-item">
					<div class="title">
						订单中心
					</div>
					<div class="menu-list">
						<ul>
							<li><a href="order.php">我的订单</a></li>
						</ul>
					</div>
				</div>

				<div class="menu-item">
					<div class="title">
						我的信息
					</div>
					<div class="menu-list">
						<ul>
							<li><a href="self_info.html">我的信息</a></li>
							<li  class="active"><a href="address.html">收货地址</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="right-box" id="J_right_box">
				<div class="right-box-title">
					<div class="title">收货地址</div>
					<!-- <div class="add-address-btn"><a href="address_edit">添加地址</a></div> -->
					<button class="add-address-btn" name="add-address-btn">添加地址</button>
				</div>
				<!-- <div class="content"> -->
					<!-- js  渲染出地址 -->
					<!-- <div data-address-id="1" class="item">
	                    <div class="circle">刘灿地1</div>
						<div class="info">
							<div class="name">刘灿地1</div>
		                    <div class="phone">18580765670</div>
		                    <div class="detail">重庆 重庆市 沙坪坝区<br>大学城中路重庆师范大学清风A</div>
		                    <div class="is-default"><div class="show">默认</div></div>
							 <div class="del">删除</div>
						</div>
	                    <div class="address-deit">
							<a href="#"><i class="icon iconfont icon-right"></i></a>
						</div>
            		</div> -->

				<!-- </div> -->
				<div class="content">
					<div data-address-id="1" class="item">
	                    <div class="circle">刘灿地1</div>
						<div class="info">
							<div class="name">刘灿地1</div>
		                    <div class="phone">18580765670</div>
		                    <div class="detail">重庆 重庆市 沙坪坝区<br>大学城中路重庆师范大学清风A</div>
		                    <div class="is-default"><div class="show">默认</div></div>
							 <div class="del">删除</div>
						</div>
	                    <div class="address-deit">
							<a href="#"><i class="icon iconfont icon-right"></i></a>
						</div>
            		</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once('./components/footer.php') ?>

	<script type="module" src="./js/address.js"></script>
	<script type="module" src="./js/loginbtn.js" charset="utf-8"></script>
	<script src="http://localhost:9527/livereload.js" charset="utf-8"></script>
</body>
</html>
