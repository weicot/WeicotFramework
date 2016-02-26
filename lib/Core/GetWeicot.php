<?php
//超级加载
class Weicot{
    public function  getBlock($ModuleName){
		$ModuleName=explode('/',$ModuleName);
		//模块名/文件名
        require_once (ROOT.DS.'app'.DS.'code'.DS.$ModuleName[0].DS.'Block'.DS.strtolower($ModuleName[1]).'.php');
    }
	public function  getController($ModuleName){
		$ModuleName=explode('/',$ModuleName);
        require_once (ROOT.DS.'app'.DS.'code'.DS.$ModuleName[0].DS.'Controller'.DS.strtolower($ModuleName[1]).'.php');
    } 
	public function  getModel($ModuleName){
		$ModuleName=explode('/',$ModuleName);
        require_once (ROOT.DS.'app'.DS.'code'.DS.$ModuleName[0].DS.'Model'.DS.strtolower($ModuleName[1]).'.php');
    }
		public function  getDB($ModuleName){
		$ModuleName=explode('/',$ModuleName);
        require_once (ROOT.DS.'app'.DS.'code'.DS.$ModuleName[0].DS.'DB'.DS.strtolower($ModuleName[1]).'.php');
    }
	public function  getEtc($Name){
        require_once (ROOT.DS.'app'.DS.'etc'.DS.strtolower($Name).'.php');
    }
	public function  getCss($Name){
        return ROOT.DS.'skin'.DS.'css'.DS.$Name.'.css';
    } 
	public function  getImg($Name){
        require_once (ROOT.DS.'skin'.DS.'img'.DS.$Name);
    }
	public function  getJs($Name){
        require_once (ROOT.DS.'skin'.DS.'js'.DS.$Name);
    }
    public function getLib($Name){
        require_once (ROOT.DS.'lib'.DS.strtolower($className).'.php');
    }
	public function  getCore($Name){
        require_once (ROOT.DS.'lib'.DS.'Core'.DS.strtolower($Name).'.php');
    } 
    public function getFile($Name){
        return ROOT.DS.'media/'.$Name;
    }
	public function getTmp($Name){
		require_once (ROOT.DS.'tmp'.$Name);
	}
}