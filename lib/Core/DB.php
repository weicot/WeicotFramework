<?php
//数据库基本链接
class DB{
	public $con;
	public static $sname=DB_HOST;
	public static $uname=DB_USER;
	public static $pword=DB_PASSWORD;
public function __construct(){
	$this->con = mysql_connect(self::$sname,self::$uname,self::$pword);
if(!$this->con){
	die("cound no connect:".mysql_error());
}
}
public function in($sql){
	mysql_select_db(DB_NAME,$this->con);
	$out=mysql_query($sql,$this->con);
	if(!$out){
	die("mysql query error:".mysql_error());
	}
	return $out;
}
function data($sql){
		$sql=$this->in($sql);
		$rwr=array();
		while($row=mysql_fetch_array($sql)){
        $rwr[]=$row;
		}
return $rwr;
}	
function __destruct(){
	mysql_close($this->con);
}
function out($v){
	if (is_array($v)&&count($v)){
		echo date('Hi-s')."=>";
		var_dump($v);
	}else{
	echo date('Hi:s')."=>".$v."<br />";
	}
}
}
class Install extends DB {
	function CreateDb(){
		if(mysql_query("CREATE DATABASE ".DB_NAME,$this->con)){
			echo "database created";
		}else{
			echo "erro creating database".mysql_error();
		}
	}
	public function CreateTable($table){
		mysql_select_db(DB_NAME,$this->con);
		mysql_query($table,$this->con);	
	}
}
?>
