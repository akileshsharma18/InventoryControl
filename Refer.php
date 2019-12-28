Cards:
<?php
include('config.php');

//please put the user name
$id2=$_SESSION["login_user"];
  $sql = "SELECT * FROM `nshuman`";
$result = mysqli_query($db_cn, $sql);
    // output data of each row
    
 ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php while($row = mysqli_fetch_assoc($result)) {?>
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
<div class="card" style="width: 100%;">
  <img src="<?php echo $row['imgpath'];?>" height="150px" alt="Avatar" style="width:100%">
  <div class="container">
  <center>
    <h5><p><b>Age Group</b>&nbsp <?php echo "<br>".$row['type'];?></p></h5> 
    <p><b>Name</b>&nbsp&nbsp<?php echo "<br>".$row['name'];?></p> 
    <p><b>Age</b>&nbsp&nbsp<?php echo "<br>".$row['age'];?></p> 
    <p><b>Gender</b>&nbsp&nbsp<?php echo "<br>".$row['gender'];?></p> 
	</center>
  </div>
  
  </div><br><br>
</div><?php }?></div><br><br>
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
}


Tables:
<p><table class="table table-striped"><tbody>
<?php
$u=$_SESSION['login_user'];
  $selectSQL = "SELECT * FROM `organation` WHERE `uname`='$u'";
  if( !( $selectRes = mysqli_query( $db_cn,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
  }else{?>
	<p> 
    <?php
     while( $row = mysqli_fetch_assoc( $selectRes ) ){
		 if($row['tyorg']=='A'){
         echo "<tr><td>The number of pup you have "."{$row['cnum']}</td></br>";
	 echo "<td>The number of pup you have "."{$row['anum']}</td>";
		 }
		 else if($row['tyorg']=='H')
		 {
			echo "<td>The number of childrens you have  "."{$row['hcnum']}</td></br>";
	 echo "<td>The number of Grand parents you have  "."{$row['hanum']}</td></tr>"; 
			 
		 }
		 }
      }
  ?>
	  </p></tbody></table>
	  
	  
	  
Image Upload:
<?php
if(move_uploaded_file($_FILES["file"]["tmp_name"],"images1/".$_FILES["file"]["name"]))
{
	$img = $_FILES['file']['name'];
	if($img==''){
		$img1 = "images1/default.jpg";
		$result=mysqli_query($db_cn , "UPDATE $tbn1 SET imgpath='$img1' WHERE uname='$uid'");
		
	}
	else{
		$img2 = "images1/".$img;
		
		$result=mysqli_query($db_cn , "UPDATE $tbn1 SET imgpath='$img2' WHERE uname='$uid'");
	}
	
if($result==1){
	if($_SESSION["tbn"]=="self"){
		header("Location:setting.php");
	}
	else{
		header("Location:settingorg.php");
	}
}	
}	?>
                        <h3>Upload Your photo.</h3>
                                                <p>
												<center>
<div class="form-group" id="img" enctype="multipart/form-data">
<div id="imgContainer">
 
    <div id="imgArea"><img id="myImg" src="Images1/default.jpg">

      <div id="imgChange"><span>Change Photo</span>
        <input type="file" accept="image/*" name="file" id="file" height="" width="" onchange="loadFile(event)">
      </div>
    </div>
 
</div>
</div>
<script type="text/javascript">
 var loadFile = function(event) {
    var output = document.getElementById('myImg');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
</center>
#imgContainer {
	width: 100%;
	text-align: center;
	position: relative;
}
#imgArea {
	display: inline-block;
	margin: 0 auto;
	width: 150px;
	height: 150px;
	position: relative;
	background-color: #eee;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}
#imgArea img {
	outline: medium none;
	vertical-align: middle;
	width: 100%;
}
#imgChange {
	background: url("../img/overlay.png") repeat scroll 0 0 rgba(0, 0, 0, 0);
	bottom: 0;
	color: #FFFFFF;
	display: block;
	height: 30px;
	left: 0;
	line-height: 32px;
	position: absolute;
	text-align: center;
	width: 100%;
	background-color: #2b44d5;
	opacity: 0.4;
}
#imgChange input[type="file"] {
	bottom: 0;
	cursor: pointer;
	height: 100%;
	left: 0;
	margin: 0;
	opacity: 0;
	padding: 0;
	position: absolute;
	width: 100%;
	z-index: 0;
}



  