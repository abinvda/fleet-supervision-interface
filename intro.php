<?php include('header.php'); ?>
<?php
if (isset($_POST['submit'])) {

	if (empty($_POST['txtid'])) {
		$error[0] = "<span class='error'>Enter ID</span>";
	}

	if (empty($error)) {
		$select = mysqli_query($con, "SELECT * FROM `user` WHERE ID = '" . $_POST['txtid'] . "'");
		if (mysqli_num_rows($select) && $_POST['txtid'] != 'test') {
			$error[0] = "<span class='error'>This username already exists. If you have not completed this study before, please select a different username.</span>";
		} else {
			$_SESSION['txtid'] = $_POST['txtid'];
			$_SESSION["loginTime"] = time();
			
			$task_order_array = [[0,1,2], [0,2,1], [1,2,0], [1,0,2], [2,1,0], [2,0,1]];
			$task_order = 2; // 0 to 5
			$tasks = ['none', 'task1', 'task2'];
			$_SESSION['taskOrder'] = $task_order_array[$task_order];
			$_SESSION['currentTaskNum'] = 0;
			$_SESSION['task'] = $tasks[$_SESSION['taskOrder'][$_SESSION['currentTaskNum']]]; //'task1'; // Which interruption to start with?
			
			$_SESSION['total_time'] = 120; // Total task time under each condition (in seconds)
			$_SESSION['nextNotifTime'] = rand(15000, 40000); // Let's just keep this in milliseconds
			if ($_SESSION['task'] == 'none'){
				$_SESSION['total_time'] = 120;	
				$_SESSION['nextNotifTime'] = 500000; // A lot of milliseconds
			}
			
			$_SESSION['time_elapsed'] = 0; // Let's just keep this in milliseconds
			
			$_SESSION['activity'] = 'start';
			$_SESSION['numVids'] = 9;
			$_SESSION['vidTimes'] = [0, 0, 0, 0, 0, 38, 0, 0, 0, 0,0,0,0,0,0,0,0,0,0,0];
			// $_SESSION['vidTimes'] = array_map(function () {
			// 	return rand(0, 20);
			// }, array_fill(0, $_SESSION['numVids'], null));
			
			$_SESSION['startVidTimes'] = array();
			for ($i = 0; $i < $_SESSION['numVids']; $i++) {
				array_push($_SESSION['startVidTimes'], $_SESSION['vidTimes'][$i]);
			}

			$random_number_array = range(1, 16); // Random sequence of videos we have in total
			// shuffle($random_number_array);
			$_SESSION['chosenVids'] = array();
			for ($i = 0; $i < $_SESSION['numVids']; $i++) {
				array_push($_SESSION['chosenVids'], $random_number_array[$i]); // This should select random videos for the study every time
			}

			$_SESSION['selectedVidID'] = $_SESSION['chosenVids'][0];
			$_SESSION['resumptionFaultID'] = -1; // ID of a video chosen to be at fault when resuming from an interruption. -1 when no video is chosen.
			$_SESSION['taskCompleted'] = 0; // Used to save task completion time in TLX.php file

			$_SESSION['nD'] = 0.0; // Notification click delay

			$random_number_array = range(0, 13); // 14 is the total number of fault videos we have
			shuffle($random_number_array);
			$_SESSION['task1_order'] = $random_number_array;
			$random_number_array = range(0, 9); // 10 is the number of messages we have
			shuffle($random_number_array);
			$_SESSION['task2_order'] = $random_number_array;

			$_SESSION['condition'] = 1; // This will store which condition are we on. Increment it by one after every condition.			
			
			// Save user details to the database
			$id = $_POST['txtid'];
			$age = $_POST['age'];
			$area = $_POST['area'];
			$gender = $_POST['gender'];
			$genderBox = $_POST['genderBox'];
			$fam = $_POST['fam'];
			$nVideos = $_SESSION['numVids'];
			$firstTask = $_SESSION['task'];

			if ($_POST['txtid'] == 'train'){
				$_SESSION['total_time'] = 60; // Total task time under each condition (in seconds)
				$_SESSION['nextNotifTime'] = 10000; // in milliseconds
				$_SESSION['task'] = 'task1';
				$_SESSION['task1_order'] = range(0,13);
				$_SESSION['numVids'] = 4;
				$_SESSION['vidTimes'] = [225, 222, 135, 160];
				$_SESSION['chosenVids'] = range(1, 4);
				$_SESSION['selectedVidID'] = $_SESSION['chosenVids'][0];
				$_SESSION['condition'] = 1;
			}
			if ($_POST['txtid'] == 'test' || $_POST['txtid'] == 'user1'){
				$_SESSION['total_time'] = 30; // Total task time under each condition (in seconds)
				$_SESSION['task'] = 'task2';
				$_SESSION['nextNotifTime'] = 12000; // in milliseconds
			}

			if ($_POST['txtid'] != 'test' && $_POST['txtid'] != 'train') {
				date_default_timezone_set('America/Toronto');
				$dt = date("Y-m-d h:i:s A");
				// $taskOrder = $_SESSION['taskOrder'];
				$taskOrder = "";
				for ($i = 0; $i <= 2; $i++) {
					if ($i == 0){
						$taskOrder	= $_SESSION['taskOrder'][$i];
					}else{
						$taskOrder  = $taskOrder . ",". $_SESSION['taskOrder'][$i];
					}
				}
				$ins = "INSERT INTO `user`(`ID`, `age`, `area`, `gender`, `genderBox`, `familiar`, `nVideos`, `taskOrder`, `datetime`) VALUES ('$id','$age','$area','$gender','$genderBox', '$fam', '$nVideos', '$taskOrder', '$dt')";
				$insert = mysqli_query($con, $ins);
			}
			
			header('location:task0.php?id=' . $_POST['txtid'] . ' '); // This tells to go to the start of main task.
		}
	}
}

