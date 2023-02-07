<?php
/* 
 * 安全模块 
 *
 * 安全原则
 *     1. 过滤输入,过滤输出
 *     2. 避免动态包含
 *     3. xsrf
 *     4. js请求本域认证
 *     5. ddos,同一ip频繁请求次数控制
 *     6. php.ini安全选项
 *     7. 过载保护
 *     8. 敏感参数加密
 *     9. 最小暴露原则
 *    10. 记录用户行为
 *
 * 安全扫描工具
 *     skipfish  # google的一款强大的网站安全扫描软件
 *
 * php.ini安全 (根据环境定义在Env.php文件中)
 *     open_basedir       # 不定义可能会存在文件包含漏洞
 *     safe_mode          # 安全模式
 *     disable_functions  # 禁止危险函数
 *     short_open_tag     # 打开会更安全,参照http://www.91ri.org/2758.html
 *  
 */
class Secure extends PublicCore{
    /** 初始化路由
     */
    public function __construct(){
        $this->checkUrl();
    }

    /* url地址安全检测 */
    public function checkUrl(){
        $requestUri = $_SERVER['REQUEST_URI'];
        $url = $requestUri;
        $url = str_replace('/', '', $url);
        $url = str_replace('?', '', $url);
        $url = str_replace('&', '', $url);
        $url = str_replace('.', '', $url);
        $url = str_replace('=', '', $url);
        $url = str_replace('%', '', $url);
        $url = str_replace('-', '', $url);
        $url = str_replace('_', '', $url);
        $url = str_replace(',', '', $url);
        // 如果除了/ ? & = . 还有其他特殊字符，则重新跳转
        if(!$this->onlyLettersOrDigits($url) && $url!=''){
            $ipInfo = $this->getIpInfo(); // 从父类PublicCore中获取ip信息
            $ip = $ipInfo->GetIpIn(); // 获取ip
            $address = $this->getAddress($ip); // 获取地址
            $os = $ipInfo->GetOs();

            $content = date('Y-m-d H:i:s',time()).'  '
                .$ip.'  '
                .$os.'  '
                .$address['ip_country'].'.'.$address['ip_province'].'.'.$address['ip_province'].'   '
                .$requestUri.'  '
                ."\n";
            file_put_contents('/var/log/www/'.$GLOBALS['CONFIG']['PROJECT_NAME'].'/black.txt',$content,FILE_APPEND); // 保存
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/tips.html');
            exit;
        }

    }

    /* 检测只包含数字或字母 */
    public static function onlyLettersOrDigits($string){
        if (ctype_alnum($string)) {
            return true; // 只包含数字或字母
        } else {
            return false;  // 有其他符号
        }
    }
}
