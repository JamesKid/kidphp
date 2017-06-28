<?php
class Render {
    public static function renderTpl($tpl,$params='',$api='show'){
        $viewDirectory=$_SERVER['DOCUMENT_ROOT'];
        $viewDirectory = $viewDirectory.'/api/'.$api.'/V/'.$tpl; // 获取你级目录
        ob_start(); //开启缓存区  
        require_once($viewDirectory); // 将文件放入缓存区
        $url = $_SERVER['REQUEST_URI'];
        if($url == '/'){
            $url = '/index.html';
        }
        file_put_contents('/var/www/vimkid/system/page_cache'.$url, ob_get_contents());
    }
}
