<?php
require_once('../controller/admin/Admin.php');
require_once('../server/function.php');
ad_is_logged();

$aid = $_SESSION['aid'];
$real_name = $_SESSION['real_name'];
$avatar = $_SESSION['avatar'];

$oid = $_GET['oid'];

$admin = new Admin();
$list = $admin->get_order_detail($oid);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户管理</title>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/frame.css">
    <link rel="stylesheet" href="css/order_detail.css">
    <link rel="stylesheet" href="../public/icon-font/iconfont.css">
    <link rel="stylesheet" href="../public/css/model.css">
    <link rel="stylesheet" href="../public/css/info-form.css">
</head>
<body>
    <div class="container">

        <!-- 侧边栏 -->
        <?php require_once('./components/side_bar.php'); ?>
        <!-- /侧边栏 -->



        <div class="main-container" >
            <div class="main-header">
                <div id="timer">
                    <!-- January 10 -->
                    <?php echo date('M d', time()); ?>
                </div>
            </div>

            <!-- start -->
            <div class="content">
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
            <!-- end -->


        </div>
    </div>
</body>
</html>
