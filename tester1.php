<!DOCTYPE html>

<html>
<body>

<form method="post">
<input type="file" id="image" name="image">
 <br/><br/>
 <input type="submit" name="submit" value="upload">
<?php
if(isset($_POST['submit'])){
	if(getimagesize($FILES['image']['tmp_name'])== FALSE){
		echo"Please choose an image";
	}
	else{
		$image=addslashes($_FILES['image']['tmp_name']);
		$name=addcslashes($_FILES['images']['name']);
		$image=file_get_contents($image);
		$image=base64_encode($image);
		image($name,$image);
		
	}
}
dispimage();
function image($name,$image){
	$servername = "localhost";
$username = "root";
$password = "";
$db_name="tester1";

$conn = new mysqli($servername, $username, $password,$db_name);

$sql="insert  into image (name,image) values ('$name','$image')";
$res=mysql_query($sql,$conn);
if(result){
	echo"Image uploaded";
}else{
		echo"Image not uploaded";

}
}

function dispimage(){
	$servername = "localhost";
$username = "root";
$password = "";
$db_name="tester1";

$conn = new mysqli($servername, $username, $password,$db_name);
$sql="select * from image";
$res=mysql_query($sql,$conn);
while($row = mysqli_fetch_array($res)){
	echo'<img height="250" width="250" src="data:image;base64,'.$row[2].'">';
	
}
mysql_close($conn);
}
?>
</form>
</body>
</html>
