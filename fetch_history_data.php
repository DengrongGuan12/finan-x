<?php
	// require_once "medoo.php";
	// $database=new medoo('stock');
require 'dbconnect.php';
	// function insert_history_data($code){
$sql="select symbol from stock_info";
	$result=mysql_query($sql,$conn);
	while($info=mysql_fetch_array($result)){
		// echo $info[symbol];
		$url="http://table.finance.yahoo.com/table.csv?s=".$info[symbol].".ss";
		$file=file_get_contents($url);
		//print($file);
		// $file="skdhjf sjdfh sdhfh";
		$arr=explode("\n", $file);
		$len=count($arr);
		// $valid=true;
		for ($i=1; $i<=60; $i++) { 
			# code...
			// echo $arr[$i];
			// echo gettype($arr[$i]);
			$line=explode(",", $arr[$i]);
			// foreach ($line as $value) {
			// 	# code...
			// 	echo $value;
			// 	echo "<br>";
			// }
			if ($line[0]=="") {
				# code...
				// $valid=false;
				break;
			}
			echo "insert into history_info values('".$info[symbol]."','$line[0]',$line[1],$line[2],$line[3],$line[4],$line[5],$line[6]);";
			// echo "<br>";
			// $data=array('symbol' => '601006','date'=>$line[0],'open'=>$line[1],'high'=>$line[2],'low'=>$line[3],'close'=>$line[4],'volume'=>$line[5],'adjClose'=>$line[6]);
			// $database->insert('history_info',$data);
			// echo "success";
			echo "<br>";
		}
		// echo "   date_type: ".gettype($elements[30]);
		// echo "   time_type:".gettype($elements[31]);
		// echo "<br />";
		// echo $line.PHP_EOL;
	}
	mysql_close($conn);
		
	// }

	// insert_history_data("600000");
	
	// print($arr);
	// foreach ($arr as $value) {
	// 	# code...
	// 	echo $value;
	// }

?>