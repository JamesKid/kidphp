<?php
class Check {

  /* 检查路由是否有效,无效返回false(或返回404) */
    public function checkRoute($classPath,$uri){
        $sign = 0;
        //检查是否有controller (class)
        if (is_file($classPath)) {
            require_once($classPath);
        } else {
            return false;//跳转到404页面
            exit();
        }
        //检查是否有function,get_class_methods方法需要require class进来才有效
        $functionList = get_class_methods($uri['class'].'Controller');
        foreach ($functionList as $value) {
            if (strtolower($value) == strtolower($uri['function'])) {
                $sign = 1;
            }
        } 
        if($sign){
            return true;
        } else{
            return false;//跳转到404页面
            exit();
        }
    }
}
?>
