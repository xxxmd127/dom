<?php
	//mysql mysqli  pdo
    //1:创建一个数据库连接，打开它
   $link=@mysqli_connect('localhost','root','')or die('数据库连接失败');//如果不是默认端口号3306‘localhost:3307’
   
 
  
    //2:选中一个数据库
   @mysqli_select_db($link,'xxxmd')or die('数据库连接失败');
  
  
  
    //3:设定传输编码
    mysqli_set_charset($link,'UTF8');
?>