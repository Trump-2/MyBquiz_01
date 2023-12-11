<?php
include_once "db.php";

$table = $_POST['table'];

$DB = ${ucfirst($table)};

unset($_POST['table']);


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

      $row['text'] = $_POST['text'][$key];
    }

    switch ($table) {
      case 'title':
        // 因為 title 送過來的表單的 sh 欄位因為是單選，所以是一個值
        $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id)  ? 1 : 0;
        break;
      case "admin":
        $row['acc'] = $_POST['acc'][$key];
        $row['pw'] = $_POST['pw'][$key];
        break;

      case 'menu':
        // 這裡沒跟上，重聽
        $row['href'] = $_POST['href'][$key];
        $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
        break;
      default:
        // 表單送過來的 sh 欄位因為是多選，所以是陣列
        $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
    }

    $DB->save($row);
  }
}

to("../back.php?do=$table");
