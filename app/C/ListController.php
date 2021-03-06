<?php
class ListController extends AppPublic{
    public $pagesize=10;  // 分页条数
    public $ajaxService;
    public function __construct(){
    }
    /* 一级目录查询 */
    public function category(){
        $page = isset($_GET['page'])? $_GET['page'] : 1;
        $offset = ($page-1)*$this->pagesize;
        $ajaxService = new AjaxService();
        $params['tags'] = $ajaxService->getTags();
        $category = isset($_GET['category'])? $_GET['category']: '';
        if($category!=''){
            $categoryService = new CategoryService();
            $total = $categoryService->getSubListNumber($category); // 获取总条数
            $params['list']=$categoryService->getCategoryList($category,$offset,$this->pagesize);
            $params['category']=$category;
            $params['page'] = new system\plugin\outer\Page\Page($total,$this->pagesize);
            $params['left'] = $ajaxService->getSubCategory(1); // 1 vim  2 others
            $params['useLanguage'] = $this->getUseLanguage(); // 获取使用的语言
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
            $categoryService = new CategoryService();
            $total = $categoryService->getSubListNumber($category); // 获取总条数
            $params['newList']=$categoryService->getCategoryList($category,$offset,$this->pagesize);
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
        $params['left'] = $ajaxService->getSubCategory(1); // 1 vim  2 others
        $params['useLanguage'] = $this->getUseLanguage(); // 获取使用的语言
        $params['categoryMap']=$this->getCategoryNameMap($params['left']);
        $category = isset($_GET['category'])? $_GET['category']: '';
        if($category!=''&& isset($params['categoryMap'][$category])){
            $categoryService = new CategoryService();
            $total = $categoryService->getSubListNumber($category); // 获取总条数
            $params['list']=$categoryService->getSubCategoryList($category,$offset,$this->pagesize);
            $params['category'] = $params['categoryMap'][$category];
            $params['page'] = new system\plugin\outer\Page\Page($total,$this->pagesize);
            Render::renderTpl('static/list.html',$params);
        }else{
            header("location: /404page.html"); 
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
        $params['page'] = new system\plugin\outer\Page\Page($total,$this->pagesize);
        $params['left'] = $ajaxService->getSubCategory(1); // 1 vim  2 others
        $params['category'] = 'Articles';
        $params['useLanguage'] = $this->getUseLanguage(); // 获取使用的语言
        Render::renderTpl('static/list.html',$params);
    }

    /* 获取站点新闻 */
    public function getNews(){
        $ajaxService = new AjaxService();
        $page = isset($_GET['page'])? $_GET['page']: 1;
        $offset = ($page-1)*$this->pagesize;
        $params['tags'] = $ajaxService->getTags();
        $total = $ajaxService->getNumber(); // 获取总条数
        $params['list']=$ajaxService->getNews($offset,$this->pagesize);
        $params['page'] = new system\plugin\outer\Page\Page($total,$this->pagesize);
        $params['left'] = $ajaxService->getSubCategory(1); // 1 vim  2 others
        $params['useLanguage'] = $this->getUseLanguage(); // 获取使用的语言
        $params['category'] = 'News';
        Render::renderTpl('static/list.html',$params);
    }
}
?>
