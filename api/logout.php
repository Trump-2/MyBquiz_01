<?php
session_start();
unset($_SESSION['login']);

// 這裡無法使用 to() 因為沒有 include 近來；另外因為已經是登出的使用者，所以不應該還在後台，因此將其導回首頁去
header("location:../index.php");