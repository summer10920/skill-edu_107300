<?php
switch($_GET['do']){
    case 'add_title':
        ?>
        <p class="t cent botli">新增標題區圖片</p>
        <form method=post enctype="multipart/form-data" action=api.php?do=<?=$_GET['do']?>>
            <table style="margin:auto">
                <tr>
                    <td align=right>標題區圖片：</td>
                    <td><input type=file name=file required=required></td>
                </tr>
                <tr>
                    <td align=right>標題區替代文字：</td>
                    <td><input type=text name=text required=required></td>
                </tr>
                <tr>
                    <td colspan=2><input type=hidden name=dpy value=0><input type=submit value=新增><input type=reset value=重置></td>
                </tr>
            </table>
        </form>
        <?php
    break;
    case 'mdy_title':
        ?>
        <p class="t cent botli">更改標題圖片</p>
        <form method=post enctype="multipart/form-data" action=api.php?do=<?=$_GET['do']?>>
            <table style="margin:auto">
                <tr>
                    <td align=right>標題區圖片：</td>
                    <td><input type=file name=file required=required></td>
                </tr>
                <tr>
                    <td colspan=2><input type=hidden name=id value=<?=$_GET['id']?>><input type=submit value=更新><input type=reset value=重置></td>
                </tr>
            </table>
        </form>
        <?php
    break;
    case 'add_meqe':
        ?>
        <p class="t cent botli">新增動態文字廣告</p>
        <form method=post enctype="multipart/form-data" action=api.php?do=<?=$_GET['do']?>>
            <table style="margin:auto">
                <tr>
                    <td align=right>動態文字廣告：</td>
                    <td><input type=text name=text required="required"></td>
                </tr>
                <tr class="cent">
                    <td colspan=2 ><input type=hidden name=dpy value=0><input type=submit value=新增><input type=reset value=重置></td>
                </tr>
            </table>
        </form>
        <?php
    break;
    case 'add_mvim':
        ?>
        <p class="t cent botli">新增動畫圖片</p>
        <form method=post enctype="multipart/form-data" action=api.php?do=<?=$_GET['do']?>>
            <table style="margin:auto">
                <tr>
                    <td align=right>動畫圖片：</td>
                    <td><input type=file name=file required=required></td>
                </tr>
                <tr class="cent">
                    <td colspan=2><input type=hidden name=dpy value=0><input type=submit value=新增><input type=reset value=重置></td>
                </tr>
            </table>
        </form>
        <?php
    break;
    case 'mdy_mvim':
        ?>
        <p class="t cent botli">更改動畫圖片</p>
        <form method=post enctype="multipart/form-data" action=api.php?do=<?=$_GET['do']?>>
            <table style="margin:auto">
                <tr>
                    <td align=right>動畫圖片：</td>
                    <td><input type=file name=file required=required></td>
                </tr>
                <tr class="cent">
                    <td colspan=2><input type=hidden name=id value=<?=$_GET['id']?>><input type=submit value=更新><input type=reset value=重置></td>
                </tr>
            </table>
        </form>
        <?php
    break;
    case 'add_image':
        ?>
        <p class="t cent botli">新增校園映像圖片</p>
        <form method=post enctype="multipart/form-data" action=api.php?do=<?=$_GET['do']?>>
            <table style="margin:auto">
                <tr>
                    <td align=right>校園映像圖片：</td>
                    <td><input type=file name=file required=required></td>
                </tr>
                <tr class="cent">
                    <td colspan=2><input type=hidden name=dpy value=0><input type=submit value=新增><input type=reset value=重置></td>
                </tr>
            </table>
        </form>
        <?php
    break;
    case 'mdy_image':
        ?>
        <p class="t cent botli">更改校園映像圖片</p>
        <form method=post enctype="multipart/form-data" action=api.php?do=<?=$_GET['do']?>>
            <table style="margin:auto">
                <tr>
                    <td align=right>校園映像圖片：</td>
                    <td><input type=file name=file required=required></td>
                </tr>
                <tr class="cent">
                    <td colspan=2><input type=hidden name=id value=<?=$_GET['id']?>><input type=submit value=更新><input type=reset value=重置></td>
                </tr>
            </table>
        </form>
        <?php
    break;
    case 'add_news':
        ?>
        <p class="t cent botli">新增最新消息資料</p>
        <form method=post enctype="multipart/form-data" action=api.php?do=<?=$_GET['do']?>>
            <table style="margin:auto">
                <tr>
                    <td align=right>最新消息資料：</td>
                    <td><textarea name=text required="required"></textarea></td>
                </tr>
                <tr class="cent">
                    <td colspan=2 ><input type=hidden name=dpy value=0><input type=submit value=新增><input type=reset value=重置></td>
                </tr>
            </table>
        </form>
        <?php
    break;
    case 'add_admin':
        ?>
        <p class="t cent botli">新增管理者帳號</p>
        <form method=post enctype="multipart/form-data" action=api.php?do=<?=$_GET['do']?>>
            <table style="margin:auto">
                <tr>
                    <td align=right>帳號：</td>
                    <td><input type=text name=acc required=required></td>
                </tr>
                <tr>
                    <td align=right>密碼：</td>
                    <td><input type=text name=pwd required=required></td>
                </tr>
                <tr>
                    <td align=right>確認密碼：</td>
                    <td><input type=text name=pwd2 required=required></td>
                </tr>
                <tr class="cent">
                    <td colspan=2><input type=submit value=新增><input type=reset value=重置></td>
                </tr>
            </table>
        </form>
        <?php
    break;
    case 'add_menu':
        ?>
        <p class="t cent botli">新增主選單</p>
        <form method=post enctype="multipart/form-data" action=api.php?do=<?=$_GET['do']?>>
            <table style="margin:auto">
                <tr class="cent">
                    <td>主選單名稱</td><td>主選單連結網址</td>
                </tr>
                <tr class="cent">
                    <td><input type=text name=text required=required></td>
                    <td><input type=text name=link required=required></td>
                </tr>
                <tr>
                    <td colspan=2>
                        <input type=hidden name=parent value=0>
                        <input type=hidden name=dpy value=0>
                        <input type=submit value=新增><input type=reset value=重置>
                    </td>
                </tr>
            </table>
        </form>
        <?php
    break;
    case 'mdy_menu':
        include("sql.php");
        $result=select("menu_t12","parent=".$_GET['id']);

        ?>
        <p class="t cent botli">編輯次選單</p>
        <form method=post enctype="multipart/form-data" action=api.php?do=<?=$_GET['do']?>>
            <table id=table_body style="margin:auto">
                <tr class="cent">
                    <td>次選單名稱</td><td>次選單連結網址</td><td>刪除</td>
                </tr>
<?php
    foreach($result as $row){
?>
                <tr class="cent">
                    <td><input type=text name=text[<?=$row['id']?>] value=<?=$row['text']?> required=required></td>
                    <td><input type=text name=link[<?=$row['id']?>] value=<?=$row['link']?> required=required></td>
                    <td>
                        <input type=checkbox name=del[] value=<?=$row['id']?>>
                    </td>
                </tr>
<?php
    }
?>
<script>
    newcol=1;//將後建立的tr都立編號，方便刪除時找到對象
    $("#more").click(function(){
        newadd=`
                <tr class="cent" id=newcol`+newcol+`>
                    <td><input type="text" name="new_text[]" required="required"></td>
                    <td><input type="text" name="new_link[]" required="required"></td>
                    <td>
                        <input type="checkbox" onclick="delme(`+newcol+`)">
                        <input type=hidden name=new_dpy[] value=1>
                        <input type=hidden name=new_parent[] value=<?=$_GET['id']?>>
                    </td>
                </tr>
        `;
        $("#table_body").append(newadd);
        newcol++;
    });
    function delme(x){//設計刪除不必要的新傢伙，方便後端只做新增就好
        $("#newcol"+x).remove();
    }
</script>
            </table>
            <div class="cent" style="margin:auto">
                        
                        
                        <input type=submit value=修改確定><input type=reset value=重置><input type=button id=more value=更多次選單>
            </div>
        </form>
        <?php
    break;
}
?>