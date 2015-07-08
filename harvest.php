<?php
	spl_autoload_extensions(".php");
	spl_autoload_register();
	use komBatch\DbCon;
	$dBase = new DbCon();
	$key = $_POST["key"];
	$result = $dBase -> query("UPDATE batches SET done=('1') WHERE batch_num=(" . $key . ")");	
?>