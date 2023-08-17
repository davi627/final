<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'project');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO user_registration (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "Registration successful";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>