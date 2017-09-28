<?php
class PageController {
    public function index(){
        $total=90;
        $pagesize=3;
        $params['page'] = new system\plugin\outer\Page\Page($total,$pagesize);
        Render::renderTpl('static/page.html',$params);
    }
}
?>
