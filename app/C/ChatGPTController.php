<?php
class ChatGPTController extends AppPublic{

    /** chatGPT
     */
    public function index(){
        //ini_set('display_errors','On');
        //error_reporting(E_ALL);
        $ajaxService = new AjaxService();
        $params['tags'] = $ajaxService->getTags();
        $params['left'] = $ajaxService->getSubCategory(1); // 1 vim  2 others
        $params['useLanguage'] = $this->getUseLanguage(); // 过滤当前默认语言
        $open_ai_key = $GLOBALS['CONFIG']['OPEN_AI_KEY'];
        $open_ai = new OpenAiService($open_ai_key);
        $search = $_GET['search'];
        $params['search'] = $search;
        $params['content'] = '';
        Render::renderTpl('static/wait.html',$params);
    }
    /** chatGPT
     */
    public function image(){
        $ajaxService = new AjaxService();
        $params['tags'] = $ajaxService->getTags();
        $params['useLanguage'] = $this->getUseLanguage(); // 过滤当前默认语言
        $search = $_GET['search'];
        $params['search'] = $search;
        $params['content'] = '';
        Render::renderTpl('static/chatGPT_image.html',$params);
    }
}
?>
