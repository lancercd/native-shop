<?php
namespace server;

use mysqli;
class Sql{
    public static $link = null;
    protected $table = null;
    private $opt;

    public static $sqls = array();


    // public function __construct($table=null){
    //     $this->table = is_null($table)? DB_PRE.$this->$table : DB_PRE.$table;
    //     $this->_connect();
    //     $this->_opt();
    // }
    public final function table($table=null){
        $this->table = is_null($table)? DB_PRE.$this->$table : DB_PRE.$table;
        $this->_connect();
        $this->_opt();
        return $this;
    }



    private final function _connect(){
        if (is_null(self::$link)) {
            $link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
            if($link->connect_error) die('数据库连接错误');
            $link->query("set names utf8");
            self::$link = $link;
        }
    }


    private final function _transform($str){
        if(get_magic_quotes_gpc()){
            $str = stripslashes($str);
        }
        return self::$link->real_escape_string($str);
    }

    public final function order($order){
        $this->opt['order'] = ' ORDER BY ' . $order;
        return $this;
    }

    public final function limit($limit){
        $this->opt['limit'] = ' LIMIT ' . $limit;
        return $this;
    }

    public final function field($field){
        $this->opt['field'] = $field;
        return $this;
    }

    public final function where($where){
        if($this->opt['where'] == '') $this->opt['where'] = ' WHERE ' . $where;
        else $this->opt['where'] .= ' AND ' . $where;
        return $this;
    }
    public final function having($having){
        $this->opt['having'] = ' HAVING ' . $having;
        return $this;
    }

    public final function group($group){
        $this->opt['group'] = ' GROUP BY  ' . $group;
        return $this;
    }

    public final function join($table2, $on, $method = 'INNER'){
        $this->opt['join'] .= ' '.$method .' JOIN ' . DB_PRE.$table2 . ' ON ' . $on . ' ';
        // echo $this->opt['join'];die;
        return $this;
    }

    // public function limit($limit){
    //     $this->opt['limit'] = ' LIMIT  ' . $limit;
    //     return $this;
    // }

    public final function find(){
        $data = $this->limit(1)->all();
        $data = current($data);
        return $data;
    }


    public final function all($flage=false){
        $sql = "select " . $this->opt['field'] . ' FROM ' . $this->table . $this->opt['join'] . $this->opt['where'] . $this->opt['group'] . $this->opt['having'] . $this->opt['order'] . $this->opt['limit'];
        // echo $sql.'<br> <hr>';
        return $this->query($sql, $flage);
    }

    public final function select($flage=false){
        $sql = "select " . $this->opt['field'] . ' FROM ' . $this->table . $this->opt['join'] . $this->opt['where'] . $this->opt['group'] . $this->opt['having'] . $this->opt['order'] . $this->opt['limit'];
        // echo $sql.'<br> <hr>';
        return $this->query($sql, $flage);
    }
    public final function query($sql, $flage){
        self::$sqls[] = $sql;
        $link = self::$link;
        // echo $sql;
        $result = $link->query($sql);
        if(is_bool($result)) die("数据库查询失败：$sql");
        if($flage){
            return $result->num_rows;
        }
        $rows = array();
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        $result->free();
        $this->_opt();
        return $rows;
    }

    private final function _opt(){
        $this->opt = array(
            'field' => '*',
            'where' => '',
            'group' => '',
            'having' => '',
            'order' => '',
            'limit' => '',
            'join' => ' '

        );
        return;
    }


    public final function exe($sql){
        self::$sqls[] = $sql;
        $link = self::$link;
        $bool = $link->query($sql);
        $this->_opt();
        if(is_object($bool)) die("查询结果集非bool值：");
        // $res = array(
        //     'affect' => $link->affected_rows,
        //     'increase' =>$link->insert_id
        // );
        if($bool) return $link->insert_id? $link->insert_id:$link->affected_rows;
        else die("错误返回bool值(false)：$sql");

    }


    public final function del(){
        if(empty($this->opt['where'])) die("删除语句无where");
        $sql = "DELETE FROM " . $this->table . $this->opt['where'];
        return $this->exe($sql);
    }

    public final function add($data){
        if(!is_array($data)) die("add()中传入参数不是数组");
        $fields='';
        $values='';
        foreach ($data as $key => $value) {
            $fields .="`" . $key . "`,";
            $values .="'" . $this->_transform($value) . "',";
        }
        $fields = trim($fields, ',');
        $values = trim($values, ',');
        $sql = "INSERT INTO " . $this->table . ' ( ' . $fields . ') VALUES ( ' . $values . ' ) ';
        return $this->exe($sql);
    }


    public final function update($data){
        if(empty($this->opt['where'])) die("更新语句没有加where条件");
        if(is_null($data)) die("update() 传入参数未空");
        if(!is_array($data)) die("传入参数不是数组");
        $values = '';
        foreach ($data as $key => $value) {
            $values .= "`" . $key . "`='" . $this->_transform($value) . "',";
        }

        $values = trim($values, ',');
        $sql = "UPDATE " . $this->table . " SET " . $values . $this->opt['where'];
        // echo "$sql";die;
        return $this->exe($sql);
    }



    public final function update_value($data){
        if(empty($this->opt['where'])) die("更新语句没有加where条件");
        if(is_null($data)) die("update() 传入参数未空");
        if(!is_array($data)) die("传入参数不是数组");
        $values = '';
        foreach ($data as $value) {
            $values .= "`" . $value . "`=" . "`" . $value . "`+ 1 " . " ,";
        }
        // echo $values;die;

        $values = trim($values, ',');
        $sql = "UPDATE " . $this->table . " SET " . $values . $this->opt['where'];
        // echo "$sql";die;
        return $this->exe($sql);
    }




}



// function S($table){
//     $obj = new Sql($table);
//     return $obj;
// }


// $sql = "delete from student";
// $data = array(
//     's_id' => 90,
//     's_name' => 'name'
// );
// $res = S('student')->where('s_id=2 and s_name="小刘灿"')->find($data);
// var_dump($res);
// $res = S('sc')->join('student', 'tb_sc.sno = tb_student.sno')->where('grade > 90')->all();


// var_dump($res);
