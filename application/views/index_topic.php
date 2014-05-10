<div class="top_adreg" style="width:960px; background:#F5F5F5;">
<!-- 广告位：频道页-960*90，所有TOP位置 -->
</div>

<div class="main margin10">
<div class="mob_leftd">
<div class="mob_left l_left"> 
<div class="mob_left_b2 b2">
<h1><a href="/" title="返回首页" class="user_14">首页</a> -> <a  href="<?php echo $rootCate[$info['cid']]['url'];?>" title="查看此类型的所有笑话" class="user_14"><?php echo $rootCate[$info['cid']]['name'];?></a> -> <?php echo $info['name'];?></h1>
<span class="data l_right">浏览量: <?php echo $info['hits'];?>次</span>
</div>
<div class="clear"></div>
<div>
  
<div class="ad468_15_1 l_left">
<!-- GG-1 -->
</div>

<div class="mob_txt_info l_right">字体：[<a href="javascript:void(null)" onclick="text110.style.fontSize='18px'" class="green_new">大</a>]　[<a href="javascript:void(null)" onclick="text110.style.fontSize='14px'" class="green_new">中</a>]　[<a href="javascript:void(null)" onclick="text110.style.fontSize='12px'" class="index-green">小</a>]　[<a href="javascript:window.print();" class="index-green">打印</a>] </div>
</div>

<div class="clear"></div>
<div class="mob_txt">
<div class="ad360_280">
<!--336-280-->
</div>
<span><b>阅读技巧</b>：键盘 ←左 右→ 翻页，<font color="red">Ctrl+D 收藏</font> 本篇笑话</span><br />
<span id="text110">
<?php echo $info['intro'];?>
</span><br />

<font color="#009900">看笑话就上：<?php echo $web_title;?> <?php echo $domain;?></font> 
<br />
<br />
<div class="clear"></div>

<div class="pl_ad">

<div class="clear"></div>

<div class="ad468_date">
<b>
 <!-- GG-2 --></b>
<i>发布时间：<?php echo $info['ptime'];?></i>
</div>

</div>

<div class="clear"></div>
</div>

<div class="page">
<table width="100%" border="0" cellpadding="4" cellspacing="0">
<tr align="center" >
<?php if($info['pretitle']){?>
<td width="50%" align="left" class="user_14"><b>上一篇</b>：<a href="<?php echo $info['preurl'];?>" class="user_14"><?php echo $info['pretitle'];?></a></td>
<?php }?>
<?php if($info['nextitle']){?>
<td width="50%" align="right" class="user_14"><b>下一篇</b>：<a href="<?php echo $info['nexturl'];?>" class="user_14"><?php echo $info['nextitle'];?></a></td>
<?php }?>
</tr>
</table>
<script language=javascript><!--
document.onkeydown=nextpage;
var prevpage="<?php echo $info['preurl'];?>";
var nextpage="<?php echo $info['nexturl'];?>";
function nextpage(event)
{ 
event = event ? event : (window.event ? window.event : null); 
if (event.keyCode==39)
{if (nextpage!='')
location=nextpage
}
if (event.keyCode==37)
{if (prevpage!='')
location=prevpage; 
} 
}  
--></script>

</div>

</div>

<div class="ad728_90_up">
<!-- 阿里妈妈上 -->
</div>
<div class="clear"></div>

<div class="jokeji_xg">
 <div class="joke_xg_title b4">相关笑话</div>
 <div class="joke_xg_txt b3"><table height='23' cellspacing='0' cellpadding='0' width='95%' border='0'>
<?php $length=count($info['relatdata']); foreach($info['relatdata'] as $k => &$v){?>
<?php if($k%3 == 0){?>
<tr height="30">
<?php }?>
<td width='2%' align='left'><span><img src='<?php echo $cdn_url;?>/public/images/d02.gif?v=<?php echo $version;?>' width='9' height='9' /></span></td>
<td width="31%">
<a href="<?php echo $v['url'];?>" class="main_14" ><?php echo $v['name'];?></a>
</td>
<?php if($k%3 == 2&&$k>0 || $k == $length){?>
</tr>
<?php }?>
<?php }?>
</table>
</div>
</div>
<div class="clear"></div>

<div class="ad728_90_down">
<!-- 阿里妈妈下 -->
</div>

<div class="clear"></div>

<div class="bbs_l" id="plinfo">

</div>

<div class="clear"></div>
</div>

<div class="mob_right l_right">
<div>
<h2><a href="javascript:void(0);">热门笑话排行</a></h2>
 
<div class="mob_right_list l_right">
  <ul>
<?php foreach($topic_hot['hot'] as &$v){?>
     <li>·<a href="<?php echo $v['url'];?>" title="<?php echo $v['name'];?>" ><?php echo $v['name'];?></a></li>
<?php }?>
  </ul>
  </div>
</div>
<div class="clear"></div>

<div>
<h2><a href="javascript:void(0);">精彩笑话推荐</a></h2>
<div class="mob_right_list l_right">
 <ul>
<?php foreach($topic_hot['new'] as &$v){?>
  <li>·<a href="<?php echo $v['url'];?>" title="<?php echo $v['name'];?>"><?php echo $v['name'];?></a></li>
<?php }?>
 </ul>
 </div>
</div>
<div class="clear"></div>

<div>
<h2><a href="javascript:void(0);" target="_blank">推荐资讯信息</a></h2>
 
<div class="mob_right_float" id="box">
<div id="float">
<ul>

</ul>
</div>  
</div>
</div>

</div>
<!--右侧结束-->

<div class="clear"></div>

</div>
