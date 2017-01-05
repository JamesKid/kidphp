<?php
/****************************  Vimkid  ********************************* 
* @author       : Vimkid
* @description  : This is a programe about weiqi 
* @history      : 2017.1.5  添加项目基本结构
*
***********************************************************************/

class weiqi{
    // 常量
    public $height = 19;
    public $width = 19;
   
    // 初始化
	public function __construct($argv){
        print_r(intval('c'));
        die;
        // 如果没有参数则输出帮助文档
        if(!isset($argv[1])){
            $doc = $this->getDoc();
            print_r($doc); return;
        }
        // 如果参数等于h则输出帮助文档
        if($argv[1] == 'h'){
            $doc = $this->getDoc();
            print_r($doc); return;
        }

        // 打印棋盘
        $board = $this->getBoard($this->height,$this->width);
        // 下子
        if(strlen($argv[1]) == 2){
            $this->play($argv[1]);
        }
        $this->printBoard($board);
    }

    /**************  关于帮助 start ************/
    // 获取使用帮助文档
    public function getDoc(){
        $doc = " 
This is help for weiqi project: \n 
参数: 
h    :打开帮助
s    :开始棋局(重新开始棋局)
a1   :落子,输入具体下子坐标如a1
b    :悔棋
x    :显示形势\n 
Example: php weiqi.php h  # 输出帮助文档\n";
        return $doc;

    }
    /**************  关于帮助 End ************/

    /**************  用户下子 Start ************/
    // 下子
    public function play($height,$width){
    }

    // 判断是否合法下子
    public function checkPlay($height,$width){
    }

    // 保存下子
    public function savePlay($height,$width){
    }

    /**************  用户下子 End ************/
    

    /**************  棋盘系统 Start ************/
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
    /**************  棋盘系统 End ************/


    /**************  输出系统 Start ************/

    // 格式化输出棋盘
    public function printBoard($board){
        $i = 1;  // 初始化纵坐标值
        // 输出横坐标
        print_r('   A B C D E F G H I J K L M N O P Q R S ');
        echo "\n";
        foreach($board as $k => $v){
            // 输出纵坐标
            if(strlen($i)==1){
                echo $i.'  ';
            }else{
                echo $i.' ';
            }
            foreach($v as $x =>$y){
                // 输出空白点
                if($y == 0){
                    // 输出锚点
                    if($k == 3 || $k == 9 || $k == 15){
                        if($x == 3 || $x == 9 || $x == 15){
                            echo '∙ ';
                        }else{
                            echo '⋅ ';
                        }
                    }else{
                        echo '⋅ ';
                    }
                }
                // 输出黑白棋
                if($y == 1){
                    echo '●';  // 输出黑棋
                }
                if($y == 2){
                    echo '○'; // 输出白棋
                }
            }
            echo "\n";
            $i++;
        }
        // 输出横坐标
        print_r('   A B C D E F G H I J K L M N O P Q R S ');
    }

    /* 输出当前下子
     * @params  $x  横坐标  A B C D E F G ...
     * @params  $y  纵坐标  1 2 3 4 5 6 7 ...
     */
    public function printNowPlay($x,$y){
    }
    

    /**************  输出系统 End ************/

    /**************  序列 Start ************/
    public function charToNumber(){
        $numberList = array(

        );
        return $numberList;
    }

    /***********  电脑下子系统 Start ****核心算法******/
    // 随机选择下子落点
    
    /***********  电脑下子系统 Start ****核心算法******/

    /**************  局面评估系统 Start *****核心算法***/
    // 获取当前局面
    /**************  局面评估系统 End *******核心算法***/

    /**************  棋谱系统 Start *****核心算法***/
    /**************  棋谱系统 End *****核心算法***/


}
$argv = $argv;
$weiqi = new weiqi($argv);

?>
