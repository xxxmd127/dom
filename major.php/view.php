<?php
	include "conn.php";
	if(isset($_GET['id'])){
		//1：对hits的字段进行访问量更新
		$id=$_GET['id'];
		$sql="update blog set hits=hits+1 where blogid='$id'";
		$result=mysqli_query($link,$sql);
		if($result){
			$sql="select * from blog where blogid='$id'";
			$result=mysqli_query($link,$sql);
			$rs=mysqli_fetch_array($result);
			//if($rs)
			
		}
	 
	}


?>
<h2><?php echo $rs['title']?></h2>
<li><?php echo $rs['time']?></li><br />
<span>访问量:<?php echo $rs['hits']?></span>
<p><?php echo $rs['content']?></p>
</hr>
<a href="index.php">跳回主页</a>
<?php
	if(isset($_POST['sub'])){
		$pcon=$_POST['pcon'];
		$bid=$_POST['bid'];
		$puid=$_COOKIE['id'];
		$sql="insert into pl(pid,bid,puid,ptime,pcon) values(null,'$bid','$puid',now(),'$pcon')";
		$result=mysqli_query($link,$sql);
		if($result){
			echo "<script>location='view.php?id=".$bid."'</script>";
		}
	}

?>
<form action="view.php" method="post">
	<input type="hidden" name="bid" value="<?php echo $rs['blogid']?>">
	<textarea rows=10 cols=30 name='pcon'></textarea><br />
	<input type="submit" name="sub" value="提交评论">
	
</form>

<?php
	$sql="select * from pl,user where pl.puid=user.userid and bid='$id'";
	$result=mysqli_query($link,$sql);
	while($rs=mysqli_fetch_array($result)){
			
	
?>

<p><?php echo $rs['pcon']?></p>
<li><?php echo $rs['ptime']?></li>
<span>评论者:<?php echo $rs['name']?></span>z

<?php
	}
?>





