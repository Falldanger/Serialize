<?php
	echo '<b>DZ(serialize):</b>'.'</br>';

	class Point{
		public $x=false;
		public $y=false;
	}

	$point= new Point();

	if (isset($_POST['save'])){
		$point->x=$_POST['x']??false;
		$point->y=$_POST['y']??false;
		$str = serialize($point);
		$temp = fopen("abc.txt", "w+");
		fwrite($temp, "$str");
        fclose($temp); 
	}

	if (isset($_POST['download'])) {
		$r = file_get_contents("abc.txt");
		$str2=unserialize($r);
		unlink('abc.txt');
		// print_r($str2);
	}
	 
?>

<form name="myform" action="<?=$_SERVER['PHP_SELF']?>" method="post">
	<div>
		X: <input type="text" name="x" value="<?php if (isset($_POST['download'])) {echo $str2->x;}?>" >
	</div>
	<div>
		Y: <input type="text" name="y" value="<?php if (isset($_POST['download'])) {echo $str2->y;}?>">
	</div>
	<div>
		<input type="submit" name="save" value="Save">
		<div>
		<input type="submit" name="download" value="Download">
	</div>
	</div>
</form>