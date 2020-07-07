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



    public function get_order_detail($oid){

        return $this->order_detail($oid);
    }


    /**
     * 订单详情查看
     * @param  int  $oid 订单id
     * @param  int $uid 用户的id(管理员可以不用传用户id)
     * @return mixed
     */
    private function order_detail($oid, $uid = 0){

        $model = new Sql();
        $model = $model->table('order')->where("`order_id` = {$oid}");
        if($uid) $model = $model->where("`uid` = {$uid}");
        $data = $model->find();

        //没有查询到信息  返回空
        if(!$data) return;
        $status = [0 =>'待发货', 1 =>'配送中', 2 =>'已完成'];
        $data['status'] = $status[$data['status']];
        $data['add_time'] = date('Y-m-d H:i:s', $data['add_time']);
        //获取订单详情
        $data['order_detail'] = $this->table('order_detail o')
        ->field('p.pro_name, p.introduce, d.id pro_detail_id, d.name, d.price, d.image, o.count, o.total_price, o.pay_type')
        ->join('product_detail d', 'o.detail_id = d.id')
        ->join('product p', 'd.product_id = p.product_id')
        ->where("`order_id` = {$oid}")
        ->select();

        //获取每个订单详情 的商品的attr
        foreach($data['order_detail'] as $k => $v){
            $attr = $this->table('attr_key k')->field('concat(k.`key`, ":", v.`value`) attr')->join('attr_value v', 'k.id = v.key_id')->where("k.`detail_id` = {$v['pro_detail_id']}")->select();
            $data['order_detail'][$k]['attr'] = $attr;
        }
        return $data;
    }
}
