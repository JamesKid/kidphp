<?php
xhprof_enable();
//你需要分析的代码
$xhprof_data = xhprof_disable();
include_once '/var/www/vimkid/xhprof_lib/utils/xhprof_lib.php';
include_once '/var/www/vimkid/xhprof_lib/utils/xhprof_runs.php';
$xhprof_runs = new XHProfRuns_Default();
$run_id = $xhprof_runs->save_run($xhprof_data, "xhprof_test");
//将run_id保存起来或者随代码一起输出
?>
