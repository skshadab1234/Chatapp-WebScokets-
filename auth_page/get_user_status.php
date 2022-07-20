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
            if($row['typing_opponent_status'] > 0){
                $arr = array('data'=>'Typing');
                mysqli_query($conn,"update users set typing_opponent_status='0' WHERE id = ".$user['id']."");
            }else{
                $arr = array('data'=>'Online');
                mysqli_query($conn,"update users set typing_opponent_status='0' WHERE id = ".$user['id']."");
            }
        }else{
            $arr = array('data'=>"Last Seen: ".date('h:i A', $strtotime));
            
        }
    }else{
        
        $arr = array('data'=>"Last Seen: ".date('h:i A', $strtotime));
    }

    echo json_encode($arr);
}


else if(isset($_POST['opponentId']) && $_POST['opponentId'] > 0){
    $oppenent_Id = $_POST['opponentId'];
    mysqli_query($conn,"update users set typing_opponent_status='$oppenent_Id' WHERE id = ".$user['id']."");
    
}