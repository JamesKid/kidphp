<?php
/* 多国语言框架 */
class Language extends PublicCore{
    /** 
     * 初始化
     */
    public function __construct(){
        $this->initLanguage();
    }
    public function initLanguage($request = ''){
        $request = isset($_SERVER['PATH_INFO'])? $_SERVER['PATH_INFO']:'';   
        if($request != ''){
            $path  = explode('/',$request);
            $language = $path[1]; // 如en, zh
        }
        if(isset($language)){
            $languageList = $GLOBALS['LANGUAGE']['languageList'];
            if(in_array($language,$languageList)){
                $GLOBALS['LANGUAGE']['nowLanguage'] = $language; // 定义语言为当前的语言
                $_SERVER['REQUEST_URI_OLD'] = $_SERVER['REQUEST_URI'];
                $length = count($path);
                if( $length == 2 ){
                    $_SERVER['PATH_TRANSLATED'] = str_replace($language,'',$_SERVER['PATH_TRANSLATED']);
                    $_SERVER['PATH_INFO'] = str_replace($language,'',$_SERVER['PATH_INFO']);
                    $_SERVER['DOCUMENT_URI'] = str_replace('/'.$language,'',$_SERVER['DOCUMENT_URI']);
                    $_SERVER['REQUEST_URI'] = str_replace($language,'',$_SERVER['REQUEST_URI']);
                    $_SERVER['PHP_SELF'] = str_replace('/'.$language,'',$_SERVER['PHP_SELF']);
                }else if($length > 2){
                    $_SERVER['PATH_TRANSLATED'] = str_replace('/'.$language,'',$_SERVER['PATH_TRANSLATED']);
                    $_SERVER['PATH_INFO'] = str_replace('/'.$language,'',$_SERVER['PATH_INFO']);
                    $_SERVER['DOCUMENT_URI'] = str_replace('/'.$language,'',$_SERVER['DOCUMENT_URI']);
                    $_SERVER['REQUEST_URI'] = str_replace('/'.$language,'',$_SERVER['REQUEST_URI']);
                    $_SERVER['PHP_SELF'] = str_replace('/'.$language,'',$_SERVER['PHP_SELF']);
                }
            }
        }
        $_SERVER['LANGUAGE'] = $GLOBALS['LANGUAGE']['nowLanguage'];
        print_r($_SERVER);die;


    }

}
