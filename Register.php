<?php
  $con = mysql_connect("files.000webhost.com,id902836_mercenary,02242017,id902836_mercenary");
  
  $firstname = $_POST["firstname"];
  $lastname = $_POST[lastname];
  $contact = $_POST["contact"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  
  $statement = mysqli_prepare($con, "INSERT INTO user (firstname, lastname, contact, email, password) VALUES (?, ?, ?, ?, ?)";
  mysqli_stmt_bind_param($statement, "ssiss", $firstname, lastname, contact, $email, $password);
  mysqli_stmt_execute($statement);
  
  $response = array();
  $response["success"] = true;
  
  echo json_encode($response);
?>
