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
// if (isset($_POST['id'])) {
//   foreach ($_POST['id'] as $id) {
//     $_POST['text'][$id] = '';
//   }
// }

foreach ($_POST['id'] as $key => $id) {
  if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
    $DB->del($id);
  } else {
    $row = $DB->find($id);
    if (isset($row['text'])) {

      $row['text'] = $_POST['text']['$key'];
    }

    switch ($table) {
      case 'title':
        $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id)  ? 1 : 0;
        break;
      case "admin":
        $row['acc'] = $_POST['acc'][$key];
        $row['pw'] = $_POST['pw'][$key];
        break;

      case 'menu':
        break;
      default:
    }

    $DB->save($row);
  }
}

to("../back.php?do=$table");
