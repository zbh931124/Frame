<?php
/** 加载函数库 */
include_once CODEPATH.'loading/functions.php';

use code\system;

class Code{
    /**
     * 项目入口
     */
    public static function run(){
        /** 自动注册加载文件 */
        spl_autoload_register('Code::autoLoading');
        /** 解析URL地址 */
        $uri=$_SERVER['REQUEST_URI'];
        /** 加载路由 */
        $route=new system\Route();
        $routeClass=@$route->autoRoute()[ltrim($uri,'/')];
        if(!$routeClass){
            throw new Exception(ltrim($uri,'/').'不存在');
        }
        $objectName='app\controllers\\'.$routeClass[0];
        $controllers=new $objectName();
        $controllers->$routeClass[1]();

    }

    /**
     * 自动加载类文件
     * @param $class
     */
    private static function autoLoading($class){
        include_once WEBPATH.'vendor/autoload.php';
        include_once WEBPATH.$class.'.php';
    }


}
?>