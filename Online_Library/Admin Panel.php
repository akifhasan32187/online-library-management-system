<?php
include "connection.php";
session_start();
if (isset($_SESSION['login'])) {
	if ($_SESSION['login'] != true) {
		header("Location: ./Login.php");
	}
} else {
	header("Location: ./Login.php");
}
if (isset($_POST['logout'])) {
	unset($_SESSION['login'], $_SESSION['name'], $_SESSION['user_id']);
	header("Location: ./Login.php");
}

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




			<p>
				Name: <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ""; ?>
				<br><br>

				User ID: <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ""; ?>

				<br><br>
				Designation: <?php echo isset($_SESSION['designation']) ? $_SESSION['designation'] : ""; ?>

				<br><br>
			</p>




		</div>



		<form method="post" action="Admin Panel.php">
			<button class="button" type="submit" name="logout"><u>Logout</u></button>
		</form>





		<a href="all_books.php">
			<button class="SA">SHOW ALL BOOKS</button>
		</a>
		<a href="ordered_list.php">
			<button class="SO">SHOW ORDERED BOOKS</button>
		</a>
		<a href="Place Order.php">
			<button class="SO">Place Order</button>
		</a>


	</div>
	<br><br>
	<br><br>
	<br><br>




	<div class="rightbox">

		<form class="form" method="post" style="width: 80%;">
			<label>Book ISBN:</label> <br>
			<input type="text" name="book_isbn" />
			<br><br>
			<br><br>
			<input class="SE" type="submit" name="search" value="Search">

		</form>



	</div>



	<?php

	$count = 0;



	if (isset($_POST['search'])) {
		$sql = "SELECT Book_id, Book_name, Genre from `all_book_list`";
		$res = mysqli_query($connection, $sql);
		$bookname = null;
		while ($row = mysqli_fetch_assoc($res)) {
			if ($row['Book_id'] == $_POST['book_isbn']) {
				$count = $count + 1;
				$bookname = $row['Book_name'];
				break;
			}
		}

		if ($count == 1) {

	?>
			<script type="text/javascript">
				alert("Book Found!");
			</script>
		<?php
		} else {

		?>
			<script type="text/javascript">
				alert("Sorry, this Book is not available");
			</script>
	<?php

		}
	}


	?>


</body>

</html>