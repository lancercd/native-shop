<?php
require_once('../controller/product/Product.php');

$product = new Product();





$data = $product->get_product();
$data['attribute_list'] = json_decode($data['attribute_list'], true);
// var_dump($data['attribute_list']);die;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>小米6立即购买-小米商城</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<link rel="stylesheet" type="text/css" href="./css/detail.css">
	    <link rel="stylesheet" type="text/css" href="../public/css/info-form.css">
	    <link rel="stylesheet" type="text/css" href="../public/css/model.css">
	    <link rel="stylesheet" href="./css/test-all.css">
	</head>
	<body>
	<!-- start header -->
	<header>
        <div class="container">
            <div class="navbar">
                <a class="logo" href="#">123</a>
                <label for="toggle-nav"><i class="icon iconfont icon-ego-menu"></i></label>
                <input type="checkbox" id="toggle-nav">
                <div class="collapse">
                    <ul class="links">
                        <li><a href="">首页</a></li>
                        <li><a href="cart.html">我的购物车</a></li>
                        <li><a href="order.html">我的订单</a></li>
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

	<div class="xiangqing">
		<div class="neirong w">
			<div class="title fl"><?php echo $data['pro_name'] ?></div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="jieshao mt20 w">
		<div class="left fl imgbox"><img src="<?php echo $data['image'] ?>"></div>
		<!-- 重要   商品的id   php  需要添加 -->
		<div class="right fr" id="J_attr_warp" data-product-id='<?php echo $data['product_id'] ?>'>
			<div class="h3 ml20 mt20"><?php echo $data['pro_name'] ?></div>
			<div class="jianjie mr40 ml20 mt10"><?php echo $data['introduce'] ?></div>
			<!-- <div class="jiage ml20 mt10">2499.00元</div> -->

			<!-- star商品的属性都在这里 -->



			<div id="product-options">
				<?php foreach ($data['attribute_list'] as $k => $v): ?>
				<div class="item">
					<div class="title"><?php echo $v['title']; ?></div>
					<div class="option-list" data-attr-key='<?php echo $v['key']; ?>'>
						<?php foreach ($v['value'] as $value): ?>
						<div data-attr-value='<?php echo $value ?>'><?php echo $value ?></div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endforeach; ?>

			</div>
			<!-- end商品的属性都在这里 -->

			<div class="xqxq mt20 ml20">
				<!-- <div class="top1 mt10">
					<div class="left1 fl">小米6 全网通版 6GB内存 64GB 亮黑色</div>
					<div class="right1 fr">2499.00元</div>
					<div class="clear"></div>
				</div> -->
				<div class="bot mt20 ft20 ftbc">总计：<span class="price"><?php echo $data['price'] ?></span>元</div>
			</div>
			<div class="xiadan ml20 mt20 action-btn">
					<input class="buynow"  type="button" name="buynow" data-action="buynow" value="立即选购" />
					<input class="add-cart" type="button" name="jrgwc" data-action="add-cart" value="加入购物车" />

			</div>
		</div>
		<div class="clear"></div>
	</div>

	<script type="module" src="js/detail.js" charset="utf-8"></script>
	<script type="module" src="js/loginbtn.js" charset="utf-8"></script>
	<script src="http://localhost:9527/livereload.js" charset="utf-8"></script>
	</body>
</html>
