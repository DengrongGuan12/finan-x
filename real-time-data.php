<?php
require 'dbconnect.php';
function insert_real_time_data(){
	$last_time;//记录上一次获取数据的时间

	$sql="select symbol from stock_info";
	$result=mysql_query($sql,$conn);
	while($info=mysql_fetch_array($result)){
		// echo $info[symbol];
		$url="http://hq.sinajs.cn/list=sh".$info[symbol];
		$line = file_get_contents($url);
		$arr=explode("=", $line);
		// echo $arr[1];
		$info1=$arr[1];
		$arr1=explode("\"", $info1);
		$elements=explode(",", $arr1[1]);
		if ($elements[3]=="") {
			# code...
			continue;
			// echo "null";
		}
		// $insert_sql="insert into real-time_info values('','')"
		// $last_time=$elements[31];
		//判断是不是当天的数据
		$today=date("Y-m-d",time());
		if($elements[30]==$today){
			//判断是否与上一次获取的数据重复
			if($last_time==$elements[31]){
				echo "cannot insert!";
				break;
			}else{
				$insert_sql="insert into real_time_info values('$info[symbol]' ";
				for ($i=1; $i <=29 ; $i++) { 
					# code...
					$insert_sql=$insert_sql.",".$elements[$i];
				}
				$insert_sql=$insert_sql.",'$elements[30]','$elements[31]') ";
				// $insert_sql=$insert_sql.") ";
				echo "insert_sql:".$insert_sql;
				mysql_query($insert_sql,$conn) or die("insert data failed:   ".mysql_error());
			}
			
		}else{
			echo "cannot insert!";
			break;

		}

		// echo "   date_type: ".gettype($elements[30]);
		// echo "   time_type:".gettype($elements[31]);
		// echo "<br />";
		// echo $line.PHP_EOL;
	}
	mysql_close($conn);
}

	

?>