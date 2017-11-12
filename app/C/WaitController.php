<?php
class WaitController extends AppPublic{

    /** 开发中,敬请期待
     */
    public function index(){
        $ajaxService = new AjaxService();
        $params['tags'] = $ajaxService->getTags();
        $params['left'] = $ajaxService->getSubCategory(1); // 1 vim  2 others
        $params['useLanguage'] = $this->getUseLanguage(); // 过滤当前默认语言
        Render::renderTpl('static/wait.html',$params);
    }
}
?>
