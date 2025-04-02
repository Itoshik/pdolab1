<?php
include 'connect.php';

if (isset($_GET['auditorium'])) {
    $auditorium = $_GET['auditorium'];

    $stmt = $pdo->prepare("
        SELECT L.week_day, L.lesson_number, L.disciple, L.type, T.name AS teacher
        FROM LESSON L
        JOIN LESSON_TEACHER LT ON L.ID_Lesson = LT.FID_Lesson1
        JOIN TEACHER T ON LT.FID_Teacher = T.ID_Teacher
        WHERE L.auditorium = ?
    ");
    $stmt->execute([$auditorium]);

    if ($stmt->rowCount() > 0) {
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>
                <th>День тижня</th>
                <th>Номер пари</th>
                <th>Дисципліна</th>
                <th>Тип заняття</th>
                <th>Викладач</th>
              </tr>";

        while ($row = $stmt->fetch()) {
            echo "<tr>
                    <td>{$row['week_day']}</td>
                    <td>{$row['lesson_number']}</td>
                    <td>{$row['disciple']}</td>
                    <td>{$row['type']}</td>
                    <td>{$row['teacher']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Немає даних для вказаної аудиторії.";
    }
} else {
    echo "Оберіть аудиторію!";
}
?>
