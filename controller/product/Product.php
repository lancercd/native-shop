<?php
require_once('../config/constant.php');
require_once('../server/Sql.php');
use server\Sql;
class Product extends Sql{
    public function test(){
        echo "99999999999999999999999999999999999999999999999999999";die;
    }

    public function get_product(){
        $product_id = $_GET['id'];
        $product = $this->table('product')->where("`product_id` = {$product_id}")->find();
        if(empty($product)) exit('非法访问!');

        return $product;
    }
}
