<?php include('header.php');
if (!isset($_SESSION['txtid'])) {
	header('location:index.php');
}
$totalTime = $_SESSION['total_time'];
$totalTime = $totalTime * 1000; // Converting time in milliseconds

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
	for ($i = 0; $i < $nVideos; $i++){
		array_push($vidTimes, $_SESSION['vidTimes'][$i]);
	}
	$t1 = $_SESSION['vidTimes'][0];
	$t2 = $_SESSION['vidTimes'][1];
	$t3 = $_SESSION['vidTimes'][2];
	$t4 = $_SESSION['vidTimes'][3];

	$selVidID = $_SESSION['selectedVidID'];

	$currentTask = $_SESSION['task'];
	$timeElapsed = $_SESSION['time_elapsed'];
	$nextNotifTime = $_SESSION['nextNotifTime'];


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
		// <?php foreach($vidTimes as $key => $val){ ?>
		// 	var t1 = '<?php echo $val; ?>';
		// 	vidTimes.push(Number(t1));
    	// <?php } ?>

		var nVideos = '<?php echo $nVideos; ?>';
		var selVidID = '<?php echo $selVidID; ?>';
		var vidTimes = new Array();
		<?php foreach($vidTimes as $key => $val){ ?>
			vidTimes.push('<?php echo $val; ?>');
    	<?php } ?>

		// var t1 = '<?php echo $t1; ?>';
		// var t2 = '<?php echo $t2; ?>';
		// var t3 = '<?php echo $t3; ?>';
		// var t4 = '<?php echo $t4; ?>';

		var t1 = vidTimes[0];
		var t2 = vidTimes[1];
		var t3 = vidTimes[2];
		var t4 = vidTimes[3];
		

		var totalTime = '<?php echo $totalTime; ?>';
		var currentTask = '<?php echo $currentTask; ?>';
		// var vidTimes=new Array(t1,t2,t3,t4);

		var timeElapsed = '<?php echo $timeElapsed; ?>';
		var nextNotifTime = '<?php echo $nextNotifTime; ?>';
		var startTime = Date.now();
		
		var reported = '<?php echo $reported; ?>';
	</script>

	<div class="wraper">
		<div class="task" id="normalTask"><b>Fault Detection task</b></div>
		<div class="notif0" id="notification0"><n0>No new notification</n0></div>
		<n1 onClick="getCurrentTime('notification')"><div class="notif1" id="notification1"><div class="blink_me">One new notification!</div></div></n1>
		<div class="logout"><a href="logout.php">Leave Study</a></div>
		<div class="left">
			<?php
			// $video_id = array("1.mp4" => "one", "2.mp4" => "two", "3.mp4" => "three", "4.mp4" => "four"); // Videos // TODO: Modify this to support different number of videos
			$videopath = 'videos';
			// $l = count($video_id);
			// In the following 'for' loop, loop through the array $video_id where $vname will correspond to the key (here filename) and $vID correspond to the value (here one, two etc.).
			for ($i = 1; $i <= $nVideos; $i++){ ?>
				<figure>
					<video id='<?php echo $i; ?>' autoplay muted loop onClick="syncTime('<?php echo $i; ?>')">
						<source src="<?php echo "$videopath/$i".".mp4"; ?>" type="video/mp4" />
					</video>
				</figure>
			<?php } ?>
		</div>

		<div class="right">

			<div id="bigScreen">
				<!-- bigScreen is the div where we put the bigVideo -->
				<video id="bigVideo" width="100%" height="100%" autoplay muted loop>
					<source src="" type="video/mp4" />  <!-- TODO: Automatically select the first video on the bigScreen at start. Change this to get the previously selected video when reloading.-->
				</video>

				<button onclick="getCurrentTime('report')">Report Fault!</button> <!-- TODO: Move this button to the center of the right side -->
				<br><br>
				<span class='error' id='reportedMsg'>Fault Reported.</span>
			</div>

			<script>
				document.oncopy = $(initialSyncBigVideo);
				function initialSyncBigVideo(){
					// var selVidID = '<?php echo $_SESSION['selectedVidID']; ?>';
					console.log(selVidID);
					syncTime(selVidID);
					document.getElementById("bigVideo").currentTime = <?php echo $_SESSION['one']; ?>;
					// if(selVidID=='1.mp4'){
					// 	syncTime("1");
					// 	document.getElementById("bigVideo").currentTime = <?php echo $_SESSION['one']; ?>;
					// } else if(selVidID=='2.mp4'){
					// 	syncTime("two");
					// 	document.getElementById("bigVideo").currentTime = <?php echo $_SESSION['two']; ?>;
					// } else if(selVidID=='3.mp4'){
					// 	syncTime("three");
					// 	document.getElementById("bigVideo").currentTime = <?php echo $_SESSION['three']; ?>;
					// } else if(selVidID=='4.mp4'){
					// 	syncTime("four");
					// 	document.getElementById("bigVideo").currentTime = <?php echo $_SESSION['four']; ?>;
					// }
				}
				var vID = new Array("1", "two", "three", "four"); // TODO: Automatically create this array based on number of videos
				var vID = new Array(1,2,3,4); 
				var vName = new Array("1.mp4", "2.mp4", "3.mp4", "4.mp4"); // TODO: Randomly pick videos from the list
				var nVideos = vName.length;

				function syncTime(selectedVidID) { // This function syncs the selected video on the left to its bigger version being played on the right.

					for (var i = 0; i < nVideos; i++) {
						document.getElementById(vID[i]).style.border = "none";
					}

					var bigVideo = document.getElementById("bigVideo");
					document.getElementById("bigScreen").style.display = "block";

					for (var i = 0; i < nVideos; i++) {
						if (selectedVidID == vID[i]) {
							document.getElementById(selectedVidID).style.border = "5px solid #F00";
							document.getElementById("bigVideo").src = "videos/"+vName[i];
							var selectedVideo = document.getElementById(selectedVidID);
							bigVideo.currentTime = selectedVideo.currentTime;
							// setCurTime(selectedVideo.currentTime);
							// function setCurTime(currentTime) {
							// 	// currentTime is the time at which the selected video is playing
							// 	bigVideo.currentTime = currentTime;
							// }
							continue;  
						}

					}

				}
				document.oncopy = $(showNotification);
				function showNotification(){
					$('#reportedMsg').hide();
					$('#notification1').hide();
					// $('#notification').pointer-events:none;
					setTimeout(replaceText, +nextNotifTime - +timeElapsed); // Execute the function (replaceText) defined below after a given time
				}
				function replaceText(){
					$('#notification0').hide();
					// const taskDiv = document.getElementById('notification1');
					// taskDiv.textContent = 'Notification: A task requires your attention.';
					$('#notification1').fadeIn('fast');
				}

				document.oncopy = $(showReportedMsg);
				function showReportedMsg(){
					if (reported == 1){
						$('#reportedMsg').fadeIn('fast');
						setTimeout(function(){
						$('#reportedMsg').fadeOut('slow');
					}, 1000);
					}
					reported = 0;
				}
				// TODO: Include the functionality of accounting for different number of videos
			// 	for (var vidNum = 0; vidNum < nVideos; vidNum++) {
			// 			var ti = vidTimes[vidNum];
			// 			var	vID_temp = vID[vidNum];
			// 			console.log(ti);
			// 			console.log(vID_temp);
			// 		document.getElementById(vID_temp).addEventListener('loadedmetadata', function() { // When the video is loaded, set its current time to t1.
			// 			this.currentTime = ti;
			// 		}, false);
			// }

			// for (var i = 0; i < nVideos; i++) {
			// 			// document.getElementById(vID[i]).style.border = "none";
			// 			document.getElementById(vID[i]).addEventListener('loadedmetadata', function() { // When the video is loaded, set its current time to t1.
			// 		this.currentTime = vidTimes[i];
			// 	}, false);
						
			// 	}
				document.getElementById('one').addEventListener('loadedmetadata', function() { // When the video is loaded, set its current time to t1.
					this.currentTime = vidTimes[0];
				}, false);
				document.getElementById('two').addEventListener('loadedmetadata', function() {
					this.currentTime = vidTimes[1];
				}, false);
				document.getElementById('three').addEventListener('loadedmetadata', function() {
					this.currentTime = vidTimes[2];
				}, false);
				document.getElementById('four').addEventListener('loadedmetadata', function() {
					this.currentTime = vidTimes[3];
				}, false);

				// var video_id = {"1.mp4": "1", "2.mp4": "2", "3.mp4": "3", "4.mp4": "4"}; // Videos
				var vid_name = '<?php echo $_SESSION['selectedVid']; ?>';
				var id  = selVidID; //vID[vid_name];
				$("video").click(function(event) {
					id = event.target.id;
				});

				function sleep(milliseconds) {
					const date = Date.now();
					let currentDate = null;
					do {
						currentDate = Date.now();
					} while (currentDate - date < milliseconds);
				}

				function getCurrentTime(recordedEvent) { // recordedEvent is the event when we need to save current times of the videos. Two possibilities: Click on notification, Click on report error button.

					var cTime = new Array(nVideos);  // Array for storing current times of all videos
					var msg;
					// if (id) {
						for (var i = 0; i < nVideos; i++) {
							cTime[i] = document.getElementById(vID[i]).currentTime;

							if (id == vID[i]) {
								var svt = cTime[i]; // Store selected video time
							}

							if (i == 0) {
								msg = cTime[i];
							} else {
								msg = msg + '_' + cTime[i];
							}
						}
						msg = msg + '_' + svt;  // Just saving all times as a concatenation of times t1_t2_t3 etc.

						// console.log(timeElapsed);
						var a = Date.now() - startTime;
						timeElapsed = +timeElapsed + +a; // Without these extra +'s it just concatenates the two numbers instead of adding
						// console.log(timeElapsed);
						msg = msg + '_' + timeElapsed;
						var notificationClickDelay = (+timeElapsed - +nextNotifTime)/1000; // Converting to seconds
						// alert("nD=" + notificationClickDelay + "  Current time=" + a + "  nextNotifTime=" + nextNotifTime + "  timeElapsed=" + timeElapsed);
						msg = msg + '_' + notificationClickDelay;

						fileName = id + '.mp4'; // This works because our ID is the file name without extension (.mp4)
						var data = msg + '_' + fileName + '_' + recordedEvent; // message is current times of all vidoes, time elapsed, filename, recorded event.
						window.location.href = "cTimeSet.php?id=" + data; // Send all this time data to the time set file to be echoed out.
					// } else
					// 	alert("select video first");

				}
				setInterval(goToTLX, +totalTime - +timeElapsed);
				function goToTLX(){
					window.location.href = "TLX.php";
					}
				

			</script>
		</div>
	</div>
</body>

</html>