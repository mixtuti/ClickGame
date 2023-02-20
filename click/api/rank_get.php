<?php
/**
 * ランキング取得API
 */

//$resultは戻り値 error=1なら失敗、0なら成功
//ranking 'name'=>'名前', 'score'=>スコア 上位5位までを返す
$result = array(
	'error' => 1,
	'ranking' => array(
		array('name' => 'DUM', 'score' => 0),
		array('name' => 'DUM', 'score' => 0),
		array('name' => 'DUM', 'score' => 0),
		array('name' => 'DUM', 'score' => 0),
		array('name' => 'DUM', 'score' => 0),
	)
);

include "connect.php";

//スコア降順、かつ上位5件のみ取得
$sql = "SELECT name, score FROM ranking ORDER BY score DESC LIMIT 5;";
$r = $db->query($sql);
if(!$r){
	echo "SELECT失敗 ".$sql;
	exit;
}

$num = 0;
while($row = $r->fetch_assoc()){
	$result['ranking'][$num++] = array('name'=>$row['name'], 'score'=>$row['score']);
}

$result['error'] = 0;

//$resultをJSON形式にして出力
print json_encode($result);
