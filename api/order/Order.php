<?php
namespace api\order;

use \server\Base;
use \server\JsonService as Json;
class Order extends Base{
    public function create(){
        $detail_id = $_POST['detail_id'];
        $uid = $this->uid();
        $user = $this->table('user')->where("`uid` = {$uid}")->find();
        $product = $this->table('product_detail')->where("`id` = {$detail_id}")->find();
        if($product['price'] > $user['now_money']) return Json::fail('余额不足!');
        $address = $this->table('address')->where("`is_del` = 0 AND `uid` = {$uid} AND `is_default` = 1")->find();
        if(!$address){
            $address = $this->table('address')->where("`is_del` = 0 AND `uid` = {$uid}")->find();
        }
        $res_order = $this->table('order')->add([
            'uid' => $uid,
            'pay_money' => $product['price'],
            'real_name' => $address['real_name'],
            'phone' => $address['phone'],
            'address' => $address['province'] . $address['city'] . $address['district'].$address['detail'],
            'status' => 0,
            'add_time' => time()
        ]);
        $res_user = $this->table('user')->where("`uid` = {$uid}")->update([
            'scort' => $user['scort'] + $product['score'],
            'now_money' => $user['now_money'] - $product['price'],
        ]);
        Json::success('购买成功!');
    }
    public function getAge(){
        echo "20";
    }




    // $attr = json_decode($_POST['attr'], true);
}
