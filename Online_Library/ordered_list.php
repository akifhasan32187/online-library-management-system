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
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Ordered Book List</title>

 <link rel="stylesheet" href="list_style.css">
</head>

<body>
 <div class="page-wrapper">
  <div class="navbar">
   <div class="container">
    <div class="row">
     <div class="col-lg-6">
      <div class="logo">
       <a href="#">Online Library</a>
      </div>
     </div>
     <div class="col-lg-6 text-right">
      <div class="main-menu">
       <ul>
        <li>
         <a href="Admin Panel.php">Home</a>
        </li>
       </ul>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
 <div class="borrowed_box">

  <div class="top">
   <h1 class="hi1">Orderd Books List</h1>
  </div>

  <div>
   <ol class="borrowed_list">
    <?php




    $count_book = 1;
    $sql = "SELECT `Admin_id`, `Book_id`, `Publisher_Id`, `Book_Name`, `Arrival_date`, `Ordered_date` FROM `ordered_book_list_admin`";
    $result = mysqli_query($connection, $sql);




    echo "<br>";


    if (mysqli_num_rows($result) > 0) {
     while ($row = mysqli_fetch_assoc($result)) {
      if ($_SESSION['user_id'] == $row['Admin_id']) {
       echo  "Serial No:   " . $count_book . ", ISBN:  " . " " . $row["Book_id"] . " " . ", Name: " . " " . $row["Book_Name"] . " " . ", Arrival date:   "  . " " . $row["Arrival_date"] . " " . " , Ordered_date: " . " " . $row["Ordered_date"];
       echo "<br><br>";
       $count_book = $count_book + 1;
      }
     }
    }


    ?>
   </ol>
  </div>

 </div>
</body>

</html>