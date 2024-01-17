<?php include('header.php'); 
error_reporting(0);
//echo 'ssssssssssss'.$_SESSION['activity'];
// if($_SESSION['activity']=='end')
// {
// header("location:concludes.php");	
// }

$_SESSION['task']='task2';  // Here we switch from one interruption type to another. TODO: Add an if condition that switches from previous task
	
	
$_SESSION["loginTime"] = time();
// $_SESSION['total_time']=500;


?>
<body>

<div class="wraper">
<h2>Experiment complete</h2>
<p>Dear Participant,<br><br>
We would like to thank you for your participation in this study titled Effects of interruptions in screen-based robot supervision tasks. As a reminder, the purpose of this study was to evaluate the impact of different types of interruptions in a robot supervision task.
<br>
<br>
The data collected during the study will contribute to a better understanding of how to set up such remote robot supervision systems. The results of the data analysis may be used in different fields related to human-robot interaction, such as providing better strategies for workload and attention management of human users.
<br>
<br>

Please remember that your individual level data will be anonymized. All data will be encrypted and not accessible to anyone outside of the research team. Once all the data are collected and analyzed for this project, I plan on sharing this information with the research community through seminars, conferences, presentations, and journal articles. If you are interested in receiving more information regarding the results of this study, or would like a summary of the results, please provide your email address, and when the study is completed (anticipated by December 2021) I will send you the information.
<br><br>

As with all University of Waterloo projects involving human participants, this study has been reviewed and has received ethics clearance through a University of Waterloo Research Ethics Board. If you have questions for the Board, please contact the Office of Research Ethics at 1-519-888-4567 ext. 36005 or reb@uwaterloo.ca. In the meantime, if you have any questions about the study, please do not hesitate to contact me by email as noted below.
<br>
<br>


Prof. Stephen L. Smith<br>
Graduate Supervisor<br>
University of Waterloo<br>
Department of Electrical and Computer Engineering<br>
sl2smith@uwaterloo.ca 

</p>
<a href="concludes.php">Go to next page.</a>
</body>
</html>