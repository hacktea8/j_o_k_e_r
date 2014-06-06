<?php

$APPPATH = dirname(__FILE__);
include_once($APPPATH.'/db.class.php');

$db = new DB_MYSQL();

$list = getAll();
$i=0;
foreach($list as &$v){
  if($i%5 == 0){
   $date = date('Ymd',strtotime('-'.$i.' day'));
  }
  $data = array('onlinedate'=>$date);
  $where = array('id'=>$v['id']);
  update($data,$where);
  $i++;
}
echo "\nTask is OK!\n";
function getAll(){
 global $db;
 $sql = sprintf("SELECT `id` from `bt_emule_article` where onlinedate<=20140606 AND onlinedate>0");
 $list = $db->result_array($sql);
 return $list;
}

function update($data,$where){
 global $db;
 $sql = $db->update_string('`bt_emule_article`',$data,$where);
 $db->query($sql);
 return 1;
}

