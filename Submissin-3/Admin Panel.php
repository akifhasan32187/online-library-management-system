<?php
include "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="Admin_Panel_Style.css">
	<title>Admin Panel</title>
</head>

<body>


	<div class="leftbox">

		<div class="top">
			<p>Name: <br><br> User ID: <br><br> Designation:</p>
		</div>
		<a href="Login.php">
			<button class="button"><u>Logout</u></button>
		</a>

		<a href="all_books.php">
			<button class="SA">SHOW ALL BOOKS</button>
		</a>
		<a href="ordered_list.php">
			<button class="SO">SHOW ORDERED BOOKS</button>
		</a>
	</div>



	<div class="rightbox">

		<div>
			<form class="form" style="width: 80%;">
				<label>Book Name or ISBN:</label> <br>
				<input type="text" name="book_isbn" />

			</form>

			<button class="SE">SEARCH</button>
			<button class="po">Place Order</button>
		</div>



	</div>




</body>

</html>