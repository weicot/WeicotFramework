<?php
namespace Weicot;//����һ����ΪWeicot �������ռ�
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
const IDW='����Ʒ';
const SP='��IDΪ';
interface Shop{
	//����һ���ӿ�
	public function Buy($id);
	public function Sell($id);
	public function View($id);
}
function WeicotTest(){
	return \Weicot\PATH;
}
var_dump(WeicotTest());//���õ�ǰ�ռ��Wout ��
$Wout=new Wout(); 
echo PATH;
var_dump($Wout->out());//��Tuzu �ռ��е���Weicot�ռ��Wout�� 


$TuzuWout=new\Weicot\Wout();// \�ռ���\Ԫ����
echo \Weicot\PATH;
var_dump($TuzuWout->out());


$WeicotTwo=new\Weicot\Two\Ato();
echo $WeicotTwo->in(\Weicot\PATH);



use  \Weicot\Two; ////����һ�������ռ�
$UseWeicotTwo=new Two\Ato;
var_dump($UseWeicotTwo->in(\Weicot\PATH));


use \Weicot; ////����һ�������ռ�
$UseWeicot=new Wout;
var_dump($UseWeicot->out());
//http://www.cnblogs.com/kuyuecs/p/3556421.html


use \Weicot\Two\Ato as Weicots; //Ϊ��ʹ�ñ���
$Weicot=new Weicots();
var_dump($Weicot->in(\Weicot\PATH));


class BaseShop implements Shop{
	//ʵ�ֽӿ�
	public function Buy($id){
		echo '��'.SP.$id.IDW;
	}
	public function Sell($id){
		echo '��'.SP.$id.IDW;
	}
	public function View($id){
		echo '�쿴'.SP.$id.IDW;
	}
}
$Shop=new BaseShop;
$Shop->Buy(Weicot\Two\NAME)

?>