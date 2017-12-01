<?php
/* 环境配置
 *     test    测试环境
 *     online  线上环境
 *
 * php.ini安全 (根据环境定义在Env.php文件中)
 *     open_basedir       # 不定义可能会存在文件包含漏洞
 *     safe_mode          # 安全模式
 *     disable_functions  # 禁止危险函数
 *     short_open_tag     # 打开会更安全,参照http://www.91ri.org/2758.html
 */
class Env {
    /** 初始化方法
     */
    public function __construct($env){
        $this->configEnv($env);
    }

    /* 配置不同环境的安全配置 */
    public function configEnv($env){
        if($env == "test"){
            //echo '<div style="background-color:#f00;color:#fff">当前为测试环境， 
                //不具备安全性,如上线请将根目录下env.txt文件第一行test改为online</div>'; // 提示当前在测试环境
            ini_set('display_errors',1);           // 显示错误信息
            ini_set('display_startup_errors',1);   // 打开调试
            ini_set("allow_url_fopen","Off");     //关闭fopen
            ini_set("allow_url_include","Off");   // 关闭include
            error_reporting(E_ALL);                // 报告所有错误
            ini_set("log_errors","On");   // 打开日志记录
            ini_set("log_errors_max_len","1024");   // 设置每个日志项的最大长度   
            ini_set("error_log","/var/log/www/vimkid/".date("Y-m-d")."-error.log");  // 设置日志路径
        }else if($env == 'online'){
            ini_set('display_errors',0);           // 不显示错误信息
            ini_set('display_startup_errors',0);   // 关闭调试
            error_reporting(E_ALL);                    // 错误报告级别
            ini_set('disable_functions',system);   // 关闭system函数,有风险
            ini_set('expose_php','Off');
            ini_set("allow_url_fopen","Off");     //关闭fopen
            ini_set("allow_url_include","Off");   // 关闭include
            ini_set("allow_url_include","Off");   // 关闭include
            ini_set("log_errors","On");   // 打开日志记录
            ini_set("log_errors_max_len","1024");   // 设置每个日志项的最大长度   
            ini_set("error_log","/var/log/www/vimkid/".date("Y-m-d")."-error.log"); // 设置日志路径
        }else{
            echo '<div style="background-color:#f00;color:#fff">当前未配置环境,请在根目录下添加env.txt文件第一行添加test或online,test 为测试环境，online为线上环境</div>'; // 提示当前在测试环境
            exit;
        }

    }
    /* error_reporting
     * 1 E_ERROR 致命的运行错误。错误无法恢复，暂停执行脚本。
     * 2 E_WARNING 运行时警告(非致命性错误)。非致命的运行错误，脚本执行不会停止。
     * 4 E_PARSE 编译时解析错误。解析错误只由分析器产生。
     * 8 E_NOTICE 运行时提醒(这些经常是你代码中的bug引起的，也可能是有意的行为造成的。)
     * 16 E_CORE_ERROR PHP启动时初始化过程中的致命错误。
     * 32 E_CORE_WARNING PHP启动时初始化过程中的警告(非致命性错)。
     * 64 E_COMPILE_ERROR 编译时致命性错。这就像由Zend脚本引擎生成了一个E_ERROR。
     * 128 E_COMPILE_WARNING 编译时警告(非致命性错)。这就像由Zend脚本引擎生成了一个E_WARNING警告。
     * 256 E_USER_ERROR 用户自定义的错误消息。这就像由使用PHP函数trigger_error（程序员设置E_ERROR）
     * 512 E_USER_WARNING 用户自定义的警告消息。这就像由使用PHP函数trigger_error（程序员设定的一个E_WARNING警告）
     * 1024 E_USER_NOTICE 用户自定义的提醒消息。这就像一个由使用PHP函数trigger_error（程序员一个E_NOTICE集）
     * 2048 E_STRICT 编码标准化警告。允许PHP建议如何修改代码以确保最佳的互操作性向前兼容性。
     * 4096 E_RECOVERABLE_ERROR 开捕致命错误。这就像一个E_ERROR，但可以通过用户定义的处理捕获（又见set_error_handler（））
     * 8191 E_ALL 所有的错误和警告(不包括 E_STRICT) (E_STRICT will be part of E_ALL as of PHP 6.0)
     */
}
