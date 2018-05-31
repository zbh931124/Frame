<?php
/**
 * Created by PhpStorm.
 * User: Hunter
 * Date: 2018/5/20
 * Time: 22:46
 */

/** 项目根目录 */
define('WEBPATH',__DIR__.'/');
/** app目录 */
define('APPPATH',WEBPATH.'app/');
/** 框架目录 */
define('CODEPATH',WEBPATH.'code/');
/** 第三方SDK目录 */
define('EXTPATH',WEBPATH.'external/');

/** 当前环境 */
define('ENV','dev');



include_once CODEPATH.'code.php';

Code::run();