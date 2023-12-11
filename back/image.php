<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">校園映像資料管理</p>
  <form method="post" action="./api/edit.php">
    <table width="100%" style="text-align:center">
      <tbody>
        <tr class="yel">
          <td width="70%">校園映像資料圖片</td>
          <td width="10%">顯示</td>
          <td width="10%">刪除</td>
          <td></td>
        </tr>
        <?php

        $total = $DB->count();
        $div = 3;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $DB->all(" limit $start, $div");
        foreach ($rows as $row) {
          # code...

        ?>
          <tr>
            <td>
              <img src="./img/<?= $row['img'] ?>" style="width:150px; height:68px;" alt="" srcset="">
            </td>

            <input type="hidden" name="id[]" value="<?= $row['id'] ?>">

            <td>
              <input type="checkbox" name="sh[]" id="" value="<?= $row['id'] ?>" <?= ($row['sh'] == 1) ? 'checked' : '' ?>>
            </td>
            <td>
              <input type="checkbox" name="del[]" id="" value="<?= $row['id'] ?>">

            </td>
            <td>
              <input type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do ?>&id=<?= $row['id'] ?>')" value="更換圖片">
            </td> <!-- 兩個 GET 參數要用 [ & ] 隔開 -->
          </tr>
        <?php
        }

        ?>
      </tbody>
    </table>


    <div class="cent">
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

          <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do ?>.php?table=<?= $do ?>')" value="新增校園映像圖片">
          </td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>