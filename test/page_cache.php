<?php
if(is_file('/var/www/vimkid/system/page_cache/test.html') && (time() - filemtime('/var/www/vimkid/system/page_cache/test.html')) < 300) { //设置缓存失效时间  
    require_once('/var/www/vimkid/system/page_cache/test.html');  
} else {  
    ob_start(); //开启缓存区  
    require_once('test.php'); //动态文件    singwa.php界面同样进过缓冲区  
    file_put_contents('/var/www/vimkid/system/page_cache/test.html', ob_get_contents());

}
?>
