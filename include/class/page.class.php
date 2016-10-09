<?php
/*
 *分页类
 *
 *author 578672331@qq.com
 *
 *date 2011-10-29
*/
class page{
   private $pagesize;//每页多少条记录
   private $page;//当前页
   private $page_num;//页数
   private $url;//本页地址
   private $total;//数据表中总记录数
   private $listNum=6;
   private $conName;//被载入数据div名称
   private $pageName;//操作页面名称
   private $config = array("header"=>"条留言","pre"=>"上一页","next"=>"下一页","first"=>"首页","last"=>"尾页");
   public $limit;
   
   //初始化
   function __construct($total,$pagesize = 2,$tcon,$order){
	   $this->total = $total;
	   $this->pagesize = $pagesize;
	   $this->conName = $tcon;
	   $this->pageName = $order;
	   $this->url = $this->getUrl();
	   $this->page = !empty($_GET['page']) ? $_GET['page'] : 1;
	   $this->page_num = ceil($this->total / $this->pagesize);
	   $this->limit = $this->setLimit();
   }
   
   //limit截取
   private function setLimit(){
	   return "Limit ".($this->page-1)*$this->pagesize.", {$this->pagesize}"; 
   }
   
   //获取页面url
   private function getUrl(){
	   $url = $_SERVER['REQUEST_URI'];
	   $url = parse_url($url);
	   $url = $url['path'];
	   return $url;
   }
   
   //首页
   private function firstPage(){
	   $html = '';
	   if($this->page == 1){
		   $html.='';
	   }
	   else{
		   $html.="&nbsp;&nbsp;<a href='javascript:setAjaxPage(\"{$this->url}?page=1\",\"{$this->conName}\",\"{$this->pageName}\")'>{$this->config["first"]}</a>&nbsp;&nbsp;";   
	   } 
	   return $html;  
   }
   
   //上一页
   private function prePage(){
	   $html = '';
	   if($this->page == 1){
		   $html.='';
	   }
	   else{
		   $html.="&nbsp;&nbsp;<a href='javascript:setAjaxPage(\"{$this->url}?page=".($this->page-1)."\",\"{$this->conName}\",\"{$this->pageName}\")'>{$this->config["pre"]}</a>&nbsp;&nbsp;";   
	   }
	   return $html;
   }
   
   //页码列表
   private function pageList(){
	   $linkPage='';
	   
	   $now_num = floor($this->listNum / 2);
	   
	   for($i=$now_num;$i>=1;$i--){
		   $page = $this->page - $i;
		   
		   if($page < 1){
			   continue;
		   }
		   
		   $linkPage.= "&nbsp;<a href='javascript:setAjaxPage(\"{$this->url}?page={$page}\",\"{$this->conName}\",\"{$this->pageName}\")'>{$page}</a>&nbsp;";
	   }
	   
	   $linkPage.= "&nbsp;<span style=\"font-weight:700;\">{$this->page}</span>&nbsp;";
	   
	   for($i=1;$i<=$now_num;$i++){
		   $page = $this->page + $i;
		   
		   if($page < $this->page_num){
		        $linkPage.= "&nbsp;<a href='javascript:setAjaxPage(\"{$this->url}?page={$page}\",\"{$this->conName}\",\"{$this->pageName}\")'>{$page}</a>&nbsp";
		   }
		   else{
			    break; 
		   }
	   }
	   
	   return $linkPage;
   }
   
   //下一页
   private function nextPage(){
	   $html = '';
	   if($this->page == $this->page_num){
		   $html.='';
	   }   
	   else{
		   $html.="&nbsp;&nbsp;<a href='javascript:setAjaxPage(\"{$this->url}?page=".($this->page+1)."\",\"{$this->conName}\",\"{$this->pageName}\")'>{$this->config["next"]}</a>&nbsp;&nbsp;";    
	   }
	   return $html;
   }
   
   //尾页
   private function lastPage(){
	   $html = '';
	   if($this->page == $this->page_num){
		   $html.='';
	   }
	   else{
		   $html.="&nbsp;&nbsp;<a href='javascript:setAjaxPage(\"{$this->url}?page=".($this->page_num)."\",\"{$this->conName}\",\"{$this->pageName}\")'>{$this->config["last"]}</a>&nbsp;&nbsp;";   	   
	   }
	   return $html;
   }
   
   //分页输出
   function fpage(){
	   $html = ''; // 定义
	   $html.="&nbsp;&nbsp;共有<b>{$this->total}</b>{$this->config["header"]}&nbsp;&nbsp;";
	   $html.=$this->firstPage();
	   $html.=$this->prePage();
	   $html.=$this->pageList();
	   $html.=$this->nextPage();
	   $html.=$this->lastPage();
	   
	   return $html;
   }
   
   //当前页码
   function pageCode() {
   	  return $this->page;
   }
}

?>