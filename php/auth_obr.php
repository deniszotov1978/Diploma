<?php
session_start();
header('Content-Type: text/html; charset=utf-8');


$mysqli = mysqli_connect("localhost", "epwxoxxw_0209db", "1qazxsw23", "epwxoxxw_0209db");

if ($mysqli == false) {
  print("error");
} else {
  $email = trim(mb_strtolower($_POST["email"]));
  $pass = trim($_POST["pass"]);

  $result = $mysqli->query("SELECT * FROM `user` WHERE `email`='$email'");
  $result = $result->fetch_assoc();
  $pass_hash = $result["pass"];

  if (password_verify($pass, $pass_hash)) {
    echo "success";
    $_SESSION["id"] = $result["id"];
    $_SESSION["name"] = $result["name"];
    $_SESSION["lastname"] = $result["lastname"];
    $_SESSION["email"] = $result["email"];
  } else {
    echo "rejected";
  }
}