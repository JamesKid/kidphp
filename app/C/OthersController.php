<?php
class OthersController extends AppPublic{
    public function index(){
        $ajaxService = new AjaxService();
        $params['randList'] = $ajaxService->getRandList();
        $params['newList'] = $ajaxService->getOtherNewList();
        $params['tags'] = $ajaxService->getTags();
        $params['left'] = $ajaxService->getSubCategory(1); // 1 vim  2 others
        $params['useLanguage'] = $this->getUseLanguage(); // 获取使用的语言
        Render::renderTpl('static/other_index.html',$params);
    }
}
?>
