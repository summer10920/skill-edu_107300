<p class="t cent botli">校園映像資料管理</p>
<form action="api.php?do=mdyimage" method="post">
    <table width="100%">
    	<tr class="yel">
        	<td width="68%">校園映像資料圖片</td><td width="7%">顯示</td><td width="7%">刪除</td><td></td>
                    </tr>
<?php
    $nowpage=(empty($_GET['page']))?1:$_GET['page'];
    $begin=($nowpage-1)*3;
    $result=select("t6_img","1 limit ".$begin.",3");
    foreach ($result as $row){
?>
    <tr>
        <td><img src="upload/<?=$row['file']?>" height=68 width=100></td>
        <input type="hidden" name="dpy[<?=$row['id']?>]" value=0>
        <td><input type="checkbox" name="dpy[<?=$row['id']?>]" <?=($row['dpy']==1)?"checked":""?> value=1></td>
        <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
        <td><input type="button" value="更換圖片" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=chgimage&id=<?=$row['id']?>&#39;)"></td>
    </tr>
<?php
    }
?>
</table>
<div class="cent">
<?php
    $result=page_link("t6_img",1,3,$nowpage);
    foreach($result as $name=>$data){
        if($nowpage==$name)
            echo ' <a style="text-decoration:none;font-size:2em" href="?do=admin&redo=image&page='.$data.'">'.$name.'</a> ';
        else
            echo ' <a style="text-decoration:none" href="?do=admin&redo=image&page='.$data.'">'.$name.'</a> ';
    }
?>
</div>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=addimage&#39;)" value="新增校園映像圖片"></td>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    
    </form>

