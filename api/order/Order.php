<?php
namespace api\order;

use \server\Base;
use \server\JsonService as Json;
class Order extends Base{

    public function form_cart_create(){
        $cart_ids = explode(',', $_POST['cart_ids']);
        $uid = $this->uid();
        $data = [];
        foreach ($cart_ids as $v) {
            $cart = $this->table('cart')->where("`id` = $v")->where("`uid` = {$uid}")->find();
            if($cart) $data[] = ['id'=>$cart['product_detail'], 'num' => $cart['num']];
        }
        if($this->create($data,true)){
            foreach ($cart_ids as $v)
                $cart = $this->table('cart')->where("`id` = $v")->where("`uid` = {$uid}")->del();
        }

        return Json::success('购买成功!');
    }

    public function create($data,$is_from_cart = false){
        if($is_from_cart) $buy_info = $data;
        else $buy_info = json_decode($_POST['products'],true);

        $uid = $this->uid();
        $user = $this->table('user')->where("`uid` = {$uid}")->find();
        $address = $this->table('address')->where("`is_del` = 0 AND `uid` = {$uid} AND `is_default` = 1")->find();
        if(!$address){
            $address = $this->table('address')->where("`is_del` = 0 AND `uid` = {$uid}")->find();
        }
        $total_price = 0;
        $total_score = 0;
        foreach ($buy_info as $v){
            $product = $this->table('product_detail')->where("`id` = {$v['id']}")->find();
            if($product){
                $total_price += $product['price'] * $v['num'];
                $total_score += $product['score'] * $v['num'];
            }
        }
        if($total_price > $user['now_money']) return Json::fail('余额不足!');


        $res_order = $this->table('order')->add([
            'uid' => $uid,
            'pay_money' => $total_price,
            'real_name' => $address['real_name'],
            'phone' => $address['phone'],
            'address' => $address['province'].' ' . $address['city'].' '  . $address['district'].' ' .$address['detail'],
            'status' => 0,
            'add_time' => time()
        ]);


        //添加订单详情
        $this->create_order_detail($res_order, $buy_info);


        $res_user = $this->table('user')->where("`uid` = {$uid}")->update([
            'scort' => $user['scort'] + $total_score,
            'now_money' => $user['now_money'] - $total_price,
        ]);
        if($is_from_cart) return true;
        else return Json::success('购买成功!');
    }


    private function create_order_detail($oid, $goods){
        foreach ($goods as $v) {

            $product = $this->table('product_detail')->where("`id` = {$v['id']}")->find();
            if($product){
                $this->table('order_detail')->add([
                    'order_id' => $oid,
                    'detail_id' => $v['id'],
                    'count' => $v['num'],
                    'total_price' => $product['price'] * $v['num'],
                ]);
            }
        }
    }


}
