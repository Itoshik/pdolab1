<?php include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Розклад занять</title>
</head>
<body>
    <h1>Запит розкладу занять</h1>

    <!-- Форма выбора группы -->
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

    <!-- Форма выбора преподавателя -->
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

    <!-- Форма выбора аудитории (из списка) -->
    <form action="lessons_for_auditorium.php" method="get">
        <label>Оберіть аудиторію:</label>
        <select name="auditorium">
            <?php
            $stmt = $pdo->query("SELECT DISTINCT auditorium FROM LESSON ORDER BY auditorium");
            while ($row = $stmt->fetch()) {
                echo "<option value='{$row['auditorium']}'>{$row['auditorium']}</option>";
            }
            ?>
        </select>
        <input type="submit" value="Показати розклад">
    </form>
</body>
</html>
