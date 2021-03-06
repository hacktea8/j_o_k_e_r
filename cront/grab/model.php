<?php


class Model{
  protected $db;
  
  function __construct(){
    $this->db=new DB_MYSQL();
  }

  function getCateBycid($cid){
    if(!$cid){
      return false;
    }
    $sql=sprintf('SELECT * FROM %s WHERE `flag`=1 AND `id`=%d LIMIT 1',$this->db->getTable('emule_cate'),$cid);
    $res=$this->db->row_array($sql);
     return $res;
  }

  function getsubcatelist(){
    $sql=sprintf('SELECT * FROM %s WHERE `flag`=1 ',$this->db->getTable('emule_cate'));
    $res=$this->db->result_array($sql);
     return $res;
  }

  function updateCateUrlByname($data=array()){
    if(!$data){
        return false;
    }
    $where=isset($data['pid'])?' AND pid='.$data['pid']:'';
    $sql=sprintf('SELECT `id`,`pid` FROM '.$this->db->getTable('emule_cate').' WHERE `name`=\'%s\' %s LIMIT 1',mysql_real_escape_string($data['name']),$where);
    $row=$this->db->row_array($sql);
    if($row['id']){
       unset($data['name']);
       $vals='';
       foreach($data as $k=>$v){
          $vals.=','."`$k`='".mysql_real_escape_string($v)."'";
       }
       $vals=trim($vals,',');
       $sql=sprintf('UPDATE '.$this->db->getTable('emule_cate').' SET %s WHERE `id`=%d LIMIT 1',$vals,$row['id']);
       $this->db->query($sql);
       return $row['id'];
    }
    $keys=$vals='';
    foreach($data as $k=>$v){
       $keys.=','."`$k`";
       $vals.=','."'".mysql_real_escape_string($v)."'";
    }
    $keys=trim($keys,',');
    $vals=trim($vals,',');
    $sql=sprintf('INSERT INTO '.$this->db->getTable('emule_cate').'(%s) VALUES (%s)',$keys,$vals);
    $this->db->query($sql);
    
  }
  
  function addCateByname($cname,$pid=0,$ourl=''){
    if(!$cname)
       return false;

    $sql=sprintf("SELECT `id` FROM `%s` WHERE `name`='%s' AND `pid`=%d LIMIT 1",$this->db->getTable('emule_cate'),mysql_real_escape_string($cname),$pid);
    $row=$this->db->row_array($sql);
    if($row['id']){
       return $row['id'];
    }
    $sql=sprintf("INSERT INTO `%s`(`pid`, `name`, `oname`) VALUES (%d,'%s','%s')",$this->db->getTable('emule_cate'),$pid,mysql_real_escape_string($cname),mysql_real_escape_string($ourl));
    $this->db->query($sql);
    return $this->db->insert_id();
  }
  function getCateInfoBypid($pid=0){
     $sql=sprintf("SELECT `id`, `oid`, `pid`, `name`, `url` FROM `%s` WHERE `pid`=%d ",$this->db->getTable('emule_cate'),$pid);
     $res=$this->db->result_array($sql);
     return $res;
  }
  function checkArticleByOid($oid,$utime){
    if(!$oid ||!$utime){
       return false;
    }
    $sql=sprintf("SELECT `id` FROM `%s` WHERE  `oid`=%d AND `utime`=%d LIMIT 1",$this->db->getTable('emule_article'),$oid,$utime);
    $row=$this->db->row_array($sql);
    return $row['id'];
  } 
  function checkArticleByOname($oname){
    if(!$oname){
       return false;
    }
    $sql=sprintf("SELECT `id` FROM `%s` WHERE  `name`='%s' LIMIT 1",$this->db->getTable('emule_article'),mysql_real_escape_string($oname));
    $row=$this->db->row_array($sql);
    return $row['id'];
  }
  function copy_array($array,$keys){
    $return = array();
    foreach($keys as $k){
      if(isset($array[$k])){
        $return[$k] = $array[$k];
      }
    }
    return $return;
  } 
  function addArticle($data){
    if(!$data){
       return false;
    }
    $contents = $this->copy_array($data,array('keyword','intro'));
    $head = $this->copy_array($data,array('ptime','utime','cid','thum','name','ourl'));
    if(!$head['cid']){
      $head['cid'] = $this->addCateByname($data['cname']);
    }
    if(!$head['cid']){
      die("Get Cid Null Url: $head[ourl]\n");
    }
    $sql = $this->db->insert_string($this->db->getTable('emule_article'),$head);
    $this->db->query($sql);
    $id = $this->db->insert_id();
    if(!$id){
       return false;
    }
    $contents['id'] = $id;
    $table = sprintf("emule_article_content%d",$id%10);
    $sql=$this->db->insert_string($this->db->getTable($table),$contents);
    $this->db->query($sql);
    $this->updateArticleNextAndPre(array('id'=>$id,'cid'=>$head['cid']));
    return $id;
  }
  function updateArticleNextAndPre($data){
    if(empty($data)){
       return 0;
    }
    $table = $this->db->getTable('emule_article');
    $sql = sprintf("SELECT `id` FROM %s WHERE `id`!=%d AND `cid`=%d ORDER BY `id` DESC LIMIT 1",$table,$data['id'],$data['cid']);
    $preRow = $this->db->row_array($sql);
    if(empty($preRow)){
      return 0;
    }
    $sql = $this->db->update_string($table,array('next_aid'=>$data['id']),array('id'=>$preRow['id']));
    $this->db->query($sql);
    $sql = $this->db->update_string($table,array('pre_aid'=>$preRow['id']),array('id'=>$data['id']));
    $this->db->query($sql);
    return 1;
  }
  function getArticleList($page = 1, $limit = 100){
    $sql = sprintf('SELECT `id` FROM %s LIMIT %d,%d',$this->db->getTable('emule_article'),($page - 1)*$limit,$limit);
    return $this->db->result_array($sql);
  }
  function getArticleByid($id){
    $sql = sprintf('SELECT * FROM %s WHERE `id` = %d LIMIT 1',$this->db->getTable('emule_article_content'),$id);
    return $this->db->row_array($sql);
  }
  function update_article_contents($data = array()){
    if( !isset($data['id'])){
       return false;
    }
    $where = array('id'=>$data['id']);
    unset($data['id']);
    $sql = $this->db->update_string($this->db->getTable('emule_article_content'),$data, $where);
    $this->db->query($sql);
    return true;
  }
  function updateCateatotal(){
    $sql='SELECT `id` FROM '.$this->db->getTable('emule_cate').' WHERE `pid`!=0';
    $res=$this->db->result_array($sql);
    foreach($res as $val){
       $sql='UPDATE '.$this->db->getTable('emule_cate').' SET `atotal`= (SELECT count(`id`) FROM '.$this->db->getTable('emule_article').' WHERE `cid`='.$val['id'].') WHERE `id`='.$val['id'];
       $this->db->query($sql);
sleep(0.5);
    }
return true;
  }
}

?>
