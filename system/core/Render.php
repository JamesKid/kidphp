<?php
class Render extends PublicCore{
    public static function renderTpl($tpl,$params='',$api='show'){
        $viewDirectory=$_SERVER['DOCUMENT_ROOT'];
        $viewDirectory = $viewDirectory.'/api/'.$api.'/V/'.$tpl; // 获取你级目录

        ob_start(); //开启缓存区  
        require_once($viewDirectory); // 将静态文件放入缓存区
        $url = $_SERVER['REQUEST_URI'];
        $staticUrl = PublicCore::getRequestUriFetch();
        //file_put_contents($viewDirectory.'/system/page_cache/'.$staticUrl, ob_get_contents());
        file_put_contents($staticUrl, ob_get_contents());
    }
}
