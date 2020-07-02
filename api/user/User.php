<?php
namespace api\user;

use \server\Base;
use \server\JsonService as Json;
class User extends Base{

    public function login(){
        $account = $_POST['account'];
        if(empty($account)) return Json::fail('请输入账号!');
        $pwd = $_POST['pwd'];
        if(empty($pwd)) return Json::fail('请输入密码!');
        $user = $this->table('user')->where("`account` = '{$account}'")->find();
        if(!$user) return Json::fail('账号错误!');
        if($user['pwd'] != $pwd) return Json::fail('密码错误!');
        $this->setUser($user);
        $this->table('user')->where("`uid` = {$user['uid']}")->update(['last_time' => time()]);
        return Json::success('登录成功!');
    }
    public function logout(){
        session_start();
        if(isset($_SESSION['uid'])){
            session_unset();
            session_destroy();
        }
        return Json::success('退出成功!');
    }

    public function admin_login(){
        $account = $_POST['account'];
        if(empty($account)) return Json::fail('请输入账号!');
        $pwd = $_POST['pwd'];
        if(empty($pwd)) return Json::fail('请输入密码!');
        $user = $this->table('admin')->where("`account` = '{$account}'")->find();
        if(!$user) return Json::fail('账号错误!');
        if($user['pwd'] != $pwd) return Json::fail('密码错误!');
        session_start();
        $_SESSION['aid'] = $user['admin_id'];
        $_SESSION['avatar'] = $user['avatar'];
        return Json::success('登录成功!');
    }

    public function admin_logout(){
        session_start();
        if(isset($_SESSION['aid'])){
            session_unset();
            session_destroy();
        }
        header('location: ../admin/admin_login.php');
        exit();
    }


    //地址

    public function address_add(){
        $uid = $this->uid();
        $address = $_POST;
        foreach ($address as $key => $value) {
            $address[$key] = trim($value);
        }
        // var_dump($address);die;
        if(empty($address['real_name'])) return Json::fail("请输入收货人姓名!");
        if(empty($address['province'])) return Json::fail("请输入省!");
        if(empty($address['city'])) return Json::fail("请输入市!");
        if(empty($address['district'])) return Json::fail("请输入区!");
        if(empty($address['detail'])) return Json::fail("请输入详细地址!");
        if(empty($address['phone'])) return Json::fail("请输入收货人电话!");
        $res = $this->table('address')->add([
            'real_name' => $address['real_name'],
            'province' => $address['province'],
            'city' => $address['city'],
            'district' => $address['district'],
            'detail' => $address['detail'],
            'phone' => $address['phone'],
            'uid' => $uid,
            'is_default' => $address['is_default'] == 1? 1: 0
        ]);
        if($res) return Json::success('添加成功!');
        else return Json::fail('添加失败!');
    }

    public function address_del(){
        $address_id = $_GET['id'];
        if(empty($address_id)) return Json::fail('请输入id!');
        $uid = $this->uid();
        $res = $this->table('address')->where("`uid` = {$uid} and `address_id` = {$address_id} and `is_del` = 0")->update(['is_del' => 1]);
        if($res) return Json::success('删除成功!');
        else return Json::fail('删除失败!');
    }

    public function get_address_list(){
        // $address_id = $_GET['id'];
        // if(empty($address_id)) return Json::fail('请输入id!');
        $uid = $this->uid();
        $res = $this->table('address')->where("`uid` = {$uid} and `is_del` = 0")->select();
        // if($res) return Json::success($res);
        return Json::success($res);
        // else return Json::fail('获取列表失败!');
    }

    public function get_money(){
        $uid = $this->uid();
        $res = $this->table('user')->where("`uid` = {$uid}")->update([
            'now_money' => 100000
        ]);
        if($res)
            return Json::success('金额更新到100000(测试!)');
        else
            return Json::fail('使用了才能领取,快去使用吧!');
    }

    public function test(){

        return Json::success($data);
    }


}
