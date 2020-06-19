<?php

namespace server;

//造轮子之路还长啊
class JsonService
{
    private static $SUCCESSFUL_DEFAULT_MSG = 'success';
    private static $FAIL_DEFAULT_MSG = 'errot';
    private function result($code,$msg='',$data=[])
    {
        exit(json_encode(compact('code','msg','data')));
    }

    public function successful($msg = 'success',$data=[],$status=200)
    {
        if(false == is_string($msg)){
            $data = $msg;
            $msg = self::$SUCCESSFUL_DEFAULT_MSG;
        }
        return $this->result($status,$msg,$data);
    }

    public function success($msg,$data=[])
    {
        if(true == is_array($msg)){
            $data = $msg;
            $msg = self::$SUCCESSFUL_DEFAULT_MSG;
        }
        return $this->result(200,$msg,$data);
    }

    public function fail($msg,$data=[],$code=400)
    {
        if(true == is_array($msg)){
            $data = $msg;
            $msg = self::$FAIL_DEFAULT_MSG;
        }
        return $this->result($code,$msg,$data);
    }

}
