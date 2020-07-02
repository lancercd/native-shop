<?php
require_once('../server/function.php');
is_logged();//若没有登录  返回首页   显示登录框

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人中心</title>
	<link rel="stylesheet" href="./css/self_info.css">
	<link rel="stylesheet" href="../public/css/responses/self_info.css">
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
							<li class="active"><a href="self_info.php">我的信息</a></li>
							<li><a href="address.php">收货地址</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="right-box" id="J_right_box">
				<div class="right-box-title">
					<div class="title">我的信息</div>
					<div class="address-btn">
                        <a href="address.php">我的收货地址</a>
                    </div>
					<!-- <div class="add-address-btn"><a href="">添加地址</a></div> -->
				</div>
				<form class="content" action="post" autocomplete="off">
                    <div class="avatar"><img src="../public/image/6-2.jpg" alt=""></div>
                    <div class="account">
                        <div class="key">账号:</div>
                        <input class="value" type="account" name="account" value="1311282756" disabled>
                        <!-- <div class="value">1311282756</div> -->
                    </div>
                    <div class="pwd">
                        <div class="key">密码:</div>
                        <input class="value" type="pwd" name="pwd" value="">
                    </div>
                    <div class="name">
                        <div class="key">真实姓名:</div>
                        <input class="value" type="pwd" name="pwd" value="刘灿">
                    </div>
				</form>
			</div>
		</div>
	</div>

    <?php require_once('./components/footer.php') ?>
	<script src="http://localhost:9527/livereload.js" charset="utf-8"></script>

</body>
</html>
