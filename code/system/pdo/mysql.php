<?php
/**
 *                       _oo0oo_
 *                      o8888888o
 *                      88" . "88
 *                      (| -_- |)
 *                      0\  =  /0
 *                    ___/`---'\___
 *                  .' \\|     |// '.
 *                 / \\|||  :  |||// \
 *                / _||||| -:- |||||- \
 *               |   | \\\  -  /// |   |
 *               | \_|  ''\---/''  |_/ |
 *               \  .-\__  '-'  ___/-. /
 *             ___'. .'  /--.--\  `. .'___
 *          ."" '<  `.___\_<|>_/___.' >' "".
 *         | | :  `- \`.;`\ _ /`;.`/ - ` : | |
 *         \  \ `_.   \_ __\ /__ _/   .-` /  /
 *     =====`-.____`.___ \_____/___.-`___.-'=====
 *                       `=---='
 *     ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *
 *             佛祖保佑         永无BUG
 *
 * Copyright (C) 广州哲吉网络科技有限公司
 *
 * @project  : sdk
 * @explain  :
 * @filename : mysql.php
 * @author   : Hunter 1718098667@qq.com
 * @date     : 2018/5/22
 */

namespace code\system\pdo;

class mysql{
    private $host;
    private $port;
    private $dbname;
    private $username;
    private $password;
    private $charset;
    private $dsn;
    private $pdo;

    public function __construct($config=[])
    {
        if(!$config){
            $config=config('mysql');
        }
        $this->host=$config['host'];
        $this->port=$config['port'];
        $this->dbname=$config['dbname'];
        $this->username=$config['username'];
        $this->password=$config['password'];
        $this->charset=$config['charset'];
        if(!@$config['dsn']){
            $this->dsn="mysql:host={$this->host};dbname={$this->dbname};port={$this->port};charset={$this->charset}";
        }
        if(!$this->pdo){
            $this->connect();
        }
    }

    /**
     * 连接mysql
     * @return \PDO
     */
    public function connect(){
        if(!$this->pdo){
            try{
                $this->pdo=new \PDO(
                    $this->dsn,
                    $this->username,
                    $this->password,
                    [
                        /**
                         * 忽略错误模式
                         * ERRMODE_SILENT=不提示任何错误(默认)
                         * ERRMODE_WARNING=警告
                         * ERRMODE_EXCEPTION=异常
                         */
                        \PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION,
                        /** 设置获取的方式
                         * FETCH_BOTH=返回一个索引为结果集列名和以0开始的列号的数组(默认)
                         * FETCH_ASSOC=返回一个索引为结果集列名的数组
                         * FETCH_BOUND=返回 TRUE ，并分配结果集中的列值给 PDOStatement::bindColumn() 方法绑定的 PHP 变量
                         * FETCH_CLASS=返回一个请求类的新实例，映射结果集中的列名到类中对应的属性名。如果fetch_style 包含 PDO::FETCH_CLASSTYPE（例如：PDO::FETCH_CLASS | PDO::FETCH_CLASSTYPE），则类名由第一列的值决定
                         * FETCH_INTO=更新一个被请求类已存在的实例，映射结果集中的列到类中命名的属性
                         * FETCH_LAZY=结合使用 PDO::FETCH_BOTH 和 PDO::FETCH_OBJ，创建供用来访问的对象变量名
                         * FETCH_NUM=返回一个索引为以0开始的结果集列号的数组
                         * FETCH_OBJ=返回一个属性名对应结果集列名的匿名对象
                         */
                        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                    ]
                );
            }catch (\Exception $e){
                die('数据库连接失败:' . $e->getMessage());
            }
        }
        return $this->pdo;
    }


    public function demo(){
        $result=$this->pdo->query("select * from `artist`");
        $rows=$result->fetchAll();
        dump($rows);
    }
}