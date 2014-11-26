<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Usrbase extends Webbase {
   
 public $seo_title = '首页_开心一刻';
 public $seo_keywords = '笑话,爆笑笑话,幽默笑话,笑话大全,搞笑短信,xiaohua,冷笑话,经典笑话,冷笑话大全,笑话吧,搞笑笑话';
 public $seo_description = '开心一刻 笑话巴士提供各种笑话，有经典笑话，幽默笑话，爆笑笑话，冷笑话，笑话大全，短信笑话，笑话故事，搞笑笑话，搞笑短信，笑话吧，笑话排行榜，陪伴大家开心快乐每一天!';
 public $imguploadapiurl = 'http://img.hacktea8.com/imgapi/upload/?seq=';
 static public $robot = 1;

 public function __construct(){
  parent::__construct();
    
  $this->load->helper('rewrite');
  $this->load->model('emulemodel');
  $hotTopic = $this->mem->get('hotTopic');
//var_dump($hotTopic);exit;
  if( empty($hotTopic)){
   $hotTopic = $this->emulemodel->getHotTopic();
   $this->_rewrite_article_url($hotTopic);
   $this->mem->set('hotTopic',$hotTopic,$this->expirettl['1h']);
  }
  $rootCate = $this->mem->get('rootCate');
  if( empty($rootCate)){
   $rootCate = $this->emulemodel->getCateByCid(0);
   $this->_rewrite_list_url($rootCate);
   $this->mem->set('rootCate',$rootCate,$this->expirettl['30m']);
  }
  $topMenu = $this->mem->get('topMenu');
  if( empty($topMenu)){
   $menukey = array_rand($rootCate,10);
   $topMenu = array();
   foreach($menukey as $k){
    $topMenu[$k] = $rootCate[$k];
   }
   $this->mem->set('topMenu',$topMenu,$this->expirettl['3h']);
  }
  $this->assign(array(
  'seo_keywords'=>$this->seo_keywords,'seo_description'=>$this->seo_description,'seo_title'=>$this->seo_title
  ,'showimgapi'=>$this->showimgapi,'error_img'=>$this->showimgapi.'3958009_0000671092.jpg','hotTopic'=>$hotTopic,'rootCate'=>$rootCate,
  'cpid'=>0,'cid'=>0,'topMenu'=>$topMenu
  ,'editeUrl' => '/edite/index/emuleTopicAdd'
  ));
  $this->_get_postion();
  self::isrobots();
//var_dump($this->viewData);exit;
 }
 protected function _get_postion($postion = array()){
  $this->assign(array('postion'=>$postion));
 }
 static public function isrobots(){
  if(FALSE !== stripos($_SERVER['HTTP_USER_AGENT'], 'spider')){
   self::$robot = 0;
  }
 }
}
