<?php
include "db.php";
$result = mysqli_query($mysql, "SELECT * FROM `terms`");
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Справочник терминов</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h2>Справочник терминов</h2>
    <div class="table-container">
        <table>
            <tr>
                <th>Термин</th>
                <th>Определение</th>
                <th>Изображение</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['term']) ?></td>
                    <td><?= htmlspecialchars($row['definition']) ?></td>
                    <td>
                        <img src="./<?= htmlspecialchars($row['img']) ?>" title="<?= htmlspecialchars($row['img']) ?>">
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <a class="add-link" href="add.php">Добавить новый термин</a>
</body>

</html>

<!-- REST API – Архитектурный стиль для разработки веб-сервисов, использующий протокол HTTP для обмена данными между клиентом и сервером. -->