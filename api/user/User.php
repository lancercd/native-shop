<?php
namespace api\user;

use \server\Base;
use \server\JsonService as Json;
class User extends Base{

    public function login(){

        return Json::success($this->getDate());
    }


    private function getDate(){
        return $this->table('user')->field('id, real_name')->where('id = 2')->select();
    }
}
