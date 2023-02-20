<?php
/**
 * ランキング登録API
 * 
 * Copyright (c) 2018 Kazuma Kasagi
 * Released under the MIT license
 * http://opensource.org/licenses/mit-license.php
 */

//$resultは戻り値 error=1なら失敗、0なら成功
$result = array('error' => 1);

 //登録名とスコアの引数(GET値)確認
$name = filter_input(INPUT_GET, 'name');
$score = filter_input(INPUT_GET, 'score');
if(!$name || !is_numeric($score)) exit;

include 'connect.php';

//TODO:以下の$sql変数に、INSERT文のSQLを記述せよ。
//     rankingテーブルに対し登録名、スコアを新規登録します。
//     name には $name を、score には $score が入るようにしてください。
//     phpで変数を文字列と結合するには . 記号を使います。
//     (例) $sql = "名前は" . $name . "です。";
$sql = "INSERT INTO ranking(name, score) VALUES ('$name', '$score');";
$r = $db->query($sql);
if($r !== true){
	echo "INSERT失敗 ".$sql;
	exit;
}

$result['error'] = 0;

//$resultをJSON形式にして出力
print json_encode($result);

