<?php
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

include 'db_connect.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['firstName']) && isset($data['lastName']) && isset($data['email']) && isset($data['message'])) {
    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
    $email = $data['email'];
    $message = $data['message'];

    $stmt = $conn->prepare("INSERT INTO contacts (first_name, last_name, email, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $message);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Your message has been sent.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error storing your message.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
}

$conn->close();
?>
