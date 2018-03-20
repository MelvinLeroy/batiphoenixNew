<?php
  $mail = 'kevin.cheruel.dev@gmail.com';
  $pass = 'Laurene123';
  $crypt = crypt($pass);
  $sqlLogIn = 'SELECT * FROM users WHERE mail="'.$mail.'" AND password = "'.$crypt.'"';
  // $queryLogIn = $db->query($sqlLogIn);
  // $resultLogIn = $queryLogIn->fetchAll();
  // if(count($resultLogIn) > 0){
  //     $_SESSION['pseudo'] = $resultLogIn[0]['pseudo'];
  // }else{
  // }

 ?>
