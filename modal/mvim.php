<h3>新增動畫圖片</h3>
<hr>
<form action="./api/add_mvim.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>動畫圖片：</td>
        <td>
            <input type="file" name="img">
        </td>
    </tr>
</table>
<div>
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>
</form>