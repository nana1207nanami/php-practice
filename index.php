<?php
require_once('functions.php');
header('Set-Cookie: userId=123');
//-- 追記　--//
setToken();
//-- 追記 --//

?> 

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <!-- 文字コードの設定 -->
  <title>Home</title>
</head>

<body>
//--- 追記 ---//
<?php if (!empty($_SESSION['err'])): ?>
  <p><?= $_SESSION['err']; ?></p>
<?php endif; ?>
//--- 追記 ---//


  <h1>ToDo一覧</h1>
  <div>
     <a href="new.php">
      <!-- ハイパーリンク -->
      <p>新規作成</p>
     </a>
  </div>
  <div> 
    <table>
      <!-- function内の変数から$todoを引っ張る -->
      
      <tr>
        <th>ID</th>
        <th>内容</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      <?php foreach (getTodoList() as $todo): ?>
        <tr>
          <td><?= $todo['id']; ?></td> <!-- []内はarray型 -->
          <td><?= $todo['content']; ?></td>
          <td>
            <a href="edit.php?id=<?= $todo['id']; ?>">更新</a>
          </td>
          <td>
            <form action="store.php" method="post">
              <!-- フォームの送信時にstore.phpにデータを送る -->
              <input type="hidden" name="id" value="">
              <!-- 隠した状態になるように設定-->
              <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
              <button type="submit">削除</button>
              <!-- submitボタンのラベルが削除になる -->
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
   </div>
    //追記//
    <?php unsetError(); ?>
    //追記//
</body>
</html>

