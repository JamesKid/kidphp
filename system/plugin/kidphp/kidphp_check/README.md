# kidphp_check

This is the plugin of kidphp,it include qq,phone,email,and so on
Version 1.0.0 - 2016.4.20

by vimkid 
<http://www.vimkid.com/aboutus.php>

## How to use

```php
<?php

include_once('./kidphp_check/Check.php');

use \Michelf\MarkdownGithub;

$my_text = "10498238@qq.com";

$result = MarkdownGithub::checkQQ($my_text);
echo $result;

?>
```

The output:
	true or false;

## More

Read here <https://www.vimkid.com/other/kidphp/plugin/check/>.
And you can contribute to this plugin here
<https://www.github.com/kidphp/>.


