<?php
require_once('../controller/order/Order.php');


$order = new Order();

$list = $order->get_order_list();
// var_dump($list);die;

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>订单</title>
	<link rel="stylesheet" href="./css/order.css">
	<link rel="stylesheet" type="text/css" href="../public/css/responses/order.css">
    <link rel="stylesheet" href="./css/test-all.css">
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
							<li  class="active"><a href="order.php">我的订单</a></li>
							<!-- <li><a href="">意外保险</a></li>
							<li><a href="">评价晒单</a></li>
							<li><a href="">4</a></li> -->
						</ul>
					</div>
				</div>

				<div class="menu-item">
					<div class="title">
						个人中心
					</div>
					<div class="menu-list">
						<ul>
							<li><a href="self_info.html">我的信息</a></li>
							<li><a href="address.html">收货地址</a></li>
							<!-- <li><a href="">消息通知</a></li> -->
						</ul>
					</div>
				</div>
			</div>

			<div class="right-box">
				<div class="right-box-title">订单中心</div>
				<div class="content">
					<?php foreach ($list as $v): ?>
					<div class="item">
                        <div class="head">
                            <div style="width: 20%;">订单号:<?php echo $v['order_id'] ?></div>
    						<div style="width: 30%;"><?php echo $v['add_time'] ?></div>
    						<div class="link-detail" ><a href="">订单详情></a></div>
                        </div>
                        <?php foreach ($v['detail'] as $detail): ?>
                        <div class="tail">
                            <div class="img-box"  style="width: 20%;"><img src="<?php echo $detail['image'] ?>" alt=""></div>
                            <div  style="width: 20%;"><?php echo $v['status'] ?></div>
                            <div  style="width: 20%;">数量 : <?php echo $detail['count'] ?></div>
    						<div>￥<?php echo $detail['total_price'] ?></div>
                        </div>
                        <?php endforeach; ?>

					</div>
					<?php endforeach; ?>


				</div>
			</div>
		</div>
	</div>

    <div class="bottom-nav">
        <div><a href="index.php"><i class="icon iconfont icon-lingshi"></i>首页</a></div>
        <div><a href="cart.php"><i class="icon iconfont icon-cart-Empty"></i>购物车</a></div>
        <div><a href="order.php" class="active"><i class="icon iconfont icon-shangpin1"></i>订单</a></div>
        <div><a href="self_info.php"><i class="icon iconfont icon-user"></i>我的信息</a></div>
    </div>
	<script src="http://localhost:9527/livereload.js" charset="utf-8"></script>
</body>
</html>
