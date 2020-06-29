<?php
namespace api\product;

use \server\Base;
use \server\JsonService as Json;
class Product extends Base{
    public function add_product(){
        // {"0":{"title":"颜色","key":"color","value":["金色","银色","深空灰色"]},"1":{"title":"版本","key":"version","value":["WLAN版32G","WLAN版128G"]},"2":{"title":"处理器","key":"cpu","value":["i9 10代"]}}
        // {
        //     "product_info":{
        //         "pro_name":"",
        //         "sub":"",
        //         "introduce":"",
        //         "price":"",
        //         "add_time":"",
        //         "image":""
        //
        //     },
        //     "attr_info":{
        //         "0":{"title":"颜色","key":"color","value":["金色","银色","深空灰色"]},
        //         "1":{"title":"版本","key":"version","value":["WLAN版32G","WLAN版128G"]},
        //         "2":{"title":"处理器","key":"cpu","value":["i9 10代"]}
        //     }
        //     "detail":{
        //         "0":{
        //             "attr": {"0":0,"1":0,"2":0},
        //             "price": "",
        //             "image":"",
        //         },
        //         "1":{
        //             "attr": {"0":0,"1":1,"2":0},
        //             "price": "",
        //             "image":"",
        //         },
        //         "2":{
        //             "attr": {"0":1,"1":0,"2":0},
        //             "price": "",
        //             "image":"",
        //         },
        //         "3":{
        //             "attr": {"0":1,"1":1,"2":0},
        //             "price": "",
        //             "image":"",
        //         },
        //         "4":{
        //             "attr": {"0":2,"1":0,"2":0},
        //             "price": "",
        //             "image":"",
        //         },
        //         "5":{
        //             "attr": {"0":2,"1":1,"2":0},
        //             "price": "",
        //             "image":"",
        //         },
        //     }
        // }



// {"product_info":{"pro_name":"","sub":"","introduce":"","price":"","add_time":"","image":""},"attr_info":{"0":{"title":"颜色","key":"color","value":["金色","银色","深空灰色"]},"1":{"title":"版本","key":"version","value":["WLAN版32G","WLAN版128G"]},"2":{"title":"处理器","key":"cpu","value":["i9 10代"]}}}
        $data = json_decode('{"product_info":{"pro_name":"GeForce GTX 1660显卡","sub":"GTX 1660显卡","introduce":"微星（MSI）万图师 GeForce","price":"10899","image":"../public/image/b53093a060d8ac6c.jpg"},"attr_info":{"0":{"title":"类型","key":"kand","value":["GAMING X","XS C OC","XS C OCV1"]},"1":{"title":"版本","key":"version","value":["1660S","1050Ti"]}},"detail":{"0":{"attr":{"0":0,"1":0},"price":"10899","image":""},"1":{"attr":{"0":0,"1":0},"price":"10999","image":""},"2":{"attr":{"0":0,"1":1},"price":"12899","image":""},"3":{"attr":{"0":0,"1":1},"price":"12699","image":""},"4":{"attr":{"0":1,"1":0},"price":"12509","image":""}}}',true);
        // return Json::success($data);die;
        $pid = $this->table('product')->add([
            'pro_name' => $data['product_info']['pro_name'],
            'introduce' => $data['product_info']['introduce'],
            'attribute_list' => json_encode($data['attr_info'],JSON_FORCE_OBJECT),
            'price' => $data['product_info']['price'],
            'add_time' => time(),
            'image' => $data['product_info']['image'],
        ]);
        // return Json::success($pid);
        if(!$pid) return Json::fail('添加商品 product 表失败!');
        //添加商品详情表
        // $attr_length = [];
        // foreach ($data['attr_info'] as $v) {
        //     $attr_length[] = count($data['attr_info']['value']);
        // }

        foreach ($data['detail'] as $v) {
            $name = $data['product_info']['sub'];
            foreach ($v['attr'] as $key => $value) {
                $name.=$data['attr_info'][$key]["value"][$value].' ';
            }
            $name = trim($name);
            // var_dump($name);die;
            $did = $this->table('product_detail')->add([
                'product_id' => $pid,
                'name' => $name,
                'price' => $v['price']? :$data['product_info']['price'],
                'stock' => 999,
                'add_time' => time(),
                'image' => $v['image']? :$data['product_info']['image'],
            ]);
            foreach ($v['attr'] as $key => $value) {
                $name.=$data['attr_info'][$key]["value"][$value].' ';
                $kid = $this->table('attr_key')->add([
                    'product_id' => $pid,
                    'detail_id' => $did,
                    'key' => $data['attr_info'][$key]['key'],
                ]);
                $vid = $this->table('attr_value')->add([
                    'key_id' => $kid,
                    'value' => $data['attr_info'][$key]["value"][$value],
                ]);
            }



        }
        return Json::success('添加成功');
    }

