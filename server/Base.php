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

    public final function setUser($uid, $nickname, $avatar, $real_name){
        session_start();
        $_SESSION['uid'] = $uid;
        $_SESSION['nickname'] = $nickname;
        $_SESSION['avatar'] = $avatar;
        $_SESSION['real_name'] = $real_name;
    }
}
