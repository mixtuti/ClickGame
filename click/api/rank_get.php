<?php
/**
 * ランキング取得API
 * 
 * Copyright (c) 2018 Kazuma Kasagi
 * Released under the MIT license
 * http://opensource.org/licenses/mit-license.php
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

//TODO:以下の$sql変数に、SELECT文のSQLを記述せよ。
//     テーブルはranking。取得したいカラムはname, score。
//     SELECT文の末尾に "ORDER BY score DESC LIMIT 5" を追記するとスコア降順になり、かつ上位5件のみ取得できます。
//     ORDER BYは検索結果の並び替え、LIMITは取得件数の制限に使います。
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

