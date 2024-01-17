<?php include('header.php');
error_reporting(0);
// if ($_SESSION['activity'] == 'end') {
//     header("location:concludes.php");
// }
$nVideos = $_SESSION['numVids'];
$id = $_SESSION['txtid'];
$qid = $_SESSION['task']; //$_SESSION['condition'];

$_SESSION["loginTime"] = time();
// $_SESSION['total_time']=500;   // Time for next condition.

$msg=$_REQUEST['msg'];
$d=explode('_',$msg);

$vidTimes = array();
$_SESSION['vidTimes'] = array();
for ($i = 0; $i < $nVideos; $i++) {
    array_push($vidTimes, $d[$i]);
    array_push($_SESSION['vidTimes'], $d[$i]);
}

echo '<script type="text/JavaScript"> 
function showValue(c,d){
    document.getElementById(d).innerHTML=c.value;
}
     </script>';
     if ($_SESSION['taskCompleted'] == 1){

        date_default_timezone_set('America/Toronto');
        $dt = date("Y-m-d h:i:s A");
        
        $id = $_SESSION['txtid'];
        $tsk = $_SESSION['task']; //$_SESSION['condition'];
        $chosenVids = "";
        for ($i = 0; $i < $nVideos; $i++) {
            $chosenVids  = $chosenVids . ",". $_SESSION['chosenVids'][$i];
        }

        $startVidTimes = "";
        for ($i = 0; $i < $nVideos; $i++) {
            $startVidTimes  = $startVidTimes . ",". $_SESSION['startVidTimes'][$i];
        }

        $vidTimes = "";
        for ($i = 0; $i < $nVideos; $i++) {
            $vidTimes  = $vidTimes . ",". $_SESSION['vidTimes'][$i];
        }

        $ins2 = "INSERT INTO `vidtimes`(`userID`, `task`, `vIDs`, `vidStart`, `vidEnd`, `datetime`) VALUES ('$id','$tsk','$chosenVids','$startVidTimes','$vidTimes','$dt')";
        $insert2 = mysqli_query($con, $ins2);
        
        $_SESSION['startVidTimes'] = array();
        for ($i = 0; $i < $nVideos; $i++) {
            array_push($_SESSION['startVidTimes'], $_SESSION['vidTimes'][$i]);
        }

        $_SESSION['taskCompleted'] = 0;
     }
?>
<script>

var vidTimes = new Array();
		<?php foreach ($vidTimes as $key => $val) { ?>
			vidTimes.push('<?php echo $val; ?>');
		<?php } ?>

console.log(vidTimes);
</script>

<body>

    <div class="wraper">
        <?php
                
        if (isset($_POST['submitTLX'])) {
            // isset($_POST['submit']) checks if submit button is pressed.

            if (!empty($_POST['TLX_Q1']) && !empty($_POST['TLX_Q2']) && !empty($_POST['TLX_Q3']) && !empty($_POST['TLX_Q4']) && !empty($_POST['TLX_Q5']) && !empty($_POST['TLX_Q6'])) {
                //     $error[0] = "<span class='error'>Please answer all questions.</span>";
                // } else {
                $val1 = $_POST['TLX_Q1']; //  'TLX_Q1' is the name attribute of the input (not id)
                $val2 = $_POST['TLX_Q2'];
                $val3 = $_POST['TLX_Q3'];
                $val4 = $_POST['TLX_Q4'];
                $val5 = $_POST['TLX_Q5'];
                $val6 = $_POST['TLX_Q6'];
                
                date_default_timezone_set('America/Toronto');
                $dt = date("Y-m-d h:i:s A");

                $ins = "INSERT INTO `tlx1_responses`(`ID`, `qID`, `mental`, `physical`, `temporal`, `performance`, `effort`, `frustration`, `datetime`) values ('$id','$qid','$val1','$val2','$val3','$val4','$val5','$val6','$dt')";
                $insert = mysqli_query($con, $ins);
                if (!$insert)
                    die('Connection Failed : ' . $con->connect_error);
                else {
                    // If submitted successfully, then go to mid feedback page.
                    $_POST = array();
                    if ($_SESSION['condition'] <= 2) {
                    header("location:feedback_mid.php");
                    } else { 
                        // sleep(100);
                        header("location:postExp_questions.php");
                    }
                    // echo "NONONO";
                }
            }
        }

        ?>

        <form name="TLX1" method="post">
        <div class="task" id="normalTask">Task complete</div>
        <h2>Answer the questions below based on the task you just completed on a scale of 1 to 20 <br>(1 being Very Low and 20 being Very High).</h2>

        <br>

            <!-- <h3>Please answer the following questions </h3> -->
            <b>A. How mentally demanding was the task?</b><br><br>
            <input type="range" min="1" max="20" step="1" value="10" class="slider" id="TLX_Q1" name="TLX_Q1" oninput="showValue(this,'1');" />
            Value: <span id="1">10</span>
            <br><br>
            <br>
            <b>B. How physically demanding was the task?</b><br><br>
            <!-- <input type="range" min="1" max="20" step="1" value="10" class="slider" id="TLX_Q2" name="TLX_Q2"/> -->
            <input type="range" min="1" max="20" step="1" value="10" class="slider" id="TLX_Q2" name="TLX_Q2" oninput="showValue(this,'2');">
            Value: <span id="2">10</span>
            <br><br>
            <br>
            <b>C. How rushed or hurried was the pace of the task?</b><br><br>
            <input type="range" min="1" max="20" step="1" value="10" class="slider" id="TLX_Q3" name="TLX_Q3" oninput="showValue(this,'3');" />
            Value: <span id="3">10</span>
            <br>
            <br><br>
            <b>D. How successful were you in accomplishing what you were asked to do?</b><br><br>
            <input type="range" min="1" max="20" step="1" value="10" class="slider" id="TLX_Q4" name="TLX_Q4" oninput="showValue(this,'4');" />
            Value: <span id="4">10</span>
            <br><br>
            <br>
            <b>E. How hard did you have to work – physically and mentally – to accomplish your level of performance?</b><br><br>
            <input type="range" min="1" max="20" step="1" value="10" class="slider" id="TLX_Q5" name="TLX_Q5" oninput="showValue(this,'5');" />
            Value: <span id="5">10</span>
            <br>
            <br><br>
            <b>F. How insecure, discouraged, stressed and annoyed were you during the task?</b><br><br>
            <input type="range" min="1" max="20" step="1" value="10" class="slider" id="TLX_Q6" name="TLX_Q6" oninput="showValue(this,'6');" />
            Value: <span id="6">10</span>
            <br>
            <br><br>

            <input type="submit" name="submitTLX" value="Submit"> 
            <!-- <div class='error' id='finalQUes'>Submitting...Taking you to the final questionnaire.</div> -->
        </form>
        <br>
        <br>
        <br>
        <br>
    </div>
    <!-- <script>
        document.oncopy = $('#finalQUes').hide();
    </script> -->
        <!-- <a href="task0.php">After you submit, take a 2 minute break and click here to start the next round.</a> -->
</body>

</html>