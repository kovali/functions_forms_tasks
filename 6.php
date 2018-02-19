<!--Создать страницу, на которой можно загрузить несколько фотографий в галерею.
Все загруженные фото должны помещаться в папку gallery и выводиться на странице в виде таблицы-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Загрузка файла</title>
</head>
<body>
<form enctype="multipart/form-data" method="post">
    <p>Загрузите ваши фотографии на сервер</p>
    <p><input type="file" name="photo" multiple accept="image/*,image/jpeg">
        <input type="submit" value="Отправить"></p>
</form>

<div class = "photo">
    <?php foreach ($images as $image): ?>
<img class="image" src="gallery/<?=$image?>">
    <?php endforeach; ?>
    <?php
    if ($_FILES) {
        $name = $_FILES["photo"]["name"];
        move_uploaded_file($_FILES["photo"]["tmp_name"], 'gallery/' . $name);
        echo "<img src ='$name'/>";
    }
    ?>


</div>
</body>
</html>