<?php
include('header.php');
// ob_start();
date_default_timezone_set('America/Toronto');
$userID = $_SESSION['txtid']; // User ID
$task = $_SESSION['task'];
$date_time = date('Y-m-d H:i:s');

$id=$_REQUEST['msg'];
$d=explode('_',$id);

$time=$d[0]; // Time at which the error was reported.
$vidID=$d[1]; // Video ID
// $vidID = $_SESSION['selectedVidID'];
$fname = $vidID.".mp4";

$_SESSION['selectedVidID']=$vidID;
// echo $time.'<br />';
// echo $fname. '<br />';

$query="select * from newVidTable where fname='".$vidID.".mp4'"; // select all from "table" where "filename" is fname
$result=mysqli_query($con,$query); // $con is the connection to the database. Defined in db_connection.php file
$row=mysqli_fetch_array($result);
$timeArray = $row['faultTimeArray'];
$timeArray = explode(",", $timeArray);
$ind = 0;
foreach ($timeArray as $val) { // We're doing a linear search here since the arrays are small.
	if($time > $val){
		$ind = $ind + 1;
	} else{
		break;
	}
}
if ($ind%2 == 1){ // Means the reported time is during a fault
	$errorStartTime = $timeArray[$ind-1]; // This gives us the start time of current fault
	$responseTime = $time - $errorStartTime;
	$vidTimes[$vidID-1] = $timeArray[$ind]; // This gives us the end time of current fault, where we should resume the video from.
	$_SESSION['vidTimes'][$vidID-1] = $timeArray[$ind];
	
	$status='true'; // If we enter this if condition, this means the fault was reported correctly.
	$query="INSERT into fault_check (ID, datetime, task, vidName, reportTime, errorStartTime, responseTime, status) values('$userID','$date_time','$task','$fname','$time', '$errorStartTime','$responseTime','$status') "; //Saving what time they reported
	
	mysqli_query($con,$query);
	header("location:task0.php?msg=Fault Reported.");
}
else
{	
	$status='false';
	$query="INSERT into fault_check (ID, datetime, task, vidName, reportTime, responseTime, status) values('$userID','$date_time','$task','$fname','$time',0.0, 0.0,'$status') ";
	// $query="INSERT into fault_check (ID, datetime, ftime, status) values('$userID','$date_time','$time','$status') "; 
	mysqli_query($con,$query);
	//$msg=$time.'_'.$fname.'_'.'Entered out of fault';	
	//$msg=$time.'_'.$fname.'_'.'Entered out of fault';	
	header("location:task0.php?msg=No Fault.");
}
// echo "<script>findElementPos({$timeArray}, {$time});</script>";

?>

<!-- <script>
function findElementPos(timeArray, currTime){
	ind = 0;
	for (val in timeArray){ // We're doing a linear search here since the arrays are small. For larger ones, can do something like binary search.
		if (currTime > val){
			ind += 1;
		} else{
			break;
		}
	}
	return ind;
}
var tA = '<?php echo $timeArray; ?>';
var ti = '<?php echo $time; ?>';
console.log(tA);



</script> -->