<!DOCTYPE html>
<html>
	<link rel="stylesheet"  type="text/css" href="style.css">

<head>
	<title>My first Website</title>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name = "viewport" content="width=device-width, initial-sclae=1" />
	<link rel="stylesheet" type="text/css" href="reset.css">

<style type="text/css">


</style>


</head>
<body>

<nav>
<ul>
  	<li><a class="active" href="#home">Home</a></li>
  	<li><a href="#news">About</a></li>
  	<li><a href="#contact">Portfolio</a></li>
  	<li><a href="#about">Contact</a></li>
	</ul>
</nav>
	<div class="container">
		<div class="hero-image">
				<h1 class="main">My Website</h1>
		</div>
	
		<div class="text-block">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>

		</div>


	<div class ="protfolio-container">
		 <h4>PORTFOLIO</h4><br><br>
    
    <?php
    		include "testList.php";
    ?>
  <!--     <div>
        <img src="https://s33.postimg.org/ef8wnuddr/pot1.png" class="portfolio-img">
        <img src="https://s33.postimg.org/ef8wnuddr/pot1.png" class="portfolio-img">
      </div>
      <div>
        <img src="https://s33.postimg.org/ef8wnuddr/pot1.png" class="portfolio-img">
        <img src="https://s33.postimg.org/ef8wnuddr/pot1.png" class="portfolio-img">
      </div> -->
    
	</div>
	<div class="webcompiler-container">
<button id="myBtn">Online Compiler</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3>Code/Result</h3>
    <form action="testExcels.php" method="post"></form>
    <textarea id="" rows="40" cols="50"></textarea>
  <textarea id="" rows="40" cols="50"></textarea>
  <button>go Compile</button>
  </div>

</div>

	</div>
	
	<div class = "contact">
		
	</div>

	<div class="copyright">
		<p>Copyright 2018 by Owls</p>
	</div>
	
	</div>


</body>
</html>
<script type="text/javascript" src="index.js"></script>