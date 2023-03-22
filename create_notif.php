<?php
// Connect to database
$pdo = new PDO('mysql:host=localhost;dbname=user_db', 'root', '');

// Get form data
date_default_timezone_set("Asia/Singapore");
$title = $_POST['title'];
$message = $_POST['message'];
$created_at = date('Y-m-d h:i:s A');

// Insert notification into database
$stmt = $pdo->prepare('INSERT INTO notifications (title, message, created_at) VALUES (:title, :message, :created_at)');
$stmt->execute(array(
	':title' => $title,
	':message' => $message,
	':created_at' => $created_at,
));

// Redirect back to form
header('Location: notification.php');
?>