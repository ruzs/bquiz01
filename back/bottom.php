<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">頁尾版權管理</p>
  <!-- <form method="post" target="back" action="?do=tii"> -->
  <form method="post" action="./api/update.php">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="50%">頁尾版權資料：</td>
          <td width="50%">
            <input type="text" name="bottom" value="<?= $Bottom->find(1)['bottom']; ?>">
          </td>
        </tr>
      </tbody>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <td width="200px"></td>
          <td class="cent">
            <input type="hidden" name="table" value="Bottom">
            <input type="submit" value="修改確定"><input type="reset" value="重置">
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>