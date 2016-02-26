<?php
//php 删除文件
$d="testfile";
if($od=opendir($d)) //$d是目录名
{
while(($file=readdir($od))!==false) //读取目录内文件
{
echo $file;
//unlink($file); //$file是文件名 删除文件
}
}

//去了解下这三个php函数：opendir() readdir() unlink()


function clearn_file($path,$file_type='bak'){

    //判断要清除的文件类型是否合格

    if(!preg_match('/^[a-zA-Z]{2,}$/',$file_type)){

        return false;

    }

    //当前路径是否为文件夹或可读的文件

    if(!is_dir($path)||!is_readable($path)){

        return false;

    }

    //遍历当前目录下所有文件

    $all_files=scandir($path);

    foreach($all_files as $filename){

        //跳过当前目录和上一级目录

        if(in_array($filename,array(".", ".."))){

            continue;

        }

        //进入到$filename文件夹下

        $full_name=$path.'/'.$filename;

        //判断当前路径是否是一个文件夹，是则递归调用函数

        //否则判断文件类型，匹配则删除

        if(is_dir($full_name)){

            clearn_file($full_name,$file_type);

        }else{

            preg_match("/(.*)\.$file_type/",$filename,$match);

            if(!empty($match[0][0])){

                echo $full_name;

                echo '<br>';

                unlink($full_name);

            }

        }

    }

}

//$folderpath= $_SERVER["DOCUMENT_ROOT"]."/abc";//要操作的目录


//$deltype=array('gif','jpg','png');

//foreach($deltype as $file_type){

  //  clearn_file($folderpath,$file_type);

//}

?>