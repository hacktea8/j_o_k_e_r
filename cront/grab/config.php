<?php

$grabsite = array(
//jokeji
array('domain'=>'http://www.jokeji.cn/'),
//icili emule
array('domain'=>'http://img.icili.com/mule/%d/thumb.jpg'),
//icili bt
array('domain'=>''),
//cr173
array('domain'=>'')
);

$strreplace=array(
#array('from'=>'www.vvtor.com','to'=>'btv.hacktea8.com')
//array('from'=>'\"','to'=>'"')
//,array('from'=>'\r\n','to'=>'')
//,array('from'=>'\n','to'=>'')
);
//
$pregreplace=array(
array('from'=>'#class="[^"]+"#Us','to'=>'</td>')
,array('from'=>'#id="[^"]+"#','to'=>'')
,array('from'=>'#<script [^>]+>.*</script>#','to'=>'')
,array('from'=>'#<a[^>]+>#Uis','to'=>'')
,array('from'=>'#</a>#Uis','to'=>'')
);

