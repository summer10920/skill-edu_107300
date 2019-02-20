<?php
$result=select("slider_t5","1 order by odr");
$eft_ary=select("effect_t5","1");
foreach($eft_ary as $data) $eft=$data['once'];
?>
<form action="api.php?do=slider" method="post">
    <div style="width:100%;height:300px;overflow-y:scroll" class="ct">
        <h3>預告片清單 (
                轉場特效<select name="once">
                    <option value="1" <?=($eft==1)?"selected":""?>>淡入</option>
                    <option value="2" <?=($eft==2)?"selected":""?>>縮放</option>
                    <option value="3" <?=($eft==3)?"selected":""?>>滑出</option>
                </select>
            )
        </h3>

        <table width="100%">
            <tr>
                <td>預告片海報</td><td>預告片片名</td><td>預告片排序</td><td>操作</td>
            </tr>
        <?php
            $i=0;
            foreach($result as $row){
        ?>
            <tr class=rrlist>
                <td><img height="100px" src="img/<?=$row['img']?>"></td>
                <td><?=$row['text']?></td>
                <td>
                    <input type="hidden" name="odr[<?=$row['id']?>]" value="<?=$i?>">
                    <input type="button" value="往上" class="orderup"><br>
                    <input type="button" value="往下" class="orderdown">
                </td>
                <td>
                    <input type="hidden" name="dpy[<?=$row['id']?>]" value="0"><input type="checkbox" name="dpy[<?=$row['id']?>]" value="1" <?=($row['dpy'])?"checked":""?>>顯示 
                    <input type="checkbox" name="del[]" value="<?=$row['id']?>">刪除
                </td>
            </tr>
        <?php
            $i++;
        }
        ?>
        </table>
    </div>
    <div class=ct>
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
</form>
<hr>
<div style="width:100%" class="ct">
    <h3>新增預告片海報</h3>
    <form action="api.php?do=addslider" method="post" enctype="multipart/form-data">
    <table width=100%>
        <tr>
            <td>預告片海報：<input type="file" name="img"></td>
            <td>預告片片名：<input type="text" name="text"></td>
        </tr>
        <tr>
            <td colspan=2><input type="submit" value="新增"><input type="submit" value="重置"></td>
        </tr>
    </table>
    </form>
</div>



<script>
$(".orderup").click(function(){
    odr_num=$(this).siblings().eq(0).val(); //抓目前順序編號=這筆
    if(odr_num!=0){
        $("tr.rrlist:eq("+(odr_num-1)+") input[name^='odr']").val(odr_num); //上筆的input值改成目前
        $("tr.rrlist:eq("+(odr_num)+") input[name^='odr']").val(odr_num-1); //這筆的input值改成前筆
        
        $fst=$("tr.rrlist:eq("+(odr_num-1)+")"); //上筆
        $sec=$("tr.rrlist:eq("+odr_num+")");     //這筆
        $sec.insertBefore($fst);                //這筆插入到上筆前面去
    }
});
$(".orderdown").click(function(){
    var odr_num=$(this).siblings().eq(0).val(); //抓目前順序編號=這筆
    if(odr_num<$("table tr").length-1){
        $("tr.rrlist:eq("+(odr_num*1+1)+") input[name^='odr']").val(odr_num); //下筆的input值改成目前，變數+1會變字串相接，所以*1是為了變成數字運算
        $("tr.rrlist:eq("+(odr_num)+") input[name^='odr']").val(odr_num*1+1); //這筆的input值改成後筆
        
        $sec=$("tr.rrlist:eq("+odr_num+")");     //這筆
        $thd=$("tr.rrlist:eq("+(odr_num*1+1)+")"); //下筆
        $sec.insertAfter($thd);                //這筆插入到下筆後面去
    }
});
</script>

