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
    <div class="sidebar-container">
        <div class="userinfo">
            <h3>商城管理</h3>
            <div class="head-photo">
                <img src="<?php echo $avatar ?>" alt="">
            </div>
            <div class="nickname">刘灿</div>
        </div>
        <!-- 菜单 -->
        <div class="menu">



            <li class="item" id="index">
                <a href="sys.php" class="btn">
                    <icon class="iconfont icon-icon-test8"></icon>首页
                </a>
            </li>


            <li class="item" id="post-admin">
                <a href="#post-admin" class="btn">
                    <icon class="iconfont icon-tieziguanli"></icon><i></i>订单管理
                </a>
            <div class="child-menu">
                    <a href="order.php">所有订单</a>
                    <!-- <a href="post_check.php?stype=witPbu">待审核</a>
                    <a href="post_check.php?stype=noPbu">已完成</a> -->
            </div>
            </li>


            <li class="item" id="comments">
                <a href="#comments" class="btn">
                    <icon class="iconfont icon-icon-test1">
                    </icon>评论<i></i>
                </a>
                <div class="child-menu">
                    <a href="">评论管理</a>
                </div>
            </li>


            <li class="item" id="user_admin">
                <a href="#user_admin" class="btn">
                    <icon class="iconfont icon-icon-test12">
                    </icon>用户管理<i></i></a>
                    <div class="child-menu">
                    <a href="users.php">用户</a>
                    </div>
            </li>


            <li class="item" id="self-info">
                <a href="#self-info" class="btn">
                    <icon class="iconfont icon-icon-test4">
                    </icon>个人信息<i></i>
                </a>
                <div class="child-menu">
                    <a href="self_info.php">修改</a>
                </div>
            </li>


        </div>
        <!-- /菜单 -->
    </div>
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
