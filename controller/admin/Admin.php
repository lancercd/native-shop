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


    public function get_users(){
        $data = $this->table('user')->select();
        return $data;
    }


    public function get_order_list(){
        $data = $this->table('order')->field('order_id, pay_money, status, add_time')->order('add_time DESC')->select();
        $status = [0 =>'待发货', 1 =>'配送中', 2 =>'已完成'];
        foreach ($data as $k => $v) {
            $oid = $v['order_id'];
            $data[$k]['add_time'] = date('Y/m/d h:i:s', $data[$k]['add_time']);
            $data[$k]['status'] = $status[$data[$k]['status']];//订单状态  int -> string
            $data[$k]['detail'] = $this->table('order_detail o')
            ->field('o.id, o.count, o.total_price, o.pay_type, p.image')
            ->where("o.`order_id` = {$oid}")
            ->join('product_detail p', 'o.`detail_id` = p.`id`')
            ->select();
        }

        return $data;
    }
}
