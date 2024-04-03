<?php

//1. POSTデータ取得
//[name,email,age,naiyou]
if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
    $originalName = basename($_FILES['pic']['name']); // 画像ファイルの元の名前を取得
    $extension = pathinfo($originalName, PATHINFO_EXTENSION); // 画像ファイルの拡張子を取得
    $uniqueName = time() . "." . $extension; // 一意のファイル名を生成（ここではタイムスタンプを使用
    $pic = 'uploads/' . $uniqueName; // 保存先のパスを生成
    move_uploaded_file($_FILES['pic']['tmp_name'], $pic); // 画像ファイルを指定したパスに移動
}

$name = $_POST["name"];
$title = $_POST["title"];
$price = $_POST["price"];
$naiyou = $_POST["naiyou"];

//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DB_CONECT:'.$e->getMessage());
}


//３．データ登録SQL作成
$sql = "INSERT INTo gs_08_auction(name,title,price,pic,naiyou,indate)VALUES(:name,:title,:price,:pic,:naiyou,sysdate());";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':price', $price, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pic', $pic, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //true or false

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: insert02.php");
  exit();
}
?>
