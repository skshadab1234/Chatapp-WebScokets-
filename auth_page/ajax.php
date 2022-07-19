<?php
    include 'session.php';
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];

        $Sql = "Select * from users where email ='$email'";
        $res = mysqli_query($conn,$Sql);
        
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION['id'] = $row['id'];
            $arr = array("status" => 'error', 'message' => 'Already Exists');
        }else {
            $Sql = 'INSERT into users (email,password,name) VALUES("'.$email.'","'.$password.'","'.$name.'")';
            mysqli_query($conn,$Sql);
            $arr = array("status" => 'success', 'message' => 'Registered Successfully');
        }

        echo  json_encode($arr);
    }

    elseif (isset($_POST['Login_email']) && isset($_POST['login_password'])) {
        $Login_email = $_POST['Login_email'];
        $login_password = $_POST['login_password'];

        $Sql = "Select * from users where email ='$Login_email' && password = '$login_password'";
        $res = mysqli_query($conn,$Sql);
        
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION['id'] = $row['id'];
            $arr = array("status" => 'success', 'message' => 'Logged Successfully');
        }else {
            $arr = array("status" => 'error', 'message' => 'Check email or password');
        }
        echo  json_encode($arr);
    }

    // Chat Box
    else if (isset($_POST['email']) && isset($_POST['id']) && isset($_POST['name']) && isset($_POST['getselectedData'])) {
        ?>
        
         <div class="p-3  border-bottom user-chat-topbar">
            <div class="row align-items-center">
                <div class="col-sm-4 col-8">
                    <div class="d-flex align-items-center">
                        <div class="d-block d-lg-none me-2 ms-0">
                            <a href="javascript: void(0);" class="user-chat-remove text-muted font-size-16 p-2"><i class="ri-arrow-left-s-line"></i></a>
                        </div>
                        <div class="me-3 ms-0">
                            <div class="chat-user-img align-self-center me-3 ms-0">
                                <div class="avatar-xs">
                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        <?= substr($_POST['name'], 0, 1); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden" style="position: relative;top: 8px;" onclick="getProfile('<?= $_POST['id'] ?>','<?= $_POST['name'] ?>','<?= $_POST['email'] ?>','<?= $_POST['time'] ?>','<?= $_POST['location'] ?>', 'getProfile')">
                            <h5 class="font-size-16 mb-0 text-truncate"><a href="#" class="text-reset user-profile-show"><?= $_POST['name'] ?></a> <i class="ri-record-circle-fill font-size-10 text-success d-inline-block ms-1"></i></h5>
                            <p id="last_seen_status<?= $_POST['id'] ?>"></p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-8 col-4">
                    <ul class="list-inline user-chat-nav text-end mb-0">                                        
                        <li class="list-inline-item">
                            <div class="dropdown">
                                <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-search-line"></i>
                                </button>
                                <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-md">
                                    <div class="search-box p-2">
                                        <input type="text" class="form-control bg-light border-0" placeholder="Search..">
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>                                    
                </div>
            </div>
        </div>
        <!-- end chat user head -->

        <!-- start chat conversation -->
        <div class="chat-conversation p-3 p-lg-4" style="overflow-y:auto">
            <ul class="list-unstyled mb-0" id="chat_screen_section<?= $_POST['id'].$user['id'] ?>">
                <?php
                    $update_seen_message_sql = "UPDATE `chats` SET `read_receipt`= 1 WHERE `message_from` = ".$_POST['id']." and `message_to` = ".$user['id']."";
                    mysqli_query($conn,$update_seen_message_sql);
                    $update_seen_message_receive_sql = "UPDATE `chats` SET `read_receipt`= 1 WHERE `message_from` = ".$user['id']." and `message_to` = ".$_POST['id']."";
                    mysqli_query($conn,$update_seen_message_receive_sql);
                    
                    $res = mysqli_query($conn, "SELECT * FROM chats WHERE `message_from` = ".$user['id']." && `message_to` = ".$_POST['id']." UNION SELECT * FROM chats WHERE `message_from` = ".$_POST['id']." && `message_to` = ".$user['id']." ORDER BY id ASC");
                    if(mysqli_num_rows($res) > 0) {    
                        foreach ($res as $key => $value) {
                            // echo "<pre>";
                            // print_r($value);
                            if($value['message_from'] == $user['id']) {
                                $direction_msg =  'right';
                                $mssageByName = $user['name'];
                                $check_mark = '<i class="ri-check-line check_mark"></i>';
                            }else{
                                $direction_msg = '';
                                $mssageByName = $_POST['name'];
                                $check_mark = '';
                            }

                            if(strtotime(date("Y-m-d H:i:sP", strtotime($value['send_time']))) > strtotime('today')){
                                $send_time = date("h:i A", strtotime($value['send_time']));
                            }else{
                                $send_time = formatTimeString($value['send_time']);
                            }
                            ?>
                            <li class="<?= $direction_msg ?>">
                                <div class="conversation-list">
                                    <div class="user-chat-content">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    <?= $value['mesage'] ?>
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i> <span class="align-middle"><?= $send_time ?> <?= $check_mark ?></span></p>
                                            </div>
                                                
                                        </div>
                                    </div>
                                </div>
                            </li> 
                            <?php
                        }
                    }
                    
                   
                ?>
            </ul>
        </div>
        <!-- end chat conversation end -->

        <!-- start chat input section -->
        <form action="#">
            <div class="chat-input-section p-3  border-top mb-0">
                <div class="row g-0">
                    <div class="col">
                        <input type="text" id="userChatMessage"  class="form-control form-control-lg bg-light border-light" placeholder="Enter Message...">
                    </div>
                    <div class="col-auto">
                        <div class="chat-input-links ms-md-2 me-md-0">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Emoji">
                                    <button type="button" class="btn btn-link text-decoration-none font-size-16 btn-lg waves-effect">
                                        <i class="ri-emotion-happy-line"></i>
                                    </button>
                                </li>
                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Attached File">  
                                    <button type="button" class="btn btn-link text-decoration-none font-size-16 btn-lg waves-effect">
                                        <i class="ri-attachment-line"></i>
                                    </button>
                                </li>
                                <li class="list-inline-item">
                                    <button type="submit" id="sendMessageBtn" onclick= "sendeMessage('<?= $user['id'] ?>','<?= $user['name'] ?>', '<?= $_POST['name'] ?>', '<?= $_POST['id'] ?>', '<?= date('Y-m-d H:i:s') ?>')" class="btn btn-primary font-size-16 btn-lg chat-send waves-effect waves-light">
                                        <i class="ri-send-plane-2-fill"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
        <!-- end chat input section -->

        <script>
            // Visible Chat Box 
            jQuery(".chat-user-list li").click(() => {
                jQuery(".user-chat").css({"transform":"translateX(0)", "visibility": "visible"});
            })
            
            // Remove Chat Box 
            jQuery(".user-chat-remove").click(() => {
                jQuery(".user-chat").css({"transform":"translateX(100%)", "visibility": "hidden"});
                $(".chat-conversation").html('')
            })

            // User Profile Hide/ SHOW 
            jQuery(".user-profile-show").click(() => {
                jQuery(".user-profile-sidebar").css("display","block");
            })



            conn.onmessage = function(e) {
                var res = $.parseJSON(e.data);
                
                var html = '<li><div class="conversation-list"><div class="ctext-wrap"><div class="ctext-wrap-content"><p class="mb-0">'+res.message+'</p><p class="chat-time mb-0"><i class="ri-time-line align-middle"></i> <span class="align-middle">'+moment(new Date()).format('h:m A')+'</span></p></div></div></div></li>';

                $("#chat-user-message"+res.id+res.receiverId).html(res.message);
                if( $('#chat_screen_section'+res.id+res.receiverId).length ) 
                {
                    // Playing an Receive Audio 
                    const audio = new Audio("media/receive.mp3");
                    audio.play();
                    
                    $("#chat_screen_section"+res.id+res.receiverId).append(html);
                    $('.chat-conversation').animate({scrollTop: $('.chat-conversation').get(0).scrollHeight}, 1000);
                    
                }

            };

            
            function sendeMessage(id,name,reciverUser,receiverId, time) {
                $("#sendMessageBtn").attr("disabled", true);
                var message = jQuery("#userChatMessage").val();
                if(message != '') {
                    var content = {
                        message : message,
                        id : id,
                        name: name,
                        reciverUser: reciverUser,
                        receiverId : receiverId,
                        time : time
                    };

                    var html = '<li class="right"><div class="conversation-list"><div class="ctext-wrap"><div class="ctext-wrap-content"><p class="mb-0">'+message+'</p><p class="chat-time mb-0"><i class="ri-time-line align-middle"></i> <span class="align-middle">'+moment(new Date()).format('h:m A')+'</span> <i class="ri-check-line check_mark"></i> </p></div></div></div></li>';
                    
                    // Playing an Send Audio 
                    const audio = new Audio("media/send.mp3");
                    audio.play();

                    $("#chat_screen_section"+receiverId+id).append(html);
                    // alert("Rec id : "+receiverId);
                    $("#chat-user-message"+receiverId+id).html(message);

                    $('.chat-conversation').animate({scrollTop: $('.chat-conversation').get(0).scrollHeight}, 1000);

                    conn.send(JSON.stringify(content));
                    $("#sendMessageBtn").attr("disabled", false);
                    jQuery("#userChatMessage").val('');
                }else{
                    $("#sendMessageBtn").attr("disabled", false);
                }
              
            }

            // Last Seen Ajax Code 
            
            
            function getUserStatus(){
                jQuery.ajax({
                    url:'auth_page/get_user_status.php',
                    type: "post",
                    data: {
                        id : <?= $_POST['id'] ?>,
                    },
                    success:function(result){
                        jQuery('#last_seen_status'+<?= $_POST['id'] ?>).html(result);
                    }
                });
            }
            
            
            
            setInterval(function(){
                getUserStatus();
            },8000);
        </script>
        
        <script>
            function getProfile(id,name,email,time,location,getProfile){
                $.ajax({
                    url: 'auth_page/ajax.php',
                    type:'post',
                    data: {
                        id : id,
                        name: name,
                        email:email,
                        time:time,
                        location:location,
                        getProfile : getProfile
                    },
                    success: (res) => {
                        $(".user-profile-sidebar").html(res);
                    }
                })
            }
        </script>
        <?php
    }
    
    // Profile On Click Name
    else if (isset($_POST['email']) && isset($_POST['id']) && isset($_POST['name']) && isset($_POST['getProfile'])) {
        $id= $_POST['id'];
        $name= $_POST['name'];
        $email= $_POST['email'];
        $time= $_POST['time'];
        $location= $_POST['location'];

        $SQL = "SELECT * FROM users WHERE id = '$id'";
        $res = mysqli_query($conn,$SQL);
        $row = mysqli_fetch_assoc($res);

        ?>
        
        <div class="px-3 px-lg-4 pt-3 pt-lg-4">
            <div class="user-chat-nav text-end">
                <button type="button" class="btn nav-btn" id="user-profile-hide">
                    <i class="ri-close-line"></i>
                </button>
            </div>
        </div>

        <div class="text-center p-4 border-bottom">
            <div class="mb-4">
                <div class="chat-user-img align-self-center me-3 ms-0" style="justify-content: center;align-items: center;display: flex;">
                    <div class="avatar-xs" style="height: 5.2rem;width: 5.2rem;">
                        <span class="avatar-title rounded-circle bg-soft-primary text-primary" style="font-size: 32px;text-transform: uppercase;">
                            <?= substr($name, 0, 1); ?>
                        </span>
                    </div>
                </div>
            </div>

            <h5 class="font-size-16 mb-1 text-truncate"><?= $name ?></h5>
            <p class="text-muted text-truncate mb-1"><i class="ri-record-circle-fill font-size-10 text-success me-1 ms-0"></i> Active</p>
        </div>
        <!-- End profile user -->

        <!-- Start user-profile-desc -->
        <div class="p-4 user-profile-desc" data-simplebar>

            <div class="accordion" id="myprofile">

                <div class="accordion-item card border mb-2">
                    <div class="accordion-header" id="about3">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#aboutprofile" aria-expanded="true" aria-controls="aboutprofile">
                            <h5 class="font-size-14 m-0">
                                <i class="ri-user-2-line me-2 ms-0 align-middle d-inline-block"></i> About
                            </h5>
                        </button>
                    </div>
                    <div id="aboutprofile" class="accordion-collapse collapse show" aria-labelledby="about3" data-bs-parent="#myprofile">
                        <div class="accordion-body">
                            <div>
                                <p class="text-muted mb-1">Name</p>
                                <h5 class="font-size-14"><?= $name ?></h5>
                            </div>

                            <div class="mt-4">
                                <p class="text-muted mb-1">Email</p>
                                <h5 class="font-size-14"><?= $email ?></h5>
                            </div>

                            <div class="mt-4">
                                <p class="text-muted mb-1">Time</p>
                                <h5 class="font-size-14"><?= date('d M Y, h:i A', strtotime($time)) ?></h5>
                            </div>

                            <div class="mt-4">
                                <p class="text-muted mb-1">Location</p>
                                <h5 class="font-size-14 mb-0"><?= $location ?></h5>
                            </div>
                        </div>
                    </div>
                </div>

                
            <!-- end profile-user-accordion -->
        </div>
        <!-- end user-profile-desc -->
        
    <script>
            jQuery("#user-profile-hide").click(() => {
            jQuery(".user-profile-sidebar").css("display","none");
        })  
        function getProfile(id,name,email,time,location,getProfile){
            $.ajax({
                url: 'auth_page/ajax.php',
                type:'post',
                data: {
                    id : id,
                    name: name,
                    email:email,
                    time:time,
                    location:location,
                    getProfile : getProfile
                },
                success: (res) => {
                    $(".user-profile-sidebar").html(res);
                }
            })
        }
    </script>
        <?php
    }

    elseif (isset($_POST['userChatList_4121']) && $_POST['userChatList_4121'] == 'userChatList-4121') {
        
        $sql = 'SELECT * FROM users WHERE email != "'.$user['email'].'"';
        $res = mysqli_query($conn, $sql);

        foreach($res as $key => $row) {
            $chat_sql = "SELECT * FROM `chats` WHERE message_from = ".$row['id']." and message_to = ".$user['id']." union SELECT * FROM `chats` WHERE message_from = ".$user['id']." and  message_to = ".$row['id']." order by id DESC";
            $chat_res = mysqli_query($conn, $chat_sql);
            $chat_row = mysqli_fetch_assoc($chat_res);

            // Count No of Chat no read 
            $read_receipt = "SELECT COUNT(read_receipt) as rr FROM `chats` WHERE message_from = ".$row['id']." and message_to = ".$user['id']." and read_receipt = 0 ";
            $read_receipt_res = mysqli_query($conn, $read_receipt);
            $read_receipt_row = mysqli_fetch_assoc($read_receipt_res);
            
            $not_read = '';
            if($read_receipt_row['rr'] > 0 ){
                $not_read = $read_receipt_row['rr'];
            }
            ?>
            <script>
                 if( $('#chat_screen_section'+<?= $row['id'].$user['id'] ?>).length ) {
                     $(".chat-user-list li").removeClass("active");
                     $(".user_active_box"+<?= $row['id'] ?>).addClass('active');
                 }
            </script>
             <li class="user_active_box<?= $row['id'] ?>" onclick="OpenSelectedChat('<?= $row['id'] ?>', '<?= $row['email'] ?>', '<?= $row['name'] ?>', '<?= $row['last_login'] ?>', '<?= $row['location'] ?>')">
                <a href="#">
                    <div class="d-flex">
                        <div class="chat-user-img align-self-center me-3 ms-0">
                            <div class="avatar-xs">
                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                    <?= substr($row['name'], 0, 1); ?>
                                </span>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-truncate font-size-15 mb-1"><?= $row['name'] ?></h5>
                            <p class="chat-user-message text-truncate mb-0" id="chat-user-message<?= $row['id'].$user['id'] ?>"><?= $chat_row['mesage'] ?></p>
                        </div>
                        <div class="font-size-11"><?= formatTimeString($chat_row['send_time']) ?></div>
                        <div class="unread-message">
                            <span class="badge badge-soft-danger rounded-pill"><?= $not_read ?></span>
                        </div>
                    </div>                            
                </a>
            </li>
            <?php
        }
    }
    
?>

