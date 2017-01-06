<?php
/****************************  Vimkid  ********************************* 
* @author       : Vimkid
* @description  : This is a programe about weiqi 
* @history      : 2017.1.5  添加项目基本结构
*               : 2017.1.6  添加落子池,落子记录
*
***********************************************************************/

class weiqi{
    // 常量
    public $height = 19;
    public $width = 19;
    public $nowBoard = array(); // 当前棋盘数组
    public $userColor ; //  当前用户执子颜色 1 黑色 2 白色
    public $computerColor ; //  当前用户执子颜色 1 黑色 2 白色
   
    // 初始化
	public function __construct($argv){
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

        // 打印棋盘用户执黑(重新开始)
        if($argv[1] == 's'){
            $this->nowBoard = $this->newBoard($this->height,$this->width,1,2);
        }
        // 打印棋盘用户执白(重新开始)
        if($argv[1] == 't'){
            $this->nowBoard = $this->newBoard($this->height,$this->width,2,1);
        }

        // 渲染当前棋盘(继续对局)
        $status = $this->getNowStatus();
        $this->nowBoard = $status['nowBoard']; // 获取当前棋盘状态
        $this->userColor = $status['userColor']; // 获取用户所执子
        $this->computerColor = $status['computerColor']; // 获取用户所执子

        // 下子
        if(strlen($argv[1]) > 1){
            $this->play($argv[1]); // 用户下子
            $this->computerPlay();// 电脑下子
        }
        $this->printBoard($this->nowBoard); // 打印棋盘
    }

    /**************  关于帮助 start ************/
    // 获取使用帮助文档
    public function getDoc(){
        $doc = " 
This is help for weiqi project: \n 
参数: 
h    :打开帮助
s    :开始棋局用户执黑(重新开始棋局)
t    :开始棋局用户执白(重新开始棋局)
a1   :落子,输入具体下子坐标如a1
b    :悔棋
x    :显示形势\n 
Example: php weiqi.php h  # 输出帮助文档\n";
        return $doc;

    }
    /**************  关于帮助 End ************/

    /**************  用户下子 Start ************/
    // 下子
    public function play($position){
        $nowBoard = $this->nowBoard;
        // 转换position 为数组坐标
        $list = $this->charToNumber();
        $x = substr($position,0,1);
        $x = $list[$x];  // 获取字母对应数字
        $y = substr($position,1,2); // 截取最后两个数字

        // 判断是否合法下子
        
        // 保存下子到数组
        $nowBoard[$y][$x] = $this->userColor;
        $this->nowBoard = $nowBoard;
        $this->saveBoard($nowBoard);
    }


    // 保存每一步下子
    // 数据结构
    // array(
    //   'a1'=>array(
    //      'userColor'=>1,
    //      'time'=>1,
    //      'Comment'=>'一步好棋'
    //   ),
    // )
    public function savePlay($height,$width){
    }

    /**************  用户下子 End ************/
    

    /**************  棋盘系统 Start ************/
    // 获取初始化棋盘
    public function newBoard($height,$width,$userColor,$computerColor){
        $board = array();
        for($i=1; $i<$height+1; $i++){
            for($j=1; $j<$width+1; $j++){
                $board[$i][$j] = 0;
            }
        }
        // 保存初始棋盘到数据库或文件中
        $params['nowBoard'] = $board;
        $params['userColor'] = $userColor;
        $params['computerColor'] = $computerColor;
        file_put_contents('data/save_board.txt', serialize($params)); // 序列化并写入文件
        return $board;
    }
  
    // 保存棋盘
    public function saveBoard($board){
        $params['nowBoard'] = $board;
        $params['userColor'] = $this->userColor;
        $params['computerColor'] = $this->computerColor;
        file_put_contents('data/save_board.txt', serialize($params)); // 序列化并写入文件
    }

    // 获取当前对局状态(棋盘盘面,用户执子)
    public function getNowStatus(){
        $status = unserialize(file_get_contents('data/save_board.txt'));// 读取并反序列化
        return $status;

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
                    echo '○ '; // 输出黑棋
                }
                if($y == 2){
                    echo '● ';  // 输出白棋
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
            'a'=>1,
            'b'=>2,
            'c'=>3,
            'd'=>4,
            'e'=>5,
            'f'=>6,
            'g'=>7,
            'h'=>8,
            'i'=>9,
            'j'=>10,
            'k'=>11,
            'l'=>12,
            'm'=>13,
            'n'=>14,
            'o'=>15,
            'p'=>16,
            'q'=>17,
            'r'=>18,
            's'=>19
        );
        return $numberList;
    }
    /**************  序列 End ************/

    /***********  电脑下子系统 Start ****核心算法******/
    // 随机选择下子落点
    public function computerPlay(){
        $nowBoard = $this->nowBoard; // 获取当前棋局
        $x = rand(1,19);
        $y = rand(1,19);
        $nowBoard[$y][$x] = $this->computerColor;  // 更新棋盘盘面
        $this->saveBoard($nowBoard);

    }
    // 初始化落点池
    public function initPlayPool(){
        $playPool = array(
        );
    }
    // 获取落点池
    public function getPlayPool(){
        $playPool = unserialize(file_get_contents('data/play_pool.txt'));// 读取落点池并反序列化
        return $playPool;
    }
    // 落点池添加落点
    public function addPlayPool($position){
        $playPool = unserialize(file_put_contents('data/play_pool.txt'));// 读取落点池并反序列化
        return $playPool;
    }
    // 落点池移除落点
    public function removePlayPool($position){
        $playPool = unserialize(file_put_contents('data/play_pool.txt'));// 读取落点池并反序列化
        return $playPool;
    }
    
    /***********  电脑下子系统 Start ****核心算法******/

    /**************  局面评估系统 Start *****核心算法***/
    // 获取当前局面
    
    // 获取当前落点池
    
    // 落点价值评估

    /**************  局面评估系统 End *******核心算法***/

    /**************  棋谱系统 Start *****核心算法***/
    /**************  棋谱系统 End *****核心算法***/

    /**************  坐标转换系统 Start *****核心算法***/
    // 中心坐标 
    // x,y轴坐标
    // 角坐标(左上角,右上角,左下角,右下角)
    // 3D 坐标
    /**************  坐标转换系统 End *****核心算法***/


}
$argv = $argv;
$weiqi = new weiqi($argv);

?>
