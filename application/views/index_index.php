<div class="mybody">
	<div class="leftbody l_left">
   	  <h2><a href="javascript:void(0);">网站更新记录</a></h2>
      <ul>
<?php foreach($emuleIndex['monthupdate'] as &$v){?>
<li><img src="<?php echo $cdn_url;?>/public/images/date.gif?v=<?php echo $version;?>" border=0 style='height:20'><a  href="<?php echo $v['url'];?>" title="查看当前日期的笑话"  target="_blank"><?php echo $v['title'];?></a><span>(更新：<?php echo $v['total'];?>篇)</span></li>
<?php }?>
</ul>
<div class="left_ad">
<?php if(0){?>
       <h2>网站活动专题</h2>
        <ul>
       <li><a href="joke_elite.htm" target="_blank"><font color="#365eb0">1.笑话大全 爆笑笑话1600则</font></a></li>
       </ul>
<?php }?>
	  </div>
	</div>
    <div class="rightbody l_right">
      <div class="title l_left b4">
        <h3 class="l_left"><a href="list.htm">最新笑话</a></h3>
        <b>+ <a href="<?php echo $rootCate[13]['url'];?>" target="_blank">经典笑话</a> + <a href="<?php echo $rootCate[15]['url'];?>" target="_blank"><?php echo $rootCate[15]['name'];?></a></b> </div>
      <div class="clear"></div>
      <div class="newcontent l_left">
        <ul>
<?php foreach($emuleIndex['new'] as $k => &$v){
if($k>9){
break;
}
?>
          <li><img src="<?php echo $cdn_url;?>/public/images/d02.gif?v=<?php echo $version;?>" width="8" height="10" border="0" /> 
<a href="<?php echo $v['url'];?>" target="_blank" title="<?php echo $v['name'];?>"><?php echo $v['name'];?></a>(<?php echo $v['hits'];?>)<span><?php echo $v['onlinedate'];?></span><span><img src="<?php echo $cdn_url;?>/public/images/new.gif?v=<?php echo $version;?>" width="28" height="11" border="0" /></span></li>
<?php }?>
        </ul>
      </div>
      <div class="bodyad l_right" style="width:336px; padding-top:6px;">
<!--首页  336*280 -->
<ul>
<?php foreach($emuleIndex['new'] as $k => &$v){
if($k<10){
continue;
}
?>
          <li><img src="<?php echo $cdn_url;?>/public/images/d02.gif?v=<?php echo $version;?>" width="8" height="10" border="0" /> 
<a href="<?php echo $v['url'];?>" target="_blank" title="<?php echo $v['name'];?>"><?php echo $v['name'];?></a>(<?php echo $v['hits'];?>)<span><?php echo $v['onlinedate'];?></span><span><img src="<?php echo $cdn_url;?>/public/images/new.gif?v=<?php echo $version;?>" width="28" height="11" border="0" /></span></li>
<?php }?>
        </ul>
      </div>
    </div>
  <div class="clear"></div>

<div class="leftbody l_left">
        <h2><a href="list.htm">笑话大全</a></h2>
  <div class="joketype l_left">
        <ul>
<?php foreach($rootCate as &$v){?>
  <li> <a href="<?php echo $v['url'];?>"><?php echo $v['name'];?>(<?php echo $v['atotal'];?>)</a></li>
<?php }?>
</ul>
</div>
</div>

<div class="rightbody l_right">
<?php foreach($emuleIndex['cate_index'] as $k => &$v){?>
<div class="title8 l_left b4" style="margin-top:8px;">
<h3><a href="hot.htm"><?php echo $rootCate[$k]['name'];?></a></h3>
<span><a href="<?php echo $rootCate[$k]['url']?>" target="_blank">&gt;&gt; 点击查看</a> </span>
</div>
<div class="clear"></div>
<div class="listjoke">    
<ul>
<div class="clear" style="height:7px;"></div>
<?php foreach($v as &$vv){?>
  <li><span><b> <a href="<?php echo $vv['url']?>" target="_blank" ><?php echo $vv['name']?></a></b><i>(<?php echo $vv['hits']?>)</i></span><?php echo $vv['onlinedate']?></li>
<?php }?>
	</ul>
	</div>    
<?php }?>
<div class="title8 l_left b4" style="margin-top:8px;">
<h3><a href="hot.htm">笑话排行榜</a></h3>
<span><a href="<?php echo $rootCate[18]['url']?>" target="_blank">&gt;&gt; 点击查看</a> <a href="<?php echo $rootCate[18]['url']?>" target="_blank"><?php echo $rootCate[18]['name']?></a></span>
</div>
<div class="clear"></div>
<div class="listjoke">
<ul>
<div class="clear" style="height:7px;"></div>
<?php foreach($emuleIndex['hot'] as &$vv){?>
  <li><span><b> <a href="<?php echo $vv['url']?>" target="_blank" ><?php echo $vv['name']?></a></b><i>(<?php echo $vv['hits']?>)</i></span><?php echo $vv['onlinedate']?></li>
<?php }?>
        </ul>
        </div>
</div>
<div class="clear"></div>	

<div class="ad960index">    
<!-- 广告位：首页960-90通栏 -->
</div>

<div class="clear"></div>
<div class="jokeother">
<?php $ks=1;foreach($emuleIndex['cateindex'] as $k => &$v){?>
	<div class="joke0<?php echo $ks;?> l_left">
	<div class="joke0<?php echo $ks;?>title l_left b4">
	<h2><a href="<?php echo $rootCate[$k]['url'];?>"><?php echo $rootCate[$k]['name'];?></a></h2>
	</div>
    <div class="clear"></div>
	<ul>    
<?php foreach($v as &$vv){?>
	<li><span><b> <a href="<?php echo $vv['url'];?>" target="_blank" ><?php echo $vv['name'];?></a></b><i>(<?php echo $vv['hits'];?>)</i></span><?php echo $vv['onlinedate'];?></li>
<?php }?>
	</ul>
</div>
<?php }?>

<div class="clear"></div>
<?php if(0){?>
<div class="title1 l_left b4"><h3><a href="http://photo.jokeji.cn/offer.asp" target="_blank">浪漫爱情故事</a></h3>
   	  <b></b>
<span style="width:680px; cursor:hand" ><a href="http://photo.jokeji.cn/offer.asp" target="_blank">更多爱情故事 >></a></span></div>
    <div class="clear"></div>
    <div class="photoother">
      <ul>
        <li><a href="http://photo.jokeji.cn/ad/214/" target="_blank"><img src="http://www.jokeji.cn/ad/a-01.jpg" alt="情人节专题" width="160" height="116" border="0" /></a><span><a href="http://photo.jokeji.cn/ad/214/" target="_blank" class="top_txt">情人节-沧海桑田见证我的爱</a></span></li>
       
      </ul>
  </div>
<?php }?>
<div class="clear"></div>

</div>

<div class="foot">
    
<div class="friends">
<div class="baidu">
</div>
<?php if(0){?>
<div class="links">
<table width="950" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="214" valign="top" style="padding-top:4px; color:#333;">导航合作：
    
    <a href="http://www.hao123.com/gaoxiao/" target="_blank">hao123</a> | 
    </tr>
</table>


<font color="#333">友情链接：</font>
<a href="http://xiaohua.zol.com.cn" target="_blank">ZOL笑话</a> | 

</div>
<?php }?>
</div>
