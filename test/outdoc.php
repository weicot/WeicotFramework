<?php
class word
{ 
function start()
{
ob_start();
echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns="http://www.w3.org/TR/REC-html40">';
}
function save($path)
{
 
echo "</html>";
$data = ob_get_contents();
ob_end_clean();
 
$this->wirtefile ($path,$data);
}
 
function wirtefile ($fn,$data)
{
$fp=fopen($fn,"wb");
fwrite($fp,$data);
fclose($fp);
}
}
$html = ' 
<table width=600 cellpadding="6" cellspacing="1" bgcolor="#336699"> 
<tr bgcolor="White"> 
  <td>PHP10086</td> 
  <td><a href="http://www.weicot.com" target="_blank" >http://www.weicot.com</a></td> 
</tr> 
<tr bgcolor="red"> 
  <td>PHP10086</td> 
  <td><a href="http://www.weicot.com" target="_blank" >http://www.www.weicot.com</a></td> 
</tr> 
<tr bgcolor="White"> 
  <td colspan=2 > 
  Weicot<br> 
  weicot.com is very good  
  <img src="http://www.weicot.com/wp-content/uploads/2015/07/weicotx_bg-220x150.png"> 
  </td> 
</tr> 
</table>
<h4>横跨两行的单元格：</h4>
<table border="1">
<tr>
  <th>姓名</th>
  <td>Bill Gates</td>
</tr>
<tr>
  <th rowspan="2"><img src="http://www.weicot.com/wp-content/uploads/2015/07/weicotx_bg-220x150.png"></th>
  <td>555 77 854</td>
</tr>
<tr>
  <td>555 77 855</td>
</tr>
</table>
 
'; 
 
//批量生成 
for($i=1;$i<=3;$i++){ 
    $word = new word(); 
    $word->start(); 
    //$html = "aaa".$i; 
    $wordname = 'PHP-weicot.com'.$i.".doc"; 
    echo $html; 
    $word->save($wordname); 
	echo "ok";
    ob_flush();//每次执行前刷新缓存 
    flush(); 
}?>