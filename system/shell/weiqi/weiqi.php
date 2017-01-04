<?php
class weiqi{
    // 初始化
	public function __construct(){
        $height = 19;
        $width = 19;
        $board = $this->getBoard($height,$width);
        print_r($board);die;
    }
    // 获取当前局面


    // 下子
    public function play($height,$width){
    }

    // 判断是否合法下子
    public function checkPlay($height,$width){
    }

    // 保存下子
    public function savePlay($height,$width){
    }
    

    // 获取初始化棋盘
    public function getBoard($height,$width){
        $board = array();
        for($i=0; $i<$height; $i++){
            for($j=0; $j<$width; $j++){
                $board[$i][$j] = 0;
            }
        }
        return $board;
    }
    // 获取当前棋盘
    public function getNowBoard(){
    }

    // 格式化输出
    public function printBoard($board){
        

    }
}
$weiqi = new weiqi();


?>
