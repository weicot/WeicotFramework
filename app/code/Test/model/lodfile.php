<?php
$dir='testfile' ;
	//读取文件函数
function rdir($dir){
	$files="";
	$file_type="png";
	if($odir=opendir($dir)){
		while(($file=readdir($odir))!==false){
			$files.=$file."/";
			var_dump(preg_match('/^[a-zA-Z]{2,}$/',$file_type));
			
    if(!preg_match('/^[a-zA-Z]{2,}$/',$file_type)){

        echo "false";

    }
		} $files=explode("/",$files);
	}return $files;
}
function clearn_file($path,$file_type='bak'){
	
}
$c = rdir($dir);
//echo $c;
var_dump ($c);
?>