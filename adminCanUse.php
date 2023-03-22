<!DOCTYPE html>
<html>
<head>
	<title>Create Notification</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Create Notification</h1>
		<form method="post" action="create_notif.php">
			<label for="title"></label>
			<input type="text" name="title" required>

			<label for="message"></label>
			<textarea name="message" required></textarea>

			<button type="submit">submit</button>
		</form>
	</div>
</body>
</html>
