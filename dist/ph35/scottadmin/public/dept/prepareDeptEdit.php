 <?php
    /**
     * PH35 サンプル3 マスタテーブル管理 Src09/12
     * 部門情報編集画面表示。
     *
     * @author Shinzo SAITO
     *
     * ファイル名=prepareDeptEdit.php
     * フォルダ=/ph35/scottadmin/public/dept/
     */
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ph35/scottadmin/classes/Conf.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ph35/scottadmin/classes/entity/Dept.php");

    $dept = new Dept();
    $validationMsgs = null;

    if (isset($_POST["editDeptId"])) {
        $editDeptId = $_POST["editDeptId"];
        try {
            $db = new PDO(Conf::DB_DNS, Conf::DB_USERNAME, Conf::DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $sql = "SELECT * FROM depts WHERE id = :id";

            $stmt = $db->prepare($sql);
            $stmt->bindValue(":id", $editDeptId, PDO::PARAM_INT);
            $result = $stmt->execute();
            if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $row["id"];
                $dpNo = $row["dp_no"];
                $dpName = $row["dp_name"];
                $dpLoc = $row["dp_loc"];

                $dept = new Dept();
                $dept->setId($id);
                $dept->setDpNo($dpNo);
                $dept->setDpName($dpName);
                $dept->setDpLoc($dpLoc);
            } else {
                $_SESSION["errorMsg"] = "部門情報の取得に失敗しました。";
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
        }
    } else {
        if (isset($_SESSION["dept"])) {
            $dept = $_SESSION["dept"];
            $dept = unserialize($dept);
            unset($_SESSION["dept"]);
        }
        if (isset($_SESSION["validationMsgs"])) {
            $validationMsgs = $_SESSION["validationMsgs"];
            unset($_SESSION["validationMsgs"]);
        }
    }
    ?>

 <!DOCTYPE html>
 <html lang="ja">

 <head>
     <meta charset="UTF-8">
     <meta name="author" content="Shinzo SAITO">
     <title>部門情報編集 | ScottAdmin Sample</title>
     <link rel="stylesheet" href="/ph35/scottadmin/public/css/main.css" type="text/css">
 </head>

 <body>
     <h1>部門情報編集</h1>
     <nav id="breadcrumbs">
         <ul>
             <li><a href="/ph35/scottadmin/public/">TOP</a></li>
             <li><a href="/ph35/scottadmin/public/dept/showDeptList.php">部門リスト</a></li>
             <li>部門情報編集</li>
         </ul>
     </nav>
     <?php
        if (!is_null($validationMsgs)) {
        ?>
         <section id="errorMsg">
             <p>以下のメッセージをご確認ください。</p>
             <ul>
                 <?php
                    foreach ($validationMsgs as $msg) {
                    ?>
                     <li><?= $msg ?></li>
                 <?php
                    }
                    ?>
             </ul>
         </section>
     <?php
        }
        ?>
     <section>
         <p>
             情報を入力し、更新ボタンをクリックしてください。
         </p>
         <form action="/ph35/scottadmin/public/dept/deptEdit.php" method="post" class="box">
             部門ID:&nbsp;<?= $dept->getId() ?><br>
             <input type="hidden" name="editDpId" value="<?= $dept->getId() ?>">
             <label for="editDpNo">
                 部門番号&nbsp;<span class="required">必須</span>
                 <input type="number" min="10" max="90" step="10" id="editDpNo" name="editDpNo" value="<?= $dept->getDpNo() ?>" required>
             </label><br>
             <label for="editDpName">
                 部門名&nbsp;<span class="required">必須</span>
                 <input type="text" id="editDpName" name="editDpName" value="<?=
                                                                                $dept->getDpName() ?>" required>
             </label><br>
             <label for="editDpLoc">
                 所在地
                 <input type="text" id="editDpLoc" name="editDpLoc" value="<?=
                                                                            $dept->getDpLoc() ?>">
             </label><br>
             <button type="submit">更新</button>
         </form>
     </section>
 </body>

 </html>