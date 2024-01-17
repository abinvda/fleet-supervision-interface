<?php
include('header.php');
ob_start();
date_default_timezone_set('America/Toronto');
$mid=$_SESSION['txtid'];
$date_time=date('Y-m-d H:i:s');



$id=$_REQUEST['x'];
$d=explode('_',$id);

$time=$d[0];
$fname=$d[1];

$query="select * from task_database where fname='".$fname."'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);

if( ($time>=$row['fost'] && $time<=$row['foet']) || ($time>=$row['ftst'] && $time<=$row['ftet']) ) 
{
	if($time<=$row['foet'])
	{
		$gap_time=$row['foet']-$time;
		$time=$time+$gap_time;
	}
	if($time>$row['foet'] && $time<=$row['ftet'])
	{
		$gap_time=$row['ftet']-$time;
		$time=$time+$gap_time;
	}
	$status='true';
$msg=$time.'_'.$fname;

$query="INSERT into fault_check (ID, datetime, ftime, status) values('$mid','$date_time','$time','$status') ";
mysqli_query($con,$query);
header("location:task0.php?msg=$msg");
}
else
{
$status='false';
$query="INSERT into fault_check (ID, datetime, ftime, status) values('$mid','$date_time','$time','$status') ";
mysqli_query($con,$query);
$msg=$time.'_'.$fname.'_'.'Entered out of fault';	
header("location:task0.php?msg=$msg");
}
?>