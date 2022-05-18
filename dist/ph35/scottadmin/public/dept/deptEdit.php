 <?php
    /**
     * PH35 サンプル3 マスタテーブル管理 Src10/12
     * 部門情報編集。
     *
     * @author Shinzo SAITO
     *
     * ファイル名=deptEdit.php
     * フォルダ=/ph35/scottadmin/public/dept/
     */
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ph35/scottadmin/classes/Conf.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ph35/scottadmin/classes/entity/Dept.php");

    $editDpId = $_POST["editDpId"];
    $editDpNo = $_POST["editDpNo"];
    $editDpName = $_POST["editDpName"];
    $editDpLoc = $_POST["editDpLoc"];
    $editDpName = str_replace(" ", " ", $editDpName);
    $editDpLoc = str_replace(" ", " ", $editDpLoc);
    $editDpName = trim($editDpName);
    $editDpLoc = trim($editDpLoc);

    $dept = new Dept();
    $dept->setId($editDpId);
    $dept->setDpNo($editDpNo);
    $dept->setDpName($editDpName);
    $dept->setDpLoc($editDpLoc);

    $validationMsgs = [];

    if (empty($editDpName)) {
        $validationMsgs[] = "部門名の入力は必須です。";
    }

    try {
        $db = new PDO(Conf::DB_DNS, Conf::DB_USERNAME, Conf::DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $sqlSelect = "SELECT id FROM depts WHERE dp_no = :dp_no";
        $sqlUpdate = "UPDATE depts SET dp_no = :dp_no, dp_name = :dp_name, dp_loc = :dp_loc
 WHERE id = :id";

        $stmt = $db->prepare($sqlSelect);
        $stmt->bindValue(":dp_no", $dept->getDpNo(), PDO::PARAM_INT);
        $result = $stmt->execute();
        $idInDB = 0;
        if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $idInDB = $row["id"];
        }
        if ($idInDB > 0 && $idInDB != $editDpId) {
            $validationMsgs[] = "その部門番号はすでに使われています。別のものを指定してください。";
        }

        if (empty($validationMsgs)) {
            $stmt = $db->prepare($sqlUpdate);
            $stmt->bindValue(":dp_no", $dept->getDpNo(), PDO::PARAM_INT);
            $stmt->bindValue(":dp_name", $dept->getDpName(), PDO::PARAM_STR);
            $stmt->bindValue(":dp_loc", $dept->getDpLoc(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $dept->getId(), PDO::PARAM_INT);
            $result = $stmt->execute();
            if (!$result) {
                $_SESSION["errorMsg"] =
                    "情報更新に失敗しました。もう一度はじめからやり直してください。";
            }
        } else {
            $_SESSION["dept"] = serialize($dept);
            $_SESSION["validationMsgs"] = $validationMsgs;
        }
    } catch (PDOException $ex) {
        var_dump($ex);
        $_SESSION["errorMsg"] = "DB接続に失敗しました。";
    } finally {
        $db = null;
    }

    if (isset($_SESSION["errorMsg"])) {
        header("Location: /ph35/scottadmin/public/error.php");
        exit;
    } elseif (!empty($validationMsgs)) {
        header("Location: /ph35/scottadmin/public/dept/prepareDeptEdit.php");
        exit;
    }
    ?>

 <!DOCTYPE html>
 <html lang="ja">

 <head>
     <meta charset="UTF-8">
     <meta name="author" content="Shinzo SAITO">
     <title>部門情報編集完了 | ScottAdmin Sample</title>
     <link rel="stylesheet" href="/ph35/scottadmin/public/css/main.css" type="text/css">
 </head>

 <body>
     <h1>部門情報編集完了</h1>
     <nav id="breadcrumbs">
         <ul>
             <li><a href="/ph35/scottadmin/">TOP</a></li>
             <li><a href="/ph35/scottadmin/public/dept/showDeptList.php">部門リスト</a></li>
             <li>部門情報編集</li>
             <li>部門情報編集完了</li>
         </ul>
     </nav>
     <section>
         <p>
             以下の部門情報を更新しました。
         </p>
         <dl>
             <dt>ID</dt>
             <dd><?= $dept->getId() ?></dd>
             <dt>部門番号</dt>
             <dd><?= $dept->getDpNo() ?></dd>
             <dt>部門名</dt>
             <dd><?= $dept->getDpName() ?></dd>
             <dt>所在地</dt>
             <dd><?= $dept->getDpLoc() ?></dd>
         </dl>
         <p>
             部門リストに<a href="/ph35/scottadmin/public/dept/showDeptList.php">戻る</a>
         </p>
     </section>
 </body>

 </html>