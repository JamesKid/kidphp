<?php
class ListController {
    public function __construct(){
        //$this->ajaxService = new AjaxService();
    }
    /* 一级目录查询 */
	public function category(){
		$ajaxService = new AjaxService();
		$params['tags'] = $ajaxService->getTags();
		$category = isset($_GET['category'])? $_GET['category']: '';
        if($category!=''){
            $ajaxService = new CategoryService();
            $total = $ajaxService->getSubListNumber($category); // 获取总条数
            $pagesize=10;  // 分页条数
            $params['list']=$ajaxService->getCategoryList($category);
            $params['category']=$category;
            $params['page'] = new system\plugin\outer\Page\Page($total,$pagesize);
            Render::renderTpl('static/list.html',$params);
        }else{

        }
	}
    /* 一级目录查询 */
	public function othercategory(){
		$ajaxService = new AjaxService();
		$params['tags'] = $ajaxService->getTags();
		$category = isset($_GET['category'])? $_GET['category']: '';
        if($category!=''){
            $ajaxService = new CategoryService();
            $total = $ajaxService->getSubListNumber($category); // 获取总条数
            $pagesize=10;  // 分页条数
            $params['newList']=$ajaxService->getCategoryList($category);
            $params['category']=$category;
            $params['page'] = new system\plugin\outer\Page\Page($total,$pagesize);
            Render::renderTpl('static/other_index.html',$params);
        }else{

        }
	}
    /* 二级目录查询 */
	public function subCategory(){
		$ajaxService = new AjaxService();
		$params['tags'] = $ajaxService->getTags();
		$category = isset($_GET['category'])? $_GET['category']: '';
        if($category!=''){
            $ajaxService = new CategoryService();
            $total = $ajaxService->getSubListNumber($category); // 获取总条数
            $pagesize=10;  // 分页条数
            $params['list']=$ajaxService->getSubCategoryList($category);
            $params['category']=$category;
            $params['page'] = new system\plugin\outer\Page\Page($total,$pagesize);
            Render::renderTpl('static/list.html',$params);
        }else{

        }
	}
    /* 获取最新内容 */
	public function getNew(){
		$ajaxService = new AjaxService();
		$params['tags'] = $ajaxService->getTags();
        $ajaxService = new CategoryService();
        $total = $ajaxService->getNumber(); // 获取总条数
        $pagesize=10;  // 分页条数
        $params['list']=$ajaxService->getNew();
        $params['category']='最新文章';
        $params['page'] = new system\plugin\outer\Page\Page($total,$pagesize);
        Render::renderTpl('static/list.html',$params);
	}
}
?>
