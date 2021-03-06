<?php
require_once('../controller/order/Order.php');
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

$order = new Order();

$list = $order->get_order_list();
// var_dump($list);die;
$current_page = 'order';
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
							<li><a href="self_info.php">我的信息</a></li>
							<li><a href="address.php">收货地址</a></li>
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
    						<div class="link-detail" >
                                <a href="order_detail.php?oid=<?php echo $v['order_id'] ?>">订单详情></a>
                            </div>
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

    <?php require_once('./components/footer.php') ?>


    <script type="module" src="js/loginbtn.js" charset="utf-8"></script>
</body>
</html>
