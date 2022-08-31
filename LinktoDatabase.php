<?php

//nettest
//nettestform


//itemid  （自动编号，不需要填写）
//itemindex (TBD- 增加编码规则)

//ReportDate
//ReportEngineername
//ReportPartName
//ReportIssueType
//ReportDescription

//localhost:80/LinktoDatabase.php


// 参数例子 from HPHadmin UPDATE `nettestform` SET `reportissuetype` = 'jhhfdhl', `reportdescription` = 'ggkfsakj' WHERE `nettestform`.`itemid` = 6;

// INSERT INTO `nettestform` (`itemid`, `reportdate`, `reportengineername`, `reportpartpame`, `reportissuetype`, `reportdescription`) 
//VALUES (NULL, '2022-08-20', 'Henry Xiang', 'Main key', 'vfvczv', 'vvdsafdsa');


//!--                主机，   登录账号名称， 登录密码   SQL数据库名称 -->
$conn = mysqli_connect("localhost","root", "Bi1OiEIBqEvmQFvS","nettest");

if (!$conn) {
die("链接失败, 服务器未响应, 请联系Henry Xiang开启服务器 ". mysqli_connect_error());
}


$insert_SQL = "INSERT INTO `nettestform` () VALUES (NULL, '$_POST[CTDATE]', '$_POST[CTENGNAME]', '$_POST[CTPTNAME]', '$_POST[CTISTYPE]', '$_POST[CTDESCRIP]')";

mysqli_query($conn, $insert_SQL,); 

echo "<p style='font-size:20pt;color:green; text-align:left'>链接成功, 报告已经导入数据库!<p>";



echo "<p style='font-size:20pt;color:green; text-align:left'>点击下面Link, 返会原页面......<p>";

echo "<br />";

echo "<a href='http://localhost/Mainpage.php' >Logitech CP&G ME xxxx Data list</a>; ";


?>
