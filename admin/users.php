<?php
require_once('../controller/admin/Admin.php');
require_once('../server/function.php');
ad_is_logged();

$aid = $_SESSION['aid'];
$real_name = $_SESSION['real_name'];
$avatar = $_SESSION['avatar'];

$admin = new Admin();
$users = $admin->get_users();


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
    <link rel="stylesheet" href="css/users.css">
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
                    </div>
                </div> -->

            </div>
            <div class="view-flex-container">
                <table class="user_table" border="1" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1%">编号</th>
                            <th width="10%">头像</th>
                            <th width="8%">昵称</th>
                            <th width="9%">账号</th>
                            <th width="10%">密码</th>
                            <th width="8%">真实姓名</th>
                            <th width="10%">访问日期</th>
                            <!-- <th width="10%">是否冻结</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($users): ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo $user['uid'] ?></td>
                                    <td><img src="<?php echo $user['avatar'] ?>" alt="" width="100%"></td>
                                    <td><?php echo $user['nickname'] ?></td>
                                    <td><?php echo $user['account'] ?></td>
                                    <td><?php echo $user['pwd'] ?></td>
                                    <td><?php echo $user['real_name'] ?></td>
                                    <td>
                                        最近:<?php echo date('m-d h:i', $user['last_time']) ?>  <br>
                                        首次:<?php echo date('m-d h:i', $user['login_time']) ?>
                                    </td>
                                    <!-- <td>
                                        <label for="is_freeze<?php echo $user['uid'] ?>" class="s">
                                            <input type="checkbox" id="is_freeze<?php echo $user['uid'] ?>" name="is_freeze" value="" onchange="user_freeze(<?php echo $user['uid'] ?>)">
                                            <span class="s1"></span>
                                        </label>
                                    </td> -->
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?php echo "没有用户信息" ?>
                        <?php endif; ?>

                    </tbody>
                </table>




            </div>


        </div>
    </div>
</body>
</html>
