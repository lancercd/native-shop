<?php
namespace api\user;

use \server\Base;
use \server\JsonService as Json;
class User extends Base{

    public function login(){
        session_start();
        $_SESSION['uid'] = 1;
        return Json::success('session 设置成功!');
    }


    public function getUser(){

        return Json::success(['uid' => $this->uid()]);
    }


    private function getDate(){
        return $this->table('user')->field('id, real_name')->where('id = 2')->select();
    }
}
