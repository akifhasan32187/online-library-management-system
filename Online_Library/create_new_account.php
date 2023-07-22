<?php
include "connection.php";

?>


<!DOCTYPE html>
<html>

<head>
  <title>Create Account</title>
  <link rel="stylesheet" type="text/css" href="new_account_style.css">
</head>

<body>

  <header class="header1">
    Enter your information Here
  </header>

  <section class="section1">
     <br>
    <a href="Login.php"><input class="button" type="submit" name="submit" value="Back to Login Page"></a>
    <div>
      <form class="my-form" action="" method="post">
        <div class="form-group">
          <label>User ID: </label>
          <input type="number" name="user_id" required="">

          <label>Password: </label>
          <input type="password" name="password" required="">

          <label>Name: </label>
          <input type="text" name="Name" required="">

          <label>Contact no: </label>
          <input type="text" name="contact_no" required="">

          <label>Address: </label>
          <input type="text" name="address" required="">
          <br><br>
          <input class="button" type="submit" name="submit" value="Create Account">
        </div>
      </form>
    </div>
  </section>
  <?php

  if (isset($_POST['submit'])) {


 
    
    $count = 0;
    $sql = "SELECT user_id from `member_info`";
    $res = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
      if ($row['user_id'] == $_POST['user_id']) {
        $count = $count + 1;
      }
    }
    $exp_date = strtotime("+3 Year");
    $exp_date_store = date("Y-m-d H:i:s", $exp_date);

    if ($count == 0) {
      mysqli_query($connection, "INSERT INTO `member_info` VALUES('$_POST[user_id]', '$_POST[password]', '$_POST[Name]', '$_POST[contact_no]', '$_POST[address]', '$exp_date_store');");
  ?>
      <script type="text/javascript">
        alert("Registration successful");
      </script>
    <?php
    } else {

    ?>
      <script type="text/javascript">
        alert("The username already exist.");
      </script>
  <?php

    }
  }
  ?>


</body>

</html>