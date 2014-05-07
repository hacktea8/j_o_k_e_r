<?php

function getinfolist(){
  global $model,$_root;
  for($i=80;;$i++){
//通过 atotal计算i的值
    $cateurl = $_root.'keyword.asp?MaxPerPage=22&listtype=title&cid=0&me_page='.$i;
    $html=getHtml($cateurl);
    $html = iconv("GBK","UTF-8//IGNORE", $html);
    preg_match_all('#<td width="\d+" align="left"><a href="([^"]+)" class="main_\d+" target="_blank" >([^<]+)</a></td>#Uis',$html,$matchs,PREG_SET_ORDER);
//echo '<pre>';var_dump($matchs);exit;
    if(empty($matchs)){
      echo ('Cate list Failed '.$cateurl."/第{$i}页\r\n");
      return 6;
    }
    foreach($matchs as $list){
      $oid=0;
      $oname=trim($list[2]);
//先判断是否存在
      $aid=$model->checkArticleByOname($oname);
      if($aid){
         echo "{$aid}已存在未更新!\r\n";
         continue;
        return 6;
      }
      $purl=$_root.urlencode($list[1]);
      $thum = '';
      $ainfo=array('ourl'=>$purl,'name'=>$oname,'thum'=>$thum,'cid'=>0);
//print_r($ainfo);exit;
      getinfodetail($ainfo);
//exit;
sleep(3);
    }

sleep(2);
  }
return 0;
}

function getinfodetail(&$data){
  global $model,$strreplace,$pregreplace,$_root;
  $html=getHtml($data['ourl']);
  $html = iconv("GBK","UTF-8//IGNORE", $html);
  if(!$html){
    echo "获取html失败";exit;
  }
  //file_put_contents('detail.html',$html);
  //kw
  preg_match('#<meta name="keywords" content="(.+)"[^>]*>#U',$html,$match);
  $data['keyword']=trim($match[1]);
  //var_dump($match);exit;
  $data['ptime']=time();
  $data['utime']=time();
  preg_match('#<h1><a href="../../" title="返回首页" class="user_[^"]+">首页</a> -> <a  href="..\/..\/List\d+_1.htm" title="[^"]+" class="user_[^"]+">([^"]+)</a>[^<]+</h1>#Uis',$html,$match);
  $str = trim($match[1]);
  $data['cname']=$str;
  $data['ourl'] = str_replace($_root,'',$data['ourl']);
  //
  preg_match('#<span id="text110">(.+)</span><br />\s*<font color="\#009900">#Uis',$html,$match);
  $str = trim($match[1]);
  //file_put_contents('error_detail.htm',$html);
  //var_dump($str);exit;
  $data['intro']=$str;
  foreach($strreplace as $val){
    $data['intro']=str_replace($val['from'],$val['to'],$data['intro']);
  }
  foreach($pregreplace as $val){
    $data['intro']=preg_replace($val['from'],$val['to'],$data['intro']);
  }
  $data['intro']=trim($data['intro']);
  if(!$data['name'] || !$data['intro']){
     echo "抓取失败 $data[ourl] \r\n";
     echo '<pre>',$str;var_dump($data);exit;
     return false;
  }
  //echo '<pre>';var_dump($data);exit;
  $aid=$model->addArticle($data);
  if(!$aid){
    echo "添加失败! $data[ourl] \r\n";
    return false;
  }
  echo "添加成功! $aid \r\n";
}
