<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>收货地址</title>
	<link rel="stylesheet" href="./css/reset.css">

	<link rel="stylesheet" type="text/css" href="../public/icon-font/iconfont.css">
	<link rel="stylesheet" type="text/css" href="../public/css/header.css">
	<link rel="stylesheet" type="text/css" href="../public/css/model.css">
	<link rel="stylesheet" type="text/css" href="../public/css/info-form.css">
	<link rel="stylesheet" href="./css/address.css">
</head>
<body>

	<header>

	</header>
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
				<div class="content">

				</div>
			</div>
		</div>
	</div>


	<script type="module" src="./js/address.js"></script>
	<script src="http://localhost:9527/livereload.js" charset="utf-8"></script>
</body>
</html>
