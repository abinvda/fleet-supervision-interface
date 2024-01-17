<?php
include('header.php');

$nVideos = $_SESSION['numVids'];

$id=$_REQUEST['id'];
$d=explode('_',$id); // Here we separate the underscore-separated data into different elements of an array
//Right now, first 4 elements are video times, next is selectedVideoTime, then the fileName and lastly the recorded event.

$vidTimes = array();
for ($i = 0; $i < $nVideos; $i++) {
	array_push($vidTimes, $d[$i]);
}

$cvt=$d[$nVideos + 0];
$tElapsed = $d[$nVideos + 1];
$notificationClickDelay = $d[$nVideos + 2];
$selVidID=$d[$nVideos + 3];
$recEvent=$d[$nVideos + 4];

$msg=$cvt.'_'.$selVidID;
$time = $cvt;

$_SESSION['vidTimes'] = array();
	for ($i = 0; $i < $nVideos; $i++) {
		array_push($_SESSION['vidTimes'], $vidTimes[$i]);
	}

$_SESSION['time_elapsed'] = $tElapsed;

$chosenVids = array();
for ($i = 0; $i < $nVideos; $i++) {
	array_push($chosenVids, $_SESSION['chosenVids'][$i]);
}

if($recEvent=='notification') {
	$_SESSION['nextNotifTime'] = $tElapsed + rand(15000, 40000);
	// Make one of the videos show error. Happens only x% of the time
	$a = rand(1,100);
	if ($a <= 75){ // Only executes 75% of the time
		// $vID == $_SESSION['selectedVidID'];
		// while ($vID == $_SESSION['selectedVidID']){ // This while loop ensures that we are not choosing the video currently selected
		// $vID = rand(1,$nVideos);
		// }
		$vNum = rand(0,$nVideos-1);
		$vID = $chosenVids[$vNum];
		$query="select * from newVidTable where fname='".$vID.".mp4'"; // select all from "table" where "filename" is vID.mp4
		$result=mysqli_query($con,$query); // $con is the connection to the database. Defined in db_connection.php file
		$row=mysqli_fetch_array($result);
		$timeArray = $row['faultTimeArray']; 
		$timeArray = explode(",", $timeArray); // Array of all fault times for video named fname (given as startTime1, endTime1, startTime2, endTime2, etc.)
		$ind = 0;
		foreach ($timeArray as $val) { // We're doing a linear search here since the arrays are small.
			if($time > $val){
				$ind = $ind + 1;
			} else{
				break;
			}
		}
		$ind = $ind - $ind%2; // This gives us the time to resume such that the video starts at a fault
		if ($time > end($timeArray)){
			$ind = 0; //If ind is the last one, then pick the first fault
		}

		// if ($ind == count($timeArray)){
		// 	$ind = 0; //If ind is the last one, then pick the first fault
		// }
		$vidTimes[$vNum] = $timeArray[$ind];
		$_SESSION['vidTimes'][$vNum] = $timeArray[$ind];
		$_SESSION['resumptionFaultID'] = $vID;

		// $_SESSION['vidTimes'] = [10,$vID,$_SESSION['selectedVidID'],35]; //$vidTimes;
	// 	$_SESSION['vidTimes'] = array();
	// for ($i = 0; $i < $nVideos; $i++) {
	// 	array_push($_SESSION['vidTimes'], $vidTimes[$i]);
	// }
	} else {
		$_SESSION['resumptionFaultID'] = -1;
	}
	$_SESSION['nD']=$notificationClickDelay;
	header("location:select_task.php");
}

// elseif($recEvent=='report') {
// header("location:fault_check.php?msg=$msg");
// }

else{
	echo '<script>alert("Unrecognized event. You should not be seeing this. Please restart the task or contact the researchers.")</script>';
}

?>