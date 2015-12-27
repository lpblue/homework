<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>导航</title>
</head>
<body>
	<div>
	<form action="" method="post">
		<h3>请输入网站名字</h3>
		<input type="text"  name="name" placeholder="百度">
		<h3>请输入地址</h3>
		<input type="text"  name="address" placeholder="www.baidu.com">
		<input type="submit" name="submit" value="添加">
	</form>
	<?php 
		header("Content-Type:text/html;charset=utf-8");
		include 'examine.php';
		if(isset($_POST['submit'])) {
      	if(empty($_POST['name']) || empty($_POST['address'])) {
        	echo '<script type="text/javascript">alert("请填写相关信息")</script>';
     	}
        
    }
 
		$find = $dbh->query("SELECT id,name,address FROM examine");
		while(list($id,$name,$address) = $find->fetch(PDO::FETCH_NUM)) {
		echo '<a href="http://'.$address.'"style="text-decoration:none">
				<div class="style">'.$name.' 
					<form method="GET" action="">
						<input type="submit" name="submit'.$id.'" value="删除">
					</form> 
				</div>
			  </a>'; 
	}	
/*******************************************************************************************************************************/
			

		$query = "INSERT INTO examine (id,name,address) VALUES (?, ?, ?)";
		$stmt = $dbh->prepare($query);

		$stmt->bindParam(1, $id, PDO::PARAM_STR);
		$stmt->bindParam(2, $name, PDO::PARAM_STR);
		$stmt->bindParam(3, $address, PDO::PARAM_STR);

		if(isset($_POST['submit'])) {
			$id=NULL;
			$name=$_POST['name'];
			$address=$_POST['address'];
	}

		$stmt->execute();
/*******************************************************************************************************************************/
		$query = "DELETE FROM navigation WHERE id=:id";
		$stmt2 = $dbh->prepare($query);
		$find = $dbh->query("SELECT id FROM examine");

		$stmt2->bindParam(':id',$id);

		while(list($id) = $find->fetch(PDO::FETCH_NUM)) {
			if(isset($_GET['submit'.$id])) {
				$stmt2->execute();
				echo "<script>
						alert('删除成功！');
			 		  </script>";
			}
		}
	?>
	</div>
</body>
</html>