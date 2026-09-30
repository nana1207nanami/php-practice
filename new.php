<!DOCTYPE html>
<html lang="ja"> 
  <!-- 日本語設定 -->

<head>
  <meta charset="UTF-8"> 
  <!-- 文字コードの設定 -->
  <title>新規作成</title>
</head>

<?php
require_once('functions.php');

setToken();

?>

<body>

<?php if (!empty($_SESSION['err'])): ?>
  <p><?= $_SESSION['err']; ?></p>
<?php endif; ?>


  <form action="store.php" method="post"> 
    <!-- フォームの送信時にstore.phpにデータを送る -->
    <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
    <input type="text" name="content"> 
    <!-- インプットタグ　テキスト型 contentというname属性 -->
    <input type="submit" value="作成">
    <!-- submitボタンのラベルが作成になる -->
  </form>
  <div>
    <a href="index.php">一覧へもどる</a> 
    <!-- ハイパーリンク -->
  </div>
  <?php unsetError(); ?>

</body>

</html>
