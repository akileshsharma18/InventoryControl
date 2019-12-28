	<?php
	include("config.php");
	
	if (isset($_GET['id']))
	{
		session_start();
	$cn=$_GET["id"];
	$_SESSION['com_name']=$_GET["id"];
	$com_name=$_SESSION['com_name'];
	mysqli_select_db($db_cn,"$dbname")or die("cannot select DB"); //Selecting db
	/*$query ="SELECT * FROM $com_name.`_shop_admin` WHERE com_name = '$cn'";
	$results=mysqli_query($db_cn, $query);
		echo "<label>Shop:</label><br/>
	<select name='shop'>
	<option value=''>Select Shop</option>";
	while( $row = mysqli_fetch_assoc( $results ) )
									{
										echo "<option value={$row['cname']}>{$row['cname']}</option>";		
									}
	echo "</select><br>";*/
	}
	?>