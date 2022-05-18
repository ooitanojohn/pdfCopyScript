 <?php
  /**
   * PH35 サンプル3 マスタテーブル管理 Src02/12
   * エラー画面
   *
   * @author Shinzo SAITO
   *
   * ファイル名=error.php
   * フォルダ=/ph35/scottadmin/public/
   */

  $errorMsg = "もう一度始めから操作をお願いします。";
  if (isset($_SESSION["errorMsg"])) {
    $errorMsg = $_SESSION["errorMsg"];
  }
  unset($_SESSION["errorMsg"]);
  ?>

 <!DOCTYPE html>
 <html lang="ja">

 <head>
   <meta charset="UTF-8">
   <meta name="author" content="Shinzo SAITO">
   <title>Error | ScottAdmin Sample</title>
 </head>

 <body>
   <h1>Error</h1>
   <section>
     <h2>申し訳ございません。障害が発生しました。</h2>
     <p>
       以下のメッセージご確認ください。<br>
       <?= $errorMsg ?>
     </p>
   </section>
   <p><a href="/ph35/scottadmin/public/">TOPへ戻る</a></p>
 </body>

 </html>