<?php

include 'session.php';

 // Time Taken
$time=time()+10;
$res=mysqli_query($conn,"update users set last_login=$time where id=".$user['id']."");
