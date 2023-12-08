<!-- <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">進佔總人數管理管理</p>
  <form method="post" target="back" action="?do=tii">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="45%">網站標題</td>
          <td width="23%">替代文字</td>
          <td width="7%">顯示</td>
          <td width="7%">刪除</td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <td width="200px"><input type="button" onclick="op('#cover','#cvr','view.php?do=title')" value="新增網站標題圖片">
          </td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div> -->

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">頁尾版權資料管理</p>
  <form method="post" action="./api/edit_info.php">
    <table width="50%" style="margin:auto">
      <tbody>
        <tr class="yel">
          <td width="50%">頁尾版權資料</td>
          <td width="50%">
            <input type="text" name="bottom" id="" value="<?= $Bottom->find(1)['bottom'] ?>">
            <input type="hidden" name="table" value="<?= $do ?>">
          </td>

        </tr>
      </tbody>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <td width="200px">
          </td>

          <td class="cent"><input type="submit" value="修改確定">
            <input type="reset" value="重置">
          </td>
        </tr>
      </tbody>
    </table>

  </form>
</div>