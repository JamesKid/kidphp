<?php
$GLOBALS['LANGUAGE'] = array(
    'nowLanguage' => 'en',  // 当前默认语言
    'languageList' => array( // 支持的语言列表
        'zh',
        'en',
    ),
    'vimCategory'=>array(   // vim 目录
        'vimuse'=>array(
            'link'=> '/vimuse',
            'languageList'=>array(
                'en'=>'Vim Use',
                'zh'=>'Vim基本使用',
            ),
        ),
        'vimplugin'=>array(
            'link'=> '/vimplugin',
            'languageList'=>array(
                'en'=>'Vim Plugin',
                'zh'=>'Vim插件',
            ),
        ),
        'vimmanual'=>array(
            'link'=> '/vimmanual',
            'languageList'=>array(
                'en'=>'Vim Manual Read',
                'zh'=>'Vim手册解读',
            ),
        ),
        'vimconfig'=>array(
            'link'=> '/vimconfig',
            'languageList'=>array(
                'en'=>'Vim Config',
                'zh'=>'Vim配置',
            ),
        ),
        'vimlearn'=>array(
            'link'=> '/vimlearn',
            'languageList'=>array(
                'en'=>'Vim Learn Tips',
                'zh'=>'Vim学习Tips',
            ),
        ),

    ),
    'mainCategory'=>array(   // 主目录
        'index'=>array(
            'link'=> '/',
            'languageList'=>array(
                'en'=>'Home',
                'zh'=>'首页',
            ),
        ),
        'others'=>array(
            'link'=> '/others',
            'languageList'=>array(
                'en'=>'Others',
                'zh'=>'其他',
            ),
        ),
        'about'=>array(
            'link'=> '/about.html',
            'languageList'=>array(
                'en'=>'About Us',
                'zh'=>'关于我们',
            ),
        ),
        'downloads'=>array(
            'link'=> '/wait/index',
            'languageList'=>array(
                'en'=>'Downloads',
                'zh'=>'下载',
            ),
        ),
    ),
    'titles'=>array(   // 标题
        'news'=> array(
            'en'=>'News',
            'zh'=>'站点新闻',
        ),
        'articles'=> array(
            'en'=>'Articles',
            'zh'=>'最新文章',
        ),
        'randomTags'=> array( 
            'en'=>'RandomTags',
            'zh'=>'随机标签',
        ),
        'randomArticles'=> array( 
            'en'=>'RandomArticles',
            'zh'=>'随机文章',
        ),
        'aboutOthers'=> array( 
            'en'=>'About Others',
            'zh'=>'其他栏目介绍',
        ),
        'aboutUs'=> array( 
            'en'=>'About Us',
            'zh'=>'关于我们',
        ),
        'hot'=> array( 
            'en'=>'Hot',
            'zh'=>'热门内容',
        ),
        'tips'=> array( 
            'en'=>'Tips',
            'zh'=>'提示信息',
        ),
    ),
    'status'=>array(   // 状态
        'updateTime'=> array(
            'en'=>'Update',
            'zh'=>'更新时间',
        ),
        'createTime'=> array(
            'en'=>'Create',
            'zh'=>'创建时间',
        ),
        'visit'=> array(
            'en'=>'Views',
            'zh'=>'访问量',
        ),
        'tags'=> array(
            'en'=>'Tags',
            'zh'=>'标签',
        ),
    ),
    // 栏目介绍
    'description'=>array(   
        'others'=> array(
            'en'=>'This part of content is about some technology except vim, such as linux, php, mysql, algorithm, 
                    math, Remix, guitar, and so on. You can select the categories you interested in.',
            'zh'=>'本栏目主要介绍除vim技术外的一些技术，如linux,php,mysql,algorithm(算法),math(数学),
                   Remix(混音),吉它等,请在菜单选择感兴趣的主题进入相关文章',
        ),
        'aboutUs'=> array(
            'en'=>'This is the vim technology sharing website. Sharing of vim config, vim script, vim plugin and so on.
                    Otherwise, there are also something other interesting categories, like Linux, shell, zzsh, tmux, git,
                    php, python, go, and so on. If you have any issue, you can contact me as showed below',
            'zh'=>'本站为vim技术分享网站 ，分享各种vim配置,vim脚本开发技术，和有趣强大的vim插件，
                   当然除此之外还有其他诸如linux,shell,zsh,tmux,git,php,python,go语言等其他技术 ，但主要还是vim分享. 有问题或意见可以联系作者: ',
        ),
        'blog'=> array(
            'en'=>'Sina micro-blog',
            'zh'=>'新浪微博'
        )
    ),
);
