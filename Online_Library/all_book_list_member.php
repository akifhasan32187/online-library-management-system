<?php
include "connection.php";




$sql = "SELECT Book_id, Book_name, Genre, Author from `all_book_list`";
$res = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Inventory Book List</title>

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
        
        <a href="member.php">Home</a>
         
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
   <h1 class="hi1">Inventory Books List</h1>
  </div>
    <!-- <pre><?php print_r($booklist); ?></pre> -->
  <div>
   <ul class="borrowed_list">
   <?php if(mysqli_num_rows($res) > 0){
        while($booklist = mysqli_fetch_assoc($res)){
    ?>
    <li><?php echo "ISBN:  " ." " .$booklist["Book_id"] ." " .", Name: " ." " .$booklist["Book_name"] . ",  Author: " . $booklist['Author']; ?></li>
    <?php } } ?>
   </ul>
  </div>

 </div>
</body>

</html>

