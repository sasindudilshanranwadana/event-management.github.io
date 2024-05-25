<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

include 'db_connect.php';

$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['event_id'])) {
    $event_id = $data['event_id'];

    // Check if the event already has a like record
    $sql = "SELECT like_count FROM likes WHERE event_id = $event_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Update the existing like count
        $row = $result->fetch_assoc();
        $new_count = $row['like_count'] + 1;
        $update_sql = "UPDATE likes SET like_count = $new_count WHERE event_id = $event_id";
    } else {
        // Create a new like record
        $new_count = 1;
        $update_sql = "INSERT INTO likes (event_id, like_count) VALUES ($event_id, $new_count)";
    }

    if ($conn->query($update_sql) === TRUE) {
        echo json_encode(['success' => true, 'like_count' => $new_count]);
    } else {
        echo json_encode(['success' => false, 'message' => "Error updating like count: " . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No event ID provided']);
}

$conn->close();
?>
