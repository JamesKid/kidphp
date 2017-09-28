<?php
class WaitController {

    /** 开发中,敬请期待
     */
    public function index(){
        $ajaxService = new AjaxService();
        $params['tags'] = $ajaxService->getTags();
        Render::renderTpl('static/wait.html',$params);
    }
}
?>
