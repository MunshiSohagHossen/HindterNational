<?php
$qry="";
if(isset($_GET['eid']) && $_GET['eid']!=""){
    if(isset($_GET['del'])  && $_GET['del']==true){
        $qry = "UPDATE events SET status = 0 WHERE id=".$_GET['eid'];
    }else if(isset($_GET['rev']) && $_GET['rev']==true){
        $qry = "UPDATE events SET status = 1 WHERE id=".$_GET['eid'];
    }
}
if($qry!=""){
    require_once("../dbconnect.php");
    $con->query($qry);
    require_once("../dbclose.php");
}
header("Location: ../events.php");
?>