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
 * @filename : config.php
 * @author   : Hunter 1718098667@qq.com
 * @date     : 2018/5/22
 */

$config=[

];
function getConfigFiles(){
    $files=scandir(__DIR__);
    $config=[];
    foreach ($files as $file){
        if($file!='.' and $file!='..' and $file!='config.php'){
            $key=explode('.conf.php',$file);
            $config[$key[0]]=include_once __DIR__.'/'.$file;
        }
    }
    return $config;
}
$config=array_merge(getConfigFiles(),$config);
return $config;
