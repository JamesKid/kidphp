### ========================== vimkid.com =================================
### @author      : vimkid  
### @description : 说明文档
### =======================================================================

#### 框架宗旨
    满足敏捷开发，安全，设计需求的情况下追求性能的极致。


#### 开发框架结构:  MVCZSPL ( MVC + ZSPL )
    本框架为MVC上的再构造,根据使用情况延伸出SPL结构
    M:     数据 Model 层, 数据结构及逻辑
    V:     表现 View 层, 页面分离
    C:     控制 Controller 层,基础逻辑控制
    Z:     禅意 Zen  层,禅意层，更高层面利用,还没想好要怎么用
    S:     服务 Service 层,调用各类服务
    P:     公共 Public 方法层, 公用方法
    L:     常用 Lib  库方法层

    这样分离是为了提高可用性，以及重复代码的利用，使代码更易维护
    你可以把MVCZSPL理解为MVC真是漂亮

#### 性能要点
    一. 减少方法调用范围
        1.能通过服务器配置的，就不用方法去调用
        2.能通过规范去实现的，就不用方法去调用

    二. 减少方法调用频率
        1. 同样的处理后面有调用，请在前面就用方法处理好,不要每步操作都调用方法
        2. 将数据库链接构造成单例模式

    三. 借助工具查看性能
        1. xhprof
        2. ab 命令
        3. dstat 命令

#### 安全要点
    1. 判断是否登录
    2. 判断来源,可用HTTP_REFER 或token 机制防止CSRF攻击
    3. 控制操作权限,防止越权
    4. 过滤特殊字符
    5. 控制访问频率，防止DOS攻击
    6. 敏感内容加密
    7. php.ini安全

#### 要点说明
    1. 为了性能考虑,mysql框架中没用set utf8,如果数据库乱码，请按下列方法处理:
        vim /etc/my.cnf
            [client]
            default-character-set=utf8
            [mysqld]
            default-character-set=utf8
        service mysqld restart  #  重启mysql服务器
            
            
        
#### 环境配置
    /env.txt
        test     # 测试环境
        online   # 线上环境

#### 配置文件路径
    /conf/conf_环境.php

#### composer 配置
    http://docs.phpcomposer.com/03-cli.html  # composer命令行地址
    composer install --no-dev   # 不安装require-dev下的包,线上环境

#### 框架思想抽象
                      -------------
                      |获取环境配置|
                      -------------
    测试环境-----     test /      \ online    -------线上环境
                    --------      |
    性能监控-----   |xhprof|      | 
                    --------      | 
                       |          |
                    --------      |
    错误监控-----   |Whoops|      |
                    --------      |
                       |          |
                    --------      |
    调试方法-----   |调试类|      |
                    --------      |
                        \        /
                        ----------
                        |自动加载|    
                        ----------
                            |
                        ----------
                        |安全框架|      ---------- 控制框架安全
                        ----------
                            |
                        ----------
                        |访客框架|      ---------- 记录访客
                        ----------
                            |
                        ----------
                        |路由框架|      ---------- 框架路由器
                        ----------
                            |
                      --------------
                      |静态缓存框架|    ---------- 静态缓存调用
                      --------------
                            |
                        ----------
                        |具体实现|      ---------- 功能实现
                        ----------

#### 常用包(Useful package) http://packagist.org
    overtrue/wechat          # 微信sdk
    lokielse/omnipay-alipay  # 支付宝sdk
    phpoffice/phpword        # office库,A pure PHP library for reading and writing word









    
