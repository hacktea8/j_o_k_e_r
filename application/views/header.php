<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--published at :2014-5-7 12:02:55 from jokeji-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $seo_title,'_',$web_title;?>-左右快捷键可切换笑话_Jok.EmuBt.Com</title>
<meta name="keywords" content="<?php echo $seo_keywords,',',$web_title;?>" />
<meta name="description" content="<?php echo $seo_title,'-',$web_title,$seo_description;?>" />
<link href="<?php echo $cdn_url;?>/public/css/global.css?v=<?php echo $version;?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $cdn_url,'/public/css/',$_c,'_',$_a;?>.css?v=<?php echo $version;?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43439571-4', 'emubt.com');
  ga('send', 'pageview');

</script>
<script language="javascript" src="<?php echo $cdn_url;?>/public/js/global.js?v=<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $cdn_url;?>/public/js/lanage.js?v=<?php echo $version;?>"></script>
</head>
<body>
<!--网站头部开始-->
<div class="main">
	<div class="top">
    	<div class="top_logo l_left"><a href="/"><img src="<?php echo $cdn_url;?>/public/images/logo.jpg?v=<?php echo $version;?>" alt='<?php echo $web_title;?>LOGO' /></a></div>
        <div class="top_ad l_left">
<!-- 468-60 --></div>
        <div class="top_login l_right" id="userstat">
   <div id="user_login">
   <span class="user">Œ</span>
   <div class="iconList" style="display: none;">
   <ul>
    <li><a href="/maindex/fav/" title="我的收藏"><em class="iconfont">ũ</em><cite>我的收藏</cite></a></li>
    <li><a href="/maindex/loginout" title="登出"><em class="iconfont">ơ</em><cite>登出</cite></a></li>
   </ul>
   </div>
   <div class="dropMenu" style="display: none;">
   <ul>
    <li><a class="btn" title="登入" href="/maindex/login" target="_blank">登入</a></li>
   </ul>
   </div>
 </div>
<?php if(0){?>
<a href="/yuanchuangxiaohua/details.asp" target="_blank">发表笑话,赚取奖金</a> |  
<?php }?>
<br>
<a style="color: blue;font-size: medium;" href="javascript:transformLan();" id="a-lang" title="點擊以繁體中文>方式浏覽" name="a-lang">繁體中文切換</a> <a href="javascript:void(0);" target="_blank"><img src="<?php echo $cdn_url;?>/public/images/fbjoke.gif?v=<?php echo $version;?>" alt="发表笑话" border="0"></a>
</div>
        <div class="clear"></div>
        <div class="top_menu">
        	<ul>
                <li><a href="/" >首 页</a></li>
<?php foreach($topMenu as &$v){?>
                <li><a href="<?php echo $v['url'];?>"><?php echo $v['name'];?></a></li>
<?php }?>
            </ul>
            <div class="top_count"></div>
            <div class="top_new"><img src="<?php echo $cdn_url;?>/public/images/newpic.gif?v=<?php echo $version;?>" alt="新" width="22" height="13" border="0" /></div>
        </div>
<div class="search_top">
         <form action="/maindex/search" name="mysearch" method="get" target="_self">
        	<div class="search_top_info">
            <ul>
                <li style="color:#4EAA00">搜索：</li>
                <li><span id="cidselect">
                 </span></li>
                <li><input name="q" id="keyword" type="text" size="26" maxlength="18" class="input" />
              </li>
                <li><input type="image" src="<?php echo $cdn_url;?>/public/images/search.gif?v=<?php echo $version;?>" border="0" alt="点击搜索笑话"/></li>
	</ul>
       </div>
    </form>       
<div class="top_search_baidu">
<!-- 百度搜索位置470-40 -->
</div>
</div>
</div>
</div>
