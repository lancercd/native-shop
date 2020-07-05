<?php
require_once('../controller/cart/Cart.php');
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

$cart = new Cart();

$list = $cart->get_cart_list();
// var_dump($list);die;


$current_page = 'cart';
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>我的购物车</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/cart.css">
	<link rel="stylesheet" type="text/css" href="./css/test-all.css">
    <link rel="stylesheet" type="text/css" href="../public/css/responses/cart.css">
</head>
<body>

    <!-- start header -->
    <?php require_once('./components/header.php') ?>
    <!-- end header -->
	<div class="xiantiao"></div>
	<div class="J_gwcxqbj">
		<div class="gwcxd center">
			<div class="top">
				<div style="width: 7%;">
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

		</div>
		<div class="confirm-panel center">
			<div class="select-product-info">
				共<span>2</span>件<show>商品，已</show>选<show>择</show><span class="J_select_num">0</span>件
			</div>
			<div class="money-count">
				<div class="money">合计:<span class="total-money J_total_money">0.00</span>元</div>
				<!-- <input class="jsan" type="submit" name="jiesuan"  value="去结算"/> -->
				<button class="lc-btn btn-lg btn-style J_payment">结算</button>
			</div>
		</div>
	</div>

    <!-- 手机端   底部的bar -->
    <?php require_once('./components/footer.php') ?>
</body>

<script type="module" src="js/cart.js" charset="utf-8"></script>
<script type="module" src="js/loginbtn.js" charset="utf-8"></script>
</html>
