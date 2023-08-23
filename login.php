<?php
    session_start();
    require_once 'lolokaldb.php';
    require_once 'register-inc.php';
?>
<html>
<head>
	<title>Login</title>
	<link href="login_style.css" type="text/css" rel="stylesheet"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&family=Poppins:wght@100;400;500;600;700&display=swap');
    </style>
</head>
<body>
    <div id="pageBody">
        <div id="page-ctnr">
            <div id ="logo">
                <p id="lolokalLogo">LO<span>LOKAL</span></p>
                <p id="tagline">Find Goods For You!<span> Sell Your Goods!</span></p>
                <input type="button" id="shopBtn" value="SHOP">
                <input type="button" id="sellBtn" value="SELL" onclick="window.location.href='SellPage.html'">
            </div>
            <div id="loginMenu">
                <p id="loginHeader">LOG IN</p>
                <form action="login-inc.php" method="post">
                    <input type="text" class="txtbox" id="email" name="name" placeholder="Username / Email"/><br/>
                    <input type="password" class="pwd" id="password" name="pwd" placeholder="Password"/><br/>
                    <button type="submit" id="loginBtn">LOG IN</button>
                </form>
                <a id="forgotPass" href="#pass">Forgot Password?</a>
                <p id="pageDiv">
                    <span>New to Lolokal?</span>
                </p>
            </div>
            <input type="button" id="signBtn" value="SIGN UP" onClick="document.location.href='RegisterPage.php'">   
        </div>
    </div>
</body>
</html>