    public function get_hot_product(){
        $data = $this->table('product')
                    // ->where()
                    ->field('product_id, image, pro_name, introduce, price')
                    ->limit(5)
                    ->select();
        return Json::success($data);
    }
    public function get_product_list_1(){

        $data = $this->table('product')
                    // ->where()
                    ->field('product_id, image, pro_name, introduce, price')
                    ->limit(8)
                    ->select();
        return Json::success($data);
    }
    public function get_product_list_2(){
        return Json::success([
            ['product_id' => 65, 'image' => '../public/image/di2-2-1.jpg', 'pro_name' => '智能摄像机', 'introduce' => '能看能听能说，手机远程观看', 'price' => 149, 'comment' => ['content' => '比我以前买的充电宝砖头好太多了！放在包里不占位置...', 'real_name' => 'lc']],
            ['product_id' => 63, 'image' => '../public/image/di2-2-2.jpg', 'pro_name' => '运动相机', 'introduce' => '边玩边录边拍，手机随时分享', 'price' => 399, 'comment' => ['content' => '比我以前买的充电宝砖头好太多了！放在包里不占位置...', 'real_name' => 'lc']],
            ['product_id' => 62, 'image' => '../public/image/T1UCV_B4dv1RXrhCrK.jpg', 'pro_name' => '手机', 'introduce' => '工艺和手感超乎想象', 'price' => 1299, 'comment' => ['content' => '比我以前买的充电宝砖头好太多了！放在包里不占位置...', 'real_name' => 'lc']],
            ['product_id' => 61, 'image' => '../public/image/T1UCV_B4dv1RXrhCrK.jpg', 'pro_name' => '手机', 'introduce' => '工艺和手感超乎想象', 'price' => 1299, 'comment' => ['content' => '比我以前买的充电宝砖头好太多了！放在包里不占位置...', 'real_name' => 'lc']],
            ['product_id' => 60, 'image' => '../public/image/T1UCV_B4dv1RXrhCrK.jpg', 'pro_name' => '手机', 'introduce' => '工艺和手感超乎想象', 'price' => 1299, 'comment' => ['content' => '比我以前买的充电宝砖头好太多了！放在包里不占位置...', 'real_name' => 'lc']],
        ]);
        // return Json::fail('获取失败!');
    }
    public function get_recommend_product(){
        $data = $this->table('product')
                    // ->where()
                    ->field('product_id, image, pro_name, introduce, price')
                    ->select();
        return Json::success($data);
    }


    public function get_price(){
        $product_id = $_POST['product_id'];
        $attr = json_decode($_POST['attr'], true);

        $key = $this->table('attr_key k')->field("detail_id, GROUP_CONCAT(concat(`key`, ':', `value`)) value")->where("`product_id` = {$product_id}")->join('attr_value v', 'k.id = v.key_id')->group('detail_id')->select();
        $value = [];
        foreach ($attr as $k => $v) {$value[] = "{$k}:{$v}";}
        $detail_id = 0;
        foreach ($key as $k => $v) {
            if(!array_diff(explode(',', $v['value']), $value)){//匹配到了
                $detail_id = $v['detail_id'];
                break;
            }
        }
        // var_dump($key);die;
        // $data = $this->table('product_detail')->where("`id` = {$detail_id}")->find();
        $data = $this->table('product_detail')->field('id, price')->where("`id` = {$detail_id}")->find();
        return Json::success($data);
    }
}
