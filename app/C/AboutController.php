<?php
class AboutController extends AppPublic{

    /** 关于我们
     */
    public function index(){
        $ajaxService = new AjaxService();
        $params['tags'] = $ajaxService->getTags();
        $params['left'] = $ajaxService->getSubCategory(1); // 1 vim  2 others
        $params['useLanguage'] = $this->getUseLanguage(); // 过滤当前默认语言
        Render::renderTpl('static/about.html',$params);
    }
    public function test(){
        echo 'test'; // ab -kc 100 -n 1000  响应 760/second
    }
}
?>
