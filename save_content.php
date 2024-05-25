<?php
include 'db_connect.php';

$data = json_decode(file_get_contents("php://input"));
$title = $data->title;
$body = $data->body;

$sql = "INSERT INTO content (title, body) VALUES ('$title', '$body')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$conn->close();
?>
