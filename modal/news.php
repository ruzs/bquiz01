<h3>新增最新消息資料</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
  <table>
    <tr>
      <td>最新消息資料：</td>
      <td>
        <textarea name="text" id="" cols="30" rows="10"></textarea>
      </td>
    </tr>
  </table>
  <div>
    <input type="submit" value="新增">
    <input type="hidden" name="table" value="News">
    <input type="reset" value="重置">
  </div>
</form>