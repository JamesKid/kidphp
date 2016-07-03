<?php
//class Index extends AppPublic{
class IndexController {
	public function index(){
		$ajaxService = new AjaxService();
		$params['randList']=$ajaxService->getRandList();
		$params['hotList']=$ajaxService->getHotList();
		//$this->render('static/index.html',$params);
		Render::renderTpl('static/index.html',$params);
	}
	/*
	public function render($tpl,$params){
		$viewDirectory=__DIR__;
		$viewDirectory = substr($viewDirectory,0,strlen($viewDirectory)-1); // 获取你级目录
		require_once($viewDirectory.'V/'.$tpl);
	}
	 */

}
?>
