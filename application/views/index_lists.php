<div class="clear"></div>
<div align="center">
<table width="960" height="157" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:4px 0 4px 0; ">
      <tr>
        <td width="94%" class="left_title">笑话分类</td>
        <td width="6%" class="left_title"><img src="<?php echo $cdn_url;?>/public/images/off.gif?v=<?php echo $version;?>" width="41" height="13"  style="cursor:hand" onclick="javascript:if(document.getElementById('classlist').style.display=='block'){this.src='<?php echo $cdn_url;?>/public/images/on.gif?v=<?php echo $version;?>';document.getElementById('classlist').style.display='none';}else{this.src='<?php echo $cdn_url;?>/public/images/off.gif?v=<?php echo $version;?>';document.getElementById('classlist').style.display='block';}"/></td>
      </tr>
    </table>
      <table width="100%" border="0" cellpadding="4" cellspacing="0" class="left_4bh" align="center" id="classlist" style="display:block">
<?php $k=0; foreach($rootCate as &$v){ ?>
<?php if($k%7==0){?>
        <tr valign="top" bgcolor="#F9F9F9">
<?php }?>
<td width="119">&nbsp;&nbsp;<a href="<?php echo $v['url'];?>" target="_self" class="user_14">
<?php echo $v['name'];?>(<?php echo $v['atotal'];?>)</a>
</td>
<?php if($k%7==6&&$k>0 || $k==count($rootCate)){?>
</tr>
<?php }?>
<?php $k++;}?>
      </table>
      <table width="50" height="6" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
      </table> 
<table width="960" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">

      <td width="646">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="393" align="left" background="<?php echo $cdn_url;?>/public/images/main_bg.gif?v=<?php echo $version;?>" class="main_title" style="padding:2px 0 0 6px; ">笑话列表</td>
          <td width="255" align="left" valign="bottom">
            显示方式：
        <select name="order" id="list_order" onchange="change_list();">
          <option value="1" >推荐</option>
          <option value="0" selected>最新</option>
          <option value="2">热门</option>
        </select>
        </td>
        </tr>
      <tr bgcolor="#F3F3F3">
      <td height="2" colspan="2"></td>
        </tr>
    </table>
<table width="640" border="0" cellpadding="0" cellspacing="0">
  <tr>
<td align="left" valign="middle" style="padding-left:12px;">
<!-- 广告位：排行+分类顶部 640*26 sogou -->
</td>
</tr>
</table>
    <table width="640" height="30" border="0" cellpadding="0" cellspacing="0" background="<?php echo $cdn_url;?>/public/images/d01.gif?v=<?php echo $version;?>">
<?php foreach($infolist as &$v){?>
      <tr>
        <td width="15" align="left"><img src="<?php echo $cdn_url;?>/public/images/d02.gif?v=<?php echo $version;?>" width="8" height="10" /></td>
        <td width="307" align="left"><a href="<?php echo $v['url'];?>" class="main_14" target="_blank" ><?php echo $v['name'];?></a> <?php if($uinfo['uid'] === $info['uid'] || $uinfo['isadmin']){echo "<a href='$editeUrl/$info[id]' target='_blank'>编辑</a>"; }?></td>
        <td width="141" align="left">浏览: <?php echo $v['hits'];?> 次</td>
        <td width="72" align="left"><span class="date">
          <?php echo $v['ptime'];?></span></td>
      </tr>
<?php }?>
    </table>	  
	  </td>

      <td width="310" align="right"><table width="300" border="0" cellpadding="0" cellspacing="0" style=" margin-bottom:4px; margin-top:22px;">
        <tr>
          <td valign="top"><!-- 广告位：百度300*250 -->
</td>
        </tr>
        <tr>
          <td valign="top" ><!-- 广告位：谷歌300*250  搜索频道的代码 -->
</td>
        </tr>
        <tr>
          <td valign="top" >
<!-- 广告位：排行+分类+搜素 300-250 3 sogou -->
          </td>
        </tr>
      </table>
      </td>
  </tr>
</table>

</td>
  </tr>
</table>

<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="left_title">
        <tr>
          <td height="28" align="center">
		  <span class="main_title">
<?php echo $page_string;?>
</span></td>
        </tr>
</table>
</div>

<div class="clear" style="margin-top:6px; "></div>
<div class="foot">    

<div style="margin-top:12px; margin-bottom:6px;">
<!-- 广告位：阿里妈妈950-90 -->
</div>
<script type="text/javascript">
function change_list(){
var order = $('#list_order').val();
window.location.href="/maindex/lists/3/"+order+"/<?php echo $page;?>.shtml";
}
</script>
