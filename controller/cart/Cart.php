<?php
require_once('../config/constant.php');
require_once('../server/Sql.php');
use server\Sql;
class Cart extends Sql{
    public function get_cart_list(){
        session_start();
        $uid = $_SESSION['uid'];
        if(!$uid) exit('请登录!');

        $data = $this->table('cart c')
                ->join('product_detail d', 'c.`product_detail` = d.`id`')
                ->field('c.id c_id, d.id d_id, c.num, c.money, c.add_time, d.image, d.price, d.name')
                ->order('add_time DESC')
                ->where("`uid` = {$uid}")
                ->select();

        foreach ($data as $k => $v) $data[$k]['add_time'] = date('Y/m/d h:i:s', $data['add_time']);


        return $data;
    }
}
