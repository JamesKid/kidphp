/*!40101 SET NAMES utf8 */;
use vimkid;
INSERT INTO 
    `vimkid_article` (
        `article_id`,
        `subcategory`,
        `visit`,
        `status`,
        `categoryname`,
        `check`,
        `createtimeymd`,
        `link`,
        `type`,
        `createtime`,
        `updatetime`,
        `updatetimeymd`,
        `username`,
        `user_id`,
        `images`,
        `recommend`,
        `source`,
        `sort`,
        `categoryid`,
        `bvarchar`,
        `bint`,
        `up`,
        `comment`,
        `start`
    ) VALUES (
        12,    /* article_id */
        'vimbasicusage', /* subcategory */
        0,      /* visit */
        1,      /* status */
        'vim',  /* categoryname */
        1,      /* check */
        '2017-12-03',  /* createtimeymd */
        'content',     /* link */
        0,             /* type */
        1512307409,    /* createtime */
        1512307409,    /* updatetime */
        '2017-12-03',  /* updatetimeymd */
        'vimkid',      /* username */
        1,       /* user_id */
        NULL,    /* images */
        0,       /* recommend */
        '0',     /* source */
        0,       /* sort */
        0,       /* categoryid */
        NULL,    /* bvarchar */
        NULL,    /* bint */
        0,       /* up */
        0,       /* comment */
        NULL     /* start */
    );
INSERT INTO 
    `vimkid_article_content_en` (
        `article_id`,
        `content`
    ) VALUES (
        12,
        '#### Vim file encryption\n\n><b>Desciption</b><br>\n    :X  is a command at vim command mode, it can encrypt the file to a secure way.\n\n###### Command\n    :X     # encrypt file command\n\n###### Encryption\n    vim test.txt  # making a new file\n        test      # input your content\n    :X            # input password to encrypt file\n    :wq           # save and exit\n\n###### Decryption\n    vim test.txt  # input password to decrypt file\n\n###### Delete the passsword\n    vim test.txt  # input password decrypt the file\n    :X            # input a null password\n\n><b>Tips</b><br>\n    There are have cached in NerdThree plugin, please use :wq to exit file and nerdtree, then, you can see the encrypt file.\n'
    );

INSERT INTO 
    `vimkid_article_content_zh` (
        `article_id`,
        `content`
    ) VALUES (
        12,
        '#### vim对文件加密\n\n><b>Desciption</b><br>\n    :X  是vim下的对称加密命令,可对文件加密成二进制文件变成密文\n\n###### 文件加密命令 \n    :X     # 加密文件\n\n###### 加密\n    vim test.txt  # 新建一个文件\n        test      # 输入内容\n    :X            # 输入密码,加密文件\n    :wq           # 保存退出\n\n###### 解密\n    vim test.txt  # 输入密码,解密文件\n\n###### 将密码置空\n    vim test.txt  # 输入密码,解密文件\n    :X            # 输入空密码，即可去掉加密\n\n><b>Tips</b><br>\n    注意在NerdTree下有缓存，请:wq 退出整个文件和nerdtree,否则看不到加密文件\n\n\n\n'
    );

INSERT INTO 
    `vimkid_article_info_en` (
        `article_id`,
        `subcategoryname`,
        `title`,
        `seotitle`,
        `seokeywords`,
        `seodescription`,
        `seosubtitle`
    ) VALUES (
        12,    /* article_id */
        'Vim basic usage',  /* subcategoryname */
        'Vim file encryption',  /* title */
        'Vim file encryption',  /* seotitle */
        'Vim file encryption,vim encryption, vim encrypton commend', /* seokeywords */
        'encrypt file with vim', /* seodescription */
        NULL    /* seosubtitle */
    );

INSERT INTO 
    `vimkid_article_info_zh` (
        `article_id`,
        `subcategoryname`,
        `title`,
        `seotitle`,
        `seokeywords`,
        `seodescription`,
        `seosubtitle`
    ) VALUES ( 
        12,              /* article_id */
        'vim基本使用',   /* subcategoryname */
        'vim对文件加密', /* title */
        'vim对文件加密',  /* seotitle */
        'vim文件加密,vim加密',  /* seokeywords */
        '使用vim对文件进行加密', /* seodescription */
        NULL    /* seosubtitle */
    );
