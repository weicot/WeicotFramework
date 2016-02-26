<?php
//数据读写函数
Weicot::getCore('DB');
class RwBill extends DB {
 function setAccount ($ID,$account_id,$total,$lock_amount,$available,$date){
	 $sqi="insert into account(ID,account_id,total,lock_amount,available,date)
	 values('$ID','$account_id','$total','$lock_amount','$available','$date'
    )";
    DB::in($sql);
     echo "account 已成功录入";
 }
 function setInflux($account_id,$item,$investment,$GR_P,$CP_P,$note,$date){
	 $sql="insert into influx(account_id,bill_id,item,investment,GR_P,CP_P,note,date)VALUES(
   '$account_id','','$item','$investment','$GR_P','$CP_P','$note','$date'
    )";
	DB::in($sql);
    echo "influx 已成功录入";
 }
 function setOutside ($account_id,$item,$cost,$note,$date){
	 $sql="insert into outside(account_id,bill_id,item,cost,note,date)
	 values('$account_id','','$item','$cost','$note','$date')";
	 DB::in($sql);
    echo "outside 已成功录入";
 }
 function getOutside($Account_ID){
	 $sql="SELECT * FROM  outside WHERE 	account_id='$Account_ID'";
	  return DB::data($sql);
 }
 //用户查询函数
 function setUser($ID,$user_name,$mail,$password,$date){
	 $sql="insert into user(ID,user_name,mail,password,date)values
     ('$ID','$user_name','$mail','$password','$date')";
	 DB::in($sql);
    echo "user 已成功录入";
 }		
	}
	

?>