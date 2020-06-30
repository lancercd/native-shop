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
	<title>编辑收货地址</title>
	<link rel="stylesheet" href="./css/address.css">
	<link rel="stylesheet" href="./css/test-all.css">
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
							<li><a href="">我的订单</a></li>
							<li><a href="">意外保险</a></li>
							<li><a href="">评价晒单</a></li>
							<li><a href="">4</a></li>
						</ul>
					</div>
				</div>

				<div class="menu-item">
					<div class="title">
						我的信息
					</div>
					<div class="menu-list">
						<ul>
							<li><a href="">我的信息</a></li>
							<li  class="active"><a href="">收货地址</a></li>
							<li><a href="">消息通知</a></li>
							<li><a href="">cnm</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="right-box" id="J_right_box">
				<div class="right-box-title">
					<div class="title">收货地址</div>
					<div class="add-address-btn"><a href="">添加地址</a></div>
				</div>
				<div class="content">

				</div>
			</div>
		</div>
	</div>


	<script type="module" src="./js/address.js"></script>
	<script src="http://localhost:9527/livereload.js" charset="utf-8"></script>
</body>
</html>
