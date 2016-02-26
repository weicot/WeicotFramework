<?php 
//参数检查函(censor)数
class Censor{
public function vg ($in){
is_array($in)&&count($in)?$in=true:$in=false;
return $in;
}

//empty 检测变量是否有设置
public function vp($in){
	isset($in)&&!empty($in)?$in=true:$in=false;
	return $in;
}
}
?>
