<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>auction</title>
</head>

<body>

    <h2>My Market</h2>

    <form method="POST" action="insert.php" enctype="multipart/form-data">
        <!-- <div class="jumbotron"> -->
        <fieldset>
            <legend><strong>登録フォーム</strong></legend>
            <table class="formTable">
          <tr>
          <tr></tr>
            <th>お名前</th>
            <td><input type="text" name="name" size="30"></td>
          </tr>
          <tr></tr><tr></tr>
          <tr>
            <th>商品名</th>
            <td><input type="text" name="title"  size="30"></td>
          </tr>
          <tr></tr><tr></tr>
          <tr>
            <th>価格</th>
            <td><input type="text" name="price"  size="30"></td>
          </tr>
          <tr></tr><tr></tr>
          <th>画像登録</th>
            <td><input type="file" name="pic"></td>
          </tr>
          <tr></tr><tr></tr>
          <tr>
            <th>商品説明<br /></th>
            <td><textarea name="naiyou" rows="5" cols="32"></textarea></td>
          </tr>
          <tr></tr><tr></tr>
        </table>
            <input type="submit" value="　登録　">
            </fieldset>
        </div>
    </form>

    <h3><a href="index.php" class="linkds">トップへ戻る</a>  /  
    <a href="search.php" class="linkds">商品をさがす</a></h3>

</body>
</html>
