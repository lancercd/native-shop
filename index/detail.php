<?php
require_once('../controller/product/Product.php');
require_once('../server/function.php');
$is_logged = lc_get_current_user()? true: false;

$avatar = '';
$uid = 0;
$nickname = '';


if($is_logged){
    $uid = $_SESSION['uid'];
    $avatar = $_SESSION['avatar'];
    $nickname = $_SESSION['nickname'];
}


$product = new Product();


$data = $product->get_product();
$data['attribute_list'] = json_decode($data['attribute_list'], true);
// var_dump($data);die;

$current_page = '';
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>商品详情</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<link rel="stylesheet" type="text/css" href="./css/detail.css">
	    <link rel="stylesheet" href="./css/test-all.css">
		<link rel="stylesheet" type="text/css" href="../public/css/responses/detail.css">
	</head>
	<body>
	<!-- start header -->
    <?php require_once('./components/header.php') ?>
    <!-- end header -->

	<div class="xiangqing">
		<div class="discription container">
			<div class="title fl"><?php echo $data['pro_name'] ?></div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="detail container">
		<div class="left imgbox"><img src="<?php echo $data['image'] ?>"></div>
		<!-- 重要   商品的id   php  需要添加 -->
		<div class="right" id="J_attr_warp" data-product-id='<?php echo $data['product_id'] ?>'>
			<div class="h3 ml20 mt20"><?php echo $data['pro_name'] ?></div>
			<div class="introduce mr40 ml20 mt10"><?php echo $data['introduce'] ?></div>
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

			<div class="xqxq">
				<!-- <div class="top1 mt10">
					<div class="left1 fl">小米6 全网通版 6GB内存 64GB 亮黑色</div>
					<div class="right1 fr">2499.00元</div>
					<div class="clear"></div>
				</div> -->
				<div class="bot ftbc">总计：<span class="price"><?php echo $data['price'] ?></span>元</div>
			</div>
			<div class="tack-order action-btn">
					<input class="buynow"  type="button" name="buynow" data-action="buynow" value="立即选购" />
					<input class="add-cart" type="button" name="jrgwc" data-action="add-cart" value="加入购物车" />
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php require_once('./components/footer.php') ?>
	<script type="module" src="js/detail.js" charset="utf-8"></script>
	<script type="module" src="js/loginbtn.js" charset="utf-8"></script>
	<script src="http://localhost:9527/livereload.js" charset="utf-8"></script>
	</body>
</html>
