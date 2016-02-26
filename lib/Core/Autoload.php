<?php
$CallHoolk=$_SERVER['REQUEST_URI'];
require_once(ROOT.DS.'lib'.DS.'core'.DS.'GetWeicot.php');
/*
$paths = array();
$paths[] = ROOT. DS . 'lib' ;
$paths[] = ROOT. DS . 'app' . DS . 'code' . DS . 'model';
$paths[] = ROOT. DS . 'app' . DS . 'code' . DS . 'block';
$paths[] = ROOT. DS . 'app' . DS . 'code' . DS . 'controller';
$paths[] = ROOT. DS . 'app' . DS . 'etc';
$paths[] = ROOT. DS . 'skin';
$paths[] = ROOT. DS . 'skin' . DS . 'css';
$paths[] = ROOT. DS . 'skin' . DS . 'img';
$paths[] = ROOT. DS . 'skin' . DS . 'js';
$paths[] = ROOT. DS . 'tmp';
$paths[] = ROOT. DS . 'app';
$paths[] = ROOT. DS . 'media';
*/
//设置包含路径
//set_include_path(get_include_path() .DS.implode(PATH_SEPARATOR, $paths));

//类自动加载器  模块名 /方法名
function _autoload($ModuleName,$className){
    if(file_exists(ROOT.DS.'lib'.DS.$ModuleName.DS.ucfirst($className).'.php')){
        require_once(ROOT.DS.'lib'.DS.$ModuleName.DS.ucfirst($className).'.php');
    }else if(file_exists(ROOT.DS.'app'.DS.'code'.DS.$ModuleName.DS.'Controller'.DS.ucfirst($className).'.php')){
        require_once(ROOT.DS.'app'.DS.'code'.DS.$ModuleName.DS.'Controller'.DS.ucfirst($className).'.php');
    }else if(file_exists(ROOT.DS.'app'.DS.'code'.DS.$ModuleName.DS.'Model'.DS.ucfirst($className).'.php')){
        require_once(ROOT.DS.'app'.DS.'code'.DS.$ModuleName.DS.'Model'.DS.ucfirst($className).'.php');
    }else if(file_exists(ROOT.DS.'app'.DS.'code'.DS.$ModuleName.DS.'Block'.DS.ucfirst($className).'.php')){
        require_once(ROOT.DS.'app'.DS.'code'.DS.$ModuleName.DS.'Block'.DS.ucfirst($className).'.php');
    }else {
        require_once(ROOT.DS.'app'.DS.'code'.DS.'Base'.DS.'Block'.DS.'404.php');
		//如果没有找到 则返回基础模块
    }
}
//_autoload('Bill','index');
function CallHoolk($CallHoolk){
	//钩子
	$CallHoolk=explode('/',$CallHoolk);
	isset($CallHoolk[2])&&!empty($CallHoolk[2])?$Model=$CallHoolk[2]:$Model='Base';
	isset($CallHoolk[3])&&!empty($CallHoolk[3])?$ClassName=$CallHoolk[3]:$ClassName='Home';
	//如果 没有参数传进来 就直接返回 首页
	_autoload(ucfirst($Model),$ClassName);
	// /模块名[首个字母大写]/方法名
}
CallHoolk($CallHoolk);
