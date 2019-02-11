<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">校園映像資料管理</p>
        <form method="post" action="api.php?do=image">
    <table width="100%">
    	<tbody><tr class="yel">
        	<td width="68%">校園映像資料圖片</td><td width="7%">顯示</td><td width="7%">刪除</td><td></td>
                    </tr>
    </tbody>
<?php
    $now_page=empty($_GET['p'])?1:$_GET['p'];
    $str=$now_page*3-3;
    $result=select("img_t6","1 limit $str,3");
    foreach($result as $row){
?>
    <tr>
        <td class="cent"><img src="img/<?=$row['file']?>" width=100 height=68></td>
        <td>
            <input type=hidden value=0 name=dpy[<?=$row['id']?>]>
            <input type=checkbox value=1 name=dpy[<?=$row['id']?>] <?=($row["dpy"])?"checked":""?>>
        </td>
        <td><input type=checkbox value=<?=$row['id']?> name=del[]></td>
        <td><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=mdy_image&id=<?=$row['id']?>&#39;)" value="更換圖片"></td>
    </tr>
<?php
}
?>
    </table>
    <div style="text-align:center;">
<?php
    $pagelink=page_link("img_t6",0,3,$now_page);
    foreach($pagelink as $name=>$data)
        if(is_array($data)) foreach($data as $value) {
            $size=($value==$now_page)?50:30;
            echo "<a class='bl' style='font-size:".$size."px;' href='?do=admin&redo=image&p=".$value."'>".$value."</a>";
        }
        else
            echo "<a class='bl' style='font-size:30px;' href='?do=admin&redo=image&p=".$data."'>".$name."</a>";
?>
    </div>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=add_image&#39;)" value="新增校園映像圖片"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
</div>