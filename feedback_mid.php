<?php include('header.php');
error_reporting(0);
//echo 'ssssssssssss'.$_SESSION['activity'];
if ($_SESSION['activity'] == 'end') {
    header("location:concludes.php");
}

$id = $_SESSION['txtid'];
$qid = $_SESSION['condition'];

$_SESSION["loginTime"] = time();
$_SESSION['time_elapsed'] = 0; // in milliseconds
$_SESSION['nextNotifTime'] = rand(15000, 40000); // in milliseconds
// $_SESSION['total_time']=500;   // Time for next condition.

if ($_SESSION['condition'] <= 2) {
    $_SESSION['currentTaskNum'] += 1;
    $tasks = ['none', 'task1', 'task2'];
    $_SESSION['task'] = $tasks[$_SESSION['taskOrder'][$_SESSION['currentTaskNum']]];
    $_SESSION['condition'] = $_SESSION['condition'] + 1;
    if ($_SESSION['task'] == 'none'){
        $_SESSION['total_time'] = 120;	
        $_SESSION['nextNotifTime'] = 500000; // A lot of milliseconds
    } else {
        $_SESSION['total_time'] = 120;	
        $_SESSION['nextNotifTime'] = rand(15000, 40000); // in milliseconds
    }
    // if ($_SESSION['task'] == 'task1') {
    //     $_SESSION['task'] = 'task2';  // Here we switch from one interruption type to another (1 to 2 and 2 to 1)
    // } else {
    //     $_SESSION['task'] = 'task1';
    // }
}

?>

<body>

    <div class="center-screen">
        <p style="font-size: 24pt;">Task completed</p>

        <a style="font-size: 16pt;" href="task0.php">Take a deep breath and after a 1 minute break click here to start the next round.</a>
        <!-- <a style="font-size: 16pt;" onClick="startNextRount(1)">Take a 2 minute break and click here to start the next round.</a> -->
    </div>
    <div class="center-screen" id="display">

    </div>
    <script>
function CountDown(duration, display) {
            if (!isNaN(duration)) {
                var timer = duration, minutes, seconds;
                
              var interVal=  setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    $(display).html("<b>" + minutes + "m : " + seconds + "s" + "</b>");
                    if (--timer < 0) {
                        timer = timer + 1;
                        // timer = duration;
                    //    $('#display').empty();
                    //    clearInterval(interVal)
                    }
                    },1000);
            }
        }
    
        CountDown(60,$('#display'));
</script>

</body>

</html>
