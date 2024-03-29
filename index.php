<?php include_once './api/db.php'; ?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>卓越科技大學校園資訊系統</title>
  <link href="./css/css.css" rel="stylesheet" type="text/css">
  <script src="./js/jquery-1.9.1.min.js"></script>
  <script src="./js/js.js"></script>
</head>

<body>
  <div id="cover" style="display:none; ">
    <div id="coverr">
      <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;"
        onclick="cl(&#39;#cover&#39;)">X</a>
      <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
  </div>
  <div id="main">
    <?php
    $title = $Title->find(['sh' => 1]);
    ?>
    <a title="<?= $title['text']; ?>" href="index.php">
      <div class="ti" style="background:url(&#39;./img/<?= $title['img']; ?>&#39;); background-size:cover;"></div>
      <!--標題-->
    </a>
    <div id="ms">
      <div id="lf" style="float:left;">
        <div id="menuput" class="dbor">
          <!--主選單放此-->
          <span class="t botli">主選單區</span>
          <?php
          $mainmu = $Menu->all(['sh' => 1, 'menu_id' => 0]);
          foreach ($mainmu as $main) {
          ?>
          <div class='mainmu'>
            <a href="<?= $main['href']; ?>"
              style="color:#000; font-size:13px; text-decoration:none;"><?= $main['text']; ?></a>
            <?php

              // 確保主選單至少有一個次選單
              if ($Menu->count(['menu_id' => $main['id']]) > 0) {
                echo "<div class='mw'>";
                $subs = $Menu->all(['menu_id' => $main['id']]);
                foreach ($subs as $sub) {
                  echo "<a href='{$sub['href']}'>";
                  echo "<div class='mainmu2'>";
                  echo $sub['text'];
                  echo "</div>";
                  echo "</a>";
                }
                echo "</div>";
              }
              ?>

          </div>

          </a>
          <?php
          }
          ?>
        </div>
        <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
          <span class="t">進站總人數 : <?= $Total->find(1)['total']; ?></span>
        </div>
      </div>

      <?php

      // $do = isset($_GET['page']) ? $_GET['page'] : 'main';
      
      // 上面那行的簡寫，使用 nullish coalescing operator；因為 isset( ) 的變數跟條件為 true 時選擇的值是一樣的
      $do = $_GET['do'] ?? 'main';
      $file = "./front/{$do}.php";

      // file_exist( ) 判斷檔案是否存在
      if (file_exists($file)) {
        include $file;
      } else {
        include "./front/main.php";
      }

      ?>

      <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
        <!--右邊-->
        <?php
        // 讓已經登入的使用者不會看到管理登入的頁面和按鈕
        if (isset($_SESSION['login'])) {
        ?>
        <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
          onclick="lo(&#39;back.php&#39;)">返回管理</button>
        <?php
        } else {
        ?>
        <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
          onclick="lo(&#39;?do=login&#39;)">管理登入</button>
        <?php
        }
        ?>

        <div style="width:89%; height:480px;" class="dbor">
          <span class="t botli">校園映象區</span>

          <div class="cent" onclick="pp(1)"><img src="./icon/up.jpg" alt=""></div>

          <?php
          $imgs = $Image->all(['sh' => 1]);

          foreach ($imgs as $idx => $img) {
          ?>
          <!-- 這段 div 是配合底下的 js 所創造的 -->
          <div id="ssaa<?= $idx?>" class='im cent'>
            <img src="./img/<?= $img['img']; ?>" style="width:150px;height:103px;border:3px solid orange;margin:3px">
          </div>
          <?php
          }
          ?>

          <div class="cent" onclick="pp(2)"><img src="./icon/dn.jpg" alt=""></div>

          <script>
          // 手動改成 1
          var nowpage = 1,
            // 資料庫中的圖片數
            num = <?= $Image->count(['sh' => 1]); ?>;

          // 圖片換頁的程式碼

          function pp(x) {
            var s, t;

            // 這裡的 x == 1 代表上一頁
            if (x == 1 && nowpage - 1 >= 0) {
              nowpage--;
            }
            // 在 php 中邏輯運算子和運算式相鄰時，建議將運算式用 () 包起來；在 js 沒這個問題
            // 這裡的 x == 2 代表下一頁
            if (x == 2 && (nowpage + 1) <= num * 1 - 3) { // num * 1 -3 代表可以點擊的總次數
              nowpage++;
            }

            $(".im").hide()
            for (s = 0; s <= 2; s++) {
              t = s * 1 + nowpage * 1;
              $("#ssaa" + t).show() // => 例如：#ssaa1、#ssaa2、#ssaa3

            }
          }
          pp(1)
          </script>
        </div>
      </div>
    </div>
    <div style="clear:both;"></div>
    <div
      style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
      <span class="t" style="line-height:123px;"><?= $Bottom->find(1)['bottom']; ?></span>
    </div>
  </div>

</body>

</html>