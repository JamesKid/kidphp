<?php
class IndexController {
	public function index(){
		$ajaxService = new AjaxService();
		$categoryName = 'vim';
		$params['randList'] = $ajaxService->getRandList();
		$params['newList'] = $ajaxService->getNewList($categoryName);
		$params['news'] = $ajaxService->getNews();
		$params['tags'] = $ajaxService->getTags();
		Render::renderTpl('static/index.html',$params);
	}
}
?>
