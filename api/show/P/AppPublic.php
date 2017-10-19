<?php
class AppPublic{
    public function render($tpl,$params){
        $viewDirectory=__DIR__;
        $viewDirectory = substr($viewDirectory,0,strlen($viewDirectory)-1); // 获取你级目录
        require_once($viewDirectory.'V/'.ucfirst($tpl).'View.php');
    }

    /* 检查是否来自本域 */
    public function checkFrom(){
        if(!isset($_SERVER['HTTP_REFERER'])){
            return false;
        }
        if($_SERVER['HTTP_REFERER'] != $GLOBALS['CONFIG']['DOMAIN']){
            return false;
        }
        return true;
    }

    /* 安全获取GET,POST */
    public function getStr($string){
        $string = $this->public_safe_replace($string);  
        $string = addslashes($string);  
        return $string;  
    }

    /** 
     * 安全过滤函数 
     */  
    public function public_safe_replace($string)  
    {  
        $string = str_replace('%20','',$string);  
        $string = str_replace('%27','',$string);  
        $string = str_replace('%2527','',$string);  
        $string = str_replace('*','',$string);  
        $string = str_replace('"','"',$string);  
        $string = str_replace("'",'',$string);  
        $string = str_replace('"','',$string);  
        $string = str_replace(';','',$string);  
        $string = str_replace('<','<',$string);  
        $string = str_replace('>','>',$string);  
        $string = str_replace("{",'',$string);  
        $string = str_replace('}','',$string);  
        return $string;  
    }  
}
