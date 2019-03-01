<p class="t cent botli">最新消息資料管理</p>
<form action="api.php?do=mdynews" method="post">
    <table width="100%">
    	<tr class="yel">
        	<td width="68%">最新消息資料內容</td><td width="7%">顯示</td><td width="7%">刪除</td>
                    </tr>

<?php
    $nowpage=(empty($_GET['page']))?1:$_GET['page'];
    $begin=($nowpage-1)*4;
    $result=select("t9_news","1 limit ".$begin.",4");
    foreach ($result as $row){
?>
    <tr>
        <td><textarea name="text[<?=$row['id']?>]" style="width:90%;height:50px"><?=$row['text']?></textarea></td>
        <input type="hidden" name="dpy[<?=$row['id']?>]" value=0>
        <td><input type="checkbox" name="dpy[<?=$row['id']?>]" <?=($row['dpy']==1)?"checked":""?> value=1></td>
        <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
    </tr>
<?php
    }
?>
</table>
<div class="cent">
<?php
    $result=page_link("t9_news",1,4,$nowpage);
    foreach($result as $name=>$data){
        if($nowpage==$name)
            echo ' <a style="text-decoration:none;font-size:2em" href="?do=admin&redo=news&page='.$data.'">'.$name.'</a> ';
        else
            echo ' <a style="text-decoration:none" href="?do=admin&redo=news&page='.$data.'">'.$name.'</a> ';
    }
?>
</div>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=addnews&#39;)" value="新增最新消息資料"></td>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    
    </form>

