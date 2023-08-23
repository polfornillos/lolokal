<?php
    function check_login($conn)
    {
        $query = "select username from users limit 1";
        $result = mysqli_query($conn, $query);

        $singleRow = mysqli_fetch_row($result);

        return $singleRow;
    }

    function random_num($length)
    {

        $text="";

        if($length < 5){
            $length = 5;
        }
        $len = rand(4,$length);

        for($i = 0; $i < $len; $i++){
            $text .=rand(0,9);
        }

        return $text;
    }
?>