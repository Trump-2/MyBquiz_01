<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">最新消息資料廣告管理</p>
  <form method="post" action="./api/edit.php">
    <table width="100%" style="text-align:center">
      <tbody>
        <tr class="yel">
          <td width="80%">最新消息資料內容</td>
          <td width="10%">顯示</td>
          <td width="10%">刪除</td>
        </tr>
        <?php

        $total = $DB->count();
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $DB->all(" limit $start, $div");
        foreach ($rows as $row) {
          # code...

        ?>
          <tr>
            <td>
              <!-- textarea 的標籤不要斷行，否則寫進資料庫時會產生奇怪的空白 -->
              <textarea type="text" name="text[]" id="" style="width:90%;height:60px;"><?= $row['text'] ?></textarea>
              <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
              <!-- 這裡用直接塞 id 的方式取代 input:hidden 帶 id 的方式， -->
            </td>
            <td>
              <input type="checkbox" name="sh[]" id="" value="<?= $row['id'] ?>" <?= ($row['sh'] == 1) ? 'checked' : '' ?>>
            </td>
            <td>
              <input type="checkbox" name="del[]" id="" value="<?= $row['id'] ?>">
            </td>
          </tr>
        <?php
        }

        ?>
      </tbody>
    </table>

    <div class="cent">

      <!-- 這段是分頁功能 -->
      <?php
      if ($now > 1) {
        $prev = $now - 1;

        // 這裡用 &lt 的 html entity 來代表 [ < ] 
        // echo "<a href='?do=news&p=$prev'> &lt </a>";
        echo "<a href='?do=$do&p=$prev'> < </a>";
      }

      for ($i = 1; $i <= $pages; $i++) {

        $fontsize = ($now == $i) ? '24px' : '16px';

        echo "<a href='?do=$do&p=$i' style='font-size:$fontsize'> $i </a>";
      }

      if ($now < $pages) {
        $next = $now + 1;
        // echo "<a href='do=news&p=$next'> &gt </a>"
        echo "<a href='?do=$do&p=$next'> > </a>";
      }

      ?>
    </div>

    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <input type="hidden" name="table" value="<?= $do ?>">

          <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do ?>.php?table=<?= $do ?>')" value="新增最新消息資料">
          </td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>