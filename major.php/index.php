<a href="add.php">添加文章</a><br /><br />

<?php
	if(isset($_COOKIE['id'])){
		$id=$_COOKIE['id'];
		echo "<a href='./admin/admin.php'>".$_COOKIE['name']."已登录</a>";
		echo "<a herf='logout.php?id=$id>注销</a>";
	}else{
		echo "<a href='login.php'>未登录，请登录</a>";
	}

?>

<form action="index.php" method="get">
	<input type="text" name="search">
	<input type="submit" name="sub" value="搜索">
</form>

<?php
   include "conn.php";
   if(isset($_GET['sub'])){
   	//搜索的sql语句
   	$se=$_GET['search'];
   	$e="title like '%$se%'";//外面的部分用双引，里面才能拿到值
   }else{
   	$e=1;
   }
   $sql='select * from blog where '.$e.' order by blogid desc limit 8';
   $result=mysqli_query($link,$sql);
   
   //$rs=mysqli_fetch_array($result);//读取当前返回的结果集有没有值,$rs返回的是数组，所以标题里面不能写死
   while($rs=mysqli_fetch_array($result)){
  	
?> 
	<h2><a href="view.php?id=<?php echo $rs['blogid']?>">标题：<?php echo $rs['title']?></a>|<a href="edit.php?id=<?php echo $rs['blogid']?>">编辑</a> |<a href="del.php?id=<?php echo $rs['blogid']?>">删除</a><h2>
	<li><?php echo $rs['time']?></li>
	<p><?php echo iconv_substr($rs['content'], 0,3);?>...</p>
	<hr />

<?php
 	//数据库的字段是什么，这里就是什么title,time,content，不能有错
   }
?>
