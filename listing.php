<?php

    include("dbfunctions.php");
    include("lolokaldb.php");

    error_reporting(0);
    
    if (isset($_POST['list'])) {
        
        $product_id = random_num(20);
        $product_name = $_POST['productname'];
        $category = $_POST['category'];
        $product_condition = $_POST['condition'];
        $payment = $_POST['payment'];
        $transport = $_POST['transport'];
        $product_price = $_POST['price'];
        $brand = $_POST['brand'];
        $description = $_POST['description'];
        $seller = $_POST['seller'];
        $filename = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "./Products/" . $filename;
    
        $query = "INSERT INTO listings(product_id, product_name, category, product_condition, payment, transport, product_price, brand, description, img_dir, seller) 
        VALUES('$product_id', '$product_name', '$category', '$product_condition', '$payment', '$transport', '$product_price', '$brand', '$description', '$filename', '$seller')";
    
        mysqli_query($conn, $query);
    
        if (move_uploaded_file($tempname, $folder)) {
            header("Location: ListingSuccess.php");
        } else {
            header("Location: SellPage.html?=error");
        }
    }

?>