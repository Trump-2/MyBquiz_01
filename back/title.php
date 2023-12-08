<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">網站標題管理</p>
  <form method="post" action="?do=tii">
    <table width="100%" style="text-align:center">
      <tbody>
        <tr class="yel">
          <td width="45%">網站標題</td>
          <td width="23%">替代文字</td>
          <td width="7%">顯示</td>
          <td width="7%">刪除</td>
          <td></td>
        </tr>
        <?php
        $rows = $Title->all();
        foreach ($rows as $row) {
          # code...

        ?>
        <tr>
          <td width="45%">
            <img src="./img/<?= $row['img'] ?>" style="width=300px; height:30px;" alt="" srcset="">
          </td>
          <td width="23%">
            <input type="text" name="text[<?= $row['id'] ?>]" id="" style="width:90%" value=<?= $row['text'] ?>>

          </td>
          <td width="7%">
            <input type="radio" name="sh" id="" value="<?= $row['id'] ?>">
          </td>
          <td width="7%">
            <input type="checkbox" name="del[]" id="" value="<?= $row['id'] ?>">

          </td>
          <td>
            <input type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do ?>&id=<? $row['id'] ?>')"
              value="新增網站標題圖片">
          </td> <!-- 兩個 GET 參數要用 [ & ] 隔開 -->
        </tr>
        <?php
        }

        ?>
      </tbody>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <input type="hidden" name="table" value="<?= $do ?>">

          <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do ?>.php?table=<?= $do ?>')"
              value="新增網站標題圖片">
          </td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>