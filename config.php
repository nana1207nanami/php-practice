<?php

ini_set('display_errors', 1); //エラーが発生した時に表示する
ini_set('display_startup_errors', 1); //php起動時に発生したエラーを表示する
error_reporting(E_ALL); //エラーの表示内容の度合いを決める 今回はALL

set_error_handler('errorHandler');
//自分で作成したエラーの処理

function errorHandler($errNo, $errStr, $errFile, $errLine)
{
    if ($errNo === E_NOTICE || $errNo === E_WARNING) {
        $errTitle = $errNo === E_NOTICE ? 'Notice' : 'Warning';
        $escapedErrStr = htmlspecialchars($errStr); //内容を変数に設定して機能をなくす
        $escapedErrFile = htmlspecialchars($errFile);  //ファイル名を変数に設定して機能をなくす

        echo '<b>' . $errTitle . '</b>: ' . $escapedErrStr . ' in <b>' . $escapedErrFile . '</b> on line <b>' . $errLine . '</b>';
        exit;
    }

    return false;
}
/* エラータイトルがNOTICEかWARNINGだった時、
タイトル・名前・ファイル名・行数をechoして処理を止める。 */
//NOTICEが存在しない配列のキーを使用した場合の注意　WARNINGがphpの処理はできるけど将来的にエラーが起こる可能性がある時に警告を出してくれる



define('DSN', 'mysql:dbname=php_lesson;host=localhost;unix_socket=/tmp/mysql.sock');
define('DB_USER', 'root');
define('DB_PASSWORD', 'nana5521');

// DB設定　定数の定義付けをするための関数を実行
