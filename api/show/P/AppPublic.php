<?php
class AppPublic{
    public function render($tpl,$params){
        $viewDirectory=__DIR__;
        $viewDirectory = substr($viewDirectory,0,strlen($viewDirectory)-1); // 获取你级目录
        require_once($viewDirectory.'V/'.ucfirst($tpl).'View.php');
    }
}
?>
