<?php
use system\core\db;
class ArticleController {

	/** 获取文章详细内容 
	 * @params articleId   文章id
	 * @params
	 * 
	 */
	public function detail(){
		$articleId=$_GET['articleId'];
		$mysql = new system\core\db\Mysql();
		$sql = "select * from vimkid_article where article_status = 1 and article_id =".$articleId;
		$result = $mysql->select($sql);
		if(isset($result[0])){
			$params=$result[0];
			$Parsedown = new system\plugin\outer\parsedown\Parsedown();
			$params['html'] =  $Parsedown->text($params['article_content']); # prints: <p>Hello <em>Parsedown</em>!</p>
			Render::renderTpl('static/detail.html',$params);
		}else{
			$params['errorInfo']='访问的文章不存在';
			Render::renderTpl('static/info.html',$params);
		}
	}
}
?>
