<?php
include 'connect.php';

if (isset($_GET['teacher'])) {
    $teacher_id = $_GET['teacher'];

    $stmt = $pdo->prepare("
        SELECT L.week_day, L.lesson_number, L.auditorium, L.disciple, L.type
        FROM LESSON L
        JOIN LESSON_TEACHER LT ON L.ID_Lesson = LT.FID_Lesson1
        WHERE LT.FID_Teacher = ?
    ");
    $stmt->execute([$teacher_id]);

    if ($stmt->rowCount() > 0) {
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>
                <th>День тижня</th>
                <th>Номер пари</th>
                <th>Аудиторія</th>
                <th>Дисципліна</th>
                <th>Тип заняття</th>
              </tr>";

        while ($row = $stmt->fetch()) {
            echo "<tr>
                    <td>{$row['week_day']}</td>
                    <td>{$row['lesson_number']}</td>
                    <td>{$row['auditorium']}</td>
                    <td>{$row['disciple']}</td>
                    <td>{$row['type']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Немає даних для обраного викладача.";
    }
} else {
    echo "Оберіть викладача!";
}
?>
