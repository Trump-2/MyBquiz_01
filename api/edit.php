<?php
include_once "db.php";

$table = $_POST['table'];

$DB = ${ucfirst($table)};

unset($_POST['table']);

switch ($table) {
  case 'admin':
    unset($_POST['pw2']);
    break;
}

// 新增這段是因為更新動畫時，顯示和刪除功能不正常，因為更新動畫的頁面送來的表單沒有 $_POST['text']
if (isset($_POST['id'])) {
  foreach ($_POST['id'] as $id) {
    $_POST['text'][$id] = '';
  }
}

foreach ($_POST['text'] as $id => $text) {
  if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
    $DB->del($id);
  } else {
    $row = $DB->find($id);
    if (isset($row['text'])) {

      $row['text'] = $text;
    }
    if ($table == 'title') {
      $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id)  ? 1 : 0;
    } else {
      $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh']))  ? 1 : 0;
    }
    $DB->save($row);
  }
}

to("../back.php?do=$table");
