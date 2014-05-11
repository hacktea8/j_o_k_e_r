<div class="top_adreg" style="width:960px; background:#F5F5F5;">
<!-- 广告位：频道页-960*90，所有TOP位置 -->
</div>

</div>
<div class="clear"></div>
<div align="center">
<table width="960" height="157" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:8px;">
  <tr valign="top">
    <td width="652">
	
	<table width="100%" height="27" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="27" align="left" valign="middle" class="b4">
          &nbsp;&nbsp;<b><span class="user_14"><?echo $date;?>发表的笑话大全列表</span></b></td>
        </tr>
    </table>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="b3">
  <tr>
    <td>
    
<table width="640" border="0" cellpadding="0" cellspacing="0">
  <tr>
<td height="30" align="left" valign="bottom" style="padding-top:4px; padding-left:9px;">
<!-- 广告位：640*26 sogou -->
</td>
</tr>
</table>
<?php foreach($infolist as &$v){?>
    <table width="646" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="<?php echo $cdn_url;?>/public/images/d01.gif?v=<?php echo $version;?>">
      <tr>
        <td width="23" align="center"><img src="<?php echo $cdn_url;?>/public/images/d02.gif?v=<?php echo $version;?>" width="9" height="9" /></td>
        <td width="397" align="left"><a href="<?php echo $v['url'];?>" class="main_14" target="_blank" title="<?php echo $v['name'];?>"><?php echo $v['name'];?></a> <?php if($uinfo['uid'] === $info['uid'] || $uinfo['isadmin']){echo "<a href='$editeUrl/$info[id]' target='_blank'>编辑</a>"; }?></td>
        <td width="143" align="left">浏览: <?php echo $v['hits'];?> 次</td>
        <td width="83" align="left"><span class="date">
          <?php echo $v['onlinedate'];?></span></td>
      </tr>
    </table>	  
<?php }?>
	  
    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:6px;">
      <tr>
        <td height="28" align="center">
        <table cellpadding="0" cellspacing="1" align="center">
<tr align="center" height="20">
<td class="page_string"><?php echo $page_string;?></td>
</tr>
</table>
        </td>
      </tr>
    </table>
</td>
  </tr>
</table>
 </td>
    <td width="308" align="right">
<table width="300" border="0" cellpadding="0" cellspacing="0" style=" margin-bottom:4px;">
   <tr>
   <td valign="top">
<!-- 广告位：百度300*250 -->
</td>
   </tr>
</table>
       <table width="300" height="26" border="0" cellpadding="0" cellspacing="0">
         <tr>
           <td align="left" class="user_14 b4">　<strong>笑话更新记录</strong></td>
         </tr>
       </table>

<table width="300" border="0" cellpadding="4" cellspacing="0" class="b3" >
<tr valign="top">
<td align="left" bgcolor="#FFFFFF" class="main_14">
<?php foreach($update_list as &$v){?>
<img src="<?php echo $cdn_url;?>/public/images/date.gif?v=<?php echo $version;?>" border=0 style='height:20'><a class="12title" href="<?php echo $v['url'];?>" title="查看当前日期的笑话" ><?php echo $v['title'];?></a><span class="txt12">(更新：<?php echo $v['total'];?>篇)</span><br/>
<?php }?>
 </td>
</tr>
</table>

<table width="300" border="0" cellpadding="0" cellspacing="0" style=" margin-bottom:3px;">
<tr>
<td>
<!-- 广告位：336*280 谷歌 -->
</td>
</tr>
</table>

</td>
  </tr>
</table>
</div>

<div class="clear" style="margin-top:6px; "></div>
<div class="foot">    

<div style="margin-top:12px; margin-bottom:6px;">
<!-- 广告位：阿里妈妈950-90 -->
</div>
