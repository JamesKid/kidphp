<?php
echo "三门游戏\n" . "采取更换选择策略\n";
// 抽循环次数
$number = 1000000;
print_r('抽奖次数为: ' . $number . "\n");
// 换门后中奖次数
$changeGet = 0;
for($i = 0; $i < $number; $i++) { 
    // 随机生成一个抽奖数组，
    $prizes = [0, 0, 0];
    // 放入奖品
    $prize = rand(0,2);
    $prizes[$prize] = '奖品';
    // 抽奖
    $get = rand(0,2);
    // 排除另一个为零的将品
    foreach ($prizes as $key => $value) {
        if( $key != $get && $value === 0 ){
            // 排除一个正确选项
            unset($prizes[$key]);
            break;
        }
    } 
    // 更换选择(删除原来的选择)
    unset($prizes[$get]);
    // 弹出最终选择结果 
    $result = array_pop($prizes);
    // 判断是否中奖，中奖将中奖次数加一 
    // print_r($result);
    if($result === '奖品') { 
        $changeGet = $changeGet + 1;
    }
}
echo '抽中奖数为:' . $changeGet;
echo '中将率为:' . $changeGet/$number;


