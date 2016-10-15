<?php
class AboutController {

	/** 关于我们
	 */
	public function index(){
		$ajaxService = new AjaxService();
		$params['tags'] = $ajaxService->getTags();
		Render::renderTpl('static/about.html',$params);
	}
}
?>
