<?php
    $sql = mysqli_connect('localhost','root','','mvdl');

        $url = $_POST['url'];
        $size = $_POST['size'];

        foreach($url as $key => $value){
            $query = "INSERT INTO link_data (url, size, status)VALUES('".$value."','".$size[$key]."','Active')";
            $result = mysqli_query($sql, $query);
        }
    
    ?>