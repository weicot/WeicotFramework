<?php
//数据读写函数
class rw extends DB {
 function account ($ID,$account_id,$total,$lock_amount,$available,$date){
	 $sqi="insert into account(ID,account_id,total,lock_amount,available,date)
	 values('$ID','$account_id','$total','$lock_amount','$available','$date'
    )";
    db::o($sql);
     echo "account 已成功录入";
 }
 function influx($account_id,$item,$investment,$GR_P,$CP_P,$note,$date){
	 $sql="insert into influx(account_id,bill_id,item,investment,GR_P,CP_P,note,date)VALUES(
   '$account_id','','$item','$investment','$GR_P','$CP_P','$note','$date'
    )";
	db::o($sql);
    echo "influx 已成功录入";
 }
 function outside ($account_id,$item,$cost,$note,$date){
	 $sql="insert into outside(account_id,bill_id,item,cost,note,date)
	 values('$account_id','','$item','$cost','$note','$date')";
	 db::o($sql);
    echo "outside 已成功录入";
 }
 //录入用户信息
 function user($ID,$user_name,$mail,$password,$date){
	 $sql="insert into user(ID,user_name,mail,password,date)values
     ('$ID','$user_name','$mail','$password','$date')";
	 db::o($sql);
    echo "user 已成功录入";
 }
 function rall($sql){
		$sql=db::o($sql);
		$rwr=array();
		//将sql输出转为数值
		while($row=mysql_fetch_array($sql)){
        $rwr[]=$row;
		}
return $rwr;		
	}
}
?>