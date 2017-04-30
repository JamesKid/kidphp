<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  
* ================================VimKid==========================================
* @author		: VimKid  
* @title        : kidphp framework
* @description  : This is a web frame edit by vimkid ,this program is free, and totaliy
*				  support php7! You can redistribute it and  modify it under the 
*				  terms of the original BSD license.
*				  
* @change		: 2016.04.14 13:52  add program
*				: 2016.04.19 16:52  add plugin 'CodeMirror' 'parsedown' 'PHPMarkdown'
*				: 2016.04.20 16:52  add kidphp plugin 'kidphp_check'
*				: 2017.04.24 19:52  add memcache to System
*  ==================================================================================
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
class Kidphp{
	public function __construct(){
        $env = $this->getLine('env.txt',1); // 获取env文件第一行
        if(trim($env) == 'test'){ // 如果为test环境，则打开xhprof
            xhprof_enable();
        }
		header("content-type:text/html; charset=utf-8"); // 设置编码
		spl_autoload_register(array($this,'__autoload'));
		@date_default_timezone_set('PRC'); // 设置时区
		$this->configEnv($env); // 配置环境

		require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php'); //引用vendor配置
		$Secure = new Secure;  // 实例化安全框架
		$Route = new Route;    // 实例化路由框架

		$uri = $Route->initRoute();  //初始化路由
		/* 引入Controller文件 */
		$classPath = 'api/'.$uri['api'].'/C/'.ucfirst($uri['class']).'Controller.php';
		$check = new Visit($uri); // 记录访客内部记录
		/* 检查路由,不存在返回404 */
		$check = new Check;
		$result = $check->checkRoute($classPath,$uri);
		if($result ==false){
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/404page.html');
            exit;
		}
		/* 引用路由 */
		$classRoute = $uri['class'].'Controller';
		$classRoute = new $classRoute;
		$this->callFunction($classRoute,$uri);  // 调用对应方法

        /* xhprof 性能监控 */
        if(trim($env) == 'test'){ // 如果为test环境，则打开xhprof
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
	private function configEnv($env){
		$Env = new Env(trim($env)); // 实例化环境配置
	}

    /**
    * 获取指定行内容
    *
    * @param $file 文件路径
    * @param $line 行数
    * @param $length 指定行返回内容长度
    */
    private function getLine($file, $line, $length = 1024){
        $returnTxt = null; // 初始化返回
        $i = 1; // 行数
        $handle = @fopen($file, "r");
        if ($handle) {
            while (!feof($handle)) {
                $buffer = fgets($handle, $length);
                if($line == $i) $returnTxt = $buffer;
                $i++;
            }
            fclose($handle);
        }
        return $returnTxt;
    }

	/* 回调函数方法 */
	private function callFunction($classRoute,$uri){
		call_user_func_array(
			array($classRoute, $uri['function']),
			array()
		);
	}

	/* 自动加载方法 */
	private function __autoload($class){
		/* 自动加载命名空间路径 */
		$space = str_replace( '\\', DIRECTORY_SEPARATOR, $class ); 
		$file = __DIR__.'/'.$space.'.php';
		if(file_exists($file)){
			return require_once($file);
		}
		/* 自动加载system/core 核心 */
		$coreFile = __DIR__.'/system/core/'.$class.'.php';
		if(file_exists($coreFile)){
			return require_once($coreFile);
		}
		/* 自动加载service */
			/* debug_backtrace()  用这个php自带函数获取api*/
		if(substr($space,-7)=='Service'){  //截取最后7个字符判断是否Service
			$trace = debug_backtrace();
			$serviceFile = __DIR__.'/api/'.$trace[3]['args'][1]['api'].'/S/'.$class.'.php';
			if(file_exists($serviceFile)){
				return require_once($serviceFile);
			}
		}
	}
}
$init = new Kidphp();

