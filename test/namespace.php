<?php
namespace Weicot;//创建一个名为Weicot 的命名空间
const PATH='/Weicot'; 
class Wout{
	function out(){
		return "Wout";
	}
}
namespace Weicot\Two;
const NAME='Mr.Weicot';
class Ato{
	function in($in){
		return($in);
	}
}
namespace Tuzu;
const PATH='/Tuzu';
class Wout{
	function out(){
		return "Tout";
	}
}
const IDW='的商品';
const SP='了ID为';
interface Shop{
	//定义一个接口
	public function Buy($id);
	public function Sell($id);
	public function View($id);
}
function WeicotTest(){
	return \Weicot\PATH;
}
var_dump(WeicotTest());//调用当前空间的Wout 类
$Wout=new Wout(); 
echo PATH;
var_dump($Wout->out());//在Tuzu 空间中调用Weicot空间的Wout类 


$TuzuWout=new\Weicot\Wout();// \空间名\元素名
echo \Weicot\PATH;
var_dump($TuzuWout->out());


$WeicotTwo=new\Weicot\Two\Ato();
echo $WeicotTwo->in(\Weicot\PATH);



use  \Weicot\Two; ////导入一个命名空间
$UseWeicotTwo=new Two\Ato;
var_dump($UseWeicotTwo->in(\Weicot\PATH));


use \Weicot; ////导入一个命名空间
$UseWeicot=new Wout;
var_dump($UseWeicot->out());
//http://www.cnblogs.com/kuyuecs/p/3556421.html


use \Weicot\Two\Ato as Weicots; //为类使用别名
$Weicot=new Weicots();
var_dump($Weicot->in(\Weicot\PATH));


class BaseShop implements Shop{
	//实现接口
	public function Buy($id){
		echo '买'.SP.$id.IDW;
	}
	public function Sell($id){
		echo '卖'.SP.$id.IDW;
	}
	public function View($id){
		echo '察看'.SP.$id.IDW;
	}
}
$Shop=new BaseShop;
$Shop->Buy(Weicot\Two\NAME)

?>