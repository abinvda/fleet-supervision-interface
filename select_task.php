<?php
include('header.php');

/*$id=$_REQUEST['x'];
$d=explode('_',$id);

$vtime=$d[0];
$fname=$d[1];**/
$time=time();
//$msg=$vtime.'_'.$fname.'_'.$time;
$msg=$time;
if($_SESSION['task']=='task1')  // Decide which interruption to show. 
{
$rnd_vidID = array_pop($_SESSION['task1_order']); //rand(1, 14);  // Randomly selecting one of the fault clips stored for Task 1
$rnd_vidID = 9;
header("location:task1.php?msg=$msg"."&vidID=$rnd_vidID"); // We are transmitting variables across webpages: vidID and msg.
// header("location:task1.php?msg=$msg"); // TODO: See if there are other ways of transmitting variables across webpages.
}else	
{
$msgNum = array_pop($_SESSION['task2_order']); //rand(1,4); // Randomly selecting one of the messages stored for Task 2
header("location:task2.php?msg=$msg"."&msgNum=$msgNum");
}

?>