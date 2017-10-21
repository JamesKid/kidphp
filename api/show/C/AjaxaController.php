<?php
class AjaxaController extends AppPublic{
    public function __construct(){
        $checkFrom = $this->checkFrom(); // 检查来源是否合法
        if(!$checkFrom){
            header("location: /404page.html"); 
        }
    }

    /* 获取文章访问量*/
    public function getVisited(){
        $articleId = $this->getStr($_GET['articleId']);
        $articleService = new ArticleService();
        $articleService->addReading($articleId); // 添加一个访问量
        $numbers = $articleService->getVisited($articleId); // 获取访问量
        echo $numbers;
    }
}
