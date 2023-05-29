<?php
class AjaxaController extends AppPublic{
    public function __construct(){
        header('Content-Type:application/json; charset=utf-8');
        //$checkFrom = $this->checkFrom(); // 检查来源是否合法
        //if(!$checkFrom){
        //  header("location: /404page.html"); 
        //}
    }

    /* 获取文章访问量*/
    public function getVisited(){
        $articleId = $this->getStr($_GET['articleId']);
        $articleService = new ArticleService();
        $articleService->addReading($articleId); // 添加一个访问量
        $numbers = $articleService->getVisited($articleId); // 获取访问量
        echo $numbers;
    }
    
    /** getChatGPT
     */
    public function getChatGPT(){
        ini_set('display_errors','On');
        ini_set('max_execution_time', '0');
        set_time_limit(30);
        error_reporting(E_ALL);
        $ajaxService = new AjaxService();
        $params['tags'] = $ajaxService->getTags();
        $params['left'] = $ajaxService->getSubCategory(1); // 1 vim  2 others
        $params['useLanguage'] = $this->getUseLanguage(); // 过滤当前默认语言
        $open_ai_key = $GLOBALS['CONFIG']['OPEN_AI_KEY'];
        $open_ai = new OpenAiService($open_ai_key);
        $search = $_GET['search'] ?? '';
        $params['search'] = $search;
        $params['content'] = '';
        $complete = '';
        if(strpos($search, '智障') !== false || 
            strpos($search, '傻逼') !== false || 
            strpos($search, '傻B') !== false || 
            strpos($search, '去你妈的') !== false ||
            strpos($search, '你妈B') !== false ||
            strpos($search, '你妈逼') !== false ||
            strpos($search, '操你妈') !== false ||
            strpos($search, '操你妈B') !== false ||
            strpos($search, '逗逼') !== false 
        )  { 
            $complete = [
                "choices"=> [
                    0=> ['text'=>", I'm not, I'm just improving, please be polite."]
                ]
            ];

            echo json_encode($complete,true);
            die;
        }
        if(!empty($search)) { 
            $complete = $open_ai->completion([
                'model' => 'text-davinci-003',
                'prompt' => $search,
                'temperature' => 0.9,
                'max_tokens' => 1000,
                'frequency_penalty' => 0,
                'presence_penalty' => 0.6,
            ]);
        }
        echo trim($complete);
    }
    public function getChatGPTImage(){
        ini_set('display_errors','On');
        ini_set('max_execution_time', '0');
        set_time_limit(30);
        error_reporting(E_ALL);
        $ajaxService = new AjaxService();
        $params['tags'] = $ajaxService->getTags();
        $params['left'] = $ajaxService->getSubCategory(1); // 1 vim  2 others
        $params['useLanguage'] = $this->getUseLanguage(); // 过滤当前默认语言
        $open_ai_key = $GLOBALS['CONFIG']['OPEN_AI_KEY'];
        $open_ai = new OpenAiService($open_ai_key);
        $search = $_GET['search'] ?? '';
        $params['search'] = $search;
        $params['content'] = '';
        $complete = '';
        if(!empty($search)) { 
            $complete = $open_ai->image([
                "prompt" => $search,
                "n" => 1,
                "size" => "512x512",
                "response_format" => "url",
            ]);
        }
        echo trim($complete);
    }

    public function edit(){
        $search = $_GET['search'] ?? '';
        $do = $_GET['do'] ?? '';
        $open_ai_key = $GLOBALS['CONFIG']['OPEN_AI_KEY'];
        $open_ai = new OpenAiService($open_ai_key);
		$result = $open_ai->createEdit([
		   "model" => "text-davinci-edit-001",
  		   //"input" => "What day of the wek is it?",
		   "input" => $search,
		   "instruction" => $do ?? "Fix the spelling mistakes",
	   ]);
		echo $result;
    }

    public function getNews(){
        $ajaxService = new AjaxService();
        $result = $ajaxService->getNewList();
        print_r($result);
        echo json_encode($result,true);
    }
}




