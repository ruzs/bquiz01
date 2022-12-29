<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">動畫圖片管理</p>
  <!-- <form method="post" target="back" action="?do=tii"> -->
  <form method="post" action="./api/edit.php">
    <table width="100%" class='cent'>
      <tbody>
        <tr class="yel">
          <td width="70%">動畫圖片</td>
          <td width="10%">顯示</td>
          <td width="10%">刪除</td>
          <td></td>
        </tr>
        <?php
        $rows = $Mvim->all();
        foreach ($rows as $row) {
          $checked = ($row['sh'] == 1) ? "checked" : "";
        ?>
          <tr>
            <td>
              <img src="./upload/<?= $row['img']; ?>" style="width:150px;height:80px">
            </td>
            <td>
              <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $checked; ?>>
            </td>
            <td>
              <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
            </td>
            <td>
              <input type="button" value="更換動畫" onclick="op('#cover','#cvr','./modal/upload_mvim.php?id=<?= $row['id']; ?>')">
              <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <td width="200px">
            <input type="button" onclick="op('#cover','#cvr','./modal/mvim.php')" value="新增動畫圖片">
          </td>
          <td class="cent">
            <input type="hidden" name="table" value="Mvim">
            <input type="submit" value="修改確定"><input type="reset" value="重置">
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>