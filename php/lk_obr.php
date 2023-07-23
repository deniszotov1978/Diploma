<?php
session_start();
header('Content-Type: text/html; charset=utf-8');


$mysqli = mysqli_connect("localhost", "epwxoxxw_0209db", "1qazxsw23", "epwxoxxw_0209db");

if ($mysqli == false) {
  print("error");
} else {
  $inputValue = $_POST["value"];
  $item = $_POST["item"];
  $id = $_SESSION["id"];

  $mysqli->query("UPDATE `user` SET `$item`='$inputValue'  WHERE `id`='$id'");
  $_SESSION[$item] = $inputValue;
}