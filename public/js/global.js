var xmlhttp;
function sendpl(url,divname)
{
	var sendpl;
	
	if (window.ActiveXObject){xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
	else if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 0)
		{document.getElementById(divname).innerHTML = "<center><img border=0 src='/images/loading.gif' /></center>";}
		if(xmlhttp.readyState == 1)
		{document.getElementById(divname).innerHTML = "<center><img border=0 src='/images/loading.gif' /></center>";}
		if(xmlhttp.readyState == 2)
		{document.getElementById(divname).innerHTML = "<center><img border=0 src='/images/loading.gif' /></center>";}
		if(xmlhttp.readyState == 3)
		{document.getElementById(divname).innerHTML = "<center><img border=0 src='/images/loading.gif' /></center>";}
		if(xmlhttp.readyState == 4)
		{
			if(xmlhttp.status == 200)
			{
				document.getElementById(divname).innerHTML = xmlhttp.responseText;
				//if(document.getElementById(divname).innerHTML.indexOf("暂无评论")==-1)
				//{document.getElementById("plcontent").style.display="block";
				//document.getElementById("plinfo").style.display="block";}
				//else
				//{document.getElementById("plcontent").style.display="none";
				//document.getElementById("plinfo").style.display="none";}
				sendpl=true;
				if(document.getElementById("imgidpl"))
					if(formpl.v.value!='')
						document.getElementById("imgidpl").innerHTML = '<img src="/inc/GetGif.asp?t='+Math.random()+'" alt="点击刷新验证码" style="cursor:pointer;border:0;vertical-align:middle;" onclick="this.src=\'/inc/GetGif.asp?t=\'+Math.random()" />';
				if(document.getElementById("imgnewid"))
					if(formpl.v.value!='')
						document.getElementById("imgnewid").innerHTML = '<img src="/inc/GetGif.asp?t='+Math.random()+'" alt="点击刷新验证码" style="cursor:pointer;border:0;vertical-align:middle;" onclick="this.src=\'/inc/GetGif.asp?t=\'+Math.random()" />';
				formpl.content.value='';
				formpl.v.value='';
			}
			else
			{document.getElementById(divname).innerHTML = "<font color=red>处理程序出现异常，验证失败!</font>";
			sendpl=false;}
		}
	}
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
	
	return sendpl;
}	  
	  function checkpl()
	  {
		  	var mysendpl;
		if(formpl.content.value=='')
		{
			alert('请填写评论内容.');
			return false;
		}
		if(formpl.v.value=='')
		{
			alert('请填写验证码.');
			formpl.v.focus();
			return false;
		}		
		if (document.formpl.content.value.length>1000)
		{
    		alert("内容超出了限制（1000）。");
			return false;
		}
		mysendpl=sendpl("/inc/p.asp?action=add&verifycode="+formpl.v.value+"&cid="+formpl.c_id.value+"&nid="+formpl.n_id.value+"&content="+formpl.content.value,"viewpl");
		//document.getElementById('imgnewid').src='/inc/GetGif.asp?t='+Math.random();
		//document.getElementById('imgidpl').innerHTML='点击获取验证码';
		if(mysendpl)
		{document.getElementById('imgnewid').src='/inc/GetGif.asp?t='+Math.random();
		document.getElementById('content').value='';
		document.getElementById('v').value='';}
		return false;
	  }
function CopyInBoard(hahaUrl)
{
	var zpurl=document.location.href;
	window.clipboardData.setData("text",hahaUrl)
	alert("网址复制成功啦!\n\n发给好友,一起乐乐!~");
}
function Copyvalue()
{
	CopyInBoard(document.getElementById("address").value);
}

//document.body.oncopy = function () { 
//setTimeout( function () { 
//var text = clipboardData.getData("text");
//if (text) { 
//	text = text + "\r\n开心笑话集：你爆笑料，我发奖金！http://www.jokeji.cn/";
//	clipboardData.setData("text", text);
//        	} 
//}, 100 ) 
//}

