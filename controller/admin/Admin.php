<?php
require_once('../config/constant.php');
require_once('../server/Sql.php');
use server\Sql;
class Admin extends Sql{
    //获取 总用户的数量
    public function get_user_count(){
        session_start();
        $aid = $_SESSION['aid'];
        if(!$aid) exit('请登录!');
        $user_count = $this->table('user')->field('count(*) num')->find();
        return $user_count['num'];
    }

    //获取 未完成订单的数量
    public function get_op_order_count(){
        $order_count = $this->table('order')->field('count(*) num')->where('`status` < 3')->find();
        return $order_count['num'];
    }
}
