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
        $this->articleService = new ArticleService();
        $this->ajaxService = new AjaxService();
    }
    public function detail(){
        $articleId = $this->getStr($_GET['articleId']);
        $params['tags'] = $this->articleService->getTags();
        $params['left'] = $this->ajaxService->getSubCategory(1); // 1 vim  2 others
        $params['useLanguage'] = $this->getUseLanguage(); // 过滤当前默认语言

        $result = $this->getMemcached($articleId);
        if(isset($result)){
            $params['data']=$result;
            $Parsedown = new system\plugin\outer\parsedown\Parsedown();
            $params['html'] =  $Parsedown->text($params['data']['content']); 
            if($params['data']['type'] == 2 ){ // 宣染music模板
                Render::renderTpl('static/music_detail.html',$params);
            }else{
                Render::renderTpl('static/detail.html',$params);
            }
        }else{
            $params['errorInfo']='访问的文章不存在';
            Render::renderTpl('static/info.html',$params);
        }
    }

    /* 获取memcached */
    public function getMemcached($articleId){
        // 如果memcached 没打开
        if($GLOBALS['CONFIG']['MEMCACHED_STATUS'] == 'close'){ 
            $result = $this->articleService->getArticleById($articleId);
            return $result;
        }
        $memcached = new Mem; // 实列化缓存
        $key = $_SERVER['HTTP_HOST'].'/'.$articleId;
        $result = $memcached->get($key);
        if(empty($result)){ // 如果缓存为空，则调取数据
            $result = $this->articleService->getArticleById($articleId);
            $memcached->set($key,$result,60*60*24*2); // 缓存2天
        }
        return $result;
    }
}
