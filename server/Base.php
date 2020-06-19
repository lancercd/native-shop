<?php
namespace server;

use server\Sql;
class Base extends Sql{
    public function test(){
        echo __CLASS__ . __METHOD__;
    }
}
