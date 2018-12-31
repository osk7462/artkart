<!DOCTYPE html>
<?php
	$server = "localhost";
	$username = "osama_khan";
	$password = "";
	$database = "art_kart";
    $con = mysqli_connect($server, $username, $password, $database);
?>


<html>
	<head>
		<title>HOME</title>
			<link rel="stylesheet" href="css/font-awesome.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="style.css">
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
	<div class="container-fluid">
	<div class="navbar-header">
	<a href="" class="navbar-brand"><b>artkart</b></a>
	</div>
	<ul class="nav navbar-nav">
	
	
	</ul>
	<ul class="nav navbar-nav navbar-right">
	<li><a href="register/index.php">sign up or login</a></li>
	</ul>
	</div>
	</nav>
	<div class="container">
	<div class="row">
	<div class="jumbotron">
                      <h1><b>artkart</b></h1>
                      <p><b>Making money is art and working is art and good business is the best art</b></p>
      </div>
      
	<div class="container">
	<div class="row">
	 <div class="col-md-9" id="cars">

                <div class="row carousel-holder">
				<div class="row">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="itemp/22.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="itemp/landscape_12.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="itemp/KolkataCityScape2.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

	<br><br><br><br>
	
	<div class="container">
	<div class="row">
	<div class="row" id="contact">
    <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="jumbotron">
                            <h1>Contact Us</h1>
                            <p>Leave your details and we'll Contact you.</p>
                            <form action="#" method="post">
                                 <p>Name:      </p><input type="text" name="name"><br><br>
                                 <p>E-mail:    </p><input type="text" name="email"><br><br>
                                 <p>Message:   </p><input type="text" name="message"><br><br>
                                 <p>Phone no.: </p><input type="text" name="phno"><br><br>
                                 <input type="submit">
                                 </form>
            </div>
    </div>

  </div>

	
	
	
	<footer	class="navbar navbar-inverse navbar-fixed-bottom">
	<div class="container-fluid">
	<ul class="nav navbar-nav">
	<li><a href="#">Terms and conditions</a></li>
	<li><a href="#">About us</a></li>
	<li><a href="#">privacy</a></li>
	<li><a href="#">Return policy</a></li>
	</ul>
	</div>
	</footer>
	</body>
	
</html>
