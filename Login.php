<?php
  $con = mysql_connect("localhost,id902836_mercenary,02242017,id902836_mercenary");
  
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  $statement = mysqli_prepare($con, "SELECT * FROM user WHERE email = ? AND password = ?);
  mysqli_stmt_bind_param($statement, "ss", $email, $password);
  mysqli_stmt_execute($statement);
  
  mysqli_stmt_store_result($statement);
  mysqli_stmt_blind_result($statement, $userID, $firstname, $lastname, $email, $password, $contact );
  
  $response = array();
  $response["success"] = false;
  
  while(mysqli_stmt_fetch($statement)){
    $response["success"] = true;
    $response["firstname"] = $firstname;
    $response["lastname"] = $lastname;
    $response["email"] = $email;
    $response["password"] = $password;
    $response["contact"] = $contact;
  }
  
  echo json_encode($response);
?>
