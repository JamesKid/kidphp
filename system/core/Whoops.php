
<?php
/* 
 * Whoops查错模块 
 */
use Whoops\Handler\PrettyPageHandler;
use Whoops\Handler\JsonResponseHandler;
class Whoops extends PublicCore{
	/** 初始化路由
	 */
	public function __construct(){
        $this->initWhoops();
	}

    /* url地址安全检测 */
	public function initWhoops(){
        try {
            $whoops = new \Whoops\Run();
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
            $whoops->register();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
	}
}
