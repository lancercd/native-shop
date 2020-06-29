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

	<header>
        <div class="container">
            <div class="navbar">
                <a class="logo" href="#">SHOPPING</a>
                <label for="toggle-nav"><i class="icon iconfont icon-ego-menu"></i></label>
                <input type="checkbox" id="toggle-nav">
                <div class="collapse">
                    <ul class="links">
                        <li><a href="index.html">首页</a></li>
                        <li><a href="cart.php">我的购物车</a></li>
                        <li><a href="order.php">我的订单</a></li>
                        <li><a href="self_info.html">我的信息</a></li>
                    </ul>
                    <div class="form">
                        <!-- <a href="#">登录</a> -->
                        <button type="button" class="login-btn" name="loginBtn">登录</button>
                        <!-- <div class=""> -->
                            <a class="signin" href="#">注册</a>
                        <!-- </div> -->
                    </div>
                </div>

            </div>
        </div>
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

	<div class="bottom-nav">
	    <div><a href="index.php"><i class="icon iconfont icon-lingshi"></i>首页</a></div>
	    <div><a href="cart.php"><i class="icon iconfont icon-cart-Empty"></i>购物车</a></div>
	    <div><a href="order.php"><i class="icon iconfont icon-shangpin1"></i>订单</a></div>
	    <div><a href="self_info.php"  class="active"><i class="icon iconfont icon-user"></i>我的信息</a></div>
	</div>

	<script type="module" src="./js/address.js"></script>
	<script type="module" src="./js/loginbtn.js" charset="utf-8"></script>
	<script src="http://localhost:9527/livereload.js" charset="utf-8"></script>
</body>
</html>
