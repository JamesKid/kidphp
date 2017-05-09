# ============vimkid=========
# @author      : vimkid  
# @description : 说明文档
# ===========================

#### 框架宗旨
    满足敏捷开发，安全，设计需求的情况下追求性能的极致。

#### 性能要点
    一. 减少方法调用范围
        1.能通过服务器配置的，就不用方法去调用
        2.能通过规范去实现的，就不用方法去调用

    二. 减少方法调用频率
        1.同样的处理后面有调用，请在前面就用方法处理好,不要每步操作都调用方法

    三. 借助工具查看性能
        1. xhprof
        2. ab 命令
        3. dstat 命令

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
