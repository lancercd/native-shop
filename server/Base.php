<?php
namespace server;

use server\Sql;
use \server\JsonService as Json;
class Base extends Sql{
    public function test(){
        echo __CLASS__ . __METHOD__;
    }
    public final function uid(){
        session_start();
        if(isset($_SESSION['uid'])) return $_SESSION['uid'];
        else return Json::fail('请先登录!');
    }

    public final function setUser($user_info){
        session_start();
        $_SESSION['uid'] = $user_info['uid'];
        $_SESSION['nickname'] = $user_info['nickname'];
        $_SESSION['avatar'] = $user_info['avatar'];
        $_SESSION['real_name'] = $user_info['real_name'];
    }
}
