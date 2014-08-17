<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'usrbase.php';
class Maindex extends Usrbase {

  public function __construct(){
    parent::__construct();
//var_dump($this->viewData);exit;
  }
  public function index()
  {
    $view = BASEPATH.'../';
    if(!is_writeable($view)){
       die($view.' is not write!');
    }
    $view .= 'index.html';
    $lock = $view . '.lock';
    if( !file_exists($view) || (time() - filemtime($view)) > 1*3600 ){
      if(!file_exists($lock)){
        $emuleIndex = $this->emulemodel->getEmuleIndexData();
//echo "<pre>";var_dump($emuleIndex);exit;
        $this->assign(array('_a'=>'index','emuleIndex'=>$emuleIndex));
        $this->view('index_index');
        $output = $this->output->get_output();
        file_put_contents($lock, '');
        file_put_contents($view, $output);
        @unlink($lock);
        @chmod($view, 0777);
        echo $output;
        return true;
      }
    }
    exit();
  }
  public function update_by_date($date,$order=0,$page=1){
    $page = intval($page);
    $date = intval($date);
    $limit = 25;
    $lists = $this->emulemodel->getArticleListByDate($date,$order,$page,$limit);
    $total = $this->emulemodel->getArticleTotalByDate($date);
    $update_list = $this->emulemodel->getMonthUpdateList(15);
    $this->load->library('pagination');
    $config['base_url'] = sprintf('/maindex/update_by_date/%d/%d/',$date,$order);
    $config['total_rows'] = $total;
    $config['per_page'] = $limit;
    $config['first_link'] = '第一页';
    $config['next_link'] = '下一页';
    $config['prev_link'] = '上一页';
    $config['last_link'] = '最后一页';
    $config['cur_tag_open'] = '<span class="current">';
    $config['cur_tag_close'] = '</span>';
    $config['suffix'] = '.html';
    $config['use_page_numbers'] = TRUE;
    $config['num_links'] = 4;
    $config['cur_page'] = $page;

    $this->pagination->initialize($config);
    $page_string = $this->pagination->create_links();
    $date = date('Y年m月',strtotime($date));
    $seo_title = '笑话月更新';
    $this->assign(array('date'=>$date,'update_list'=>$update_list,
    'seo_title'=>$seo_title,
    'page_string'=>$page_string,'infolist'=>$lists));
    $this->view('index_update_by_date');
  }
  public function fav($page = 1){
    if( !isset($this->userInfo['uid']) || !$this->userInfo['uid']){
      header('Location: /');
    }
    $page = intval($page);
    $limit = 30;
    $total = $this->emulemodel->getUserCollectTotal($this->userInfo['uid']);
    $endP = ceil($total/$limit);
    if($total && $endP >= $page){
      $lists = $this->emulemodel->getUserCollectList($this->userInfo['uid'],$order = 'new',$page,$limit);
    }
    $update_list = $this->emulemodel->getMonthUpdateList(10);
    $this->load->library('pagination');
    $config['base_url'] = sprintf('/maindex/fav/');
    $config['total_rows'] = $total;
    $config['per_page'] = $limit;
    $config['first_link'] = '第一页';
    $config['next_link'] = '下一页';
    $config['prev_link'] = '上一页';
    $config['last_link'] = '最后一页';
    $config['cur_tag_open'] = '<span class="current">';
    $config['cur_tag_close'] = '</span>';
    $config['suffix'] = '.html';
    $config['use_page_numbers'] = TRUE;
    $config['num_links'] = 5;
    $config['cur_page'] = $page;

    $this->pagination->initialize($config);
    $page_string = $this->pagination->create_links();
    $this->assign(array(
    'page_string'=>$page_string,'infolist'=>$lists,'update_list'=>$update_list));
    $this->view('index_collect');
  }
  public function addCollect($aid){
    $data = array('status'=>0);
    if($this->userInfo['uid']){
      $f = $this->emulemodel->addUserCollect($this->userInfo['uid'],$aid);
      $data['status'] = $f;
    }
    die(json_encode($data));
  }
  public function lists($cid,$order = 0,$page = 1){
    $page = intval($page);
    $cid = intval($cid);
    if($cid <1){
      header('HTTP/1.1 301 Moved Permanently');
      header('Location: /');
      exit;
    }
    $order = intval($order);
    $page = $page > 0 ? $page: 1;
    if($page < 11){
       $data = array();
       $data = $this->mem->get('emulelist'.$cid.'-'.$page.$order);
//echo '<pre>';var_dump($data);exit;
       if( empty($data)){
         $data = $this->emulemodel->getArticleListByCid($cid,$order,$page);
         $this->mem->set('emulelist'.$cid.'-'.$page.$order,$data,$this->expirettl['1h']);
       }
    }else{
       $data = $this->emulemodel->getArticleListByCid($cid,$order,$page);
    }
//echo '<pre>';var_dump($data);exit;
    $atotal = $this->viewData['rootCate'][$cid]['atotal'];
    $this->_rewrite_article_url($data);
    $data = is_array($data) ? $data: array();
    $this->load->library('pagination');
    $config['base_url'] = sprintf('/maindex/lists/%d/%d/',$cid,$order);
    $config['total_rows'] = $atotal;
    $config['per_page'] = 25; 
    $config['first_link'] = '第一页'; 
    $config['next_link'] = '下一页';
    $config['prev_link'] = '上一页';
    $config['last_link'] = '最后一页';
    $config['cur_tag_open'] = '<span class="current">';
    $config['cur_tag_close'] = '</span>';
    $config['suffix'] = '.html';
    $config['use_page_numbers'] = TRUE;
    $config['num_links'] = 5;
    $config['cur_page'] = $page;
    
    $this->pagination->initialize($config); 
    $page_string = $this->pagination->create_links();
// seo setting
    $keywords = $this->viewData['rootCate'][$cid]['name'].$this->seo_keywords;
    $title = $this->viewData['rootCate'][$cid]['name'];
    $this->assign(array('seo_title'=>$title,'seo_keywords'=>$keywords,'infolist'=>$data
    ,'page_string'=>$page_string,'cid'=>$cid,'page'=>$page));
    $this->view('index_lists');
  }
  public function topic($aid){
    $aid = intval($aid);
    if($aid <1){
      header('HTTP/1.1 301 Moved Permanently');
      header('Location: /');
      exit;
    }
    $data = $this->emulemodel->getEmuleTopicByAid($aid,$this->userInfo['uid'], $this->userInfo['isadmin']);
    //$data['info']['intro'] = strip_tags($data['info']['intro']);
    $preg_replace = array(
    array('from'=>'#<a[^>]+>#Uis','to'=>'')
    ,array('from'=>'#</a>#Uis','to'=>'')
    
    );
    foreach($preg_replace as &$v){
      $data['info']['intro'] = preg_replace($v['from'],$v['to'],$data['info']['intro']);
    }
    $data['info']['ptime']=date('Y:m:d', $data['info']['ptime']);
    $data['info']['utime'] = date('Y/m/d', $data['info']['utime']);
    $this->_rewrite_article_url($data['info']);
    $data['info'] = $data['info'][0];
    $data['info']['fav'] = 0;
    $cid = $data['info']['cid'] ? $data['info']['cid'] : 0;
    $cpid = isset($data['postion'][0]['id'])?$data['postion'][0]['id']:0;
    $data['info']['relatdata'] = $this->emulemodel->getArticleListByCid($data['info']['cid'],1,2,16);
// seo setting
    $default_seo = $data['info']['keyword']?$data['info']['keyword']:$this->seo_keywords;
    $kw = $this->viewData['rootCate'][$cid]['name'].',';
    $keywords = $data['info']['name'].','.$kw.$default_seo;
    $title = $data['info']['name'];
    $seo_description = mb_substr(trim(strip_tags($data['info']['intro'])),0,128);
    // not VIP Admin check verify
/*
    $emu_aid = isset($_COOKIE['hk8_verify_topic_dw'])?strcode($_COOKIE['hk8_verify_topic_dw'],false):'';
    $emu_aid = explode("\t",$emu_aid);
    $emu_aid = $emu_aid[0];
    $verifycode = '';
    if( 0 && !($emu_aid == $data['info']['id'] || $this->userInfo['isvip'] || $this->userInfo['isadmin'])){
       $data['info']['downurl'] = '';
       $data['info']['vipdwurl'] = '';
       $this->load->library('verify');
       $verifycode = $this->verify->show();
    }
*/
    $topic_hot = $this->mem->get('topic_hot'.$cid);
    if(empty($topic_hot)){
      $topic_hot = array();
      $topic_hot['hot'] = $this->emulemodel->getArticleListByCid($cid,2,1,15);
      $topic_hot['new'] = $this->emulemodel->getArticleListByCid($cid,1,2,15);
      $this->mem->set($key,$topic_hot,$this->expirettl['3h']);
    }
    $isCollect = $this->emulemodel->getUserIscollect($this->userInfo['uid'],$data['info']['id']);
    $this->assign(array('seo_description'=>$seo_description,'isCollect'=>$isCollect,'topic_hot'=>$topic_hot,'verifycode'=>$verifycode,'seo_title'=>$title,'seo_keywords'=>$keywords,'cid'=>$cid,'cpid'=>$cpid,'info'=>$data['info'],'postion'=>$data['postion'],'aid'=>$aid)); 
//echo '<pre>';var_dump($data['info']);exit;
    $ip = $this->input->ip_address();
    $key = sprintf('hitslog:%s:%d',$ip,$aid);
    if(!$this->redis->exists($key)){
       $this->redis->set($key, 1, $this->expirettl['6h']);
    }
    $this->view('index_topic');
  }
  public function tpl(){
    $this->load->view('index_tpl',$this->viewData);
  }
  public function search($q='',$order = 0,$page = 1){
    $q = $q ? $q:$this->input->get('q');
    $q = urldecode($q);
    $q = htmlentities($q);
    $page = intval($page);
    $page = $page -1;
    $page = $page < 0 ? 0: $page;
    $list = array();
    $pageSize = 12;
    if($q){
      $this->load->library('yunsearchapi');
      $opt = array('query'=>$q,'start'=>$page*$pageSize,'hits'=>$pageSize);
      $this->yunsearchapi->search($list,$opt);
      $hotKeywords = $this->yunsearchapi->getTopQuery($num=8,$days=30);
      //var_dump($hotKeywords);exit;
      if('OK' == $hotKeywords['status']){
         $hotKeywords = $hotKeywords['result']['items']['emu_hacktea8'];
      }
    }
/*
echo '<pre>';
var_dump($q);
var_dump($hotKeywords);
var_dump($list);exit;
/**/
    $page++;
    $hot_search = array();
    $recommen_topic = array();
    $recommen_topic[1] = array();
    $recommen_topic[2] = array();
    $hot_topic = array();
    $hot_topic['hit'] = array();
    $hot_topic['focus'] = array();
    $this->load->library('pagination');
    $config['base_url'] = sprintf('/maindex/search/%s/%d/',urlencode($q),$order);
    $config['total_rows'] = $list['result']['viewtotal'];
    $config['per_page'] = $pageSize;
    $config['first_link'] = '第一页';
    $config['next_link'] = '下一页';
    $config['prev_link'] = '上一页';
    $config['last_link'] = '最后一页';
    $config['cur_tag_open'] = '<span class="current">';
    $config['cur_tag_close'] = '</span>';
    $config['suffix'] = '.shtml';
    $config['use_page_numbers'] = TRUE;
    $config['num_links'] = 4;
    $config['cur_page'] = $page;
    $this->pagination->initialize($config);
    $page_string = $this->pagination->create_links();
    $seo_title = sprintf('正在搜索%s第%d页',$q,$page);
    $this->assign(array('searchlist'=>$list['result'],'kw'=>$q,'q'=>$q
    ,'page_string'=>$page_string,'hot_search'=>$hot_search
    ,'recommen_topic'=>$recommen_topic,'hot_topic'=>$hot_topic
    ,'seo_title'=>$seo_title
    ));
    $this->load->view('index_search',$this->viewData);
  }
  public function show404($goto = ''){
    $goto = '/';
    $this->assign(array('goto'=>$goto,'seo_title' =>'找不到您需要的页面..现在为您返回首页..'));
    $this->view('index_show404');
  }
  public function login(){
//var_dump($_SERVER);exit;
    $url = $this->viewData['login_url'].urlencode($_SERVER['HTTP_REFERER']);
//echo $url;exit;
    header('Location: '.$url);
    exit;
  }
  public function loginout(){
    $this->session->unset_userdata('user_logindata');
    setcookie('hk8_auth','',time()-3600,'/');
    $url = $_SERVER['HTTP_REFERER'];
//echo $url;exit;
    header('Location: '.$url);
    exit;
  }
  public function crontab(){
    $lock = BASEPATH.'/../crontab_loc.txt';
    if(file_exists($lock) && time()-filemtime($lock)<6*3600){
       return false;
    }
    $this->emulemodel->autoSetVideoOnline(1);
    $this->emulemodel->setCateVideoTotal();
    file_put_contents($lock,'');
    chmod($lock,0777);
    echo 1;exit;
  }
  public function isUserInfo(){
    $data = array('status'=>0);
    if( isset($this->userInfo['uid']) && $this->userInfo['uid']){
       $data['status'] = 1;
    }
    die(json_encode($data));
  }
}
