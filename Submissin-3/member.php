<?php
include "connection.php";
include "login.php";
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
         <p>Name: <br><br> User ID: <br><br> Membership Validity:</p>
      </div>

      <a href="Login.php">
         <button class="button"><u>Logout</u></button>
      </a>
   </div>

   <div class="borrowed_box">

      <div class="top">
         <h1 class="hi1">Borrowed Books</h1>
      </div>

      <div>
         <ol class="borrowed_list">
            <li>book one</li>
            <li>book one</li>
            <li>book one</li>
            <li>book one</li>
            <li>book one</li>
            <li>book one</li>
            <li>book one</li>
            <li>book one</li>
            <li>book one</li>
            <li>book one</li>
         </ol>
         <a href="all_books.php">
            <button class="SA">View All books</button>
         </a>
      </div>

   </div>

   <div class="edit_borrowed">

      <div>

         <form class="form_e" style="width: 80%;">
            <h1 class="hi3"> Edit borrowed list</h1>
            <label>Enter the serial number:</label> <br>
            <input type="text" name="book_isbn" />
         </form>

         <button class="SE">Remove</button>
      </div>

   </div>

   <div class="bottom_box">

      <div>

         <form class="form" action = "" method="post" style="width: 80%;">
            <h1 class="hi2"> Find Books</h1>
            <label>Book Name or ISBN:</label> <br>
            <input type="text" name="book_isbn" />
            <input class = "SE"  type="submit" name="search" value="Search">
            <input class = "po"  type="submit" name="add_to_list" value="Add to list">

         </form>


      </div>

   </div>



   <?php

         $count = 0;
         $sql = "SELECT Book_id from `all_book_list`";
         $res = mysqli_query($connection, $sql);

         $row = mysqli_fetch_assoc($res);
         while ($row = mysqli_fetch_assoc($res)) {
            if ($row['Book_id'] == $_POST['book_isbn']) {
              $count = $count + 1;
              break;
            }
          }


         if(isset($_POST['search'])) {

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


        if(isset($_POST['add_to_list'])) {

         if ($count == 1) {

            $sql = "INSERT INTO borrowed_book_list VALUES ('$user_id' , $_POST['book_isbn'] ,  )";
            $res = mysqli_query($connection, $sql);



            ?>
                <script type="text/javascript">
                  alert("Book Added!");
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
