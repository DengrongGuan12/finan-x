<?php

$myfile = fopen("D:/stock.csv", "r") or die("Unable to open file!");
$lines = fread($myfile,filesize("D:/stock.csv"));
fclose($myfile);
$lines = explode("\r\n", $lines);

$stepSize = 50;
$stocks = $lines;
$totalStocks = count($stocks);
$startTime = time();

$fp=fopen("D:/out.txt",'w');
for($i=0; $i<ceil($totalStocks/$stepSize); $i++) {
	$sliced = array_slice($stocks, $i*$stepSize, $stepSize);
	foreach ($sliced as &$stock) {
		$stock = 'sh'.substr($stock,0,6);
	}
	$code = implode(',', $sliced);
	//代码 现价 日最低 日最高 涨幅
	#$url = "http://finance.yahoo.com/d/quotes.csv?s=".$code."&f=sk1ghc6";//s后跟股票代码，多个股票用“+”链接，f后面跟对应变量代码。
	$url = 'http://hq.sinajs.cn/list='.$code;
	$line = file_get_contents($url);
	echo $line.PHP_EOL;
	fwrite($fp,$line);
	echo $i."  ".$i*$stepSize.'/'.$totalStocks."\t".(time()-$startTime).PHP_EOL.PHP_EOL;
}
fclose($fp);
?>