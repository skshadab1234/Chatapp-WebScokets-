<?php

include 'session.php';

if(isset($_POST['id']) && $_POST['id'] > 0){
    $id = $_POST['id'];
    $time=time();
    $res=mysqli_query($conn,"select * from users where id = '$id'");

    $row=mysqli_fetch_assoc($res);
    $strtotime = $row['last_login'];

    if($strtotime > strtotime('today')){
        if($strtotime > $time) {
            echo "Online";
        }else{
            echo "Last Seen: ".date('h:i A', $strtotime);
        }
    }else{
        echo "Last Seen: ".date('d M, Y h:i A', $strtotime);
    }
}