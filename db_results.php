
<?php
	spl_autoload_extensions(".php");
	spl_autoload_register();
	use komBatch\DbCon;
	$dBase = new DbCon();	
	date_default_timezone_set('America/New_York');
	$rows = $dBase -> select("SELECT `date`, `tType`, `tWeight`, `sWeight`, `bTime`, `middleDate`
	, `endDate`, `batch_num`, `done` FROM `batches`");
	echo '<table>';	
	echo '<tr>';
	
	foreach ($rows as $value){
		if($value['done'] == 0){
			$batch_num = $value['batch_num'];
			echo '<td class="tRows" id="', $batch_num, '">';	
			$datetime1 = date_create($value['endDate']);
			$datetime2 = date_create(date("Y-m-d"));
			$interval = date_diff($datetime2, $datetime1);
			echo $interval->format('%R%a days left');
				if ($value['endDate'] <= date("Y-m-d")){
				include("rBottle.svg");
			} elseif ($value['middleDate'] <= date("Y-m-d")){
				include("yBottle.svg");
			} else{
				include("gBottle.svg");
				}			
			echo 'Brew Date: ', $value['date'], '<br>';
			echo 'Tea Type: ', $value['tType'], '<br>';
			echo 'Tea Weight: ', $value['tWeight'], 'g', '<br>';
			echo 'Sugar Weight: ', $value['sWeight'], 'g', '<br>';
			echo 'Brew Time: ', $value['bTime'], ' min', '<br>';
			echo '</td>';
		}
	}
echo '</tr>';
echo '</table>';
	
?>
