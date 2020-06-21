<?php
namespace api\user;

use \server\Base;
use \server\JsonService as Json;
class User extends Base{

    public function login(){
        $account = $_POST['account'];
        $pwd = $_POST['pwd'];
        $user = $this->table('user')->where("`account` = '{$account}'")->find();
        if(!$user) return Json::fail('账号错误!');
        if($user['pwd'] != $pwd) return Json::fail('密码错误!');
        session_start();
        $_SESSION['uid'] = $user['uid'];
        return Json::success('登录成功!');
        // return Json::success('session 设置成功!');
    }


    public function getUser(){

        return Json::success(['uid' => $this->uid()]);
    }


    private function getDate(){
        return $this->table('user')->field('id, real_name')->where('id = 2')->select();
    }
}
