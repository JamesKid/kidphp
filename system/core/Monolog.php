
<?php
/* 
 * Monolog日志记录系统
 */
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
class Monolog extends PublicCore{
    public function __construct($env){
        $this->initMonolog($env);
    }

    public function initMonolog($env){
        $log = new Logger('vimkid');
        $log->pushHandler(new StreamHandler('/var/log/www/vimkid/your.log', Logger::WARNING));
        $log->warning('Foo');$log->error('Bar');
    }
}
