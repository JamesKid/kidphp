<?php
class IndexController {
	public function index(){
		$ajaxService = new AjaxService();
		$categoryName = 'vim';
		$params['randList'] = $ajaxService->getRandList();
		$params['newList'] = $ajaxService->getNewList($categoryName);
		$params['news'] = $ajaxService->getNews();
		//print_r($params['news']);die;
		Render::renderTpl('static/index.html',$params);
	}
}
?>
