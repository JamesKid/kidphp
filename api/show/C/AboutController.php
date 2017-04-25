<?php
class AboutController {

	/** 关于我们
	 */
	public function index(){
		$ajaxService = new AjaxService();
		$params['tags'] = $ajaxService->getTags();
		Render::renderTpl('static/about.html',$params);
	}
	public function test(){
        echo 'test'; // ab -kc 100 -n 1000  响应 760/second
    }
}
?>
