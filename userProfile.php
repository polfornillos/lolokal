<?php
    session_start();
    include("lolokaldb.php");
?>
<html>
    <head>
        <title>About</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/fcba06baee.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="userProfile_Style.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
        </style>
        <script src="userProfile_JS.js"></script>       
    </head>

    <body>
        <nav>
            <div id ="logo">
                <a id="lolokalLogo" href="index.php" style="text-decoration:none">LO<span>LOKAL</span></a> 
            </div>
            
            <div class="nav-area">
                
                <div class="nav-bar">
                    <input id="search-bar" type="text" placeholder="Search for anything">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
                
                <div class="nav-bar">
                    <li><a href="#">HI,<span id="span-user"> USER</span></a></li>
                    <li><a id="sell" href="#">SELL</a></li>  
                </div>
                
            </div>
        </nav>
       
        <div id="user">
            <div id = "userBody"></div>
            <div id = "userHeader">
                <div id="bg-img"></div>
                <div id =circle><i id="userprofile" class="fa-solid fa-user fa-7x"></i></div>
            </div>
            <div id = "userDetails">
                <div id="userNames">
                    <?php
                        
                        $query = "select * from users where fullname ='".$_POST['fullname']."'";
                        $result = mysqli_query($conn, $query);

                        while($data = mysqli_fetch_assoc($result)){
                    ?>
                    <p id="username"><?php echo $data['fullname'];?></p>
                    <p>@<?php echo $data['username'];?></p>
                    <p><?php echo $data['email'];?></p>
                </div>
                    <?php
                            }
                    ?>
                
                <div id="listings">
                    <p>LISTINGS</p>
                    <button class="dropbtn"><div class="triangle-down"></div></button>
                    <div class="listings-nav">
                        <input id="listings-search-bar" type="text" placeholder="Search for anything">
                        <div class="item">
                            <?php
                                $query = "select * from listings where seller='".$_POST['fullname']."'";
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
            
        </div>
    </body>
</html>
