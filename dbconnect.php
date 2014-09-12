<?php
$conn=mysql_connect("localhost", "root","123456") or die("不能连接数据库服务器：".mysql_errno());
mysql_select_db("stock",$conn) or die("不能选择数据库：".mysql_error());

?>