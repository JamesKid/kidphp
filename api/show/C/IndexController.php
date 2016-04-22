<?php
//class Index extends AppPublic{
class IndexController {
	public function index(){
		echo "cc";die;
	}
	public function indexts(){
		$test = 1;
		$params['title'] = 'titletest';
		$params['content'] = 'abcyou';
		$params['arr'] = array(
			'0'=>'helloa',
			'1'=>'hellob',
			'2'=>'helloc',
		);
		$this->render('index',$params);
	}
	public function firstFunction($number=null,$test=null){
		$result = $number*$test;
		return $result;
	}
	public function edit(){
		$test = 1;
		$params['title'] = 'titletesttest';
		$params['content'] = 'abcyoutest';
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
