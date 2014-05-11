<div class="foot">
<div class="footer"><a href="<?php echo $site_url;?>" class="txt_top12">
<?php echo $web_title,'_',$domain;?> 永久域名</a> Copyright &copy; All Rights Reserved <br>
如果你喜欢本站,请把本站告诉给你QQ上的朋友哦! 如果网站内容侵犯到您的权益,请联系我们,我们会在24小时内删除.<br />
温馨提示：Ctrl+D 会有惊喜哦，你试试看！
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
var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_5900693'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "v1.cnzz.com/stat.php%3Fid%3D5900693%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));
</script>
<!-- Baidu Button BEGIN -->
<!-- Baidu Button END -->
</div>
</body>
</html>
