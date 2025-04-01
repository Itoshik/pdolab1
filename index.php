<?php include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Розклад занять</title>
</head>
<body>
    <h1>Запит розкладу занять</h1>

    <form action="lessons_for_group.php" method="get">
        <label>Оберіть групу:</label>
        <select name="group">
            <?php
            $stmt = $pdo->query("SELECT ID_Groups, title FROM GROUPS");
            while ($row = $stmt->fetch()) {
                echo "<option value='{$row['ID_Groups']}'>{$row['title']}</option>";
            }
            ?>
        </select>
        <input type="submit" value="Показати розклад">
    </form>

    <form action="lessons_for_teacher.php" method="get">
        <label>Оберіть викладача:</label>
        <select name="teacher">
            <?php
            $stmt = $pdo->query("SELECT ID_Teacher, name FROM TEACHER");
            while ($row = $stmt->fetch()) {
                echo "<option value='{$row['ID_Teacher']}'>{$row['name']}</option>";
            }
            ?>
        </select>
        <input type="submit" value="Показати розклад">
    </form>

    <form action="lessons_for_auditorium.php" method="get">
        <label>Введіть аудиторію:</label>
        <input type="text" name="auditorium">
        <input type="submit" value="Показати розклад">
    </form>
</body>
</html>
