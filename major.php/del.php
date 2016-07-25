<?php
    include "conn.php";
    if(isset($_GET['id'])){
    	$id=$_GET['id'];
		$sql="delete from blog where blogid='$id'";
		$result=mysqli_query($link,$sql); 
		if($result){
			echo "<script>location='index.php'</script>";
		}else{
			echo "删除失败";
		}
    }
?>