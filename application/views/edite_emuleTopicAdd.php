<div class="main margin10">
<table width="960" height="157" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td width="210">
<table width="220" height="30" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" class="left_title"><a href="javascript:void(0);">用户信息</a></td>
  </tr>
</table>

<table width="220" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" style=" padding-top:6px;">
    
    <table width="100%" height="24" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
        
        <table width="68" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="32" align="center" valign="top" background="<?php echo $cdn_url;?>/public/images/an01.gif?v=<?php echo $version;?>"><a href="javascript:void(0);" class="left_menu">我的首页</a></td>
          </tr>
        </table>
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="220" border="0" cellpadding="4" cellspacing="1" bgcolor="#D8D8D8" style="margin-top:10px;">
  <tr>
    <td bgcolor="#F5F5F5"><table width="203" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="32" height="26"><img src="<?php echo $cdn_url;?>/public/images/u_1.gif?v=<?php echo $version;?>" width="22" height="22" /></td>
        <td width="171" height="26" align="left"><a href="javascript:void(0);">我的原创笑话</a></td>
      </tr>
    </table></td>
  </tr>
</table>

<table width="220" border="0" cellpadding="4" cellspacing="1" bgcolor="#D8D8D8" style="margin-top:10px;">
  <tr>
    <td bgcolor="#F5F5F5"><table width="203" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="32" height="26"><img src="<?php echo $cdn_url;?>/public/images/jifen.gif?v=<?php echo $version;?>" width="21" height="21" /></td>
        <td width="171" height="26" align="left"><a href="MemberMsgSend.asp">提交问题</a></td>
      </tr>
    </table></td>
  </tr>
</table>

<table width="220" border="0" cellpadding="0" cellspacing="1" bgcolor="#D8D8D8" style="margin-top:20px;">
  <tr>
    <td height="32" bgcolor="#F5F5F5"><table width="171" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="171" height="26" align="left" class="main_title">&nbsp;&nbsp;<strong>编辑推荐</strong></td>
      </tr>
    </table></td>
  </tr>
</table>
    </td>
    <td><table width="730" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#CEEFB1">
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
              <tr bgcolor="#EFFFE2">
                <td height="25" align="left" class="top_nav">&nbsp;&nbsp;<a href="javascript:void(0);" class="top_nav">会员中心 </a>--&gt; <span class="top_nav">发表原创笑话</span></td>
              </tr>
              <tr bgcolor="#EFFFE2">
                <td height="560" valign="top" bgcolor="#FFFFFF">
				
	<form name="myform" action="/edite/index/<?php echo $_a;?>" method="post"  onSubmit="return checkform()">
          <table cellspacing=0 cellpadding=0 width="98%" align=center border=0>
            <tbody>
              <tr>
                <td width="49" height=5></td>
              </tr>
            </tbody>
          </table>
          <table width="98%" border=0 align=center cellpadding=6 cellspacing=1 bgcolor="#eeeeee">
            <tbody>
              <tr>
                <td width="110" height="40" align="left" valign="middle" bgcolor="#FFFFFF"><font color="#FF0000">*</font><span class="main_14">类型</span></td>
                <td width="582" height="40" align="left" valign="middle" bgcolor="#FFFFFF" class="mtd M" style="padding:4px;">
<select name='header[cid]'><option value='0' selected>请选择笑话类型</option>
<?php foreach($rootCate as &$v){?>
<option value='<?php echo $v['id'];?>' <?php if($v['id']==$info['cid']){echo 'selected="selected" ';}?>><?php echo $v['name'];?></option>
<?php }?>
</select> 
                请发布原创笑话，转载或者复制审核无法通过。(发布后既同意本站拥有作品版权)</td>
              </tr>
              <tr>
<input type="hidden" name="header[id]" value="<?php echo @$info['id'];?>">
<?php if($uinfo['uid'] === $info['uid'] || !$info['uid']){?>
    <input type="hidden" name="header[uid]" value="<?php echo @$uinfo['uid'];?>">
    <input type="hidden" name="header[uname]" value="<?php echo @$uinfo['uname'];?>">
<?php }?>
                <td width=110 height="40" align=left bgcolor="#FFFFFF"><font color="#FF0000">*</font><span class="main_14">笑话标题</span></td>
                <td height="40" align="left" bgcolor="#FFFFFF" class="mtd M" style="padding:4px;"><input name="header[name]" type="text" id="Title" size="60" value="<?php echo @$info['name'];?>"></td>
              </tr>
              <tr>
                <td width=110 height="40" align=left bgcolor="#FFFFFF"><font color="#FF0000">*</font><span class="main_14">笑话标签(以,逗号分隔)</span></td>
                <td height="40" align="left" bgcolor="#FFFFFF" class="mtd M" style="padding:4px;"><input name="body[keyword]" type="text" id="keyword" size="60" value="<?php echo @$info['keyword'];?>"></td>
              </tr>
              <tr>
              <td width=110 height="40" align=left valign="top" bgcolor="#FFFFFF"><font color="#FF0000">*</font><span class="main_14">笑话内容</span></td>
                <td height="40" align="left" bgcolor="#FFFFFF" class="mtd M" style="padding:4px;">
<textarea id="Content" name="body[intro]" style="width:98%;height:200px;margin:0;padding:0;border:none;"><?php echo @$info['intro'];?></textarea>
</td>
                </tr>
              <tr>
                <td width="110" height="50" align=right bgcolor="#FFFFFF">&nbsp;</td>
                <td height="50" align="left" bgcolor="#FFFFFF" class="mtd M" style="padding:4px;"><input type="submit" name="Submit2" value=" 提交发布 " style="width:120px; height:28px;">
                </td>
              </tr>
          </table>
          <table cellspacing=1 cellpadding=5 width="98%" align=center border=0>
            <tbody>
            </tbody>
          </table>
      </form>
	</td>
              </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
</div>
</div>
<div class="clear" style="margin-top:6px; "></div>
<script language="javascript">
function checkform()
{
	if(myform.C_id.value==""||myform.C_id.value==0)
	{
		alert('请选择所属类型！');
		myform.C_id.focus();
		return false;
	}


	if(myform.Title.value=="")
	{
		alert('笑话标题不能为空！');
		myform.Title.focus();
		return false;
	}
	
	if(myform.Content.value=="")
	{
		alert('笑话内容不能为空！');
		return false;
	}	
	if (document.myform.Content.value.length>20480)
	{
    	alert("内容太长，超出限制（20K）！");
		return false;
	}
	//if(myform.v.value=="")
	//{
	//	alert('验证码不能为空！');
	//	myform.v.focus();
	//	return false;
	//}		
}
</script>
