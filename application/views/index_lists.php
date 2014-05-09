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
<?php $k=0 foreach($channel as &$v){ ?>
<?php if($k%7==0){?>
        <tr valign="top" bgcolor="#F9F9F9">
<?php }?>
<td width="119">&nbsp;&nbsp;<a href="<?php echo $v['url'];?>" target="_self" class="user_14">
<?php echo $v['title'];?>(<?php echo $v['atotal'];?>)</a>
</td>
<?php if($k%6==0 || $k==count($channel)){?>
</tr>
<?php }?>
<?php $k++}?>
      </table>
      <table width="50" height="6" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
      </table> 
	  
	  
	  <table width="960" height="136" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">

      <td width="646">
      <table width="100%" height="24" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="393" align="left" background="<?php echo $cdn_url;?>/public/images/main_bg.gif?v=<?php echo $version;?>" class="main_title" style="padding:2px 0 0 6px; ">笑话列表</td>
          <td width="255" align="left" valign="bottom"><form id="form1" name="form1" method="post" action="" style="margin-bottom:0px">
            <input name="cid" type="hidden" id="cid" value="0" />
            <input name="me_page" type="hidden" id="me_page" value="" />
            <input name="hy_name" type="hidden" id="hy_name" value="" />
            <input name="hy_id" type="hidden" id="hy_id" value="" />
            <input name="keyword" type="hidden" id="keyword" value="" />
            <input name="action" type="hidden" id="action" value="" />
            显示方式：
        <select name="listtype" onchange="javascript:form1.submit()">
          <option value="content" >内容</option>
          <option value="title"   selected>标题</option>
        </select>
		每页个数：
        <select name="MaxPerPage" size="1" id="MaxPerPage" onchange="javascript:form1.submit()">
          <option value="6"  >6</option>
          <option value="12" >12</option>
          <option value="24" >24</option>
          <option value="50" >50</option>
        </select>
          </form></td>
        </tr>
      <tr bgcolor="#F3F3F3">
      <td height="2" colspan="2"></td>
        </tr>
    </table>
    
	
<table width="640" border="0" cellpadding="0" cellspacing="0">
  <tr>
<td height="40" align="left" valign="middle" style="padding-left:12px;">
<!-- 广告位：排行+分类顶部 640*26 sogou -->
</td>
</tr>
</table>
	
						
    <table width="640" height="30" border="0" cellpadding="0" cellspacing="0" background="<?php echo $cdn_url;?>/public/images/d01.gif?v=<?php echo $version;?>">
<?php foreach($infolist as &$v){?>
      <tr>
        <td width="15" align="left"><img src="<?php echo $cdn_url;?>/public/images/d02.gif?v=<?php echo $version;?>" width="8" height="10" /></td>
        <td width="307" align="left"><a href="<?php echo $v['url'];?>" class="main_14" target="_blank" ><?php echo $v['title'];?></a></td>
        <td width="105" align="left">评论:0</td>
        <td width="141" align="left">浏览: <?php echo $v['hits'];?> 次</td>
        <td width="72" align="left"><span class="date">
          <?php echo $v['ptime'];?></span></td>
      </tr>
<?php }?>
    </table>	  
	  </td>

      <td width="310" align="right"><table width="300" border="0" cellpadding="0" cellspacing="0" style=" margin-bottom:4px; margin-top:22px;">
        <tr>
          <td valign="top" height="260"><!-- 广告位：百度300*250 -->
</td>
        </tr>
        <tr>
          <td valign="top"height="260" ><!-- 广告位：谷歌300*250  搜索频道的代码 -->
</td>
        </tr>
        <tr>
          <td valign="top"height="260" >
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
        <table cellpadding="0" cellspacing="1" align="center"><form action="keyword.asp?MaxPerPage=22&listtype=title&cid=0&" method="post" name="PageForm" onsubmit="javascript:window.open('keyword.asp?MaxPerPage=22&listtype=title&cid=0&&me_page='+ PageForm.page.value,'_self');return false;">
<tr align="center" height="20">
<td>&nbsp;<img src="/images/First.gif" border="0" alt="">&nbsp;</td>
<td>&nbsp;<u><b>1</b></u>&nbsp;</td>
<td>&nbsp;<a href="keyword.asp?MaxPerPage=22&listtype=title&cid=0&me_page=2">2</a>&nbsp;</td>
<td>&nbsp;<a href="keyword.asp?MaxPerPage=22&listtype=title&cid=0&me_page=3">3</a>&nbsp;</td>
<td>&nbsp;<a href="keyword.asp?MaxPerPage=22&listtype=title&cid=0&me_page=4">4</a>&nbsp;</td>
<td>&nbsp;<a href="keyword.asp?MaxPerPage=22&listtype=title&cid=0&me_page=5">5</a>&nbsp;</td>
<td>&nbsp;<a href="keyword.asp?MaxPerPage=22&listtype=title&cid=0&me_page=6">6</a>&nbsp;</td>
<td>&nbsp;<a href="keyword.asp?MaxPerPage=22&listtype=title&cid=0&me_page=7">7</a>&nbsp;</td>
<td>&nbsp;<a href="keyword.asp?MaxPerPage=22&listtype=title&cid=0&me_page=8">8</a>&nbsp;</td>
<td>&nbsp;<a href="keyword.asp?MaxPerPage=22&listtype=title&cid=0&me_page=9">9</a>&nbsp;</td>
<td>&nbsp;<a href="keyword.asp?MaxPerPage=22&listtype=title&cid=0&me_page=10">10</a>&nbsp;</td>
<td>&nbsp;<a href="keyword.asp?MaxPerPage=22&listtype=title&cid=0&me_page=11" ><img src="/images/Next.gif" border="0" alt="下十页"/></a></td>
<td>&nbsp;<a href="keyword.asp?MaxPerPage=22&listtype=title&cid=0&me_page=382"><img src="/images/Last.gif" border="0" alt="尾页"/></a>&nbsp;</td>
<td><input type="text" name="page" size="3" value="1" class="PageInput"/><input type="submit" value="GO" name="submit" class="PageInput"/></td>
</tr></form></table>
</span></td>
        </tr>
</table>
</div>

<div class="clear" style="margin-top:6px; "></div>
<div class="foot">    

<div style="margin-top:12px; margin-bottom:6px;">
<!-- 广告位：阿里妈妈950-90 -->
</div>
