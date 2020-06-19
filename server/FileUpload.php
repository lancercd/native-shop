<?php

require_once('function.php');
require_once('../config/constant.php');
class FileUpload
{
    protected $dir;
    public function make($uid, $id_post_file=true){
        // echo "123";
        // $this->makeDir($id_post_file);
        // echo __STATIC__;die;
        $this->makeDir($id_post_file);
        $files = $this->format();
        $saveInfo = [];
        // p($file);die;
        foreach ($files as $file) {
            if($file['error'] == 0){
                if(is_uploaded_file($file['tmp_name'])){

                    // p($file['name']);die;
                     // p(pathinfo($file['name']));die;

                    $save = '/' . (string)$uid . '_' . time() . mt_rand(1, 99) . '.' . pathinfo($file['name'])['extension'];
                    $to = $this->dir . $save;
                    // p($to);die;
                    if(move_uploaded_file($file['tmp_name'], $to)){
                        $saveInfo[] = array(
                            'path' => $save,
                            'type' => substr($file['type'], 0,5),
                            'name' =>$file['name']
                        );
                    }
                }
            }
        }

        return $saveInfo;
    }
    private function format(){
        $formated = [];
        foreach ($_FILES as $f) {
            if(is_array($f['name'])){
                foreach ($f['name'] as $id=>$info) {
                    $formated[] = array(
                        'name' => $f['name'][$id],
                        'type' => $f['type'][$id],
                        'error' => $f['error'][$id],
                        'tmp_name' => $f['tmp_name'][$id],
                        'size' => $f['size'][$id]
                    );
                    // p($f['type'][$id]);die;
                }
            }else{
                $formated[] = $f;
            }
        }
        return $formated;
    }
    private function makeDir($id_post_file){
        if($id_post_file){
            $path = __STATIC__.'/post_file';
            $this->dir = $path;
            return is_dir($path) or mkdir($path, 0755, true);
        }else{

            $path = __IMAGE__;
            return is_dir($path) or mkdir($path, 0755, true);

            p('这是makeDir的else');die;
        }

    }




}




function F(){
    $obj = new FileUpload();
    return $obj;
}
