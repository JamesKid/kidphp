<?php
class Language extends PublicCore{
    /** 初始化路由
     */
    public function __construct(){
        $this->initLanguage();
    }
    public function initLanguage($request = ''){
        if(isset($_COOKIE['language'])){
            $language = $_COOKIE['language'];
            $GLOBALS['LANGUAGE']['nowLanguage'] = $language;
        } 
    }

}
