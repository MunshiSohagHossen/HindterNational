<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
// select logged in users detail
$res = $conn->query("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Hello,<?php echo $userRow['email']; ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/index.css" type="text/css"/>
</head>
<body>

<!-- Navigation Bar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Hindternational</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
               
                <li><a href="Visa_Guide.html">Visa Guide</a></li>
                <li><a href="#">Emergency</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span
                            class="glyphicon glyphicon-user"></span>&nbsp;Logged
                        in: <?php echo $userRow['email']; ?>
                        &nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>




<div class="container">
   
	
	
    <div class="jumbotron">
        <h1>Hello, <?php echo $userRow['username']; ?></h1>
        <p>You are most welcome to use this web services created by international students of Marwadi Engineering college for all international students in India to various institutions </p>
        <p><a class="btn btn-primary btn-lg" href="" role="button">Hindternational</a></p>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2>To design and develop a website which will allow all the international students who  is doing study in India to register and then provide them  one platform where they can communicate with all other registered international students in India and get a lot of dynamic ,Transparent ,well-arranged & completely free services. The services including like – Emergency help , Accessing Visa Help Resource , Accessing Edu-Resources ,Taking the Advantage of Book donation ,Joining in Live Lecture with own mother tongue ,Accessing food and Restaurant Review data of India which  submitted by International students on this website and a lot of amazing features which will really help an international student too much.


In short through this web services We will support all the international students in India  and make a community for a better network among international students to enhance their skill , security and help to insure a better future . 
</h2>
           
		   
		   
		 

        </div>


    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
