<?php
/*$str='<p>Other Methods</p>
<table>
    <tbody>
        <tr>
            <td><p style="font-style: italic;">Please go ahead to submit order firstly and then <a href="http://www.mary-jersey.com/contacts/" target="blank"><b>contact customer service</b></a> or leave comments for the method you would like to use. <br /><br />Most of popular payment methods are acceptable.</p></td>
        </tr>
    </tbody>
</table>';*/

$str='<p><strong>Credit Card</strong></p>

<table>
    <tbody>
            <tr>
            <th><strong>Credit Card Type:</strong></th>
        </tr>
        <tr>
            <td>Visa</td>
        </tr>
            <tr>
            <th><strong>Credit Card Number:</strong></th>
        </tr>
        <tr>
            <td>xxxx-1111</td>
        </tr>
        </tbody>
</table>';
$str=preg_replace('/(<table.*?>[\s\S]*?<\/table>)/','',$str);
$str=preg_replace('/(<tbody.*?>[\s\S]*?<\/tbody>)/','',$str);
$str=preg_replace('/(<tr.*?>[\s\S]*?<\/tr>)/','',$str);
echo $str=preg_replace('/(<td.*?>[\s\S]*?<\/td>)/','',$str);
echo $str=str_replace(" ","",$str);
echo $str=strip_tags($str);
echo $str;
?>