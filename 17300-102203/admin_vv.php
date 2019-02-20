<?php
$result=select("movie_t7","1 order by odr");
?>
<form action="api.php?do=movie" method="post">
    <div style="width:100%;height:430px;overflow-y:scroll">
    <input type="button" value="新增電影" onclick="<?=jlo('admin.php?do=admin&redo=addmovie')?>">
        <hr>
        <?php
            $i=0;
            foreach($result as $row){
        ?>
        <table width="100%" class="vvlist">
            <tr>
                <td rowspan=3 width="10%"><img height="100px" src="upload/<?=$row['img']?>"></td>
                <td rowspan=3 width=15% align=center>分級：<img src="img/03C0<?=$row['cls']?>.png" style="vertical-align: middle"></td>
                <td width="25%">片名：<?=$row['title']?></td>
                <td width="25%">片長：<?=$row['length']?></td>
                <td width="25%">上映時間：<?=$row['date']?></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="odr[<?=$row['id']?>]" value="<?=$i?>">
                    <input type="button" value="往上" class="orderup">
                    <input type="button" value="往下" class="orderdown">
                </td>
                <td>
                    <input type="hidden" name="dpy[<?=$row['id']?>]" value="0">
                    <input type="checkbox" name="dpy[<?=$row['id']?>]" value="1" <?=($row['dpy'])?"checked":""?>>顯示 
                    <input type="checkbox" name="del[]" value="<?=$row['id']?>">刪除
                </td>
                <td>
                    <input type="button" value="編輯" onclick="location.href='admin.php?do=admin&redo=mdymovie&id=<?=$row['id']?>'">
                </td>
            </tr>
            <tr>
                <td colspan=3><?=$row['text']?></td>
            </tr>
            <tr>
                <td colspan=5><hr></td>
            </tr>
        </table>
        <?php
            $i++;
        }
        ?>

    </div>
    <div class=ct>
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
</form>
<script>
$(".orderup").click(function(){
    odr_num=$(this).siblings().eq(0).val(); //抓目前順序編號=這筆
    if(odr_num!=0){
        $("table.vvlist:eq("+(odr_num-1)+") input[name^='odr']").val(odr_num); //上筆的input值改成目前
        $("table.vvlist:eq("+(odr_num)+") input[name^='odr']").val(odr_num-1); //上筆的input值改成目前
        
        $fst=$("table.vvlist:eq("+(odr_num-1)+")"); //上筆
        $sec=$("table.vvlist:eq("+odr_num+")");     //這筆
        $sec.insertBefore($fst);                //這筆插入到上筆前面去
    }
});
$(".orderdown").click(function(){
    var odr_num=$(this).siblings().eq(0).val(); //抓目前順序編號=這筆
    if(odr_num<$("table.vvlist").length-1){
        $("table.vvlist:eq("+(odr_num*1+1)+") input[name^='odr']").val(odr_num); //下筆的input值改成目前，變數+1會變字串相接，所以*1是為了變成數字運算
        $("table.vvlist:eq("+(odr_num)+") input[name^='odr']").val(odr_num*1+1); //這筆的input值改成後筆
        
        $sec=$("table.vvlist:eq("+odr_num+")");     //這筆
        $thd=$("table.vvlist:eq("+(odr_num*1+1)+")"); //下筆
        $sec.insertAfter($thd);                //這筆插入到下筆後面去
    }
});
</script>

