<?php
$qry="";
if(isset($_GET['uid']) && $_GET['uid']!=""){
    if(isset($_GET['del'])  && $_GET['del']==true){
        $qry = "UPDATE users SET status = 0 WHERE id=".$_GET['uid'];
    }else if(isset($_GET['rev']) && $_GET['rev']==true){
        $qry = "UPDATE users SET status = 1 WHERE id=".$_GET['uid'];
    }
}
if($qry!=""){
    require_once("../dbconnect.php");
    $con->query($qry);
    require_once("../dbclose.php");
}
header("Location: ../users.php");
?>