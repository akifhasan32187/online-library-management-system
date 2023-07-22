<?php
include "connection.php";

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
  </div>

 </div>
</body>

</html>