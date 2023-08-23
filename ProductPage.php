<?php
    session_start();
    include("lolokaldb.php");
    include("listing.php");
?>


<html>
<head>
	<title>Product</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/fcba06baee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="productPageStyle.css">
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
		<div id="productImage">
            <?php
                $query = "select * from listings where product_name = '".$_POST['product_name']."'";
                $result = mysqli_query($conn, $query);

                while($data = mysqli_fetch_assoc($result)){
            ?>
			    <img class="productImg" src="Products/<?php echo $data['img_dir']; ?>">

		</div>
        <div id="productDesc">
            <h1 class="productName"><?php echo $data['product_name']; ?></h1>
            <h2 class="productPrice">PHP <?php echo $data['product_price']; ?></h2>
            <p class="userReview">User Review</p>
            <h2 class="desc">Description</h2>
            <p class="brand">Brand: <?php echo $data['brand']; ?></p>
            <p class="condition">Condition: <?php echo $data['product_condition']; ?></p>
            <p class="itemDesc"><?php echo $data['description']; ?></p>
            <p class="seller">Seller: <?php echo $data['seller']; ?></p>
            <button class="btn" onclick="window.location.href='index.php'">Go Home</button>
            <form action="userProfile.php" method="post">
                    <button class="btn" type="submit" name="fullname" value="<?php echo $data['seller']; ?>">Contact Seller</button>
            </form>
            <?php
            }
            ?>
        </div>
	</div>
    
</body>
</html>