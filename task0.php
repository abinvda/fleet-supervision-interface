<?php include('header.php');
if (!isset($_SESSION['txtid'])) {
	header('location:index.php');
}
// $totalTime = $_SESSION['total_time'];
// $totalTime = $totalTime * 1000; // Converting time in milliseconds

?>
<style>
	#showDIV {
		width: 100%;
		height: 500px;
		text-align: center;
		display: none;
	}
</style>

<body>

	<?php
	error_reporting(0);
	$nVideos = $_SESSION['numVids'];
	// $vidTimes = $_SESSION['vidTimes'];
	// $t1 = $_SESSION['one'];		// Video times while starting/resuming. These are saved initially in index file and then updated using getCurrentTime() function.
	// $t2 = $_SESSION['two'];		// TODO: Modify this to support different number of videos
	// $t3 = $_SESSION['three'];
	// $t4 = $_SESSION['four'];
	$vidTimes = array();
	for ($i = 0; $i < $nVideos; $i++) {
		array_push($vidTimes, $_SESSION['vidTimes'][$i]);
	}

	$chosenVids = array();
	for ($i = 0; $i < $nVideos; $i++) {
		array_push($chosenVids, $_SESSION['chosenVids'][$i]);
	}
	//
	// $selVidID = $_SESSION['selectedVidID'];

	// $currentTask = $_SESSION['task'];
	// $timeElapsed = $_SESSION['time_elapsed'];
	// $nextNotifTime = $_SESSION['nextNotifTime'];


	if (isset($_REQUEST['msg'])) {
		$msg = $_REQUEST['msg'];
		// echo '<center><h3>' . $msg . '</h3></center>';
		$reported = 1;
	} else {
		$reported = 0;
	}

	?>
	<script>
		// We echo the php variables so that they can be used in js below
		// var vidTimes = '<?php echo implode($vidTimes); ?>'; // Implode function does not work as we need
		// var vidTimes = '<?php echo json_encode($vidTimes); ?>';
		// var vidTimes = Array();
		// <?php foreach ($vidTimes as $key => $val) { ?>
		// 	var t1 = '<?php echo $val; ?>';
		// 	vidTimes.push(Number(t1));
		// <?php } ?>

		var nVideos = '<?php echo $nVideos; ?>';
		var selVidID = '<?php echo $_SESSION['selectedVidID']; ?>';
		var vidTimes = new Array();
		<?php foreach ($vidTimes as $key => $val) { ?>
			vidTimes.push('<?php echo $val; ?>');
		<?php } ?>

		var chosenVids = new Array();
		<?php foreach ($chosenVids as $key => $val) { ?>
			chosenVids.push('<?php echo $val; ?>');
		<?php } ?>
		console.log(chosenVids);

		var totalTime = '<?php echo $_SESSION['total_time']; ?>';
		totalTime = totalTime * 1000; // Converting to milliseconds
		var currentTask = '<?php echo $_SESSION['task']; ?>';
		var timeElapsed = '<?php echo $_SESSION['time_elapsed']; ?>';
		var nextNotifTime = '<?php echo $_SESSION['nextNotifTime']; ?>';
		var startTime = Date.now();

		var reported = '<?php echo $reported; ?>';
	</script>

	<div class="wraper">
		<div class="task" id="normalTask">Fault Detection task</div>
		<div class="notif0" id="notification0">
			<n0>No new notification</n0>
		</div>
		<n1 onClick="getCurrentTime('notification')">
			<div class="notif1" id="notification1">
			<div class="blink_me"><n0>1 new notification!</n0></div>
			</div>
		</n1>
		<div class="logout"><a href="logout.php">Leave Study</a></div>
		
		<!-- -------------------------------------------------------------- -->
		<!-- <div class="left left9">
			<?php
			$videopath = 'videos';
			for ($i = 0; $i < $nVideos; $i++) { ?>
				<figure>
					<video id='<?php echo $chosenVids[$i]; ?>' autoplay muted loop onClick="syncTime('<?php echo $chosenVids[$i]; ?>')">
						<source src="<?php echo "$videopath/$chosenVids[$i]" . ".webm"; ?>" type="video/webm" />
					</video>
				</figure>
			<?php } ?>
		</div> -->

		<?php if ($nVideos <=4) { ?>
			<div class="left left4"> 
			<div id="vidContainer"></div>
			</div>
		<?php } elseif ($nVideos <=9) {?>
			<div class="left left9"> 
			<div id="vidContainer"></div>
			</div>
		<?php } else {?>
			<div class="left left16"> 
			<div id="vidContainer"></div>
			</div>
		<?php }?>

		<script> 
			var vidElements = "";
			var videoPath = 'videos';
			for (var i = 0; i < nVideos; i++) {
			vidElements += '<figure><video id="'+chosenVids[i]+'" autoplay muted loop src="'+videoPath+'/'+chosenVids[i]+'.webm" onClick="syncTime('+ chosenVids[i] +')"></video></figure> ';
			}
			var container = document.getElementById("vidContainer");
			container.innerHTML = vidElements;
		</script> 
		<!-- ------------------------------------------------------------- -->
		
		<div class="right">
			<div id="bigScreen">
				<!-- bigScreen is the div where we put the bigVideo -->
				<video id="bigVideo" width="100%" height="100%" autoplay muted loop>
					<source src="" type="video/webm" />
				</video>
				<div class="reportButton">
				<br>
				<button type="button" onclick="fault_check(selVidID)">Report Fault</button>
				<br><br>
				<span class='error' id='reportedMsg'>Fault Reported!</span>	
				</div>
				<!-- <button onclick="getCurrentTime('report')">Report Fault!</button> -->
			</div>

			<script>
			document.oncopy = $(initialSyncBigVideo);

				function initialSyncBigVideo() {
					syncTime(selVidID);
				}

				function syncTime(selectedVidID) { // This function syncs the selected video on the left to its bigger version being played on the right.

					for (var i = 1; i <= nVideos; i++) {
						ob = chosenVids[i-1];
						document.getElementById(ob).style.border = "4px solid #0000";
					}

					var bigVideo = document.getElementById("bigVideo");
					document.getElementById("bigScreen").style.display = "block";

					// for (var i = 1; i <= nVideos; i++) {
						// if (selectedVidID == i) {
					document.getElementById(selectedVidID).style.border = "4px solid #F00";
					document.getElementById("bigVideo").src = "videos/" + selectedVidID + ".webm";
					var selectedVideo = document.getElementById(selectedVidID);
					bigVideo.currentTime = selectedVideo.currentTime;
							// continue;
						// }
					// }

				}
				document.oncopy = $(showNotification);

				function showNotification() {
					$('#reportedMsg').hide();
					$('#notification1').hide();
					// $('#notification').pointer-events:none;
					setTimeout(replaceText, +nextNotifTime - +timeElapsed); // Execute the function (replaceText) defined below after a given time
				}

				function replaceText() {
					$('#notification0').hide();
					// const taskDiv = document.getElementById('notification1');
					// taskDiv.textContent = 'Notification: A task requires your attention.';
					$('#notification1').fadeIn('fast');
				}

				// This function shows the "Fault reported" message in the older implementation (without ajax)
				// document.oncopy = $(showReportedMsg);

				// function showReportedMsg() {
				// 	if (reported == 1) {
				// 		$('#reportedMsg').fadeIn('fast');
				// 		setTimeout(function() {
				// 			$('#reportedMsg').fadeOut('slow');
				// 		}, 1000);
				// 	}
				// 	reported = 0;
				// }

				console.log(vidTimes);
				for (var j = 0; j < nVideos; j++) {
					ob = chosenVids[j];
					tempVid = document.getElementById(ob);
					tempVid.currentTime = vidTimes[j];
				}

				var id = selVidID;
				$("video").click(function(event) {
					if (event.target.id != "bigVideo"){
					id = event.target.id;
					selVidID = id;
					}
				});

				function fault_check(selectedVidID) {
					var xmlhttp = new XMLHttpRequest();	
					xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var newTime = this.responseText;
						console.log(newTime);
						document.getElementById(selectedVidID).currentTime = newTime;
						document.getElementById("bigVideo").currentTime = newTime;
						console.log(selectedVidID, document.getElementById(selectedVidID).currentTime, vidTimes);
						$('#bigVideo').css('opacity', 0);
						setTimeout(function() {
							$('#bigVideo').css('opacity', 1);
						}, 200);
						$('#reportedMsg').fadeIn('fast');
						setTimeout(function() {
							$('#reportedMsg').fadeOut('slow');
						}, 1000);
					}
					};
					var cTime = new Array(nVideos);
					var msg;
					for (var i = 0; i < nVideos; i++) {
						ob = chosenVids[i];
						cTime[i] = document.getElementById(ob).currentTime;
						if (i == 0) {
							msg = cTime[i];
						} else {
							msg = msg + '_' + cTime[i];
						}
						if (ob == selectedVidID){
							selectedVidNum = i; // Will be 0-indexed
						}
					}
					
					var svt = document.getElementById(selectedVidID).currentTime;
					var data = msg + '_' + svt + '_' + selectedVidID + '_' + selectedVidNum;

					// var data = msg ;
					// str = document.getElementById(selectedVidID).currentTime + '_' + selectedVidID;
					xmlhttp.open("GET","fault_check2.php?msg="+data,true);
					xmlhttp.send();
					}

				function fault_check_NO(selectedVidID){
					var newTime = '<?php 
					$vidID = $_SESSION['selectedVidID'];
					$query="select * from newVidTable where fname='".$vidID.".mp4'"; // fname column in the database table still has .mp4
					$result=mysqli_query($con,$query);
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
						$query="INSERT into fault_check (ID, datetime, task, vidName, reportTime, errorStartTime, responseTime, status) values('$userID','$date_time','$task','$fname','$time', '$errorStartTime','$responseTime','$status') ";
						mysqli_query($con,$query);
					}
					else
					{	
						$status='false';
						$query="INSERT into fault_check (ID, datetime, task, vidName, reportTime, responseTime, status) values('$userID','$date_time','$task','$fname','$time',0.0, 0.0,'$status') ";
						mysqli_query($con,$query);
					}
					echo $timeArray[$ind];
					?>';
					console.log(selectedVidID, document.getElementById(selectedVidID).currentTime, newTime);
					tempVid = document.getElementById(selectedVidID);
					tempVid.currentTime = newTime;
				}

				function getCurrentTime(recordedEvent) { // recordedEvent is the event when we need to save current times of the videos. Two possibilities: Click on notification, Click on report error button.

					var cTime = new Array(nVideos); // Array for storing current times of all videos
					var msg;
					// if (id) {
					for (var i = 0; i < nVideos; i++) {
						ob = chosenVids[i];
						cTime[i] = document.getElementById(ob).currentTime;
						// console.log(i, vID[i], cTime[i]);
						// sleep(5000);
						if (id == ob) {
							var svt = cTime[i]; // Store selected video time
						}

						if (i == 0) {
							msg = cTime[i];
						} else {
							msg = msg + '_' + cTime[i];
						}
					}
					msg = msg + '_' + svt; // Just saving all times as a concatenation of times t1_t2_t3 etc.

					// console.log(timeElapsed);
					var a = Date.now() - startTime;
					timeElapsed = +timeElapsed + +a; // Without these extra +'s it just concatenates the two numbers instead of adding
					msg = msg + '_' + timeElapsed;
					var notificationClickDelay = (+timeElapsed - +nextNotifTime) / 1000; // Converting to seconds
					// alert("nD=" + notificationClickDelay + "  Current time=" + a + "  nextNotifTime=" + nextNotifTime + "  timeElapsed=" + timeElapsed);
					msg = msg + '_' + notificationClickDelay;

					fileName = id; // the variable id used to be filename
					var data = msg + '_' + fileName + '_' + recordedEvent; // message is current times of all vidoes, time elapsed from notification (it's negative if no notification), filename, recorded event.
					// console.log(data);
					// sleep(10000);
					window.location.href = "cTimeSet.php?id=" + data; // Send all this time data to the time set file to be echoed out.
					// } else
					// 	alert("select video first");

				}
				setInterval(goToTLX, +totalTime - +timeElapsed);

				function goToTLX() {
					<?php
					$_SESSION['taskCompleted'] = 1;
					// if ($_SESSION['txtid'] == 'train'){
					// 	session_unset();
					// 	header('location:intro.php');
					// }	
					?>
					var cTime = new Array(nVideos);
					var msg;
					for (var i = 0; i < nVideos; i++) {
						ob = chosenVids[i];
						cTime[i] = document.getElementById(ob).currentTime;
						if (i == 0) {
							msg = cTime[i];
						} else {
							msg = msg + '_' + cTime[i];
						}
					}
					window.location.href = "TLX.php?msg=" + msg;
				}

				
				function sleep(milliseconds) {
					const date = Date.now();
					let currentDate = null;
					do {
						currentDate = Date.now();
					} while (currentDate - date < milliseconds);
				}

			</script>
		</div>
	</div>
</body>

</html>