<?php
/*
 * 路由，多国语言路由
 */
class Route extends PublicCore{
    /** 初始化路由
     */
    public function __construct(){
    }
    public function initRoute($request = ''){
        //获得请求地址
        $root = $_SERVER['SCRIPT_NAME'];  
        if($request ==''){
            $request = $_SERVER['PHP_SELF'];   
        }else {
            $request = str_replace('http://','',$request);
            $request = str_replace($_SERVER['HTTP_HOST'],'',$request);
        }
        //$position = strpos($request,'?');//获取问号位置
        //if($position)
        //    $request = substr($request,0,$position); //删除问号后内容
        // 过滤地址,过滤第一个斜杠  
        $url = trim(str_replace($root,'', $request),'/');   
        $uri = $this->getControllerFunction($url);
        return $uri;
    }

    /**
     * 截取 controler 和function
     *
     **/
    public function getControllerFunction($url){
        $controlFuction = array();
        if(empty($url)){  
            // 默认控制器和默认方法  
            $controlFuction['class'] = 'Index';  
            $controlFuction['function'] = 'index';  
        }else {  
            $uri = explode('/', $url);  
            if (count($uri) == 2)  {  
                $controlFuction['class'] = ucfirst($uri[0]);  
                $controlFuction['function'] = $uri[1];  
            } else if (count($uri) == 1)  {  
                $controlFuction['class'] = ucfirst($uri[0]);  
                $controlFuction['function'] = 'index';  
            } else {  
                $controlFuction['class'] = ucfirst($uri[1]);  
                $controlFuction['function'] = $uri[2];  
            }  
        }  
        return $controlFuction;
    }
}
