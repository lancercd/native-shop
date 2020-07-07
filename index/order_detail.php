<?php
require_once('../controller/order/Order.php');
require_once('../server/function.php');
is_logged();//若没有登录  返回首页   显示登录框
$is_logged = lc_get_current_user()? true: false;

$avatar = '';
$uid = 0;
$nickname = '';

$oid = $_GET['oid'];
// if(!is_numeric($oid)) exit('订单id错误!');
if($is_logged){
    $uid = $_SESSION['uid'];
    $avatar = $_SESSION['avatar'];
    $nickname = $_SESSION['nickname'];
}
$order = new Order();

$list = $order->get_order_detail($oid, $uid);
// var_dump($list);die;
$current_page = 'order';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>订单详情</title>
    <link rel="stylesheet" href="./css/test-all.css">
    <link rel="stylesheet" href="./css/order_detail.css">
    <link rel="stylesheet" type="text/css" href="../public/css/responses/order_detail.css">
</head>
<body>


    <!-- start header -->
    <?php require_once('./components/header.php') ?>
    <!-- end header -->

    <div class="container">
		<div class="main">
			<div class="right-box" id="J_right_box">
				<div class="right-box-title">
					<div class="title">订单详情</div>
				</div>
				<div class="content">
                    <div class="title">
                        <div class="order-id">
                            订单号 : <?php echo $list['order_id']; ?>
                        </div>
                        <div class="time">
                            <?php echo $list['add_time']; ?>
                        </div>
                    </div>
                    <div class="item-box">
                        <?php foreach ($list['order_detail'] as  $v): ?>
                            <div class="item">

                                <div class="product-info">
                                    <div class="img-box">
                                        <img src="<?php echo $v['image'] ?>" alt="">
                                    </div>
                                    <div class="info">
                                        <div class="pro-name">
                                            <?php echo $v['pro_name'] ?>
                                        </div>
                                        <div class="introduce">
                                            <?php echo $v['introduce'] ?>
                                        </div>
                                        <div class="price">
                                            RMB <?php echo $v['price'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail-info">

                                    <div class="attr">
                                        <?php foreach ($v['attr'] as $attr): ?>
                                            <div class="item"><?php echo $attr['attr'] ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="price">
                                        价格:￥<?php echo $v['total_price'] ?><br>
                                        数量: <?php echo $v['count'] ?>
                                    </div>
                                    <div class="num"></div>
                                </div>
                                <div class="order-info">
                                    <div class="price">
                                        <?php echo $list['pay_money'] ?>
                                    </div>
                                </div>
                                <div class="express-info">
                                    <?php echo $list['status'] ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
				</div>
			</div>
		</div>
	</div>

    <?php require_once('./components/footer.php') ?>

    <script type="module" src="js/loginbtn.js" charset="utf-8"></script>


</body>
</html>
