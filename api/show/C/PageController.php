<?php
class PageController {
	public function index(){
		$total=90;
		$pagesize=3;
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
}
?>
