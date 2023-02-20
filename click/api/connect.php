<?php
/**
 * DB接続
 */

//                  接続先       ユーザ名    パスワード       データベース名
$db = new mysqli('localhost', 'HW20A086', 'HW20A086', 'HW20A086_click');
if($db->connect_errno){
	echo "DB接続失敗";
	exit;
}
if(!$db->set_charset('utf8')){
	echo "接続文字コード設定失敗";
	exit;
}

