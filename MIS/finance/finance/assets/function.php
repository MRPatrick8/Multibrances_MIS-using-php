<?php 
function setBalance($amount,$process,$accountNo)
{
	$con = mysqli_connect("localhost","tkayinve_tkayinvestment","tkayMIS@2022","tkayinve_mis");
	$array = mysqli_query($con,"select * from useraccounts where accountNo='$accountNo'");
	$row = mysqli_fetch_assoc($array);
	if ($process == 'credit') 
	{
		$balance = $row['balance'] + $amount;
		return mysqli_query($con,"update useraccounts set balance = '$balance' where accountNo = '$accountNo'");
	}else
	{
		$balance = $row['balance'] - $amount;
		return mysqli_query($con,"update useraccounts set balance = '$balance' where accountNo = '$accountNo'");
	}
}
function setOtherBalance($amount,$process,$accountNo)
{
	$con = mysqli_connect("localhost","tkayinve_tkayinvestment","tkayMIS@2022","tkayinve_mis");
	$array = mysqli_query($con,"select * from otheraccounts where accountNo='$accountNo'");
	$row = mysqli_fetch_assoc($array);
	if ($process == 'credit') 
	{
		$balance = $row['balance'] + $amount;
		return mysqli_query($con,"update otheraccounts set balance = '$balance' where accountNo = '$accountNo'");
	}else
	{
		$balance = $row['balance'] - $amount;
		return mysqli_query($con,"update otheraccounts set balance = '$balance' where accountNo = '$accountNo'");
	}
}
function makeTransaction($action,$amount,$other)
{
	$con = mysqli_connect("localhost","tkayinve_tkayinvestment","tkayMIS@2022","tkayinve_mis");
	if ($action == 'transfer')
	{
		return mysqli_query($con,"insert into transaction (action,debit,other,userId) values ('transfer','$amount','$other','$_SESSION[userId]')");
	}
	if ($action == 'withdraw')
	{
		return mysqli_query($con,"insert into transaction (action,debit,other,userId) values ('withdraw','$amount','$other','$_SESSION[userId]')");
		
	}
	if ($action == 'deposit')
	{
		return mysqli_query($con,"insert into transaction (action,credit,other,userId) values ('deposit','$amount','$other','$_SESSION[userId]')");
		
	}
}
function makeTransactionCashier($action,$amount,$other,$userId)
{
	$con = mysqli_connect("localhost","tkayinve_tkayinvestment","tkayMIS@2022","tkayinve_mis");
	if ($action == 'transfer')
	{
		return mysqli_query($con,"insert into transaction (action,debit,other,userId) values ('transfer','$amount','$other','$userId')");
	}
	if ($action == 'withdraw')
	{
		return mysqli_query($con,"insert into transaction (action,debit,other,userId) values ('withdraw','$amount','$other','$userId')");
		
	}
	if ($action == 'deposit')
	{
		return mysqli_query($con,"insert into transaction (action,credit,other,userId) values ('deposit','$amount','$other','$userId')");
		
	}
}
 ?>