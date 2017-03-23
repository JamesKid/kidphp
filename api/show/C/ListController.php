<?php
class ListController {
    public $pagesize=10;  // 分页条数
    public $ajaxService;
    public function __construct(){
    }
    /* 一级目录查询 */
	public function category(){
		$page = isset($_GET['page'])? $_GET['page']: 1;
        $offset = ($page-1)*$this->pagesize;
		$ajaxService = new AjaxService();
		$params['tags'] = $ajaxService->getTags();
		$category = isset($_GET['category'])? $_GET['category']: '';
        if($category!=''){
            $ajaxService = new CategoryService();
            $total = $ajaxService->getSubListNumber($category); // 获取总条数
            $params['list']=$ajaxService->getCategoryList($category,$offset,$this->pagesize);
            $params['category']=$category;
            $params['page'] = new system\plugin\outer\Page\Page($total,$this->pagesize);
            Render::renderTpl('static/list.html',$params);
        }else{

        }
	}
    /* 一级目录查询 */
	public function othercategory(){
		$page = isset($_GET['page'])? $_GET['page']: 1;
        $offset = ($page-1)*$this->pagesize;

		$ajaxService = new AjaxService();
		$params['tags'] = $ajaxService->getTags();
		$category = isset($_GET['category'])? $_GET['category']: '';
        if($category!=''){
            $ajaxService = new CategoryService();
            $total = $ajaxService->getSubListNumber($category); // 获取总条数
            $params['newList']=$ajaxService->getCategoryList($category,$offset,$this->pagesize);
            $params['category']=$category;
            $params['page'] = new system\plugin\outer\Page\Page($total,$this->pagesize);
            Render::renderTpl('static/other_index.html',$params);
        }else{

        }
	}
    /* 二级目录查询 */
	public function subCategory(){
		$page = isset($_GET['page'])? $_GET['page']: 1;
        $offset = ($page-1)*$this->pagesize;
		$ajaxService = new AjaxService();
		$params['tags'] = $ajaxService->getTags();
		$category = isset($_GET['category'])? $_GET['category']: '';
        if($category!=''){
            $ajaxService = new CategoryService();
            $total = $ajaxService->getSubListNumber($category); // 获取总条数
            $params['list']=$ajaxService->getSubCategoryList($category,$offset,$this->pagesize);
            $params['category']=$category;
            $params['page'] = new system\plugin\outer\Page\Page($total,$this->pagesize);
            Render::renderTpl('static/list.html',$params);
        }else{

        }
	}
    /* 获取最新内容 */
	public function getNew(){
		$ajaxService = new AjaxService();
		$page = isset($_GET['page'])? $_GET['page']: 1;
        $offset = ($page-1)*$this->pagesize;
		$params['tags'] = $ajaxService->getTags();
        $total = $ajaxService->getNumber(); // 获取总条数
        $params['list']=$ajaxService->getNew($offset,$this->pagesize);
        $params['category']='最新文章';
        $params['page'] = new system\plugin\outer\Page\Page($total,$this->pagesize);
        Render::renderTpl('static/list.html',$params);
	}
}
?>
