<?php
//static $config=array(
$GLOBALS['CONFIG'] = array(
    'PROJECT_NAME'=>'vimkid',        // 项目名
    'KEY'=>'leichxpeHEHN',        // 加密字符串
    'DOMAIN'=>'www.vimkid.com',        // 项目域名
    'PAGECACHE_STATUS'=>'close',        // 是否打开文件缓存 open 打开,close关闭
    'MEMCACHED_STATUS'=>'close',        // 是否打开文件缓存 open 打开,close关闭
    'OPEN_AI_KEY'=>'wewewewewewe',
    'DB'=>array(
        'READ'=>array(
            'DB_NAME'=>'vimkid',
            'DB_USER'=>'root',
            'DB_PASSWORD'=>'123456',
            'DB_PORT'=>'3306'
        ),
        'WRITE'=>array(
            'DB_NAME'=>'vimkid',
            'DB_USER'=>'root',
            'DB_PASSWORD'=>'123456',
            'DB_PORT'=>'3306'
        ),
        'IP'=>array(
            'DB_NAME'=>'ip',
            'DB_USER'=>'root',
            'DB_PASSWORD'=>'123456',
            'DB_PORT'=>'3306'
        ),
        'DB_SLAVE'=>false,    // 是否支持主从
        'MASTER'=>array(
            '0'=> array(
                'IP'=>'192.168.1.32',
                'PORT'=>'3306',
                'USER'=>'root',
                'PASSWORD'=>'232323',
            )
        ),    // 主库ip
        'SLAVE'=>array(
            '0'=> array(
                'IP'=>'192.168.1.33',
                'PORT'=>'3306',
                'USER'=>'root',
                'PASSWORD'=>'232323',
            ),
            '1'=> array(
                'IP'=>'192.168.1.33',
                'PORT'=>'3306',
                'USER'=>'root',
                'PASSWORD'=>'232323',
            )
        ),    // 从库ip
        'DB_TABLE_HEAD'=>'vimkid', //数据库表前缀
    ),
    'MEMCACHED'=>array(
        'MASTER'=>array(
            '0'=>array(
                'IP'=>'127.0.0.1',
                'PORT'=>'11211',
                'USER'=>'root',
                'PASSWORD'=>'232323',
            ),
        ),
        'SLAVE'=>array(
            '0'=>array(
                'IP'=>'192.168.1.33',
                'PORT'=>'11211',
                'USER'=>'root',
                'PASSWORD'=>'232323',
            ),
        ),
    ),
    'ROUTE'=>array(
        'DEFAULT_API'=>'show',
    ),
    'IMAGESURL'=>array(
        'SERVER1'=>'https://raw.githubusercontent.com/vimkidgit/article/master/images/',
        'SERVER2'=>'http://www.vimkid.com/public/images/',
        'SERVER2'=>'http://images.vimkid.com/images/',
    ),
);
/*
$config['APPPATH']=trim(__DIR__,'/');     
//全局开关
$config['IP_STATUS']=false; //IP获取地址状态
$config['LANG_OPEN']=false; //多国语言开关
$config['URL_HTML_MODEL']='2'; //伪静态样式

//模板设置
$config['TPL_TEMPLATE_PATH']='themes/frl/';//模板目录，一般不需要修改
$config['TPL_INDEX']='index.html';
$config['TPL_COMMON']='common.html';
$config['TPL_TAGS']='tags.html';
$config['TPL_TAGS_PAGE']=20;
$config['TPL_TAGS_INDEX']='tags_index.html';
$config['TPL_TAGS_INDEX_PAGE']=20;
$config['TPL_SEARCH']='srarch.html';
$config['TPL_SEARCH_PAGE']=20;

//手机设置
$config['MOBILE_OPEN']=false; //手机版开关
$config['MOBILE_DOMAIN']='';

//上传设置
$config['ACCESSPRY_SIZE']=500; //附件大小，单位M
$config['ACCESSPRY_NUM']=300; //上传数量
$config['ACCESSPRY_TYPE']='jpg,bmp,gif,png,flv,mp4,mp3,wma,mp4,7z,zip,rar,ppt,txt,pdf,xls,doc,swf,wmv,avi,rmvb,rm';//上传格式
$config['THUMBNAIL_SWIHCH']=true; //是否缩图
$config['THUMBNAIL_MAXWIDTH']=210; //缩图最大宽度
$config['THUMBNAIL_MAXHIGHT']=110; //最大高度
$config['WATERMARK_SWITCH']=false; //是否打水印
$config['WATERMARK_PLACE']=5; //水印位置
$config['WATERMARK_IMAGE']='logo.png'; //水印图片
$config['WATERMARK_CUTOUT']=true; //缩图方式

//调试配置
$config['DEBUG']=true;	//是否开启调试模式，true开启，false关闭
$config['ERROR_HANDLE']=true;//是否启动CP内置的错误处理，如果开启了xdebug，建议设置为false

//伪静态
$config['URL_REWRITE_ON']=false;//是否开启重写，true开启重写,false关闭重写
$config['URL_MODULE_DEPR']='/';//模块分隔符
$config['URL_ACTION_DEPR']='/';//操作分隔符
$config['URL_PARAM_DEPR']='-';//参数分隔符
$config['URL_HTTP_HOST']='';//设置网址域名特殊

//静态缓存
$config['HTML_CACHE_ON']=false;//是否开启静态页面缓存，true开启.false关闭
$config['HTML_CACHE_RULE']['index']['*']=5000;//缓存时间,单位：秒
$config['HTML_CACHE_RULE']['empty']['*']=5000;//缓存时间,单位：秒
$config['HTML_CACHE_RULE']['search']['*']=5000;//缓存时间,单位：秒
//数据库设置
$config['DB_CACHE_ON']=false;//是否开启数据库缓存，true开启，false不开启
$config['DB_CACHE_TYPE']='FileCache';///缓存类型，FileCache或Memcache或SaeMemcache

//模板缓存
$config['TPL_CACHE_ON']=false;//是否开启模板缓存，true开启,false不开启
$config['TPL_CACHE_TYPE']='';//数据缓存类型，为空或Memcache或SaeMemcache，其中为空为普通文件缓存

//多国语言
$config['LANG_PACK_PATH']='./lang/';//语言包目录

//插件配置                 
$config['PLUGIN_PATH']='./plugins/';//插件目录                 
$config['PLUGIN_SUFFIX']='Plugin.class.php';//插件模块后缀
$config['LANG_DEFAULT']='zh';

//附加
$config['AUTHO_KEY']='000-000-000';
$config['KEY']='XDcFdsfeERWQ';
 */