echo '<script type="text/JavaScript"> 
function showValue(c,d){
    document.getElementById(d).innerHTML=c.value;
}
     </script>';

?>

<body>
	<div class="wraper">

		<h1 style="font-size : 24px; text-align: center;">Robot Monitoring Study</h1>
		<hr>

		<?php if (!empty($error[0])) echo $error[0]; ?>

		<p>Welcome. This is a robot supervision interface which will be used to monitor a group of robots, report any errors in robots' behavior and to fix the errors if required.</p>

		<p>During the experiment, you will be monitoring several robots roaming around and try to spot if any robot is showing signs of fault. In this study, we are looking into how different side-tasks affect your working with the robot monitoring task. Following are the details of each task that you may need to complete:</p>
		<br>

		<h3>1. Robot Monitoring</h3>
		<p>This is your primary/default task. Here, you will be monitoring a number of robots (shown in small cards on the left). You can also click on a card to see its enlarged view on the right. Each card shows one of the robots navigating in a building, moving from one location to another.

			The robots can sometimes get into a fault (error) and you need to report when that happens.</p>
		<br>
		<img src="images/task0.png" alt="Robot_monitoring" class="center-image">
		<br>

		<br>

		<h4>Faulty (Erroneous) Behavior:</h4>
		A robot's movements are considered at fault if it shows one of the following behaviors:<br>
		1. Stop moving,<br>
		2. Moving in circles at a location,<br>
		3. Moving side-to-side at a location.<br>

		<br>
		<h4>Error reporting:</h4>
		When an erroneous movement is detected, please click on the corresponding card and then click the 'Report Fault' button. Once you report an error, you may resume the monitoring task again. Our automatic correction procedures will try to resolve the issue.
		<br>
		<br>
		<h3>2. Fault Correction:</h3>
		<p>When an error cannot be solved automatically, we will ask for your help for a 'Fault correction' procedure. You will see a notification on your screen, flashing in a red card, titled '1 new notification'. You can click on the notification to initiate the fault correction task.
			<br>
			During the correction procedure, you will see the screen as shown below. On the left, you will see camera feed of a robot that is currently in a fault state. On the right, you will need to answer some questions regarding that. Once done, click the submit button and you will be taken back to the monitoring task.
		</p>
		<br>
		<img src="images/task1.png" alt="fault_correction" class="center-image">
		<br>
		<br>


		<h3>3. Messaging Colleagues:</h3>
		<p>Once in a while, you will also be asked to write a message to your colleague (again, shown as a flashing notification in the red card). But do not worry, the message is already prepared for you and you will just have to type it again. The message writing screen is shown below. Once completed, press Send Message, and the message will be sent and you will be taken back to the monitoring task.</p>
		<br>
		<img src="images/task2.png" alt="email" class="center-image">
		<br>

		<h3>Procedure:</h3>
		There will be three rounds in the experiment. After each round, you wll be asked some questions related to that round. There is also a short break between the rounds.
		<hr>

		<p>Below, enter your user ID, answer the following questions (optional) and click submit button to begin the experiment:</p>

		<form name="frmlogin" method="post" class="frmlogin" autocomplete="off">
			<table>
				<tr>
					<td align="right">User ID (required): </td>
					<td align="left"><input type="text" name="txtid" size="20" value="<?php if (isset($_POST['txtid'])) echo $_POST['txtid']; ?>" /><br></td>
				</tr>
				<tr>
					<td align="right">Age: </td>
					<td align="left"><input type="text" name="age" value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>" /><br></td>
				</tr>
				<tr>
					<td align="right">Area of study/work: </td>
					<td align="left"><input type="text" name="area" value="<?php if (isset($_POST['area'])) echo $_POST['area']; ?>" /><br></td>
				</tr>
				<tr>
					<td align="right">Gender: </td>
					<td align="left"><input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> id="f" value="female">
						<label for="f">Female</label><br>

						<input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> id="m" value="male">
						<label for="m">Male</label><br>

						<input type="radio" name="gender" <?php if (isset($gender) && $gender == "preferNO") echo "checked"; ?> id="p" value="preferNO">
						<label for="p">Prefer not to say</label><br>

						<input type="radio" name="gender" <?php if (isset($gender) && $gender == "selfID") echo "checked"; ?> id="s" value="selfID" oninput="ShowHideDiv()">
						<label for="s">Self-identify:</label>

						<input type="text" id="genderBox" name="genderBox" />
						<br><br>
					</td>
				</tr>
				<tr>
					<td align="right">How familiar are you with multi-robot monitoring systems?<br></td>
					<td align="left"><input type="range" min="1" max="5" step="1" value="3" class="slider" id="fam" name="fam" oninput="showValue(this,'1');" />
						Selected: <span id="1">3</span>
						<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1-Not familiar at all, 3-Somewhat familiar, 5-Extremely familiar)
					</td>
				</tr>
				<br>
				<tr>
					<td colspan="2">
						<center>
							<br>
							<br>
							<input type="submit" name="submit" value="Submit" /> <br /><br />
						</center>
					</td>
				</tr>
			</table>

			<?php if (!empty($error[0])) echo $error[0]; ?>
		</form>
	</div>
	<br>
	<br>
	<br>
	<br>
</body>

</html>