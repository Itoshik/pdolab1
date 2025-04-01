<?php
include 'connect.php';

if (isset($_GET['auditorium'])) {
    $auditorium = $_GET['auditorium'];

    $stmt = $pdo->prepare("
        SELECT week_day, lesson_number, disciple, type
        FROM LESSON
        WHERE auditorium = ?
    ");
    $stmt->execute([$auditorium]);

    if ($stmt->rowCount() > 0) {
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>
                <th>День тижня</th>
                <th>Номер пари</th>
                <th>Дисципліна</th>
                <th>Тип заняття</th>
              </tr>";

        while ($row = $stmt->fetch()) {
            echo "<tr>
                    <td>{$row['week_day']}</td>
                    <td>{$row['lesson_number']}</td>
                    <td>{$row['disciple']}</td>
                    <td>{$row['type']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Немає даних для вказаної аудиторії.";
    }
} else {
    echo "Введіть аудиторію!";
}
?>
