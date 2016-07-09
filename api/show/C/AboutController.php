<?php
class AboutController {

	/** 关于我们
	 * @params categoryid
	 * @params
	 * 
	 */
	public function index(){
		Render::renderTpl('static/about.html');
	}
}
?>
