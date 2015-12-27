<?php
$dsn = 'mysql:host=localhost;dbname=fun'; //主机名字，数据库名
    $username = 'root'; //用户名
    $passwd = ''; //密码
	try{
    	$dbh = new PDO($dsn,$username,$passwd,array( PDO :: ATTR_PERSISTENT=> true));//长连接
    	$dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//报错会中断进行事物，并回滚
    	$dbh->exec('set names utf8');
    }catch( PDOException   $e){//抓错误
        die($e->getMessage());
    }















/**/



