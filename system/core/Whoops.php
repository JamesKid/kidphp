
<?php
/* 
 * Whoops查错模块 
 */
use Whoops\Handler\PrettyPageHandler;
use Whoops\Handler\JsonResponseHandler;
class Whoops extends PublicCore{

    public function __construct($env){
        $this->initWhoops($env);
    }

    public function initWhoops($env){
        try{
            if($env == 'test'){
                $whoops = new \Whoops\Run();
                $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
                $whoops->register();
            }
        }catch(Exception $e){
            //error_log(date('Y-m-d H:i:s')."\n",3,'/var/log/www/vimkid/'.date('Y-m-d').'.log');
        }
    }
}
