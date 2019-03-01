<?php
include "sql.php";
switch($_GET['do']){
    case 'addtitle':
?>
        <p class="t cent botli">新增標題區圖片</p>
        <form action="api.php?do=<?=$_GET['do']?>" method="post" enctype="multipart/form-data">
            <table width=100% class="cent">
                <tr><td>標題區圖片<input type="file" name="file"></td></tr>
                <tr><td>標題區替代文字<input type="text" name="title"></td></tr>
                <tr><td><input type="submit" value="新增"><input type="reset" value="重置"></td>
                </tr>
            </table>
        </form>
<?php
    break;
    case 'chgtitle':
?>
    <p class="t cent botli">修改標題區圖片</p>
    <form action="api.php?do=<?=$_GET['do']?>" method="post" enctype="multipart/form-data">
        <table width=100% class="cent">
            <tr>
                <td>標題區圖片<input type="file" name="file"></td>
                <input type="hidden" name="id" value=<?=$_GET['id']?>>
            </tr>
            <tr><td><input type="submit" value="修改"><input type="reset" value="重置"></td></tr>
        </table>
    </form>
<?php
    break;
    case 'addmaqe':
?>
    <p class="t cent botli">新增動態文字廣告</p>
    <form action="api.php?do=<?=$_GET['do']?>" method="post" enctype="multipart/form-data">
        <table width=100% class="cent">
            <tr><td>動態文字廣告：<input type="text" name="text"></td></tr>
            <tr><td><input type="submit" value="新增"><input type="reset" value="重置"></td></tr>
        </table>
    </form>
<?php
    break;
    case 'addmvim':
?>
    <p class="t cent botli">新增動畫圖片</p>
    <form action="api.php?do=<?=$_GET['do']?>" method="post" enctype="multipart/form-data">
        <table width=100% class="cent">
            <tr><td>動畫圖片：<input type="file" name="file"></td></tr>
            <tr><td><input type="submit" value="新增"><input type="reset" value="重置"></td></tr>
        </table>
    </form>
<?php
    break;
    case 'chgmvim':
?>
    <p class="t cent botli">修改動畫圖片</p>
    <form action="api.php?do=<?=$_GET['do']?>" method="post" enctype="multipart/form-data">
        <table width=100% class="cent">
            <tr>
                <td>動畫圖片：<input type="file" name="file"></td>
                <input type="hidden" name="id" value=<?=$_GET['id']?>>
            </tr>
            <tr><td><input type="submit" value="修改"><input type="reset" value="重置"></td></tr>
        </table>
    </form>
<?php
    break;
    case 'addimage':
?>
    <p class="t cent botli">新增校園映像圖片</p>
    <form action="api.php?do=<?=$_GET['do']?>" method="post" enctype="multipart/form-data">
        <table width=100% class="cent">
            <tr><td>校園映像圖片：<input type="file" name="file"></td></tr>
            <tr><td><input type="submit" value="新增"><input type="reset" value="重置"></td></tr>
        </table>
    </form>
<?php
    break;
    case 'chgimage':
?>
    <p class="t cent botli">修改校園映像圖片</p>
    <form action="api.php?do=<?=$_GET['do']?>" method="post" enctype="multipart/form-data">
        <table width=100% class="cent">
            <tr>
                <td>校園映像圖片：<input type="file" name="file"></td>
                <input type="hidden" name="id" value=<?=$_GET['id']?>>
            </tr>
            <tr><td><input type="submit" value="修改"><input type="reset" value="重置"></td></tr>
        </table>
    </form>
<?php
    break;
    case 'addnews':
?>
    <p class="t cent botli">新增最新消息資料</p>
    <form action="api.php?do=<?=$_GET['do']?>" method="post" enctype="multipart/form-data">
        <table width=100% class="cent">
            <tr><td>最新消息資料：<textarea name="text"></textarea></td></tr>
            <tr><td><input type="submit" value="新增"><input type="reset" value="重置"></td></tr>
        </table>
    </form>
<?php
    break;
    case 'addadmin':
?>
    <p class="t cent botli">新增管理者帳號</p>
    <form action="api.php?do=<?=$_GET['do']?>" method="post" enctype="multipart/form-data">
        <table width=100% class="cent">
            <tr><td>帳號：<input type="text" name="acc"></td></tr>
            <tr><td>密碼：<input type="text" name="pwd"></td></tr>
            <tr><td>確認密碼：<input type="text"></td></tr>
            <tr><td><input type="submit" value="新增"><input type="reset" value="重置"></td></tr>
        </table>
    </form>
<?php
    break;
    case 'addmenu':
?>
    <p class="t cent botli">新增主選單</p>
    <form action="api.php?do=<?=$_GET['do']?>" method="post" enctype="multipart/form-data">
        <table width=100% class="cent">
            <tr><td>主選單名稱：<input type="text" name="title"></td></tr>
            <tr><td>連結網址：<input type="text" name="link"></td></tr>
            <tr><td><input type="submit" value="新增"><input type="reset" value="重置"></td></tr>
        </table>
    </form>
<?php
    break;
    case 'submenu':
?>
    <p class="t cent botli">編輯次選單</p>
    <form action="api.php?do=<?=$_GET['do']?>&id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">
        <table width=100% class="cent" id=submenu>
            <tr><td>次選單名稱</td><td>次選單連結網址</td><td>刪除</td></tr>
<?php
    $result=select("t12_menu","parent=".$_GET['id']);
    foreach($result as $row){
?>
            <tr>
                <td><input type="text" name="old_title['<?=$row['id']?>']" value=<?=$row['title']?>></td>
                <td><input type="text" name="old_link['<?=$row['id']?>']" value=<?=$row['link']?>></td>
                <td><input type="checkbox" name="old_del[]" value="<?=$row['id']?>"></td>
            </tr>
<?php
}
?>
</table>
            <div class="cent">
                <input type="submit" value="修改確定">
                <input type="reset" value="重置">
                <input type="button" value="更多次選單" onclick="more()">
            </div>
    </form>
    <script>
    function more(){
        newadd=`
            <tr>
                <td><input type="text" name="new_title[]"></td>
                <td><input type="text" name="new_link[]"></td>
                <input type="hidden" name="new_del[]" value=0>
                <td><input type="checkbox" name="new_del[]" value=1></td>
            </tr>
        `;
        $("#submenu").append(newadd);
    }
    </script>
<?php
    break;
}
?>