<?php include('header.php');

/*$id=$_REQUEST['msg'];
$d=explode('_',$id);

$vtime=$d[0];
$fname=$d[1];
$time=$d[2];
*/

$time = $_REQUEST['msg'];

$hold_time = $time - $_SESSION["loginTime"];

/*$lt=$_SESSION["loginTime"];
$ct=time();
$tg=$ct-$lt;
$_SESSION['stay_time']=$tg;*/

//$msg=$vtime.'_'.$fname;

// Randomly selecting one of the videos stored for Task 1.
$iddd = $_REQUEST['vidID'];  // This is determined in the selectTask file so that the video does not change if an incorrect answer is submitted.
$table = 'task1_video_info';
$idd = $iddd + 1; // Because the videos are 1-indexed whereas the array here is 0-indexed
$t = "SELECT * from task1_video_info where videoID=$idd";
$result = mysqli_query($con, $t);
$row = mysqli_fetch_array($result);

// $rnd = $iddd - 1;
$vn = array('1_312', '2_421', '3_312', '4_112', '5_321', '6_312', '7_121', '8_112', '9_312', '10_312', '11_112', '12_312','13_421', '14_421');

$file = $vn[$iddd] . '.mp4';

// for($i=0; $i<$l; $i++)
// {
// if($rnd==$i)
// {
// 	$file=$vn[$i].'.mp4';	
// 	break;
// }
// }
//echo $file;

?>

