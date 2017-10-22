<?php
class PageCache extends PublicCore{
    public function __construct(){
        
        if($GLOBALS['CONFIG']['PAGECACHE_STATUS'] == 'close'){ // 如果示打开收不读取缓存
           return;
        }
        if($_SERVER['REQUEST_URI'] != '/'){
            $staticUrl = PublicCore::getRequestUriFetch();
            //if(is_file($staticUrl) && (time()-filemtime($staticUrl)) < 3000) {//设置缓时间, 检查文件是否存在
            if(is_file($staticUrl)){// 检查文件是否存在
                require_once($staticUrl);exit; // 如果静态缓存存在，则返回内容，结束
            } 
        }
    }
}
