<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $term = trim($_POST['term']);
    $definition = trim($_POST['definition']);
    $img = trim($_POST['img']);

    $stmt = $mysql->prepare("INSERT INTO terms (term, definition, img) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $term, $definition, $img);

    if ($stmt->execute()) {
        header("Location: success.php");
        exit;
    } else {
        echo "<p class='msg error'>Ошибка: " . $stmt->error . "</p>";
    }
    $stmt->close();
    $mysql->close();
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Добавить термин</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h2>Добавить новый термин</h2>
    <form action="add.php" method="post">
        <p>
            <label for="term">Термин:</label>
            <input type="text" name="term" id="term" required>
        </p>
        <p>
            <label for="definition">Определение:</label>
            <textarea name="definition" id="definition" required></textarea>
        </p>
        <p>
            <label for="img">Название файла изображения:</label>
            <input type="text" name="img" id="img" required>
            <small>Введите имя файла (например, image1.jpg). Файл изображения должен находиться в той же папке, что и
                скрипты.</small>
        </p>
        <p>
            <button type="submit">Добавить</button>
        </p>
    </form>
    <div class="back-link">
        <a href="index.php">Вернуться на главную</a>
    </div>
</body>

</html>