<?php
class PageController {
	public function index(){
		$total=90;
		$pagesize=3;
		//$page = new Page($total,$pagesize);
		$params['page'] = new system\plugin\outer\Page\Page($total,$pagesize);
		Render::renderTpl('static/page.html',$params);
	}
	public function edit(){
		$test = 1;
		$params['title'] = 'page';
		$params['content'] = 'page';
		$params['arr'] = array(
			'0'=>'helloalkjklj',
			'1'=>'helloblkkj',
			'2'=>'helloclkj;kj',
		);
		$this->render('indext',$params);
	}
	public function render($tpl,$params){
		$viewDirectory=__DIR__;
		$viewDirectory = substr($viewDirectory,0,strlen($viewDirectory)-1); // 获取你级目录
		require_once($viewDirectory.'V/'.ucfirst($tpl).'View.php');
	}

}
?>
