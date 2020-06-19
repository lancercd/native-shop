<?php
namespace api\order;

use \server\Base;
use \server\JsonService as Json;
class Order extends Base{
    public function getName(){
        Json::success($this->test());
    }
    public function getAge(){
        echo "20";
    }
}
