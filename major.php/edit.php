<?php
    include "conn.php";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$sql="select * from blog where blogid='$id'";
		$result=mysqli_query($link,$sql);
		$rs=mysqli_fetch_array($result);
	}
	if(isset($_POST['sub'])){
		$title=$_POST['title'];
		$con=$_POST['con'];
		$hid=$_POST['hid'];
		$sql="update blog set title='$title' content='$con' where blogid='$hid'";
		$result=mysqli_query($link,$sql);
		if($result){
			echo "<script>location='index.php'</script>";
		}else{
			echo "修改失败";
		}
	}

?>

<form action="edit.php" method="post">
	<input type="hidden" name="hid" value="<?php echo $rs['blogid']?>">
	标题:<input type="text" name="title" value=<?php echo $rs['title']?>><br />
	内容:<textarea rows="10" cols="30" name="content"><?php echo $rs['content']?></textarea>
	<input type="submit" name="sub" value="修改">
</form>