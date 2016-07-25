<?php
    include "conn.php";
	if(isset($_POST)){
		$name=$_POST['username'];
		$pass=$_POST['pass'];
		$pass1=$_POST['pass1'];
		if($psaa != $pass1){
			echo "<script>alert('密码不一致')</script>";
		}else{
			$arr=array('%',' ','=');
			$flag=true;//用标志位解决对话框弹出三次
			foreach($arr as $v){
				for($i=0;$i<strlen($pass);$i++){
					if($v==$pass[$i]){
						//echo "<script>alert('密码非法')</script>";
						$flag=false;
					}
				}
			}
			if($flag==false){
				echo "<script>alert('密码非法')</script>";
			}else{
				$sql="insert into user(userid,name,pass) values(null,'$name','$pass')";
				$result=mysqli_query($link,$sql);
				if($result){
					echo "<script>location='login.php'</script>";
				}else{
					echo "注册失败";
				}
			}
		}
	}

?>

<form action="insert.php" method="post">
	用户名:<input type="text" name="username"><br />
	密码:<input type="password" name="pass"><br />
	确认密码:<input type="password" name="pass1"><br />
	<input type="submit" name="sub" value="注册">
</form>