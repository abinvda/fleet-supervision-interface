<?php 
include('header.php'); 


?>
<html>
<head>
<script>
 function disableSubmit() {
  document.getElementById("submit").disabled = true;
 }

  function activateButton(element) {

      if(element.checked) {
        document.getElementById("submit").disabled = false;
       }
       else  {
        document.getElementById("submit").disabled = true;
      }

  }
</script>
<style>
label {
        display: flex;
        align-items: center;
      }
    </style>
</head>

<body onload="disableSubmit()">
<div class="wraper">
<center><h3>Information and Consent Form</h3></center>

<b>Title of Study</b>: Effects of interruptions in screen-based robot supervision tasks
<br><br>
<b>Principal Investigator</b>: Stephen L. Smith,
<br>Department of Electrical and Computer Engineering, University of Waterloo, Canada
<br>Email: stephen.smith@uwaterloo.ca
<br><br>
<b>Student Investigator</b>: Abhinav Dahiya,
<br>Department of Electrical and Computer Engineering, University of Waterloo, Canada
<br>Email: abhinav.dahiya@uwaterloo.ca 
<br><br>
<b>Collaborator</b>: Oliver Schneider
<br>Department of Management Sciences, University of Waterloo, Canada
<br>Email: o2schnei@uwaterloo.ca
<br><br>

You are being invited to participate in a study conducted by Abhinav Dahiya, in collaboration with Oliver Schneider, and supervised by Stephen L. Smith. Before you agree to take part in this study, it is important that you read the information below. The information describes the purpose and procedure of the study, benefits to you and your right to withdraw at any time. You will need to understand this information before signing this form. You can also contact Abhinav Dahiya at abhinav.dahiya@uwaterloo.ca to make sure all your questions have been answered to your satisfaction. This study has been reviewed and received ethics clearance through a University of Waterloo Research Ethics Board (ORE#43628). If you have questions for the Board contact the Office of Research Ethics, at 1-519-888-4567 ext. 36005 or reb@uwaterloo.ca.
<br><br>

<b>Overview</b><br>
Any human workflow is susceptible to interruptions. These interruptions can originate from the environment or as thoughts or boredom. This research investigates the effects of different interruptions in a system where the user is supervising a number of remote robots via a computer screen. For this study, a web interface is developed in which the user mainly works on a robot monitoring task, trying to find if any robot needs assistance, while being asked to work on some secondary tasks. During the experiment, user's response rate, time taken to finish the tasks etc. are recorded for analysis. The findings from this study will contribute to a better understanding of remote robot supervision systems and help us make better interfaces to facilitate such supervision.
<br><br>

<b>Procedure</b><br>
In this study, we will conduct a web-based experiment where you will use a robot supervision interface through your computer. On the home web page, before starting the experiment, you will be asked demographic questions including age, gender and area of study/work.  This will be followed by instructions and a demo to help you understand and complete the experiment. During the experiment, you will be working on a robot monitoring task. During the monitoring task, you may also receive several notifications asking you to complete some side tasks. All of these tasks are to be completed one the web interface itself using keyboard and mouse.
There will be two rounds of experiments. After each round, you will be asked to answer a questionnaire about that round.


<br><br>

<b>Duration</b><br>
Participation in this study will require approximately 30 minutes. This time includes the time required to setup the experiment, the time required to run through all tasks and conditions, and the time to respond to the questionnaires.
<br><br>

<b>Confidentiality</b><br>
You will not be identified individually in any written reports of this research. However, your answers in open text form might be used as anonymous quotations. Your anonymized data may be shared in an online repository. Note that when information is transmitted over the internet, privacy cannot be entirely guaranteed. There is always a risk that your responses may be intercepted by a third party (e.g., government agencies, hackers). The de-identified data will be securely stored on a secure password-protected lab server with access only to the researchers and on their personal computer for analysis. Anonymized data may be published publicly in the future. Anonymized data will be stored for a minimum of 7 years.
<br><br>

<b>Risks</b><br>
There are no known or anticipated risks associated with participation in this study.
<br><br>

<b>Participation in this Study</b><br>
Your decision to take part in this research is voluntary. You do not have to answer any questions you do not want to answer. You may withdraw from this study at any time. If you wish to do so, please let us know  by email at abhinav.dahiya@uwaterloo.ca. In this case your data will be discarded and not be used in the study.
<br><br>

<b>Remuneration</b><br>
You will receive a Tim Hortons gift card worth 5 dollars.
<br><br>

<b>Benefits of the study</b><br>
Participation in this study may not provide any personal benefit to you. By participating in this study, you provide valuable data that will be useful to the academic community and the research team. We plan to publish the results of this study, and researchers in the field of human-robot interaction can potentially benefit from the findings. We hope that the outcomes of this experiment will pave the way for designing better robot supervision interfaces.

<br><br>

<b>Questions about the Study</b><br>
If you have additional questions right now, or would like any other information regarding this study at a later time, please contact Abhinav Dahiya at abhinav.dahiya@uwaterloo.ca. It will take approximately six months to complete the analysis of the data. If you are interested in obtaining the results of the study please let us know by email at abhinav.dahiya@uwaterloo.ca.
<br><br>

<center><h3>CONSENT TO PARTICIPATE</h3></center>
I agree to take part in a research study being conducted by Abhinav Dahiya, in collaboration with Oliver Schneider of Department of Management Sciences, and supervised by Stephen L. Smith of the Department of Electrical and Computer Engineering at the University of Waterloo. This includes participating in the experiment evaluating effects of different interruptions in a robot supervision task, agreeing to having the anonymized experimental data stored on a secure server for a minimum of 7 years, and permitting this information to be shared with the research community in a summarized/aggregated form, and as anonymized individual level data. 
I have made this decision based on the information I have read in the Information letter. All the procedures and any risks and benefits have been explained to me. I have had the opportunity to ask any questions and to receive any additional details I wanted about the study. 
This study has been reviewed and received ethics clearance through a University of Waterloo Research Ethics Board (ORE#43628). If I have questions for the Board, I can contact the Office of Research Ethics at 1-519-888-4567 ext. 36005 or reb@uwaterloo.ca. 
If I have any questions about the study, I can contact Abhinav Dahiya (abhinav.dahiya@uwaterloo.ca) or Stephen Smith (sl2smith@uwaterloo.ca)
I understand that I may withdraw from the study at any time without penalty  by telling the researcher.
I understand that by providing my consent to participate, I am not waiving my legal rights or releasing the investigator(s) or involved institution(s) from their legal and professional responsibilities.
A copy of this information can be obtained by emailing the research team at abhinav.dahiya@uwaterloo.ca
<br><br>
By selecting “I agree”, with full knowledge of all foregoing, I consent, of my own free will, to participate in this study. 
<br><br>
<label><input type="checkbox" name="terms" id="terms" onchange="activateButton(this)"> I Agree</label>
<br>
<form method="POST" action="intro.php">
  <input type="submit" name="submit" id="submit">
  <br>
  <br>
  <br>
  <br>
	</form>
</div>
</body>

</html>