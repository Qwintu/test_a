<?php
  header('Content-type: text/html; charset=utf-8');
  session_start();
  $email = $_POST['email'];
  $password= $_POST['password'];
  
  $mysqli = new mysqli('localhost','drinnpoll_1','hGu1NXE%','drinnpoll_1');
  $email = strtolower($email);

  $check_email = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
  $row = $check_email->fetch_assoc(); // Массив значений из БД
  var_dump($row);
  echo "<hr>";
  echo $row['pass'];
  echo "<hr>";
  echo $password;
  echo "<hr>";
  // проверка пароля ф-цией password_verify() и запись в сессию(куки) данных пользователя
  if(password_verify($password, $row['pass'])){
    $_SESSION['name'] = $row['name'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['id'] = $row['id'];
    echo "SUCCESS";
  }else{
    echo "ERROR";
  }

/*  старая версия
  if($check_email->num_rows){  // если в check_email() есть значение num_rows (кол-во строк) отличное от нуля - true
    echo "User already exist.";
  }else{
    echo "You have то register";
  }
*/
  //$message = "<hr>\nПочта: $email<br>\nПароль: $password";
  //echo $message;
?>
