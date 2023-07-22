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
   <link rel="stylesheet" type="text/css" href="member_style.css">
   <title>Member Panel</title>
</head>

<body>


   <div class="user_info_box">

      <div class="top">




         <p>
            Name: <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ""; ?>
            <br><br>
            User ID: <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ""; ?>
            <br><br>
            Membership Validity: <?php echo isset($_SESSION['mem_exp']) ? $_SESSION['mem_exp'] : ""; ?>

            <br><br>
         </p>





      </div>




      <form method="post" action="member.php">
         <button class="button" type="submit" name="logout"><u>Logout</u></button>
      </form>





   </div>

   <div class="borrowed_box">


      <h1 class="hi1">Borrowed Books</h1>

      <ol class="borrowed_list">


         <?php




         $count_book = 1;
         $sql = "Select Mem_Id , Book_id , Book_Name , Issue_date , Return_date
                  from borrowed_book_list";
         $result = mysqli_query($connection, $sql);




         echo "<br>";


         if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
               if ($_SESSION['user_id'] == $row['Mem_Id']) {
                  echo  "Serial No:   " . $count_book . ", ISBN:  " . " " . $row["Book_id"] . " " . ", Name: " . " " . $row["Book_Name"] . " " . ", Issue Date:   "  . " " . $row["Issue_date"] . " " . " , Return Date: " . " " . $row["Return_date"];
                  echo "<br><br>";
                  $count_book = $count_book + 1;
               }
            }
         }


         ?>

      </ol>

<a href="all_book_list_member.php">
      <button class="SA">View All books</button>
   </a>

   </div>

   

   <div class="edit_borrowed">

      <div>

         <form class="form_e" method="post" style="width: 80%;">
            <h1 class="hi3"> Edit borrowed list</h1>
            <label>Enter the ISBN number:</label> <br>
            <input type="text" name="book_isbn">
            <input class="SE" type="submit" name="delete" value="Delete">
         </form>

         <?php
         if (isset($_POST['delete'])) {


            $sql = "DELETE FROM borrowed_book_list WHERE Mem_Id = $_SESSION[user_id]  and Book_id = $_POST[book_isbn]";
            $result = mysqli_query($connection, $sql);

         ?>
            <script type="text/javascript">
               alert("Successfully Deleted! Please Refresh");
            </script>
         <?php

         }
         ?>



      </div>

   </div>

   <div class="bottom_box">

      <div>

         <form class="form" action="" method="post" style="width: 80%;">
            <h1 class="hi2"> Find Books</h1>
            <label>Enter Book ISBN:</label> <br>
            <input type="text" name="book_isbn">
            <input class="SE" type="submit" name="search" value="Search">
            <input class="po" type="submit" name="add_to_list" value="Add to list">

         </form>


      </div>

   </div>

   <?php

   $count = 0;

   if (isset($_POST['book_isbn'])) {
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
   }


   if (isset($_POST['search'])) {

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


   if (isset($_POST['add_to_list'])) {

      $issue_date = strtotime("today");
      $issue_date_store = date("Y-m-d h:i:s", $issue_date);

      $return_date = strtotime("+3 Month");
      $return_date_store = date("Y-m-d H:i:s", $return_date);



      if ($count == 1) {

         if ($count_book <= 10) {
            mysqli_query($connection, "INSERT INTO `borrowed_book_list` VALUES ('$_SESSION[user_id]' , '$_POST[book_isbn]' , '$bookname', '$issue_date_store', '$return_date_store')");


         ?>
            <script type="text/javascript">
               alert("Book Added!");
            </script>
         <?php
         } else {

         ?>
            <script type="text/javascript">
               alert("Sorry , You Can Not Add More Than 10 Books!");
            </script>
         <?php


         }
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