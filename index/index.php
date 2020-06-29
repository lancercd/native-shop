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


<!-- <div id="container"> -->
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
                <!-- <li class="star-item-1">
                    <a class="thumb" href="javascript:;">
                        <img src="../public/image/T1UCV_B4dv1RXrhCrK.jpg"/>
                    </a>
                    <h3 class="title">
                        <a href="javascript:;">手机4</a>
                    </h3>
                    <p class="desc">工艺和手感超乎想象</p>
                    <p class="price">1299元起</p>
                </li> -->
            <!--<li class="star-item-2">
              <a class="thumb" href="javascript:;">
                <img src="../public/image/di1-2.jpg"/>
              </a>
              <h3 class="title">
                <a href="javascript:;">平板</a>
              </h3>
              <p class="desc">全球首款 NVIDIA Tegra K1 平板</p>
              <p class="price">1299元起</p>
            </li>

            <li class="star-item-3">
              <a class="thumb" href="javascript:;">
                <img src="../public/image/di1-3.jpg"/>
              </a>
              <h3 class="title">
                <a href="javascript:;">盒子增强版 1G</a>
              </h3>
              <p class="desc">首款4K超高清网络机顶盒</p>
              <p class="price">1299元起</p>
            </li>
            <li class="star-item-4">
              <a class="thumb" href="javascript:;">
                <img src="../public/image/di1-4.jpg"/>
              </a>
              <h3 class="title">
                <a href="javascript:;">全新路由器</a>
              </h3>
              <p class="desc">顶配路由器，企业级性能</p>
              <p class="price">1299元起</p>
            </li>
            <li class="star-item-5">
              <a class="thumb" href="javascript:;">
                <img src="../public/image/di1-5.jpg"/>
              </a>
              <h3 class="title">
                <a href="javascript:;">路由器mini</a>
              </h3>
              <p class="desc">主流双频AC智能路由器</p>
              <p class="price">1299元起</p>
            </li>
            <li class="star-item-6">
              <a class="thumb" href="javascript:;">
                <img src="../public/image/di1-6.jpg"/>
              </a>
              <h3 class="title">
                <a href="javascript:;">插线板</a>
              </h3>
              <p class="desc">3重安全保护，插线板中的艺术品</p>
              <p class="price">1299元起</p>
            </li>
            <li class="star-item-7">
              <a class="thumb" href="javascript:;">
                <img src="../public/image/di1-7.jpg"/>
              </a>
              <h3 class="title">
                <a href="javascript:;">移动电源10000mAh</a>
              </h3>
              <p class="desc">高密度进口电芯，仅名片大小</p>
              <p class="price">1299元起</p>
            </li>
            <li class="star-item-6">
              <a class="thumb" href="javascript:;">
                  <img src="../public/image/di1-6.jpg"/>
              </a>
              <h3 class="title">
                <a href="javascript:;">插线板</a>
              </h3>
              <p class="desc">3重安全保护，插线板中的艺术品</p>
              <p class="price">1299元起</p>
            </li>
            <li class="star-item-7">
              <a class="thumb" href="javascript:;">
                <img src="../public/image/di1-7.jpg"/>
              </a>
              <h3 class="title">
                <a href="javascript:;">移动电源10000mAh</a>
              </h3>
              <p class="desc">高密度进口电芯，仅名片大小</p>
              <p class="price">1299元起</p>
            </li>
            <li class="star-item-7">
              <a class="thumb" href="javascript:;">
                <img src="../public/image/di1-7.jpg"/>
              </a>
              <h3 class="title">
                <a href="javascript:;">移动电源10000mAh</a>
              </h3>
              <p class="desc">高密度进口电芯，仅名片大小</p>
              <p class="price">1299元起</p>
            </li> -->
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
            <!-- <li>
              <a class="thumb"  href="javascript:;">
                  <img src="../public/image/di2-2-1.jpg"/>
              </a>
              <h3 class="title">
                  <a href="javascript:;">小蚁智能摄像机</a>
              </h3>
              <p class="desc">能看能听能说，手机远程观看</p>
              <p class="price">149元</p>
            </li> -->
            <!-- <li>
              <a class="thumb"  href="javascript:;"><img src="../public/image/di2-2-2.jpg"/></a>
              <h3 class="title"><a href="javascript:;">小蚁运动相机</a></h3>
              <p class="desc">边玩边录边拍，手机随时分享</p>
              <p class="price">
              399元
              </p>
            </li>
            <li>
              <a class="thumb" href="javascript:;"><img src="../public/image/di2-2-3.jpg"/></a>
              <h3 class="title"><a href="javascript:;">路由器 mini</a></h3>
              <p class="desc">主流双频AC智能路由器，性价比之王</p>
              <p class="price">
              <span class="num">129</span>元
              </p>
            </li>
            <li>
              <a class="thumb"  href="javascript:;"><img src="../public/image/di2-2-4.jpg"/></a>
              <h3 class="title"><a href="javascript:;">体重秤</a></h3>
              <p class="desc">高精度压力传感器 ｜ 手机管理全家健康</p>
              <p class="price">
              <span class="num">99</span>元
              </p>
            </li>
            <li>
              <a class="thumb"  href="javascript:;"><img src="../public/image/di2-2-5.jpg"/></a>
              <h3 class="title"><a href="javascript:;">智能插座</a></h3>
              <p class="desc">手机远程遥控开关，带USB接口</p>
              <p class="price">
              <span class="num">59</span>元
              </p>
            </li>
            <li>
              <a class="thumb"  href="javascript:;"><img src="../public/image/di2-2-6.jpg"/></a>
              <h3 class="title"><a href="javascript:;">iHealth智能血压计</a></h3>
              <p class="desc">送给爸妈最贴心的礼物</p>
              <p class="price">
              <span class="num">199</span>元
              </p>
            </li>
            <li>
              <a class="thumb"  href="javascript:;"><img src="../public/image/di2-2-7.jpg"/></a>
              <h3 class="title"><a href="javascript:;">水质TDS检测笔</a></h3>
              <p class="desc">准确检测家中水质纯度</p>
              <p class="price">
              <span class="num">39</span>元
              </p>
            </li>
            <li>
              <a class="thumb"  href="javascript:;"><img src="../public/image/di2-2-8.jpg"/></a>
              <h3 class="title"><a href="javascript:;">智能家庭套装</a></h3>
              <p class="desc">3分钟快速安装，30多种智能玩法</p>
              <p class="price">
              <span class="num">199</span>元
              </p>
            </li> -->
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
            <!-- <li class="brick-item">
              <a class="thumb"  href="javascript:;"><img src="../public/image/di3-2-1.jpg"/></a>
              <h3 class="title"><a href="javascript:;">移动电源16000mAh</a></h3>
              <p class="desc">能看能听能说，手机远程观看</p>
              <p class="price">
              <span class="num">129</span>元
              </p>
              <div class="review-wrapper">
                <a href="javascript:;">
                  <span class="review">
                  比我以前买的充电宝砖头好太多了！放在包里不占位置...
                  </span>
                  <span class="author">来自于龚毅祥的评价</span>
                </a>
              </div>
            </li>
            <li class="brick-item">
              <a class="thumb"  href="javascript:;"><img src="../public/image/di2-2-2.jpg"/></a>
              <h3 class="title"><a href="javascript:;">小蚁运动相机</a></h3>
              <p class="desc">边玩边录边拍，手机随时分享</p>
              <p class="price">
                <span class="num">399</span>元
              </p>
              <div class="review-wrapper">
                <a href="javascript:;">
                  <span class="review">
                  比我以前买的充电宝砖头好太多了！放在包里不占位置...
                  </span>
                  <span class="author">来自于龚毅祥的评价</span>
                </a>
              </div>
            </li>
            <li class="brick-item">
              <a class="thumb" href="javascript:;"><img src="../public/image/di2-2-3.jpg"/></a>
              <h3 class="title"><a href="javascript:;">路由器 mini</a></h3>
              <p class="desc">主流双频AC智能路由器，性价比之王</p>
              <p class="price">
              <span class="num">129</span>元
              </p>
              <div class="review-wrapper">
                <a href="javascript:;">
                  <span class="review">
                  比我以前买的充电宝砖头好太多了！放在包里不占位置...
                  </span>
                  <span class="author">来自于龚毅祥的评价</span>
                </a>
              </div>
            </li>
            <li class="brick-item">
              <a class="thumb"  href="javascript:;"><img src="../public/image/di2-2-4.jpg"/></a>
              <h3 class="title"><a href="javascript:;">体重秤</a></h3>
              <p class="desc">高精度压力传感器 ｜ 手机管理全家健康</p>
              <p class="price">
                <span class="num">99</span>元
              </p>
              <div class="review-wrapper">
                <a href="javascript:;">
                  <span class="review">
                  比我以前买的充电宝砖头好太多了！放在包里不占位置...
                  </span>
                  <span class="author">来自于龚毅祥的评价</span>
                </a>
              </div>
            </li>
            <li class="brick-item">
              <a class="thumb"  href="javascript:;">
                  <img src="../public/image/di2-2-5.jpg"/>
              </a>
              <h3 class="title">
                  <a href="javascript:;">智能插座</a>
              </h3>
              <p class="desc">手机远程遥控开关，带USB接口</p>
              <p class="price">
                <span class="num">59</span>元
              </p>
              <div class="review-wrapper">
                <a href="javascript:;">
                  <span class="review">
                  比我以前买的充电宝砖头好太多了！放在包里不占位置...
                  </span>
                  <span class="author">来自于龚毅祥的评价</span>
                </a>
              </div>
            </li>
            <li class="brick-item">
              <a class="thumb"  href="javascript:;"><img src="../public/image/di2-2-6.jpg"/></a>
              <h3 class="title"><a href="javascript:;">iHealth智能血压计</a></h3>
              <p class="desc">送给爸妈最贴心的礼物</p>
              <p class="price">
                <span class="num">199</span>元
              </p>
              <div class="review-wrapper">
                <a href="javascript:;">
                  <span class="review">
                  比我以前买的充电宝砖头好太多了！放在包里不占位置...
                  </span>
                  <span class="author">来自于龚毅祥的评价</span>
                </a>
              </div>
            </li>
            <li class="brick-item">
              <a class="thumb"  href="javascript:;"><img src="../public/image/di2-2-7.jpg"/></a>
              <h3 class="title"><a href="javascript:;">水质TDS检测笔</a></h3>
              <p class="desc">准确检测家中水质纯度</p>
              <p class="price">
                <span class="num">39</span>元
              </p>
              <div class="review-wrapper">
                <a href="javascript:;">
                  <span class="review">
                  比我以前买的充电宝砖头好太多了！放在包里不占位置...
                  </span>
                  <span class="author">来自于龚毅祥的评价</span>
                </a>
              </div>
            </li>
            <li class="brick-item  brick-item-s">
              <a href="javascript:;">
                <img src="../public/image/di3-2-8.jpg" width="80px" height="80px"/>
                <h3 class="title">随身WIFI</h3>
              </a>
              <p class="price"><span>19.9</span>元</p>
            </li>

            <li class="brick-item  brick-item-s">
              <div class="btn-more">
                <a href="javascript:;"><i class="icon iconfont icon-Rightarrow"></i></a>
              </div>
              <a href="javascript:;" class="readmore">浏览更多
                <small>热门</small>
              </a>
            </li> -->
          </ul>
        </div>
        <div class="model product-3 model-recommend">
          <div class="title-box clearfix">
            <h2 class="title">为你推荐</h2>
            <!-- <div class="more">
              <a href="javascript:;">
                <i class="icon iconfont icon-chevron_left_square"></i>
              </a>
              <a href="javascript:;">
                <i class="icon iconfont icon-chevron_right_square"></i>
              </a>
            </div> -->
          </div>
          <div class="slid-warp">
            <ul class="recommend-list" >
              <!-- <li>
                <a href="javascript:;">
                      <img src="../public/image/T1UCV_B4dv1RXrhCrK.jpg"/>
                    <h3 class="title">
                      手机4
                    </h3>
                    <p class="price">1299元起</p>
                    <p class="tips"> 13.5万人好评  </p>
                </a>
              </li>
              <li>
                  <a href="javascript:;">
                        <img src="../public/image/di1-2.jpg"/>
                      <h3 class="title">
                        平板
                      </h3>
                      <p class="price">1299元起</p>
                      <p class="tips"> 13.5万人好评  </p>
                  </a>
              </li>
              <li>
                  <a href="javascript:;">
                        <img src="../public/image/di1-2.jpg"/>
                      <h3 class="title">盒子增强版 1G</h3>
                      <p class="price">1299元起</p>
                      <p class="tips"> 13.5万人好评  </p>
                  </a>
              </li>
              <li>
                <a class="thumb" href="javascript:;">
                  <img src="../public/image/di1-4.jpg"/>
                </a>
                <h3 class="title">
                  <a href="javascript:;">全新路由器</a>
                </h3>
                <p class="price">1299元起</p>
                <p class="tips"> 13.5万人好评  </p>
              </li>
              <li>
                <a class="thumb" href="javascript:;">
                  <img src="../public/image/di1-5.jpg"/>
                </a>
                <h3 class="title">
                  <a href="javascript:;">路由器mini</a>
                </h3>
                <p class="price">1299元起</p>
                <p class="tips"> 13.5万人好评  </p>
              </li>
              <li>
                <a class="thumb" href="javascript:;">
                  <img src="../public/image/di1-6.jpg"/>
                </a>
                <h3 class="title">
                  <a href="javascript:;">插线板</a>
                </h3>
                <p class="price">1299元起</p>
                <p class="tips">13.5万人好评  </p>
              </li>
              <li>
                <a class="thumb" href="javascript:;">
                  <img src="../public/image/di1-7.jpg"/>
                </a>
                <h3 class="title">
                  <a href="javascript:;">移动电源10000mAh</a>
                </h3>
                <p class="price">1299元起</p>
                <p class="tips"> 13.5万人好评  </p>
              </li>
              <li>
                <a href="javascript:;">
                      <img src="../public/image/T1UCV_B4dv1RXrhCrK.jpg"/>
                    <h3 class="title">
                      手机4
                    </h3>
                    <p class="price">1299元起</p>
                    <p class="tips"> 13.5万人好评  </p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                      <img src="../public/image/T1UCV_B4dv1RXrhCrK.jpg"/>
                    <h3 class="title">
                      手机4
                    </h3>
                    <p class="price">1299元起</p>
                    <p class="tips"> 13.5万人好评  </p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                      <img src="../public/image/T1UCV_B4dv1RXrhCrK.jpg"/>
                    <h3 class="title">
                      手机4
                    </h3>
                    <p class="price">1299元起</p>
                    <p class="tips"> 13.5万人好评  </p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                      <img src="../public/image/T1UCV_B4dv1RXrhCrK.jpg"/>
                    <h3 class="title">
                      手机4
                    </h3>
                    <p class="price">1299元起</p>
                    <p class="tips"> 13.5万人好评  </p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                      <img src="../public/image/T1UCV_B4dv1RXrhCrK.jpg"/>
                    <h3 class="title">
                      手机4
                    </h3>
                    <p class="price">1299元起</p>
                    <p class="tips"> 13.5万人好评  </p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                      <img src="../public/image/T1UCV_B4dv1RXrhCrK.jpg"/>
                    <h3 class="title">
                      手机4
                    </h3>
                    <p class="price">1299元起</p>
                    <p class="tips"> 13.5万人好评  </p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                      <img src="../public/image/T1UCV_B4dv1RXrhCrK.jpg"/>
                    <h3 class="title">
                      手机4
                    </h3>
                    <p class="price">1299元起</p>
                    <p class="tips"> 13.5万人好评  </p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                      <img src="../public/image/T1UCV_B4dv1RXrhCrK.jpg"/>
                    <h3 class="title">
                      手机4
                    </h3>
                    <p class="price">1299元起</p>
                    <p class="tips"> 13.5万人好评  </p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                      <img src="../public/image/T1UCV_B4dv1RXrhCrK.jpg"/>
                    <h3 class="title">
                      手机4
                    </h3>
                    <p class="price">1299元起</p>
                    <p class="tips"> 13.5万人好评  </p>
                </a>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>

<!-- </div> -->
<!-- /id="container" -->

<div class="bottom-nav">
    <div><a href="index.php" class="active"><i class="icon iconfont icon-lingshi"></i>首页</a></div>
    <div><a href="cart.php"><i class="icon iconfont icon-cart-Empty"></i>购物车</a></div>
    <div><a href="order.php"><i class="icon iconfont icon-shangpin1"></i>订单</a></div>
    <div><a href="self_info.php"><i class="icon iconfont icon-user"></i>我的信息</a></div>
</div>

<script type="module" src="js/index.js" charset="utf-8"></script>
<script type="module" src="js/loginbtn.js" charset="utf-8"></script>
<script src="http://localhost:9527/livereload.js" charset="utf-8"></script>
</body>
</html>
