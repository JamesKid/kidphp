<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  
* ================================ vimkid.com =======================================
* @author        : VimKid  
* @title         : kidphp framework
* @description   : This is a web frame edit by vimkid ,this program is free, and 
*                  totaliy support php7! You can redistribute it and  modify it 
*                  under the terms of the original BSD license.
*                  
* @change        : 2016.04.14 13:52  add program
*                : 2016.04.19 16:52  add plugin 'CodeMirror' 'parsedown' 'PHPMarkdown'
*                : 2016.04.20 16:52  add kidphp plugin 'kidphp_check'
*                : 2017.04.24 19:52  add memcache to System
*  ==================================================================================
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
class Kidphp
{
    public function __construct()
    {
        header("content-type:text/html; charset=utf-8"); // 设置编码
        @date_default_timezone_set('PRC'); // 设置时区
        $env = file_get_contents('env.txt',1); // 获取env文件第一行
        $env = trim($env); // 获取当前环境 test: 测试环境 online: 线上环境
        include($_SERVER['DOCUMENT_ROOT'].'/conf/config_'.trim($env).'.php'); //引用配置文件
        include($_SERVER['DOCUMENT_ROOT'].'/conf/config_language.php'); //引用配置文件
        if($env == 'test'){ // 如果为test环境，则打开xhprof
            xhprof_enable();
        }
        spl_autoload_register(array($this,'__autoload')); // 自动加载
        $this->configEnv($env); // 配置环境
        require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php'); //引用vendor配置
        new Whoops($env);  // 实例Whoops查错框架
        new Secure;  // 实例化安全框架
        new Language;  // 实例化多国语言框架
        $Route = new Route;    // 实例化路由框架
        $uri = $Route->initRoute();  //初始化路由
        /* 引入Controller文件 */
        $classPath = 'app/C/'.ucfirst($uri['class']).'Controller.php'; // 路幅指向Controller
        $check = new Visit($uri); // 记录访客内部记录
        new PageCache; // 实例化文件缓存,存在则直接读取页面
        /* 检查路由,不存在返回404 */
        $check = new Check;
        $result = $check->checkRoute($classPath,$uri);
        if(!$result){ // 如果result 为false
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/404page.html');
            exit;
        }
        /* 引用路由 */
        $classRoute = $uri['class'].'Controller';
        $classRoute = new $classRoute;
        $this->callFunction($classRoute,$uri);  // 调用对应方法

        /* xhprof 性能监控 */
        if($env == 'test'){ // 如果为test环境，则打开xhprof
            $xhprof_data = xhprof_disable();
            include_once '/var/www/vimkid/xhprof/xhprof_lib/utils/xhprof_lib.php';
            include_once '/var/www/vimkid/xhprof/xhprof_lib/utils/xhprof_runs.php';
            $xhprof_runs = new XHProfRuns_Default();
            $run_id = $xhprof_runs->save_run($xhprof_data, "xhprof_test");
        }
    }

    /* 配置每个环境的状态 
     * @param $envirement  test    测试环境  
     *                     online  线上环境
     */
    private function configEnv($env)
    {
        $Env = new Env($env); // 实例化环境配置
    }
    /* 回调函数方法 */
    private function callFunction($classRoute,$uri)
    {
        call_user_func_array(
            array($classRoute, $uri['function']),
            array()
        );
    }
    /* 自动加载方法 */
    private function __autoload($class)
    {
        /* 自动加载命名空间路径 */
        $space = str_replace( '\\', DIRECTORY_SEPARATOR, $class ); 
        $file = __DIR__.'/'.$space.'.php';
        if(is_file($file)){
            return require_once($file);
        }
        /* 自动加载system/core 核心 */
        $coreFile = __DIR__.'/system/core/'.$class.'.php';
        if(is_file($coreFile)){
            return require_once($coreFile);
        }
        /* 自动加载service */
        if(substr($space,-7)=='Service'){  //截取最后7个字符判断是否Service
            $serviceFile = __DIR__.'/app/S/'.$class.'.php';
            if(is_file($serviceFile)){
                return require_once($serviceFile);
            }
        }
        /* 自动加载public */
        $serviceFile = __DIR__.'/app/P/'.$class.'.php';
        if(is_file($serviceFile)){
            return require_once($serviceFile);
        }
        /* 自动加载lib */
        $serviceFile = __DIR__.'/app/L/'.$class.'.php';
        if(is_file($serviceFile)){
            return require_once($serviceFile);
        }
    }
}
new Kidphp();

