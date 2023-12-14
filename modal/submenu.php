<h3>新增次選單</h3>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
  <table>
    <tr>
      <td>次選單名稱:</td>
      <td><input type="text" name="text" id=""></td>
    </tr>
    <tr>
      <td>次選單連結網址:</td>
      <td><input type="text" name="href" id=""></td>
    </tr>
  </table>
  <div>
    <input type="hidden" name="table" value="<?= $_GET['table'] ?>">
    <input type="submit" value="修改確定">
    <input type="reset" value="重置">
    <input type="button" value="更多次選單">
  </div>
</form>