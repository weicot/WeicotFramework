
<?php
class DA{
function in(){
	
$in=array("a"=>'1','b'=>'2','c'=>'3','d'=>'4','e'=>'5');
return $in;
}
function core($in){
$a=array(
$in,
array(0,1,1,0,1),
array(2,3,6,5,9)
);
$m=array(
$a[0]['a']*$a[1][0]+$a[2][0],
$a[0]['b']*$a[1][1]+$a[2][1],
$a[0]['c']*$a[1][2]+$a[2][2],
$a[0]['d']*$a[1][3]+$a[2][3],
$a[0]['e']*$a[1][4]+$a[2][4]
);
return $m;
}

function i($m){
$flag=false;
for($i=1;$i<count($m);$i++){
for ($j=0;$j<count($m)-$i;$j++){
if ($m[$j]>$m[$j+1]){
	$temp=$m[$j];
	$m[$j]=$m[$j+1];
	$m[$j+1]=$temp;
	$flag=true;
 }
}if(!$flag){ break;}
$flag=false;
}
//$d=array(
//array_shift($m),
//array_shift($m)
//);
//return array($m,$d);

return $m;
}
function out($i,$x){
	$in=$i[0];
	$in=array_unshift($in,$x[0],$x[1]);
	return $in;
}
}

function test(){
$z=array(
"a"=>"5","b"=>"3","c"=>"4","d"=>"3","e"=>"1"
);
$u=array(
3,4,5,3,1
);
$c=array('a','b','c','d','e');
for($x=0;$x<=4;++$x){
$i='0'; $v='2';
while($v=='2'){
if($z[$c[$x]]==$u[$i]){
$k[$c[$x]]=$u[$i]; $v='1';
}else{ ++$i; $v='2';}
}	
}
var_dump($k);
//数据匹配 
}
$x=array(1,2);
$v=new DA;
$u=$v->in();
echo "<br/ >============";
var_dump($u);
echo "<br/ >============";
$u=$v->core($u);
var_dump($u);
echo "<br/ >============";
$z=array(
//重新匹配值
'a'=>$u[0],
'b'=>$u[1],
'c'=>$u[2],
'd'=>$u[3],
'e'=>$u[4]
);
var_dump($z);
$u=$v->i($u);
echo "<br/ >============";
var_dump($u);
//$u=$v->out($u,$x);
echo "<br/ >============";
//var_dump($u);
echo "<br/ >======end======";
$r=array(
//输入阀
array(1,2,3,4,5),
//屏蔽阀
array(0,1,1,0,0),
//权值
array(2,3,6,5,9)
);

//冒泡排序 获得最大值
function m($m){
$flag=false;
for($i=1;$i<count($m);$i++){
for ($j=0;$j<count($m)-$i;$j++){
if ($m[$j]>$m[$j+1]){
	$temp=$m[$j];
	$m[$j]=$m[$j+1];
	$m[$j+1]=$temp;
	$flag=true;
 }
}

if(!$flag){
	break;
}
$flag=false;
}
return $m;
}


$in=array(1,2,3,4,5);
$a=array(
$in,
array(0,1,1,0,1),
array(2,3,6,5,9)
);
$m=array(
$a[0][0]*$a[1][0]+$a[2][0],
$a[0][1]*$a[1][1]+$a[2][1],
$a[0][2]*$a[1][2]+$a[2][2],
$a[0][3]*$a[1][3]+$a[2][3],
$a[0][4]*$a[1][4]+$a[2][4]
);
//count 计算个数
$m=m($m);

$d=array(
//删除数组中的第一个元素 并返回被删除的元素
array_shift($m),
array_shift($m)
);
$in=$m;
//var_dump($in);
function out($i,$x){
	$in=$i[0];
	//追加数组
	array_unshift($in,$x[0],$x[1]);
}
?>