<?php

//1.  DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DB_CONECT:'.$e->getMessage());
  }

//２．データ登録SQL作成
$searchWord = $_POST['input1'];
$sql = "SELECT * FROM gs_08_auction WHERE title LIKE :searchWord OR naiyou LIKE :searchWord OR name LIKE :searchWord";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':searchWord', '%'.$searchWord.'%', PDO::PARAM_STR);
$status = $stmt->execute(); //true or folse

//３．データ表示
// $view=""; 無視
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:".$error[2]);
  }

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>auction</title>
<link rel="stylesheet" href="stylesheet.css">

</head>

<body>

<h2>My Market</h2>

<!-- 検索フォーム -->
<form action="result.php" method="POST">
   <!-- 任意の<input>要素＝入力欄などを用意する -->
   <input type="text" name="input1">
   <!-- 送信ボタンを用意する -->
   <input type="submit" name="submit" value="検索">
</form>

<div class="card-container">
<?php foreach($values as $value){ ?>
    <div class="card">
        <p><img src="<?=$value["pic"]?>"></p>
        <p><strong><?=$value["title"]?></strong></p>
        <p><strong>￥<?=$value["price"]?></strong></p>
        <p><span class="small-font01"><?=$value["naiyou"]?></span></p>
        <p><span class="small-font02"><?=$value["name"]?>  <?=$value["indate"]?></span></p>
        <p><button>購入</button></p>
    </div>
<?php } ?>
</div>
<h3>
<a href="index.php" class="linkds">トップへ戻る</a>
</h3>


</body>
</html>