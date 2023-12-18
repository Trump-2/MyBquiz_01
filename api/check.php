<?php
include_once "db.php";


// 用 count 資料流量會少很多
if ($Admin->count(['acc' => $_POST['acc'], 'pw' => $_POST['pw']])) {
  $_SESSION['login'] = $_POST['acc'];
  to("../back.php");
} else {
  to("../index.php?do=login&error=帳號密碼錯誤");
}
