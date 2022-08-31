<?php
$conn = mysqli_connect("localhost","root", "","nettest");
if (!$conn) {
die("链接失败, 服务器未响应, 请联系Henry Xiang开启服务器 ". mysqli_connect_error());
}

$insert_SQL = "INSERT INTO `message` () VALUES (NULL, '$_POST[MESSDATE]', '$_POST[MESSNAME]', '$_POST[MESSDESCRIP]')";

mysqli_query($conn, $insert_SQL,); 

echo "<p style='font-size:20pt;color:green; text-align:left'>链接成功, 报告已经导入数据库!<p>";

echo "<p style='font-size:20pt;color:green; text-align:left'>点击下面Link, 返会原页面......<p>";

echo "<br />";

echo "<a href='http://localhost/Mainpage.php' >Logitech CP&G ME xxxx Data list</a>; ";


?>