<?php
header('Content-Type: text/html; charset=utf-8');


$mysqli = mysqli_connect("localhost", "epwxoxxw_0209db", "1qazxsw23", "epwxoxxw_0209db");

if ($mysqli == false) {
  print("error");
} else {
  // print("—оединение установлено успешно");

  $name = $_POST["name"];
  $lastname = $_POST["lastname"];
  $email = trim(mb_strtolower($_POST["email"]));
  $pass = trim($_POST["pass"]);
  $pass = password_hash($pass, PASSWORD_DEFAULT);

  $result = $mysqli->query("SELECT * FROM `user` WHERE `email`='$email'");
  //var_dump($result->num_rows);
  if ($result->num_rows != 0) {
    print("exist"); //“акой пользователь существует
  } else {
    print("ok"); //“акого пользовател¤ не существует, можно регистрировать
    $mysqli->query("INSERT INTO `user`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
  }
}