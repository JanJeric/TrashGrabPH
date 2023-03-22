<!DOCTYPE html>
<html>
<head>
	<title>Notifications</title>
</head>
<body>
	<div class="container">
		<h1>Notifications</h1>
		<?php
		// Connect to database
		$pdo = new PDO('mysql:host=localhost;dbname=user_db', 'root', '');

		// Get all notifications
		$stmt = $pdo->query('SELECT * FROM notifications ORDER BY created_at DESC');

		// Display each notification
		while ($row = $stmt->fetch()) {
			echo '<div class="notification">';
			echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
			echo '<p>' . htmlspecialchars($row['message']) . '</p>';
			echo '<span>' . htmlspecialchars($row['created_at']) . '</span>';
			echo '</div>';
		}
		?>
	</div>
</body>
</html>
