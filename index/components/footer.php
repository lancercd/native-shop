<!-- 手机端   底部的bar -->
<div class="bottom-nav">
    <div>
        <a href="index.php"  class="<?php echo $current_page=='index'? 'active':'' ?>">
            <i class="icon iconfont icon-lingshi"></i>首页
        </a>
    </div>
    <div>
        <a href="cart.php" class="<?php echo $current_page=='cart'? 'active':'' ?>">
            <i class="icon iconfont icon-cart-Empty"></i>购物车
        </a>
    </div>
    <div>
        <a href="order.php" class="<?php echo $current_page=='order'? 'active':'' ?>">
            <i class="icon iconfont icon-shangpin1"></i>订单
        </a>
    </div>
    <div>
        <a href="self_info.php" class="<?php echo $current_page=='self_info'? 'active':'' ?>">
            <i class="icon iconfont icon-user"></i>我的信息
        </a>
    </div>
</div>
