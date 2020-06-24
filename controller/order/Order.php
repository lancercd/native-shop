<?php
require_once('../config/constant.php');
require_once('../server/Sql.php');
use server\Sql;
class Order extends Sql{
    public function get_order_list(){
        session_start();
        $uid = $_SESSION['uid'];
        if(!$uid) exit('请登录!');

        $data = $this->table('order')->field('order_id, pay_money, status, add_time')->order('add_time DESC')->where("`uid` = {$uid}")->select();
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
