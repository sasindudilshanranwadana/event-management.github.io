<?php
include 'db_connect.php';

header('Access-Control-Allow-Origin: http://localhost:8080');
header('Content-Type: application/json');

$sql = "SELECT content.id, content.title, content.body, content.image, IFNULL(wishlist.wishlist_count, 0) as wishlist
        FROM content
        LEFT JOIN wishlist ON content.id = wishlist.item_id";
$result = $conn->query($sql);

$content = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $content[] = $row;
    }
}

echo json_encode($content);

$conn->close();
?>
