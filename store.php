<?php
require_once('functions.php');

savePostedData($_POST);

header('Location: ./index.php');

//送信されたデータをデーターベースに保存
//指定したURLへリダイレクトするよう指示
