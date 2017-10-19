<?php
class OthersController {
    public function index(){
        $ajaxService = new AjaxService();
        $params['randList'] = $ajaxService->getRandList();
        $params['newList'] = $ajaxService->getOtherNewList();
        $params['tags'] = $ajaxService->getTags();
        Render::renderTpl('static/other_index.html',$params);
    }
}
?>
