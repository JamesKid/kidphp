<?php
class PageController {
	public function index(){
		echo "page";
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
