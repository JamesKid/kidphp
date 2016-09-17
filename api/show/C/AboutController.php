<?php
class AboutController {

	/** 关于我们
	 */
	public function index(){
		Render::renderTpl('static/about.html');
	}
}
?>
