<?php
/**
 * DB接続
 * 
 * Copyright (c) 2018 Kazuma Kasagi
 * Released under the MIT license
 * http://opensource.org/licenses/mit-license.php
 */

//TODO:以下のユーザ名、パスワード、データベース名を自身のデータベースのものに書き換えてください。
//     ユーザ名、パスワードはAdminerで入力している自身の学籍番号です。
//               接続先       ユーザ名    パスワード  データベース名
$db = new mysqli('localhost', 'HW20A086', 'HW20A086', 'HW20A086_click');
if($db->connect_errno){
	echo "DB接続失敗";
	exit;
}
if(!$db->set_charset('utf8')){
	echo "接続文字コード設定失敗";
	exit;
}

