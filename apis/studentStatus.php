<?php
$qry="";
if(isset($_GET['sid']) && $_GET['sid']!=""){
    if(isset($_GET['del'])  && $_GET['del']==true){
        $qry = "UPDATE students SET status = 0 WHERE id=".$_GET['sid'];
    }else if(isset($_GET['rev']) && $_GET['rev']==true){
        $qry = "UPDATE students SET status = 1 WHERE id=".$_GET['sid'];
    }
}
if($qry!=""){
    require_once("../dbconnect.php");
    $con->query($qry);
    require_once("../dbclose.php");
}
header("Location: ../students.php");
?>