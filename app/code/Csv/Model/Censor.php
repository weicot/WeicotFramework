<?php 
//������麯(censor)��
class Censor{
public function vg ($in){
is_array($in)&&count($in)?$in=true:$in=false;
return $in;
}

//empty �������Ƿ�������
public function vp($in){
	isset($in)&&!empty($in)?$in=true:$in=false;
	return $in;
}
}
?>
