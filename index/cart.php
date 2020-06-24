<?php
require_once('../controller/cart/Cart.php');

$cart = new Cart();

$list = $cart->get_cart_list();
// var_dump($list);die;

 ?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>我的购物车-小米商城</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<link rel="stylesheet" type="text/css" href="./css/cart.css">
		<link rel="stylesheet" type="text/css" href="../public/icon-font/iconfont.css">
		<link rel="stylesheet" type="text/css" href="../public/css/header.css">
		<link rel="stylesheet" type="text/css" href="../public/css/model.css">
		<link rel="stylesheet" type="text/css" href="../public/css/info-form.css">
		<link rel="stylesheet" href="./css/test-all.css">
	</head>
	<body>

<header>
	<div class="container">
		<div class="navbar">
			<a class="logo" href="#">123</a>
			<label for="toggle-nav"><i class="icon iconfont icon-ego-menu"></i></label>
			<input type="checkbox" id="toggle-nav">
			<div class="collapse">
				<ul class="links">
					<li><a href="">首页</a></li>
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
		<div class="xiantiao"></div>
		<div class="J_gwcxqbj">
			<div class="gwcxd center">
				<div class="top">
					<div style="width: 5%;">
						<input type="checkbox" class="select-all" />全选
					</div>
					<div style="width: 8%;">图片</div>
					<div style="width: 20%;">商品名称</div>
					<div style="width: 8%;">单价</div>
					<div style="width: 10%;">数量</div>
					<div style="width: 8%;">小计</div>
					<div style="width: 5%;">操作</div>
				</div>
				<?php if ($list): ?>
					<?php foreach ($list as $v): ?>
						<div class="content center J_cart_item" data-id="<?php echo $v['c_id'] ?>" >
							<div>
								<input type="checkbox" class="select-one" data-id="<?php echo $v['c_id'] ?>" />
							</div>
							<div><img src="<?php echo $v['image'] ?>"></div>
							<div><?php echo $v['name'] ?></div>
							<div><span class="price"><?php echo $v['price'] ?></span>元</div>
							<div>
								<input class="number" type="number" value="<?php echo $v['num'] ?>" step="1" min="1" max="10000" />
							</div>
							<div><span class="subtotal"><?php echo $v['money'] ?></span>元</div>
							<div><button class="btn-del btn-m lc-btn">删除</button></div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<?php echo '<div style="font-size: 25px;width:100%;text-align:center;padding: 20px 0 50px 0">这里什么都没有  还不快去添加!</div>' ?>
				<?php endif; ?>






				<!-- <div class="content center J_cart_item" data-id="3" >
					<div>
						<input type="checkbox" class="select-one" data-id="3" />
					</div>
					<div><img src="../public/image/di1-3.jpg"></div>
					<div>小米6全网通6GB内存+64GB 亮黑色</div>
					<div><span class="price">2499.05</span>元</div>
					<div>
						<input class="number" type="number" value="1" step="1" min="1" max="10000" />
					</div>
					<div><span class="subtotal">2499.05</span>元</div>
					<div><button class="btn-del btn-m lc-btn">删除</button></div>
				</div> -->

			</div>
			<div class="confirm-panel center">
				<div class="select-product-info">
					共<span>2</span>件商品，已选择<span class="J_select_num">0</span>件
				</div>
				<div class="money-count">
					<div class="money">合计:<span class="total-money J_total_money">0.00</span>元</div>
					<!-- <input class="jsan" type="submit" name="jiesuan"  value="去结算"/> -->
					<button class="lc-btn btn-lg btn-style J_payment">结算</button>
				</div>
			</div>

		</div>




	<!-- footer -->
	<!-- <footer class="center">

			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div>
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
		</footer> -->

	</body>

	<script type="module" src="js/cart.js" charset="utf-8"></script>
	<script src="http://localhost:9527/livereload.js" charset="utf-8"></script>
</html>
