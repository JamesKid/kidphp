<?php
use system\core\db;
class ArticleController extends AppPublic {

    /** 获取文章详细内容 
     * @params articleId   文章id
     * @params
     * 
     */
    protected $articleService;
    public function __construct(){
    }
    public function detail(){
        $articleId = $this->getStr($_GET['articleId']);
        $articleService = new ArticleService();
        $articleService->addReading($articleId);
        $params['tags'] = $articleService->getTags();

        $mem = new Mem; // 实列化缓存
        $key = $_SERVER['HTTP_HOST'].'/'.$articleId;
        $result = $mem->get($key);
        if(empty($result)){ // 如果缓存为空，则调取数据
            $result = $articleService->getArticleById($articleId);
            $mem->set($key,$result,0,60*60*24*2); // 缓存2天
        }
        if(isset($result[0])){
            $params=$result[0];
            $Parsedown = new system\plugin\outer\parsedown\Parsedown();
            $params['html'] =  $Parsedown->text($params['article_content']); 
            if($params['article_type'] == 2 ){ // 宣染music模板
                Render::renderTpl('static/music_detail.html',$params);
            }else{
                Render::renderTpl('static/detail.html',$params);
            }
        }else{
            $params['errorInfo']='访问的文章不存在';
            Render::renderTpl('static/info.html',$params);
        }
    }
}
?>
