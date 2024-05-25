<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

include 'db_connect.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['item_id'])) {
    $item_id = $data['item_id'];

    // Check if the item already has a wishlist record
    $sql = "SELECT wishlist_count FROM wishlist WHERE item_id = $item_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Update the existing wishlist count
        $row = $result->fetch_assoc();
        $new_count = $row['wishlist_count'] + 1;
        $update_sql = "UPDATE wishlist SET wishlist_count = $new_count WHERE item_id = $item_id";
    } else {
        // Create a new wishlist record
        $new_count = 1;
        $update_sql = "INSERT INTO wishlist (item_id, wishlist_count) VALUES ($item_id, $new_count)";
    }

    if ($conn->query($update_sql) === TRUE) {
        echo json_encode(['success' => true, 'wishlist_count' => $new_count]);
    } else {
        echo json_encode(['success' => false, 'message' => "Error updating wishlist count: " . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No item ID provided']);
}

$conn->close();
?>
