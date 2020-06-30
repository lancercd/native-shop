<header>
    <div class="container">
        <div class="navbar">
            <a class="logo" href="index.php">SHOPPING</a>
            <?php if (!$is_logged): //没有登录?>
                <label for="toggle-nav"><i class="icon iconfont icon-ego-menu"></i></label>
                <input type="checkbox" id="toggle-nav">
            <?php endif; ?>

            <div class="collapse">
                <ul class="links">
                    <li><a href="index.php">首页</a></li>
                    <li><a href="cart.php">我的购物车</a></li>
                    <li><a href="order.php">我的订单</a></li>
                    <li><a href="self_info.php">我的信息</a></li>
                </ul>
                <?php if (!$is_logged): //没有登录?>
                    <div class="form">
                        <button type="button" class="login-btn" name="loginBtn">登录</button>
                            <a class="signin" href="#">注册</a>
                    </div>
                <?php endif; ?>

            </div>
            <?php if ($is_logged): //登录了?>

            <div class="user-info">
                <img class="avatar" src="<?php echo $avatar ?>" alt="头像">
                <div class="user-btns">
                    <div class="item">
                        <a href="self_info.php">我的信息</a>
                    </div>
                    <div class="item logout">
                        退出登录
                    </div>

                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</header>
