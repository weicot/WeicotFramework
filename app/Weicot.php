<?php
//神一样的方法
define ('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(dirname(__FILE__)));
class Weicot{
    public function  getBlock($Name){
        require_once (ROOT.DS.'app'.DS.'code'.DS.'block'.DS.strtolower($Name).'.php');
    }
	public function  getController($Name){
        require_once (ROOT.DS.'app'.DS.'code'.DS.'controller'.DS.strtolower($Name).'.php');
    } 
	public function  getModel($Name){
        require_once (ROOT.DS.'app'.DS.'code'.DS.'model'.DS.strtolower($Name).'.php');
    }
	public function  getEtc($Name){
        require_once (ROOT.DS.'app'.DS.'etc'.DS.strtolower($Name).'.php');
    }
	public function  getCss($Name){
        require_once (ROOT.DS.'skin'.DS.'css'.DS.$Name.'.css');
    } 
	public function  getImg($Name){
        require_once (ROOT.DS.'skin'.DS.'img'.DS.$Name);
    }
	public function  getJs($Name){
        require_once (ROOT.DS.'skin'.DS.'js'.DS.$Name);
    }
    public function getLib($Name){
        require_once (ROOT.DS.'lib'.DS.strtolower($Name).'.php');
    }
	public function  getCore($Name){
        require_once (ROOT.DS.'lib'.DS.'Core'.DS.strtolower($Name).'.php');
    } 
    public function getFile($Name){
        require_once (ROOT_PATH.'Media'.$Name);
    }
}
