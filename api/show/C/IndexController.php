<?php
//class Index extends AppPublic{
class IndexController {
	public function index(){
		$ajaxService = new AjaxService();
		$categoryName = 'vim';
		$params['randList']=$ajaxService->getRandList();
		$params['newList']=$ajaxService->getNewList($categoryName);
		//print_r($params);die;
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
