<?php
require_once('../server/function.php');

// is_logged();

$is_logged = lc_get_current_user()? true: false;

$avatar = '';
$uid = 0;
$nickname = '';


if($is_logged){
    $uid = $_SESSION['uid'];
    $avatar = $_SESSION['avatar'];
    $nickname = $_SESSION['nickname'];
}
// p($_SESSION['avatar']);die;

$current_page = 'index';
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="../public/css/init.css"> -->

  <link rel="stylesheet" type="text/css" href="./css/index.css">
  <link rel="stylesheet" type="text/css" href="../public/css/responses/index.css">
  <link rel="stylesheet" href="./css/test-all.css">
  <title>商品主页</title>
</head>
<body>

    <!-- start header -->
    <?php require_once('./components/header.php') ?>
    <!-- end header -->


    <div class="site-main container">
        <!-- 轮播 -->
        <div class="J_wrap">
          <ul class="list">
            <li class="item active"><a href="javascript:;"><img src="../public/image/T1SShgB4Kv1RXrhCrK.jpg"/></a></li>
            <li class="item"><a href="javascript:;"><img src="../public/image/T17QEgBj_T1RXrhCrK.jpg"/></a></li>
            <li class="item"><a href="javascript:;"><img src="../public/image/T1EsWjB_KT1RXrhCrK.jpg"/></a></li>
            <li class="item"><a href="javascript:;"><img src="../public/image/T1lVh_ByJv1RXrhCrK.jpg"/></a></li>
            <li class="item"><a href="javascript:;"><img src="../public/image/T1lVh_ByJv1RXrhCrK.jpg"/></a></li>
            <li class="item"><a href="javascript:;"><img src="../public/image/T1lVh_ByJv1RXrhCrK.jpg"/></a></li>
            <li class="item"><a href="javascript:;"><img src="../public/image/T1lVh_ByJv1RXrhCrK.jpg"/></a></li>
            <li class="item"><a href="javascript:;"><img src="../public/image/T1lVh_ByJv1RXrhCrK.jpg"/></a></li>
          </ul>
          <ul class="pointList"></ul>
          <button type="button" class="btn" id="goPre">
              <i class="icon iconfont icon-Left"></i>
          </button>
          <button type="button" class="btn" id="goNext"><i class="icon iconfont icon-right1"></i></button>
        </div>
        <!-- /轮播 -->








      <div class="model-hot">
        <div class="channel-box clearfix">
          <ul class="channel-list clearfix">
            <div class="channel-item">
                <a href=""><i class="icon iconfont icon-yifu"></i></a>
            </div>
            <div class="channel-item">
                <a href=""><i class="icon iconfont icon-kuzi"></i></a>
            </div>
            <div class="channel-item">
                <a href=""><i class="icon iconfont icon-lingshi"></i></a>
            </div>
            <div class="channel-item">
                <a href=""><i class="icon iconfont icon-gongju"></i></a>
            </div>
            <div class="channel-item">
                <a href=""><i class="icon iconfont icon-wp-sj"></i></a>
            </div>
            <div class="channel-item">
                <a href=""><i class="icon iconfont icon-iconset0227"></i></a>
            </div>
          </ul>
        </div>
        <ul class="hot-good-list clearfix">
          <li class="good-item">
            <a href="javascript:;"><img src="../public/image/dax1.jpg"/></a>
          </li>
          <li class="good-item">
            <a href="javascript:;"><img src="../public/image/dax2.jpg"/></a>
          </li>
          <li class="good-item">
            <a href="javascript:;"><img src="../public/image/dax3.jpg"/></a>
          </li>
        </ul>
      </div>

      <div class="model model-star-goods">
        <div class="title-box clearfix">
          <h2 class="title">热销</h2>
          <div id="more">

            <!-- <a href="javascript:;"> -->
              <!-- <i class="icon iconfont icon-chevron_left_square" data-direction='left'></i> -->
            <!-- </a> -->
            <!-- <a href="javascript:;"> -->
              <!-- <i class="icon iconfont icon-chevron_right_square" data-direction='right'></i> -->
            <!-- </a> -->
          </div>
        </div>
        <div id="slid-warp">
            <ul class="star-goods-list">
                <!-- js渲染 -->
            </ul>
        </div>
      </div>

    </div>



    <div class="site-product">
      <div class="container">
        <div class="model product-1 clearfix">
          <div class="title-box clearfix">
            <h2 class="title">智能硬件</h2>
            <div class="more-links">
              <a href="javascript:;">
              查看全部
              <i class="icon iconfont icon-Rightarrow"></i>
              </a>
            </div>
          </div>
          <div class="light-list hasone">
            <div class="light-item">
              <a href="javascript:;">
                <img src="../public/image/di2-1.jpg"/>
              </a>
            </div>
          </div>
          <ul class="product-list clearfix list-1">
            <!-- js渲染 -->
          </ul>
        </div>
        <div class="model product-2 clearfix">
          <div class="title-box clearfix">
            <h2 class="title">搭配</h2>
            <!-- <div class="more">
              <ul class="tab-list clearfix" id="tab-list">
                <li class="tab-active"><a href="javascript:;">热门</a></li>
                <li><a href="javascript:;">耳机音箱</a></li>
                <li><a href="javascript:;">电源</a></li>
                <li><a href="javascript:;">电池储存卡</a></li>
              </ul>
            </div> -->
          </div>
          <div class="light-list">
            <div class="light-item">
            <a href="javascript:;"><img src="../public/image/di3-1-1.jpg"/></a>
            </div>
            <div class="light-item">
            <a href="javascript:;"><img src="../public/image/di3-1-2.jpg"/></a>
            </div>
          </div>
          <ul class="product-list clearfix  list-2">
            <!-- js渲染 -->
          </ul>
        </div>
        <div class="model product-3 model-recommend">
          <div class="title-box clearfix">
            <h2 class="title">为你推荐</h2>

          </div>
          <div class="slid-warp">
            <ul class="recommend-list" >
              <!-- js渲染 -->
            </ul>
          </div>
        </div>
      </div>
    </div>


<?php require_once('./components/footer.php') ?>

<script type="module" src="js/index.js" charset="utf-8"></script>
<script type="module" src="js/loginbtn.js" charset="utf-8"></script>
<script src="http://localhost:9527/livereload.js" charset="utf-8"></script>
</body>
</html>
