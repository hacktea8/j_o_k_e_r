<div class="foot">
<div class="footer"><a href="<?php echo $site_url;?>" class="txt_top12">
<?php echo $web_title,'_',$domain;?> 永久域名</a> Copyright &copy; All Rights Reserved <br>
如果你喜欢本站,请把本站告诉给你QQ上的朋友哦! 如果网站内容侵犯到您的权益,请联系我们【<?php echo $admin_email;?>】,我们会在24小时内删除.<br />
<font color="blue">温馨提示：Ctrl+D 会有惊喜哦，你试试看！</font>
<script type="text/javascript">
</script>
</div>
</div>
<div style="display:none;">
<script type="text/javascript">
function _loadIndex(){$.get("/maindex/index");
$.get("/maindex/crontab");
}
$(document).ready(function(){
<?php if('index' == $_a){ ?>
window.setTimeout("_loadIndex()",5000);
<?php } ?>
});
function _Userlogin(){
  var timer=null;
  var _hide=function(){
    $('.iconList').hide();$('.dropMenu').hide();}
  var init=function(){
    $('#user_login').mouseout(function(){
      timer=setTimeout(_hide,500);});
    $('#user_login').mouseover(function(){
     clearTimeout(timer);
     if($('.iconList').is(":visible") || $('.dropMenu').is(":visible")){
       return false;}
     $.get('/maindex/isUserInfo/',function(data){
       if(data.status==1){
         $('.iconList').show();$('.dropMenu').hide();
       }else{
         $('.iconList').hide();$('.dropMenu').show();}
      },"json");});}
  init();}
_Userlogin();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Facee860ef1f2d285e186648a92b0f30a' type='text/javascript'%3E%3C/script%3E"));
</script>
<!-- Baidu Button BEGIN -->
<!-- Baidu Button END -->
</div>
</body>
</html>
