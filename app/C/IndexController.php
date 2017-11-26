<?php
class IndexController extends AppPublic{
    public function index(){
        $ajaxService = new AjaxService();
        $categoryName = 'vim';
        $params['randList'] = $ajaxService->getRandList();
        $params['newList'] = $ajaxService->getNewList($categoryName);
        $newsList = $ajaxService->getNews();
        $params['news'] = $newsList[0];
        $params['tags'] = $ajaxService->getTags();
        $params['left'] = $ajaxService->getSubCategory(1); // 1 vim  2 others
        $params['useLanguage'] = $this->getUseLanguage(); // 过滤当前默认语言
        Render::renderTpl('static/index.html',$params);
    }

    /* 设置默认语言cookie */
    public function setLanguage(){
        $checkFrom = $this->checkFrom(); // 检查来源是否合法
        if(!$checkFrom){
            header("location: /404page.html"); 
        }else{
            $language = $this->getStr($_GET['language']);
            setcookie("language",$language, time()+3600*24,'/','vimkid.com');
            header("location: ".$_SERVER['HTTP_REFERER']);  // 回调来源地址
        }

    }

}
?>
