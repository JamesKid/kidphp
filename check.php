<?php
// 健康检查
echo 'v-ok';
/* 
 * # tips (命令行下性能检测)
 *     ab -kc 500 -n 5000 www.xxx.com/check.php  # 检测服务器基础响应能力
 *     sh /etc/myconf/shell/status/1_mysql_qps_tps.sh  # 检测mysql服务器响应能力和请求数量
 *     dstat -m    # 查看内存占用
 *     dstat       # 查看cpu占用
 *
 * 服务器性能列表(每秒响应越大表示性能越好)
 *     1. (vps 512M 20G )
 * 
 */
?>
