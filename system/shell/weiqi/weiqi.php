<?php
/****************************  Vimkid  ********************************* 
* @author       : Vimkid
* @description  : This is a programe about weiqi 
* @history      : 2017.1.5   添加项目基本结构
*               : 2017.1.6   添加落子池,落子记录
*               : 2017.1.19  添加打劫算法,调整项目结构,修改部分bug
*
***********************************************************************/

class weiqi{
    // 常量
    public $height = 19;
    public $width = 19;
    public $board = array(); // 当前全局棋盘数组
    public $nowBoard = array(); // 当前棋盘数组
    public $userColor ; //  当前用户执子颜色 1 黑色 2 白色
    public $computerColor ; //  当前用户执子颜色 1 黑色 2 白色
    public $playPool ; // 可落子池
    public $point = array();  // 落子点坐标 $point['x'],$point['y']
    public $nowPoint = array();  // 当前落子点数组
    public $nowColor = null;  // 当前落子颜色  3 黑色 4 白色
   
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
            $this->nowBoard = $this->newBoard($this->height,$this->width,1,2); // 初始化棋盘
            $this->initPlayPool(); // 初始化落子池
        }
        // 打印棋盘用户执白(重新开始)
        if($argv[1] == 't'){
            $this->nowBoard = $this->newBoard($this->height,$this->width,2,1); // 初始化棋盘
            $this->initPlayPool(); // 初始化落子池
            $this->computerPlay();// 电脑执黑先下一步
        }

        // 渲染当前棋盘(继续对局)
        $status = $this->getNowBoard();
        $this->nowBoard = $status['nowBoard']; // 获取当前棋盘状态
        $this->userColor = $status['userColor']; // 获取用户所执子
        $this->computerColor = $status['computerColor']; // 获取用户所执子

        // 下子
        if(strlen($argv[1]) > 1){
            $inputString = $argv[1]; // 所输入的落子 如a1,e8
            $point = $this->stringToNumber($inputString);
            $this->play($point['x'],$point['y']); // 用户下子
            $this->computerPlay();// 电脑下子
            $board = $this->getNowBoard();
            $this->nowBoard = $board['nowBoard'];
        }

        //  添加当前下的点显示
        $newBoard = $this->nowBoard;
        $nowPoint = $this->nowPoint;
        $newBoard[$nowPoint['y']][$nowPoint['x']] = $this->nowColor;
        $this->nowBoard = $newBoard;
        print_r($this->nowBoard);

        $this->printBoard($this->nowBoard); // 打印棋盘
        print_r($this->nowPoint);
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

    /**************  用户下子系统 Start ************
    * 1. 下子
    * 2. 保存下子
    * 3. 添加当前下子点
    */

    // 下子
    public function play($x,$y){
        // 判断是否合法下子
        $checkPoint = $this->checkPoint($x,$y);
        // 将下子移除
        $this->removePlayPool($x,$y);
        $nowBoard = $this->getNowBoard();
        // 保存下子到数组
        $nowBoard['nowBoard'][$y][$x] = $nowBoard['userColor'];
        // 记录下子点
        $this->nowPoint = array('x' => $x, 'y' => $y,);
        $this->nowColor = $nowBoard['userColor']+2;  // 3 为黑子,4为白子

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

    public function addNowPoint($nowBoard,$nowColor){
    }

    /**************  用户下子 End ************/
    

    /**************  棋盘系统 Start ************
    * 1. 获取初始化棋盘
    * 2. 保存完整参数棋盘(棋盘盘面,用户执子)
    * 3. 获取完整参数棋盘(棋盘盘面,用户执子)
    */

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
  
    // 保存完整参数棋盘(棋盘盘面,用户执子)
    public function saveBoard($board){
        $params['nowBoard'] = $board['nowBoard'];
        $params['userColor'] = $board['userColor'];
        $params['computerColor'] = $board['computerColor'];
        file_put_contents('data/save_board.txt', serialize($params)); // 序列化并写入文件
    }

    // 获取完整参数棋盘(棋盘盘面,用户执子)
    public function getNowBoard(){
        $status = unserialize(file_get_contents('data/save_board.txt'));// 读取并反序列化
        return $status;

    }
    /**************  棋盘系统 End ************/


    /**************  输出系统 Start ************
    * 1. 格式化输出棋盘
    */

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
                    if($k == 4 || $k == 10 || $k == 16){
                        if($x == 4 || $x == 10 || $x == 16){
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
                if($y == 3){
                    echo '◇ '; // 输出黑棋
                }
                if($y == 2){
                    echo '● ';  // 输出白棋
                }
                if($y == 4){
                    echo '◆ '; // 输出黑棋
                }
            }
            echo "\n";
            $i++;
        }
        // 输出横坐标
        print_r('   A B C D E F G H I J K L M N O P Q R S ');
    }

    /**************  输出系统 End ************/

    /**************  序列及转化 Start ************
    * 1. 字母转数字
    * 2. 输入转换坐标系统x,y 如 a9 转成  1,9
    */
    // 字母转数字
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

    // 输入转换坐标系统x,y 如 a9 转成  1,9
    public function stringToNumber($point){
        $result = array();
        $list = $this->charToNumber();
        // 判断是否合法字母
        $x = substr($point,0,1);
        if(!array_key_exists($x,$list)){
            echo "$x".":不是合法坐标"; exit;  // 中止
        }
        $result['x'] = $list[$x];  // 获取字母对应数字
        $result['y'] = substr($point,1,2); // 截取最后两个数字

        return $result;
    }
    /**************  序列及转化 End ************/

    /**************  游戏规则系统(打劫系统) Start ********
    *  1. 打劫算法
    *  2. 提子算法
    *  3. 检查是否落在打劫点,打劫点不能下子
    *
    */
    /**************  游戏规则系统(打劫系统) End ********/

    /**************  游戏规则系统(落子系统) Start ********
    *  1. 初始化可落子池
    *  2. 获取落子池
    *  3. 添加落子点到落子池 
    *  4. 移除落子池某点
    *  5. 检查是否合法落子
    */

    // 初始化可落子池
    public function initPlayPool(){
        $playPool = array();
        for($i=1; $i<20; $i++){
            for($j=1; $j<20; $j++){
                $playPool[$i][$j] = 0;
            }
        }
        // 保存落点池
        file_put_contents('data/play_pool.txt', serialize($playPool)); // 序列化并写入文件
        return $playPool; // 返回落点池
    }
    // 获取落子池
    public function getPlayPool(){
        $playPool = unserialize(file_get_contents('data/play_pool.txt'));
        return $playPool;
    }
    // 添加落子点到落子池
    public function addPlayPool($point){
        file_put_contents('data/play_pool.txt', serialize($playPool)); // 序列化并写入文件
    }
    // 移除落点池某点
    public function removePlayPool($x,$y){
        $playPool = unserialize(file_get_contents('data/play_pool.txt'));
        unset($playPool[$y][$x]);
        file_put_contents('data/play_pool.txt', serialize($playPool)); // 序列化并写入文件
    }
    // 检查是否合法落点
    public function checkPoint($x,$y){
        $playPool = $this->getPlayPool();
        //print_r($playPool);
        if(array_key_exists($y, $playPool)){
            if(!array_key_exists($x, $playPool[$y])){
                echo 'WARN: 落点不合法,该点已经有子'."\n";exit;
            }
        }else {
            echo 'WARN: 落点不合法'."\n";exit;
        }

    }

    /**************  游戏规则系统(落子系统) End ********/



    /***********  电脑下子系统 Start ****核心算法******
    * 1. 随机选择下子落点
    * 2. 获取最佳落子点
    *
    */
    // 随机选择下子落点
    public function computerPlay(){
        $board = $this->getNowBoard(); // 获取当前全局棋局

        $x = rand(1,19);
        $y = rand(1,19);
        // 获取最佳落子点
        //$point = $this->getBestPlay();
        
        // 记录当前下子点
        $this->nowPoint = array('x' => $x, 'y' => $y,);
        $this->nowColor = $board['computerColor']+2;

        // 落点池移除一个落子点
        $this->removePlayPool($x,$y);
        // 保存棋盘盘面
        $board['nowBoard'][$y][$x] = $board['computerColor'];  
        $this->saveBoard($board); // 保存全局棋局
    }
    // 获取最佳落子点
    public function getBestPlay(){
        $playPool = $this->getPlayPool();
        $point['x'] = 12;
        $point['y'] = 7;
        return $point;
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
