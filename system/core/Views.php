<?php
class view{ 
    //视图类型 default / wap 
    public static $view_type = null; 
     
    public function __construct(){ 
        ob_start(); 
    } 
     
    public function finish(){ 
        $content = ob_get_contents(); 
        return $content; 
    } 
     
    public static function set_view_type(){ 
        switch(true){ 
            case stripos($_SERVER['HTTP_USER_AGENT'], 'Windows CE') !== FALSE : self::$view_type = 'wap'; break; 
            default : self::$view_type = 'default'; 
        } 
    } 
     
    public static function show($location , $param = array()){ 
        if(is_null(self::$view_type)){ 
            self::set_view_type(); 
        } 
        $view = SIMPLE_PATH . '/view/' . self::$view_type . '/' . $location; 
        extract($param, EXTR_OVERWRITE); 
        ob_start(); 
        file_exists($view) ? require $view : exit($view . ' 不存在'); 
        $content = ob_get_contents(); 
        return $content; 
    } 
} 
?>
