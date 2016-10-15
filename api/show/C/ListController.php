<?php
class ListController {
    /* 二级目录查询 */
	public function subCategory(){
		$category = isset($_GET['category'])? $_GET['category']: '';
        //print_r($categoryName);
        if($category!=''){
            $ajaxService = new CategoryService();
            $total = $ajaxService->getSubListNumber($category); // 获取总条数
            $pagesize=10;  // 分页条数
            $params['list']=$ajaxService->getSubCategoryList($category);
            $params['category']=$category;
            //print_r($params['list']);
            $params['page'] = new system\plugin\outer\Page\Page($total,$pagesize);
            Render::renderTpl('static/list.html',$params);
        }else{

        }
	}
	public function category(){
		$category = isset($_GET['category'])? $_GET['category']: '';
        //print_r($categoryName);
        if($category!=''){
            $ajaxService = new CategoryService();
            $total = $ajaxService->getSubListNumber($category); // 获取总条数
            $pagesize=10;  // 分页条数
            $params['list']=$ajaxService->getCategoryList($category);
            $params['category']=$category;
            //print_r($params['list']);
            $params['page'] = new system\plugin\outer\Page\Page($total,$pagesize);
            Render::renderTpl('static/list.html',$params);
        }else{

        }
	}
}
?>
