<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'usrbase.php';
class Edite extends Usrbase {
  public $_action = array('emuleTopicAdd');
  public $imguploadapiurl = 'http://img.hacktea8.com/imgapi/upload/?seq=';

  
        /**
         * Index Page for this controller.
         *
         */
  public function __construct(){
    parent::__construct();
//    $this->load->model('indexmodel');
    // check login 
    if( !$this->checkLogin()){
     header('Location: /');
    }
  }
  public function index($type, $id = 0){
     if( !in_array($type, $this->_action)){
         die('1');
     }
     $this->$type($id);
  }
  public function deletes($type, $id){
    
  }
  protected function emuleTopicAdd($id = 0){
    $header = $this->input->post('header');
    if(isset($header['name'])){
         $body = $this->input->post('body');
//var_dump($body);exit;
         $aid = $this->emulemodel->setEmuleTopicByAid($this->userInfo['uid'],$data = array('header'=>$header,'body'=>$body),$this->userInfo['isadmin']);
         $id = $aid;
    }
    $info = array();
    if($id){
       $info = $this->emulemodel->getEmuleTopicByAid($id,$this->userInfo['uid'], $this->userInfo['isadmin'],1);
       $info = $info['info'];
    }
    $this->assign(array('_a'=>'emuleTopicAdd','info'=>$info,'imguploadapiurl'=>$this->imguploadapiurl
    ));
    $this->view('edite_emuleTopicAdd');
  }
}
