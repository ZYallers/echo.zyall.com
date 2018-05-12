<?php
	include 'httpdown.class.php';

	$code=!empty($_GET['code'])?$_GET['code']:'js';
	$day=!empty($_GET['day'])?$_GET['day']:'0';
	$dfc=!empty($_GET['dfc'])?$_GET['dfc']:'1';
	$city=!empty($_GET['city'])?$_GET['city']:'北京';
	$charset=!empty($_GET['charset'])?$_GET['charset']:'utf-8';

	$Rs['wurl']='http://php.weather.sina.com.cn/iframe/index/w_cl.php?code='.$code.'&day='.$day.'&city='.$city.'&dfc='.$dfc.'&charset='.$charset;
    $dhd = new DeDeHttpDown();
    $dhd->OpenUrl($Rs['wurl']);
    $dhd->dataLimit = 5120;
    $dhd->m_puthead["Refer"] = $Rs['wurl'];
    $filecnt = trim($dhd->GetHtml());

    echo $filecnt;    
?>