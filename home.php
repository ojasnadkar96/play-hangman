<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysqli_query($con,"SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['user_email']; ?></title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<style>
body{
		background:url('stardust.png');
		background-size:100%;	
		}
	
</style>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">HANGMAN</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
		<li><a href="about.php">ABOUT</a></li>
      <li><a href="logout.php?logout"><span class="glyphicon glyphicon-user"></span>LOGOUT</a></li>
    </ul>
  </div>
</nav>
<h1 style="color:#ffffff;">
Welcome, <?php echo $userRow['user_name']; ?>!
</h1>
<div class="page-header">
  <p style="font-size:5em;color:#ffffff;text-align:center;">CATEGORIES</p>
</div>

<div class="container">         
  <div class="row">
    <div class="col-md-4">
      <a href="game_count.php" class="thumbnail">
        <img src="2v.png" alt="COUNTRIES" style="width:150px;height:150px">
      </a>
	  <p style="text-align:center;font-size:16pt;color:#ffffff;">countries</p>
    </div>
    <div class="col-md-4">
      <a href="game_vocab.php" class="thumbnail">
        <img src="1v.png" alt="VOCABULARY" style="width:150px;height:150px">
      </a>
	  <p style="text-align:center;font-size:16pt;color:#ffffff;">vocabulary</p>
    </div>
    <div class="col-md-4">
      <a href="game_pkmn.php" class="thumbnail">
        <img src="3v.png" alt="POKEMON" style="width:150px;height:150px">
      </a>
	  <p style="text-align:center;font-size:16pt;color:#ffffff;">pokemon</p>
    </div>
  </div>
</div>
</body>
</html>