<?php
session_start();
unset($_SESSION['login']);

// 這裡無法使用 to() 因為沒有 include 近來
header("location:../index.php");
