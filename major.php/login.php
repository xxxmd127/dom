<?php
	include "conn.php";
	if(isset($_POST['sub'])){
		$name=$_POST['username'];
		$pass=$_POST['pass'];
		
		$sql="select * from user where name='$name' and pass='$pass'";
		$result=mysqli_query($link,$sql);
		$rs=mysqli_fetch_array($result);
			if($rs){
				//设置cookie
				setcookie("id",$rs['userid']);
				//设置名字，因为登录他要显示他
				setcookie("name",$rs['name']);
				echo "<script>location='index.php'</script>";
			}else{
				echo "登录失败";
			}
	}

?>

<form action="login.php" method="post">
	用户名:<input type="text" name="username"><br />
	密码:<input type="password" name="pass"><br />

	<input type="submit" name="sub" value="登录">
</form>