##### =============================== vimkid.com ==============================================
##### @author       : VimKid  
##### @title        : kidphp framework
##### @description  : This is a web frame edit by vimkid ,this program is free, and totaliy
#####                  support php7! and you can redistribute it and  modify it under the 
#####                  terms of the original BSD license.
##### @框架方向     : 高性能，高并发，高安全，高复用，强监控，开发敏捷，可负载均衡,易部署的框架
##### =========================================================================================

### 更新
    2016.04.14 19:00: add program  
    2016.04.14 19:07: add route   
    2016.04.14 18:19: add config 
    2016.04.14 18:19: add config  
    2016.04.19 19:19: add Views  
    2016.05.27 19:19: add autoload 
    2016.05.28 19:19: add sitemap
    2016.05.29 19:19: add nginx rewrite and nginx config
    2016.06.01 19:19: add debug_backtrace()函数回溯取到api,然后自动加载Service!
    2017.01.20 19:19: add 访问监控
    2017.04.20 19:19: add 主机监控
    2017.04.24 19:19: add memcache模块
    2017.09.21 21:19: add phpunit单元测试
    2017.10.18 21:19: add 多国语言框架,目前有en,zh, 英语和中文支持
    2017.10.19 21:19: fix 缓存为多国语言页面缓存
    2017.11.06 21:19: del 删除api设计，因为好做项目分离，减轻项目负载,便于项目管理
    2017.12.07 21:19: fix 考虑到数据库密码安全性,转移config_online.php配置文件到一个软链接上

### 待加功能
  1. 阅读量，发布时间，更新时间  (Mission complete)
  2. mysql主从，mysql mongodb数据同步
  3. git钩子自动推送代码
  4. 标签设计
  5. 中英版设计 (Mission complete! )
  6. composer 机制引入 (Mission complete! )
  7. 单元测试  (Mission complete! )
  8. 统计chart图
  9. 站点安全检测脚本机制
 10. 站点健康状态监控 (Mission complete! )
 11. 文章灵活快速上传或管理
 12. 站点脚本化部署和管理
 13. 点赞系统
 14. 评论系统(考虑中英或不考虑？,需加验证码,现成的评论框架?集成选择化？)
     名字,邮件,内容,网址
 15. 用户登录系统 (集成选择化?)
 16. 添加自动化部署脚本(进行中)
 17. 开通csdn,新浪微博,cnblog,简书等技术博客发布文章,将流量引流到vimkid上
 18. php脚本自动化一健创建基础项目,基础数据库，基础核心, 基础demo,只有一个kidphp.sh文件
        kidphp.sh
            mkdir /var/kidphp/
            cd /var/kidphp/
            git clone gitub.com/jameskid/kidphp/
            sh install.sh        ( Mission complete ! 2017.11.10 )
 19. 添加一个配置中心项目,config,统一走配置中心
 20. 添加置顶文章功能
 21. 自动扫描article更新文章脚本
 22. 日志系统    (Mission complete ! 2017.11.25)
 23. 双机热备,双机热切换
 24. 显示站点每秒并发,每分钟并发,每小时并发,日并发
 25. 建立一个vim爱好者社区,贡献文章的志愿者社区
 26. 数据库自动备份,自动部署方案,双活动结构,每次有新的语句提交,自动化部署上线前前要提前执行好
 27. 添加文章或内容搜索功能,记录搜索记录
 28. 添加提问版块,可搜索问题,记录搜索记录 !!!!!

### 零散事务
    1. 修改时间字段为timestamp或bigint,而不是用int,避免2038年问题
    2. 中英版seo友好路由设计 (Mission complete! 2017.12.3)
    3. 上一篇下一篇
    4. 相似文章
    5. 随机文章(文章多了可以做)
    6. 修改英文版样式，使之更好看些
    7. htanginx 智能目录读取 (Mission complete! 2017.12.1)
    8. 重构目录   (Mission complete! 2017.11.20)
    9. 将围棋程序象棋程序拆分出来，弄成一个开源框架
   10. 将frl用本框架进行重构
   11. 将mysql调用改成单例模式
   12. 将config_online.php 转移( Mission complete! )
 
### 值得学习借鉴的框架
    SilverStripe
    Symfony