<body>

	<div class="wraper">
		<div class="task">Fault Correction task</div>
		<div class="logout"><a href="logout.php"></a></div>
		<!-- <br> -->
		<div class="left">
			<br><br><br><br>
			<div class="faultVid">
				<?php $videopath = 'videos\fault_clips'; ?>
				<!-- Because the fault ones are stored in the "videos\fault_clips" folder. -->
				<video autoplay muted loop id="demo">
					<source src="<?php echo "$videopath/$file"; ?>" type="video/mp4" />
				</video>

			</div>

		</div>

		<div class="rightTask1">
			<?php
			// echo $row['ans1']; // TODO: Remove when done testing.
			// echo $row['ans2'];
			// echo $row['ans3'];

			if (isset($_POST['submit'])) {
				// isset($_POST['submit']) checks if submit button is pressed.
				if (empty($_POST['ques1']) || empty($_POST['ques2']) || empty($_POST['ques3'])) {
					$error[0] = "<span class='error'>Please answer all questions.</span>";
				} else {
					// if (isset($_POST['ques1']) && isset($_POST['ques3']) && isset($_POST['ques2'])) {
					// This else condition says that execute the following code only if we have all answers available, otherwise just display the error.
					$ans1 = $_POST['ques1'];
					$ans2 = $_POST['ques2'];
					$ans3 = $_POST['ques3'];

					sleep(1); // TODO: Check what to do with this.

					if ($ans1 == $row['ans1'] && $ans2 == $row['ans2'] && $ans3 == $row['ans3']) {
						// If the answers are correct
					// 	$counter = 1;
					// } else {
					// 	$counter = 2;
					// }
						date_default_timezone_set('America/Toronto');
						$dt = date("Y-m-d h:i:s A");
						$id = $_SESSION['txtid']; // txtid is the user ID
						$nD = $_SESSION['nD'];
						$qid = $row['videoID'];

						$q = "select * from task1_tries_counter";
						$r = mysqli_query($con, $q);
						$rowec = mysqli_fetch_array($r);
						$counter = $rowec['counter'];

						$total_efforts = $counter;
						$t = time();
						$time_spent = ($t - $time);

						$ins = "insert into task1_responses (ID,QID,total_efforts,time_spent,notificationClickDelay,datetime) values ('$id','$qid','$total_efforts','$time_spent','$nD','$dt')";
						$insert = mysqli_query($con, $ins);
						if (!$insert)
							die('Connection Failed : ' . $con->connect_error);
						else {
							// If results are successfully updated, reset counter to 1.
							$counter = 1;
							$idec = 1;
							$in = "update task1_tries_counter set counter = $counter where ID=" . $idec;
							mysqli_query($con, $in);

							/*time module*/
							$hold_time = $time - $_SESSION["loginTime"];

							$_SESSION['stay_time'] = $_SESSION['stay_time'] - $hold_time;
							echo 'hold time' . $_SESSION['stay_time'];
							$_SESSION["loginTime"] = time();
							/**/

							header("location:task0.php");
						}
					} else {
						// If the answers are not correct, increment the counter
						$q = "select * from task1_tries_counter";
						$r = mysqli_query($con, $q);
						$rowec = mysqli_fetch_array($r);
						$counter = $rowec['counter'];
						$counter += 1;
						$idec = 1;
						$in = "update task1_tries_counter set counter = $counter where ID=" . $idec;
						mysqli_query($con, $in);
						$error[0] = "<span class='error'>That didn't seem to work, please check your selections.</span>";
					}
				}
			}

			?>
			<!-- <br> -->
			<form name="task1_questions" method="post" class="task1_questions">
			<?php if (!empty($error[0])) echo $error[0]; ?><br />
				<b>1. Select the type of fault that the robot is showing:</b><br>
				<input type="radio" id="type1" name="ques1" , value="1">
				<!-- value is what is sent to the server on submit but is not visible to user. -->
				<label for="type1">Stopped moving.</label><br>
				<input type="radio" id="type2" name="ques1" , value="2">
				<label for="type2">Moving in circles.</label><br>
				<input type="radio" id="type3" name="ques1" , value="3">
				<label for="type3">Turning side to side at a spot.</label><br>
				<input type="radio" id="type4" name="ques1" , value="4">
				<label for="type4">There is no fault.</label>
				<br>
				<br>

				<strong>2. Is there anything blocking robot's immediate path forward?</strong><br>
				<input type="radio" id="blk1" name="ques2" , value="1">
				<label for="blk1">Yes.</label><br>
				<input type="radio" id="blk2" name="ques2" , value="2">
				<label for="blk2">No.</label><br>
				<!-- <input type="radio" id="blk3" name="ques2" , value="3">
				<label for="blk3">Not Sure.</label> -->

				<br>
				<br>

				<strong>3. What's the best way out of this fault?</strong><br>
				<input type="radio" id="fix1" name="ques3" , value="1">
				<label for="fix1">Start/keep moving straight.</label><br>
				<input type="radio" id="fix2" name="ques3" , value="2">
				<label for="fix2">Make a turn and find a way.</label>
				<br>
				<?php if (!empty($error[0])) echo $error[0]; ?><br />
				<input type="submit" name="submit" value="Submit">
				<br>
			</form>

			<!-- If we need to load questions and options from the database, we can use the following setup.
			<form name="frmmcq" method="post" class="frmmcq">
				<?php echo '<strong>' . $row['question'] . '</strong> '; ?><br /><br />
				<ul>

					<li><input type="radio" name="mcq" value="a" <?php if (isset($_POST['mcq']) && $_POST['mcq'] == 'a') echo 'checked'; ?> />
						<?php echo $row['a']; ?></li>
					<li><input type="radio" name="mcq" value="b" <?php if (isset($_POST['mcq']) && $_POST['mcq'] == 'b') echo 'checked'; ?> />
						<?php echo $row['b']; ?></li>
					<li><input type="radio" name="mcq" value="c" <?php if (isset($_POST['mcq']) && $_POST['mcq'] == 'c') echo 'checked'; ?> />
						<?php echo $row['c']; ?></li>
					<li><input type="radio" name="mcq" value="d" <?php if (isset($_POST['mcq']) && $_POST['mcq'] == 'd') echo 'checked'; ?> />
						<?php echo $row['d']; ?></li>
				</ul>
				<?php if (!empty($error[0])) echo $error[0]; ?><br />
				<input type="submit" name="submit" value="Submit" /> <br /><br />

			</form> -->

		</div>
	</div>

</body>

</html>