<?php
class Render {
    public static function renderTpl($tpl,$params='',$api='show'){
        $viewDirectory=$_SERVER['DOCUMENT_ROOT'];
        $viewDirectory = $viewDirectory.'/api/'.$api.'/V/'.$tpl; // 获取你级目录
        require_once($viewDirectory);
    }
}
