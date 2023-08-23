<?php
    session_start();
    include("lolokaldb.php");
?>

<html>
<head>
	<title>Product Listed</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/fcba06baee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="ListingSuccessStyle.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
    </style>
    <script type="text/javascript">
        var dropbtn = document.getElementById("dropbtnuser");
        function myFunction() 
        {
        document.getElementById("myDropdown").classList.toggle("show");
        }
        window.click = function(event) {
            if (!event.target.matches('.hi-user')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
                }
            }
            }
        }
    </script>
</head>
<body>
<nav>
		<div id ="logo">
			<a id="lolokalLogo" href="index.php">LO<span>LOKAL</span></a>    
		</div>
		
		<div class="nav-area"> 
			<div class="nav-bar">
				<input id="search-bar" type="text" placeholder="Search for anything">
				<button type="submit" id="searchBtn"><i class="fa fa-search"></i></button>
			</div>
			
			<div class="nav-bar">
				<li></li>
				<li><a href="#">HOME</a></li>
				<li><div class="dropdown">
					<button onclick="myFunction()" class="dropbtnuser"><a href="#" class="hi-user">HI,<span id="span-user" class="hi-user"> USER</span></a></button>
					<div id="myDropdown" class="dropdown-content">
					  <a href="#" id="profileBtn">Profile</a>
					  <a href="#" id="signOutBtn">Signout</a>
					</div>
				</div> 
				</li>
				<li ><a id="sell" href="#" onclick="successform()">SELL</a></li >  
			</div>
		</div>
	</nav>
    <div id="productPageBody">
        <?php
            $query = "select * from listings order by id desc limit 1";
            $result = mysqli_query($conn, $query);

            while($data = mysqli_fetch_assoc($result)){
        ?>
        <form action="ProductPage.php" method="post">
            <h1>You have Successfully Listed your Item!</h1>
            <button class="btn" type="submit" name="product_name" value="<?php echo $data['product_name']; ?>">Continue</button>
            <button class="btn" type="button" onClick="document.location.href='index.php'">Go Home</button>
        </form>
        <?php
            }
        ?>
    </div>
</body>
</html>