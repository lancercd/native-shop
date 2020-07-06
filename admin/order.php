<?php
require_once('../controller/admin/Admin.php');
require_once('../server/function.php');
ad_is_logged();

$aid = $_SESSION['aid'];
$real_name = $_SESSION['real_name'];
$avatar = $_SESSION['avatar'];

$admin = new Admin();
$list = $admin->get_order_list();

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
    <link rel="stylesheet" href="css/order.css">
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
            <!-- end -->


        </div>
    </div>
</body>
</html>
