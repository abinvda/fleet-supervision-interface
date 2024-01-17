<?php include('header.php'); 

if ($_SESSION['txtid'] == 'train' || $_SESSION['txtid'] == 'test'){
    session_unset();
    header('location:intro.php');
} else{
    session_unset();
    header('location:index.php');
}
?>