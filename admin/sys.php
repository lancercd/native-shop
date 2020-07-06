<?php
require_once('../controller/admin/Admin.php');
require_once('../server/function.php');
ad_is_logged();//没登录返回  登录页面
$admin = new Admin();
$avatar = $_SESSION['avatar'];
$aid = $_SESSION['aid'];

// 总用户数
$user_count = $admin->get_user_count();

// 为完成订单数
$order_nonfifish = $admin->get_op_order_count();

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理员首页</title>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/frame.css">
    <link rel="stylesheet" href="css/index.css">
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
            <!-- <div class="search-box">
                <input type="text" id="search-txt" name="search" placeholder="search something ..." value="" autocomplete="off">
                <a  class="search-btn" href="#"><i class="iconfont icon-search"></i></a>
            </div> -->
            <!-- <div id="more">
                <i class="iconfont icon-gengduo1"></i>
                <div id="more-child">
                    <div><a href="#">退出</a></div>
                    <div><a href="#">child-2</a></div>
                </div>
            </div> -->

        </div>
        <!-- /主页头 -->

        <div class="ad-flex-container">
            <div class="flex-row-css ad-index-head">
                <!-- 一个订单 -->
                <div class="flex-column-css index-head-item">
                    <div class="flex-row-css ad-info-head">
                        <div>订单</div>
                        <div class="as-head-btn">急</div>
                    </div>
                    <div class="ad-info-body">
                        <div class="ad-info-num"><?php echo $order_nonfifish ?></div>
                        <spqn>待处理</spqn>
                    </div>
                </div>


                <div class="flex-column-css index-head-item">
                    <div class="flex-row-css ad-info-head">
                        <div>管理员</div>
                        <!-- <div class="as-head-btn">急</div> -->
                    </div>
                    <div class="ad-info-body">
                        <div class="ad-info-num">0</div>
                        <spqn>待审核</spqn>
                    </div>
                </div>

                <div class="flex-column-css index-head-item">
                    <div class="flex-row-css ad-info-head">
                        <div>评论</div>
                        <div class="as-head-btn">急</div>
                    </div>
                    <div class="ad-info-body">
                        <div class="ad-info-num">未开通</div>
                        <spqn>待审核</spqn>
                    </div>
                </div>

                <div class="flex-column-css index-head-item">
                    <div class="flex-row-css ad-info-head">
                        <div>用户</div>
                        <!-- <div class="as-head-btn">急</div> -->
                    </div>
                    <div class="ad-info-body">
                        <div class="ad-info-num"><?php echo $user_count ?></div>
                        <!-- <spqn>待审核</spqn> -->
                    </div>
                </div>


            </div>



            <div class="flex-row-css ad-index-mid">
                <div class="post-sheet">
                    <div class="description">10天内订单数量</div>
                    <div class="sheet-form">
                        <div class="col">
                            <div></div>0
                        </div>
                        <div class="col">
                                <div></div>0
                        </div>
                        <div class="col">
                                <div></div>0
                        </div>
                        <div class="col">
                            <div></div>0
                        </div>
                        <div class="col">
                            <div></div>0
                        </div>
                        <div class="col">
                            <div></div>0
                        </div>
                        <div class="col">
                            <div></div>0
                        </div>
                        <div class="col">
                            <div></div>0
                        </div>
                        <div class="col">
                            <div></div>0
                        </div>
                        <div class="col">
                            <div></div>0
                        </div>

                        <!-- <div class="col">
                            <div style="height:30%;"></div>2
                        </div>
                        <div class="col">
                            <div style="height:70%;"></div>3
                        </div>
                        <div class="col">
                            <div style="height:40%;"></div>4
                        </div>
                        <div class="col">
                            <div style="height:90%;"></div>5
                        </div>
                        <div class="col">
                            <div style="height:40%;"></div>6
                        </div>
                        <div class="col">
                            <div style="height:30%;"></div>7
                        </div>
                        <div class="col">
                            <div style="height:80%;"></div>8
                        </div>
                        <div class="col">
                            <div style="height:10%;"></div>9
                        </div>
                        <div class="col">
                            <div style="height:30%;"></div>10
                        </div> -->
                    </div>
                </div>
                <div class="flex-column-css user-sheet">
                    <div class="col">
                        <div class="flex-column-css data">
                            <div class="num">0</div>
                            <div class="discription">10天订单量</div>
                            <div class="stick">
                                <div class="stick-len"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="flex-column-css data">
                            <div class="num">0</div>
                            <div class="discription">总订单量</div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="flex-column-css data">
                            <div class="num">0</div>
                            <div class="discription">今日活跃用户</div>
                            <div class="stick">
                                <div class="stick-len"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="flex-column-css data">
                            <div class="num">0</div>
                            <div class="discription">今日新增用户</div>
                            <div class="stick">
                                <div class="stick-len"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="flex-column-css data">
                            <div class="num">3</div>
                            <div class="discription">总用户数</div>
                        </div>
                    </div>

                </div>
            </div>



        </div>


    </div>
</div>
<script type="module" src="./js/sys.js" charset="utf-8"></script>
</body>
</html>
