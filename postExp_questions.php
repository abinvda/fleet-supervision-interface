<?php include('header.php');
error_reporting(0);
// if ($_SESSION['activity'] == 'end') {
//     header("location:concludes.php");
// }

$id = $_SESSION['txtid'];
$qid = $_SESSION['task']; //$_SESSION['condition'];

$_SESSION["loginTime"] = time();
// $_SESSION['total_time']=500;   // Time for next condition.

echo '<script type="text/JavaScript"> 
function showValue(c,d){
    document.getElementById(d).innerHTML=c.value;
}
     </script>';
?>

<body>

    <div class="wraper">
        <div id="finalTitle">
        <h2><a2>Final Questionnaire</a2></h2>
        <h2>Answer the questions below, comparing different elements of the task</h2>
        </div>
        <br>
        <?php

        if (isset($_POST['submit'])) {
            // isset($_POST['submit']) checks if submit button is pressed.

            if (!empty($_POST['Q1']) && !empty($_POST['Q2']) && !empty($_POST['Q3']) && !empty($_POST['Q4']) && !empty($_POST['Q5']) && !empty($_POST['Q6'])) {
                //     $error[0] = "<span class='error'>Please answer all questions.</span>";
                // } else {
                $val1 = $_POST['Q1']; //  'Q1' is the name attribute of the input (not id)
                $val2 = $_POST['Q2'];
                $val3 = $_POST['Q3'];
                $val4 = $_POST['Q4'];
                $val5 = $_POST['Q5'];
                $val6 = $_POST['Q6'];
                $val7 = $_POST['Q7'];
                $val8 = $_POST['Q8'];
                $val9 = $_POST['Q9'];
                $val10 = $_POST['message'];
                

                date_default_timezone_set('America/Toronto');
                $dt = date("Y-m-d h:i:s A");

                $con=mysqli_connect('localhost','root','','task_database');

                $ins = "INSERT INTO `post_responses`(`ID`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `datetime`) VALUES ('$id','$val1','$val2','$val3','$val4','$val5','$val6','$val7','$val8','$val9','$val10', '$dt')";
                $insert = mysqli_query($con, $ins);
                if (!$insert)
                    die('Thank you: ' . $con->connect_error);
                else {
                    // If submitted successfully, then go to mid feedback page.
                    $_POST = array();
                    header("location:feedback_end.php");
                }
            }
        }

        ?>

        <form name="postExp" method="post" id="postExpForm">
            <h3>Please answer the following questions on a scale of 1 to 20 (1 being Strongly Disagree and 20 being Strongly Agree)</h3>
            1. I found the <b>fault correction tasks and messaging tasks</b> disruptive while monitoring the robots.<br><br>
            <input type="range" min="1" max="20" step="1" value="10" class="slider slider2 slider2" id="Q1" name="Q1" oninput="showValue(this,'1');" />
            Value: <span id="1">10</span>
            <br><br>
            <br>
            2. I found it difficult to switch from the robot monitoring task to the <b>correction task.</b><br><br>
            <input type="range" min="1" max="20" step="1" value="10" class="slider slider2" id="Q2" name="Q2" oninput="showValue(this,'2');">
            Value: <span id="2">10</span>
            <br><br>
            <br>
            3. I found it difficult to switch from the robot monitoring task to the <b>messaging task.</b><br><br>
            <input type="range" min="1" max="20" step="1" value="10" class="slider slider2" id="Q3" name="Q3" oninput="showValue(this,'3');" />
            Value: <span id="3">10</span>
            <br>
            <br><br>
            4. I spent too much time on the <b>correction task.</b><br><br>
            <input type="range" min="1" max="20" step="1" value="10" class="slider slider2" id="Q4" name="Q4" oninput="showValue(this,'4');" />
            Value: <span id="4">10</span>
            <br><br>
            <br>
            5.I spent too much time on the <b>messaging task.</b><br><br>
            <input type="range" min="1" max="20" step="1" value="10" class="slider slider2" id="Q5" name="Q5" oninput="showValue(this,'5');" />
            Value: <span id="5">10</span>
            <br>
            <br><br>
            6. I found it difficult to resume the robot monitoring task after the <b>correction task.</b><br><br>
                <input type="range" min="1" max="20" step="1" value="10" class="slider slider2" id="Q6" name="Q6" oninput="showValue(this,'6');" />
                Value: <span id="6">10</span>
            <br>
            <br><br>
            7. I found it difficult to resume the robot monitoring task after the <b>messaging task.</b><br><br>
            <input type="range" min="1" max="20" step="1" value="10" class="slider slider2" id="Q7" name="Q7" oninput="showValue(this,'7');" />
            Value: <span id="7">10</span>
            <br>
            <br><br>
            8. I am satisfied with my overall performance.</b><br><br>
            <input type="range" min="1" max="20" step="1" value="10" class="slider slider2" id="Q8" name="Q8" oninput="showValue(this,'8');" />
            Value: <span id="8">10</span>
            <br>
            <br><br>
            9. I made mistakes during the tasks.</b><br><br>
            <input type="range" min="1" max="20" step="1" value="10" class="slider slider2" id="Q9" name="Q9" oninput="showValue(this,'9');" />
            Value: <span id="9">10</span>
            <br>
            <br><br>

                <div class="wraper">
                    <!-- <div class="task"><b> </b></div> -->
                    <!-- <div class="task"><a href="task0.php">Go To Main Page</a></div> -->
                    <!-- <div class="logout"><a href="logout.php">Logout</a></div> -->
                    <div class="left" style="width: 40%; border-left: 0px;">
                        <p>Describe the differences you observed/perceived between the two secondary tasks (fault correction task and messaging task), in terms of their effects on the completion of the primary task (robot monitoring).
                        </p>

                    </div>

                    <div class="right" style="width: 40%; float: left;">
                        <textarea name="message" placeholder="Please type your answer here." style="width: 100%; height:200px;"></textarea>
                        <!-- <?php if (!empty($error[0])) echo $error[0]; ?><br />	 -->
                    </div>
                </div>
                <br>
                <br>
                <br>

                <input type="submit" name="submit" value="Submit" style="width: 200px; margin-left:30%;">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

        </form>

        <script>
            document.oncopy = $(showForm);

            function showForm() {
                $('#finalTitle').hide();
                $('#postExpForm').hide();
                // $('#notification').pointer-events:none;
                setTimeout(replaceText(1), 1000); // Execute the function (replaceText) defined below after a given time
            }

            function replaceText(id) {
                // const taskDiv = document.getElementById('notification1');
                // taskDiv.textContent = 'Notification: A task requires your attention.';
                if (id == 1){
                    $('#finalTitle').fadeIn('slow');
                    setTimeout(replaceText(2), 1000); 
                } else {
                    $('#postExpForm').fadeIn('slow');
                }
            }

        </script>
    </div>
    <!-- <a href="task0.php">After you submit, take a 2 minute break and click here to start the next round.</a> -->
</body>

</html>