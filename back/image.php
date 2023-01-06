<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">校園映像資料管理</p>
  <!-- <form method="post" target="back" action="?do=tii"> -->
  <form method="post" action="./api/edit.php">
    <table width="100%" class='cent'>
      <tbody>
        <tr class="yel">
          <td width="70%">校園映像資料圖片</td>
          <td width="10%">顯示</td>
          <td width="10%">刪除</td>
          <td></td>
        </tr>
        <?php
        $all=$Image->count();
        $div=3;
        $pages=ceil($all/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        $rows=$Image->all(" limit $start,$div");
        //$rows=$Image->all();
        foreach ($rows as $row) {
          $checked = ($row['sh'] == 1) ? "checked" : "";
        ?>
          <tr>
            <td>
              <img src="./upload/<?= $row['img']; ?>" style="width:100px;height:68px">
            </td>
            <td>
              <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $checked; ?>>
            </td>
            <td>
              <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
            </td>
            <td>
              <input type="button" value="更換圖片" onclick="op('#cover','#cvr','./modal/upload_image.php?id=<?= $row['id']; ?>')">

              <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <div style="text-align:center;">
					<?php 
					if(($now-1)>0){
					?>
						<a class="bl" style="font-size:30px;" href="?do=image&p=<?=$now-1;?>">&lt;&nbsp;</a>
					<?php
					}
					?>

					<?php
					for($i=1;$i<=$pages;$i++){
						$size=($i==$now)?"26px":"18px";
					?>
						<a class="bl" style="font-size:<?=$size;?>" href="?do=image&p=<?=$i;?>">&nbsp;<?=$i;?>&nbsp;</a>
					<?php
					}
					?>
					<?php 
					if(($now+1)<=$pages){
					?>
					<a class="bl" style="font-size:30px;" href="?do=image&p=<?=$now+1;?>">&nbsp;&gt;</a>
					<?php 
					}
					?>
				</div>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <td width="200px">
            <input type="button" onclick="op('#cover','#cvr','./modal/image.php')" value="新增校園映像資料">
          </td>
          <td class="cent">
            <input type="hidden" name="table" value="Image">
            <input type="submit" value="修改確定"><input type="reset" value="重置">
          </td>
        </tr>
      </tbody>
    </table>

  </form>
</div>