<?php include('header.php');
$notificationClickTime = $_REQUEST['msg']; // Right now, we're only sending out the start time
$msgNum = $_REQUEST['msgNum'];

// $_SESSION['activity']='end';

?>

<body>
	<script>
		var mN = '<?php echo $msgNum; ?>';
	</script>
	<div class="wraper">
		<div class="task">Messaging Client</div>
		<!-- <div class="task"><a href="task0.php">Go To Main Page</a></div> -->
		<div class="logout"><a href="logout.php"></a></div>
		<div class="left" id="msg1">
			<p class="noselect">
				<!-- Mr. Chris P. Bacon, -->
				<!-- <br> -->
				<!-- <br> As you know, I have been working some hours from home since last year.   -->
				<!-- I have found that my productivity has increased, and I am able to focus well on my work activities without the distractions in the office. -->
				<br> Hi. Would it be possible to work from home, only meeting in the lab for testing? 
				<!-- I have really enjoyed working with your team, and look forward to our continued collaboration. -->
				<!-- <br>
				<br> Best,
				<br> Peter Pann -->
			</p>	
		</div>

		<div class="left" id="msg2">
			<p class="noselect">
				<!-- Mr. Lou Pole, -->
				<!-- <br> -->
				<!-- <br>  -->
				After years of getting bad eyes, I finally have a diagnosis. I have an allergy. 
				<br>
				<!-- <br> I will be wearing shaded glasses for the next week. -->
				<!-- <br>
				<br> Thanks,
				<br> Anne Teak -->
			</p>
		</div>

		<div class="left" id="msg3">
			<p class="noselect">
				<!-- Hi Justin Case, -->
				<!-- <br> -->
				<br> Hey did you know that the management has decided to convert our hallway to a test area.
				<br>
				<!-- <br> You are welcome to enjoy power naps any time of day (pillows provided). -->
				<!-- <br>
				<br> Cheers,
				<br> Eileen Dover -->
			</p>
		</div>

		<div class="left" id="msg4">
			<p class="noselect">
				<!-- Ms. Kerry Oki, -->
				<!-- <br> -->
				<br> We are switching to Chromebooks. Your computer will be replaced with a new one. 
				<!-- <br> -->
				<!-- <br> If you have a company laptop, please exchange it tomorrow morning before getting to work.  -->
				<!-- <br>
				<br> Sincerely,
				<br> Olive Hoyl -->
			</p>

		</div>

		<div class="left" id="msg5">
			<p class="noselect">
				<!-- Ms. Olive Hoyl, -->
				<!-- <br> -->
				<br> If you have a company laptop, please exchange it tomorrow before starting work. 
				<!-- <br> Olive Hoyl -->
			</p>

		</div>

		<div class="left" id="msg6">
			<p class="noselect">
				<!-- Ms. Anne Teak, -->
				<!-- <br> -->
				<br> Can you please get the 3d printer fixed? We are getting seriously late here.
			</p>
		</div>

		<div class="left" id="msg7">
			<p class="noselect">
				<!-- Hi Peter Pann, -->
				<!-- <br> -->
				<br> Someone is stealing our printer paper and replacing it with a cheap quality one.
			</p>
		</div>

		<div class="left" id="msg8">
			<p class="noselect">
				<!-- Hi Michael, -->
				<br> Someone is stealing our components. It is disrupting my work. Please look into it.
			</p>
		</div>

		<div class="left" id="msg9">
			<p class="noselect">
				<!-- Hi Pam, -->
				<br> Please cancel all meetings for this week. I am busy preparing for the deployment.
			</p>
		</div>

		<div class="left" id="msg10">
			<p class="noselect">
				<!-- Mr. Chrisp Ratt, -->
				<br> Hi, I needed to borrow your chair for a day. I got a visit from the HR people today.
			</p>
		</div>

		<div class="left" id="msg11">
			<p class="noselect">
				<!-- Mr. Chrisp Ratt, -->
				<br> Hi Chris, as you asked, I have arranged a meeting to discuss robots deployment. 
			</p>
		</div>


		<div class="rightTask2">
		<!-- <script type="text/javascript">document.getElementById('sentMsg').style.display = 'none';</script> -->
			<?php
			if (isset($_POST['sendEmail'])) { // When we click send button
				sleep(0.5); // TODO: Check what to do with this.
				if (empty($_POST['message'])) {
					$error[0] = "<span class='error'>Please type the message in the text box provided.</span>";
				}
				if (empty($error)) {
					$t = time();
					date_default_timezone_set('America/Toronto');
					$dt = date("Y-m-d h:i:s A");
					$id = $_SESSION['txtid']; // txtid is the user ID
					$nD = $_SESSION['nD'];
					$msgNum = $_REQUEST['msgNum'];
					$typedMessage = $_POST['message'];
					$time_spent = $t - $notificationClickTime;
					$ins = "insert into task2_responses (ID,msgID,time_spent,notificationClickDelay,typedMessage,datetime) values ('$id','$msgNum','$time_spent','$nD','$typedMessage','$dt')";
					$insert = mysqli_query($con, $ins);
					
					
					/*time module*/
					$hold_time = $time - $_SESSION["loginTime"];
					$_SESSION['stay_time'] = $_SESSION['stay_time'] - $hold_time;
					$_SESSION["loginTime"] = time();
					/**/
					?>
					<!-- <script type="text/javascript">document.getElementById('sentMsg').style.display = 'block';</script> -->
					<?php
					header("location:task0.php");
				}
			}
			?>

			<form name="formMsg" method="post" class="formMsg">
				<textarea name="message" placeholder="Please type the message given on the left." height="2"></textarea>
				<!-- <?php if (!empty($error[0])) echo $error[0]; ?><br />	 -->
				<input type="submit" name="sendEmail" value="Send Message" /> <br /><br />

			</form>

		</div>
		<!-- <div class="right" id="sentMsg"><a>Message Sent!</a></div> -->
		<script>
			document.oncopy = $(selectMsg);
				function selectMsg(){
					document.getElementById('msg1').style.display = 'none';
					document.getElementById('msg2').style.display = 'none';
					document.getElementById('msg3').style.display = 'none';
					document.getElementById('msg4').style.display = 'none';
					document.getElementById('msg5').style.display = 'none';
					document.getElementById('msg6').style.display = 'none';
					document.getElementById('msg7').style.display = 'none';
					document.getElementById('msg8').style.display = 'none';
					document.getElementById('msg9').style.display = 'none';
					document.getElementById('msg10').style.display = 'none';
					document.getElementById('msg11').style.display = 'none';
					// $('#msg1').hide();
					// $('#msg2').hide();
					// $('#msg3').hide();
					// $('#msg4').hide();
					if(mN == 1){
					document.getElementById('msg1').style.display = 'block';
					} else if(mN==2){
					document.getElementById('msg2').style.display = 'block';
					} else if(mN==3){
					document.getElementById('msg3').style.display = 'block';
					} else if(mN==4){
					document.getElementById('msg4').style.display = 'block';
					} else if(mN==5){
					document.getElementById('msg5').style.display = 'block';
					} else if(mN==6){
					document.getElementById('msg6').style.display = 'block';
					} else if(mN==7){
					document.getElementById('msg7').style.display = 'block';
					} else if(mN==8){
					document.getElementById('msg8').style.display = 'block';
					} else if(mN==9){
					document.getElementById('msg9').style.display = 'block';
					} else if(mN==10){
					document.getElementById('msg10').style.display = 'block';
					} else {
					document.getElementById('msg11').style.display = 'block';
					}
				}				

			</script>
	</div>

</body>

</html>