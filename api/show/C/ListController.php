<?php
class ListController {
	public function index(){
		$total=90;
		$pagesize=3;
		$ajaxService = new AjaxService();
		$params['randList']=$ajaxService->getRandList();
		$params['page'] = new system\plugin\outer\Page\Page($total,$pagesize);
		Render::renderTpl('static/list.html',$params);
	}
}
?>
