<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

include 'db_connect.php';

$sql = "SELECT event_id, like_count FROM likes";
$result = $conn->query($sql);

$likes = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $likes[] = $row;
    }
}

echo json_encode($likes);

$conn->close();
?>
