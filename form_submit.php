
<?php
	spl_autoload_extensions(".php");
	spl_autoload_register();
	use komBatch\DbCon;
	$dBase = new DbCon();
	
	$date = $dBase -> quote($_POST['date']);
	$tType = $dBase -> quote($_POST['tType']);
	$tWeight = $dBase -> quote($_POST['tWeight']);
	$sWeight = $dBase -> quote($_POST['sWeight']);
	$bTime = $dBase -> quote($_POST['bTime']);
	$result = $dBase -> query("INSERT INTO batches (`date`,`tType`, `tWeight`, `sWeight`, `bTime`) VALUES (" .	$date . "," . $tType . "," . $tWeight . "," . $sWeight . "," . $bTime . ")");
?>
