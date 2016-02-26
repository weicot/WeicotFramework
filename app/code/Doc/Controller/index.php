<?php
echo "----------";
$content='
<div style="color:#F00;">
合计2件<br />定单号:C00014194<br /></div>
<table  border="1" width="1000px">
<tr>
  <th colspan="2">Name</th>
  <th>Address</th> 
  <th>ZipCode</th>
  <th>City</th>
  <th>Region</th>
  <th width="100px">Phone</th>
  
  
</tr>
<tr>
  <td colspan="2">Jason Martin</td>
  <td >4738 Old French Rd Erie Pennsylvania US</td>
   <td>16509</td>
  <td>Erie</td>
  <td>Pennsylvania</td>
  <td>8148738922</td>  

</tr>
</table>
<br />
<br />
<br />
<table  border="1" width="1000px">
<tr>
  <th colspan="2" >IMAGE</th>
  <th colspan="3">ProductsName</th>
  <th width="80px">Size</th>
  <th>Qty</th>
</tr>
<tr>

  <th colspan="2"><img src="http://www.maryjersey.ru/media/catalog/product/cache/1/image/265x/9df78eab33525d08d6e5fb8d27136e95/2/0/2015062470a.jpg" height="160" width="200 " /></th>
<td colspan="3">Nike Bills 55 Jerry Hughes Royal Blue Team Color Men Stitched NFL New Elite Jersey</td>
<td>52(XXL)</td><td>1</td>
</tr>
<tr>

  <th colspan="2"><img src="http://www.maryjersey.ru/media/catalog/product/cache/1/image/265x/9df78eab33525d08d6e5fb8d27136e95/2/0/20151029196a.jpg" height="160" width="200 " /></th>
<td colspan="3">Air jordan Alpha 1 Retro Patent Leather White Black Varsity Red A01006</td>
<td>Mens US11=EUR45</td><td>1</td>
</tr>
</table>


';
Weicot::getModel('Doc/Getword');

    function GetMimeType($filename){
        $pathinfo = pathinfo($filename);
        switch ($pathinfo['extension']) {
            case 'htm': $mimetype = 'text/html'; break;
            case 'html': $mimetype = 'text/html'; break;
            case 'txt': $mimetype = 'text/plain'; break;
            case 'cgi': $mimetype = 'text/plain'; break;
            case 'php': $mimetype = 'text/plain'; break;
            case 'css': $mimetype = 'text/css'; break;
            case 'jpg': $mimetype = 'image/jpeg'; break;
            case 'jpeg': $mimetype = 'image/jpeg'; break;
            case 'jpe': $mimetype = 'image/jpeg'; break;
            case 'gif': $mimetype = 'image/gif'; break;
            case 'png': $mimetype = 'image/png'; break;
            default: $mimetype = 'application/octet-stream'; break;
        }
        return $mimetype;
    }

//echo GetMimeType('http://www.maryjersey.ru/media/catalog/product/cache/1/image/265x/9df78eab33525d08d6e5fb8d27136e95/2/0/2015062470a.jpg');
	

$fileContent = getWordDocument($content,"http://www.maryjersey.ru/media/catalog/product/cache/1/image/265x/9df78eab33525d08d6e5fb8d27136e95/2/0/");
echo $fileContent;

$fp = fopen("test2.doc", 'w');
fwrite($fp, $fileContent);
fclose($fp);