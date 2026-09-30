<?php
require_once('config.php');

// PDOクラスのインスタンス化
function connectPdo() 
{
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}
//connectPdoをインスタンス化 例外が発生した場合にメッセージを表示
//PDOException　PHPでデータベースの接続やSQLの実行に失敗したときに発生する
//getmessage　メソッド

function getAllRecords()
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL';
    return $dbh->query($sql)->fetchAll();
}
// データーベースハンドル DBへの接続
// SQL内の消した記録のないToDoリストを表示する
// SQLを実行して、値を返す
// fetchAll　全レコードを配列として取得

// 新規作成処理
function createTodoData($todoText)
{
    $dbh = connectPdo();
    $sql = 'INSERT INTO todos (content) VALUES (:todoText)'; //編集・追記
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':todoText', $todoText, PDO::PARAM_STR);
    $stmt->execute();
}
/*　
->プロパティにアクセスして実行　DBに保存する
$dbh = connectPdo(); 
$sql = 'INSERT INTO todos (content) VALUES ("' . $todoText . '")'; 
$dbh-&gt;query($sql);
から変更　
*/

// 更新処理
function updateTodoData($post)
{
    $dbh = connectPdo();
    $sql = 'UPDATE todos SET content = :todoText WHERE id = :id'; //編集
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':todoText', $post['content'], PDO::PARAM_STR);
    $stmt->bindValue(':id', (int) $post['id'], PDO::PARAM_INT);
    $stmt->execute();
}
/*
    $dbh = connectPdo();
    $sql = 'UPDATE todos SET content = "' . $post['content'] . '" WHERE id = ' . $post['id'];
    $dbh->query($sql);
    から変更
*/


function getTodoTextById($id)
{ 
    $dbh = connectPdo(); 
    $sql = 'SELECT content FROM todos WHERE id = :id'; 
    $stmt = $dbh->prepare($sql); 
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT); 
    $stmt->execute(); 
    $data = $stmt->fetch(PDO::FETCH_ASSOC); 
    return $data['content']; 
}

/*
    $dbh = connectPdo();
    $sql = "SELECT * FROM todos WHERE deleted_at IS NULL AND id = {$id}";
    $data = $dbh->query($sql)->fetch();
    return $data['content'];
*/





function deleteTodoData($id)
{
    $dbh = connectPdo();
    $now = date('Y-m-d H:i:s');
    
    $sql = 'UPDATE todos SET deleted_at = :now WHERE id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':now', $now, PDO::PARAM_STR); 
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT); 
    $stmt->execute();
}

/*
function deleteTodoData($id)
{
    // データベース接続情報を取得
    $dbh = connectPdo();
    // 現在の日時を取得
    $now = date('Y-m-d H:i:s');

    // todosテーブルのデータを更新する
    $sql = 'UPDATE todos SET deleted_at = "'
        . $now
        // todosテーブルの中から、idが$idと一致するレコードだけを対象にする
        . '" WHERE id = '
        . $id;

    $dbh->query($sql);
}
*/