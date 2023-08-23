<?php
    session_start();
    include("lolokaldb.php");
    include("dbfunctions.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/fcba06baee.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="homePage_Style.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
        </style>
        <script src="homeJS.js"></script>       
    </head>

    <body>
        <nav>
            <div id ="logo">    
                <a id="lolokalLogo" href="LoginPage.html" style="text-decoration:none">LO<span>LOKAL</span></a>  
            </div>
            
            <div class="nav-area">
                
                <div class="nav-bar">
                    <input id="search-bar" type="text" placeholder="Search for anything">
                    <button type="submit" id="searchBtn"><i class="fa fa-search"></i></button>
                </div>
                
                <div class="nav-bar">
                    <?php
                    
                        $query = "select * from users order by id desc limit 1";
                        $result = mysqli_query($conn, $query);

                        while($data = mysqli_fetch_assoc($result)){
                    ?>

                    <form action='userProfile.php' method='post'>
                        <li><button id="profilebtn" name="fullname" type="submit" value="<?php echo $data['fullname'];?>">HI,<span id="span-user"> <?php echo $data['fullname'];?></span></button></li>
                    </form>
                    <?php
                        }
                    ?>
                    
                    <li><a id="sell" href="SellPage.html">SELL</a></li>  
                </div>
            </div>
        </nav>
       
        <div id="home">
           <div id = "top">
               <div id = topContent>
                <h1 class = "textMotto">SUPPORT YOUR LOCAL </h1>
                <h1 class = "textMotto"><span>BRANDS</span> AND <span>PRODUCTS</span></h1>
                <p class = "textMottoDesc">Give love to your local brands and products. We want to </p>
                <p class = "textMottoDesc">help our local products shine, so shop with us now</p> 
                <input type="button" id="shopBtn" value="SHOP" onclick="window.location.href='index.php'">
                <input type="button" id="sellBtn" value="SELL" onclick="window.location.href='SellPage.html'">  
               </div>
           </div>
            <div id="categories"> 
                <h1>CATEGORIES</h1>
                <div id ="categoriesContent">
                    <div id = "categ_art">
                        <div id ="artImg"></div>
                        <p>ART</p>
                    </div>
                    <div id = "categ_electronics">
                        <div id ="electronicsImg"></div>
                        <p>ELECTRONICS</p>
                    </div>
                    <div id = "categ_fashion">
                        <div id ="fashionImg"></div>
                        <p>FASHION</p>
                    </div>
                    <div id = "categ_furniture">
                        <div id ="furnitureImg"></div>
                        <p>FURNITURE</p>
                    </div>
                    <div id = "categ_tools">
                        <div id ="toolsImg"></div>
                        <p>TOOLS</p>
                    </div>
                </div>
            </div>

            <div id="featureProducts">
                <div id="listings-items-fp">
                    <div class="item">
                    <?php
                        $query = "select * from listings";
                        $result = mysqli_query($conn, $query);

                        while($data = mysqli_fetch_assoc($result)){
                    ?>
                        <div class="productList">
                            <form action="ProductPage.php" method="post">
                                <img class="productImg" src="Products/<?php echo $data['img_dir']; ?>">
                                <input class="productName" type="submit" name="product_name" value="<?php echo $data['product_name']; ?>">
                                <p id="item-price">PHP <?php echo $data['product_price'];  ?></p>
                            </form>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>
