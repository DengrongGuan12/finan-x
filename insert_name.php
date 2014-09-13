<?php
	require ('dbconnect.php');
	// function insert_name($code){
		// $url="http://download.finance.yahoo.com/d/quotes.csv?s=601006.ss&f=n";
		


	// }
	for ($i=0; $i <2000 ; $i++) { 
		# code...
		$code=600000+$i;
		// insert_name($code);
		$code=(string)$code;
		$url="http://hq.sinajs.cn/list=sh".$code;
		$file = file_get_contents($url);
		$arr=explode("=", $file);
		// $len=count($arr);
		// foreach ($arr as $value) {
		// 	# code...
		// 	echo $value;
		// }
		$info=$arr[1];
		$arr1=explode("\"", $info);
		$info1=explode(",", $arr1[1]);
		// $code=(string)$code;
		$info1[0]=(string)$info1[0];
		echo $code;
		echo "<br>";
		echo $info1[0];
		// $data=array('symbol' => $code,'name' => $info1[0]);
		// $database->insert('stock_info',$data);
		if ($info1[0]=="") {
			# code...
			echo "该公司已经不存在";
			continue;
		}
		$strsql="insert into stock_info (symbol,name) values ('$code','$info1[0]')";
		mysql_query($strsql,$conn) or die("插入数据失败：".mysql_error());
		// mysql_close($conn);

		echo "success";
		echo "<br>";


	}
	mysql_close($conn);
	// insert_name("600000");
?> 