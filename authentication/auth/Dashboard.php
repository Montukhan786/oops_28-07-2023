<?php
	include('app/User.php')

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Display page</title>
	<link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
	<h1>
		Feedback Form
	</h1>
	<form action="" method="POST" id="frm-data">
		<input type="text" name="name" id="" placeholder="Enter name">
		<input type="email" name="email" id="" placeholder="Enter Email">
		<input type="text" name="mobile" id="" placeholder="Enter Mobile number">
		<input type="text" name="comment" id="" placeholder="Enter Feedback/suggestion">
		<input type="submit" name="btnSave" value="Save Data" id="">
	</form>
	
</body>
</html>