<?php
namespace api\cart;

use \server\Base;
use \server\JsonService as Json;
class Cart extends Base{
    public function add_cart(){
        $cart_info = json_decode($_POST['products'],true);
        $uid = $this->uid();
        $cart = $this->table('cart')->where("`uid` = {$uid}")->where("`product_detail` = {$cart_info[0]['id']}")->find();
        if($cart){
            //用户已经添加过改商品了    直接对于的数量 + 1
            $res_cart = $this->table('cart')->where("`id` = {$cart['id']}")->update_value(['num']);
        }else{
            $product = $this->table('product_detail')->where("`id` = {$cart_info[0]['id']}")->find();
            if(!$product) return Json::fail('商品不存在!');
            $res_cart = $this->table('cart')->add([
                'uid' => $uid,
                'product_detail' => $product['id'],
                'num' => $cart_info[0]['num'],
                'money' => $product['price'],
                'add_time' => time()
            ]);
        }

        if($res_cart) return Json::success('添加购物车成功!');
        else return Json::fail('添加购物车失败');
    }
}
