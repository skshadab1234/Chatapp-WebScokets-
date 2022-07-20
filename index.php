<?php
    include "auth_page/session.php";

    if(!isset($_SESSION['id'])) {
        header("location: auth_page/index.php");
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Chat</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="https://themesbrand.com/chatvia/layouts/assets/images/favicon.ico">

        <!-- magnific-popup css -->
        <link href="https://themesbrand.com/chatvia/layouts/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />

        <!-- owl.carousel css -->
        <link rel="stylesheet" href="https://themesbrand.com/chatvia/layouts/assets/libs/owl.carousel/assets/owl.carousel.min.css">

        <link rel="stylesheet" href="https://themesbrand.com/chatvia/layouts/assets/libs/owl.carousel/assets/owl.theme.default.min.css">

        <!-- Bootstrap Css -->
        <link href="https://themesbrand.com/chatvia/layouts/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="https://themesbrand.com/chatvia/layouts/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="https://themesbrand.com/chatvia/layouts/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
        <style>
           ::-webkit-scrollbar-track
            {
                border-radius: 10px;
                background-color: var(--bs-card-bg);
            }

           ::-webkit-scrollbar
            {
                width: 12px;
                background-color: var(--bs-card-bg);
            }

           ::-webkit-scrollbar-thumb
            {
                border-radius: 10px;
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
                background-color: #7269EF;
            }
            .chat-conversation{
                height: calc(100vh - 170px)!important;
            }
            .check_mark{
                font-size: 16px;
                position: relative;
                top: 4px;
                left: 9px;
            }
        </style>

    </head>

    <body data-layout-mode="dark" style="overflow:hidden">
        <div class="layout-wrapper d-lg-flex">
            <!-- Start left sidebar-menu -->
            <div class="side-menu flex-lg-column me-lg-1 ms-lg-0">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.php" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="https://themesbrand.com/chatvia/layouts/assets/images/logo.svg" alt="" height="30">
                        </span>
                    </a>

                    <a href="index.php" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="https://themesbrand.com/chatvia/layouts/assets/images/logo.svg" alt="" height="30">
                        </span>
                    </a>
                </div>
                <!-- end navbar-brand-box -->

                <!-- Start side-menu nav -->
                <div class="flex-lg-column my-auto">
                    <ul class="nav nav-pills side-menu-nav justify-content-center" role="tablist">
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Profile">
                            <a class="nav-link" id="pills-user-tab" data-bs-toggle="pill" href="#pills-user" role="tab">
                                <i class="ri-user-2-line"></i>
                            </a>
                        </li>
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Chats">
                            <a class="nav-link active" id="pills-chat-tab" data-bs-toggle="pill" href="#pills-chat" role="tab">
                                <i class="ri-message-3-line"></i>
                            </a>
                        </li>
                        
                        <li class="nav-item  d-inline-block d-lg-none">
                            <a class="nav-link light-dark-mode" href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" title="Dark / Light Mode">
                                <i class='ri-sun-line theme-mode-icon'></i>
                            </a>
                        </li>

                      
                        <li class="nav-item dropdown profile-user-dropdown d-inline-block d-lg-none">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= $user_img ?>" alt="" class="profile-user rounded-circle">
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="auth_page/logout.php">Log out <i class="ri-logout-circle-r-line float-end text-muted"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- end side-menu nav -->

                <div class="flex-lg-column d-none d-lg-block">
                    <ul class="nav side-menu-nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link light-dark-mode" href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" title="Dark / Light Mode">
                                <i class='ri-sun-line theme-mode-icon'></i>
                            </a>
                        </li>

                        <li class="nav-item btn-group dropup profile-user-dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= $user_img ?>" alt="" class="profile-user rounded-circle">
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="auth_page/logout.php">Log out <i class="ri-logout-circle-r-line float-end text-muted"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Side menu user -->
            </div>
            <!-- end left sidebar-menu -->

            <!-- start chat-leftsidebar -->
            <div class="chat-leftsidebar me-lg-1 ms-lg-0">

                <div class="tab-content">
                    <!-- Start Profile tab-pane -->
                    <div class="tab-pane" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
                        <!-- Start profile content -->
                        <div>
                            <div class="px-4 pt-4">
                                <div class="user-chat-nav float-end">
                                    <div class="dropdown">
                                        <a href="#" class="font-size-18 text-muted dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ri-more-2-fill"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Another action</a>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mb-0">My Profile</h4>
                            </div>

                            <div class="text-center p-4 border-bottom">
                                <div class="mb-4">
                                    <div class="chat-user-img align-self-center me-3 ms-0" style="justify-content: center;align-items: center;display: flex;">
                                        <div class="avatar-xs" style="height: 5.2rem;width: 5.2rem;">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary" style="font-size: 32px;text-transform: uppercase;">
                                                <?= substr($user['name'], 0, 1); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="font-size-16 mb-1 text-truncate"><?= $user['name'] ?></h5>
                                <p class="text-muted text-truncate mb-1"><i class="ri-record-circle-fill font-size-10 text-success me-1 ms-0 d-inline-block"></i> Active</p>
                            </div>
                            <!-- End profile user -->

                            <!-- Start user-profile-desc -->
                            <div class="p-4 user-profile-desc" data-simplebar>
                                <div id="tabprofile" class="accordion">
                                    <div class="accordion-item card border mb-2">
                                        <div class="accordion-header" id="about2">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#about" aria-expanded="true" aria-controls="about">
                                                <h5 class="font-size-14 m-0">
                                                    <i class="ri-user-2-line me-2 ms-0 ms-0 align-middle d-inline-block"></i> About
                                                </h5>
                                            </button>
                                        </div>
                                        <div id="about" class="accordion-collapse collapse show" aria-labelledby="about2" data-bs-parent="#tabprofile">
                                            <div class="accordion-body">
                                                <div>
                                                    <p class="text-muted mb-1">Name</p>
                                                    <h5 class="font-size-14"><?= $user['name'] ?></h5>
                                                </div>

                                                <div class="mt-4">
                                                    <p class="text-muted mb-1">Email</p>
                                                    <h5 class="font-size-14"><?= $user['email'] ?></h5>
                                                </div>

                                                <div class="mt-4">
                                                    <p class="text-muted mb-1">Time</p>
                                                    <h5 class="font-size-14"><?= date('d M Y, h:i A', strtotime($user['last_login'])) ?></h5>
                                                </div>

                                                <div class="mt-4">
                                                    <p class="text-muted mb-1">Location</p>
                                                    <h5 class="font-size-14 mb-0"><?= $user['location'] ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End About card -->

                                </div>
                                <!-- end profile-user-accordion -->

                            </div>
                            <!-- end user-profile-desc -->
                        </div>
                        <!-- End profile content -->
                    </div>
                    <!-- End Profile tab-pane -->

                    <!-- Start chats tab-pane -->
                    <div class="tab-pane fade show active" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
                        <!-- Start chats content -->
                        <div>
                            <div class="px-4 pt-4">
                                <h4 class="mb-4">Chats (<?= $user['name'] ?>)</h4>
                                <div class="search-box chat-search-box">            
                                    <div class="input-group mb-3 rounded-3">
                                        <span class="input-group-text text-muted bg-light pe-1 ps-3" id="basic-addon1">
                                            <i class="ri-search-line search-icon font-size-18"></i>
                                        </span>
                                        <input type="text" class="form-control bg-light" placeholder="Search messages or users" aria-label="Search messages or users" aria-describedby="basic-addon1">
                                    </div> 
                                </div> <!-- Search Box-->
                            </div> <!-- .p-4 -->
    
                            <!-- Start chat-message-list -->
                            <div>
                                <h5 class="mb-3 px-3 font-size-16">Recent</h5>

                                <div class="chat-message-list px-2" data-simplebar>
            
                                    <ul class="list-unstyled chat-list chat-user-list">
                                       Loading...
    
                                    </ul>
                                </div>
                            </div>
                            <!-- End chat-message-list -->
                        </div>
                        <!-- Start chats content -->
                    </div>
                    <!-- End chats tab-pane -->
                    
                </div>
                <!-- end tab content -->

            </div>
            <!-- end chat-leftsidebar -->

            <!-- Start User chat -->
            <div class="user-chat w-100 overflow-hidden">
                <div class="d-lg-flex ">
                    
                    <!-- no chat selected  -->
                    <div class="container text-truncate font-size-15 mb-1" id="no_chat_selected" style="display: flex;justify-content: center;align-items: center;height: 100vh;">
                        <h5>Start a Chat with your friend</h5>
                    </div>                        

                    <!-- start chat conversation section -->
                    <div class="w-100 overflow-hidden position-relative d-none" id="start_chat">
                       
                    </div>
                    <!-- end chat conversation section -->
    
                    <!-- start User profile detail sidebar -->
                    <div class="user-profile-sidebar">
                       
                    </div>
                    <!-- end User profile detail sidebar -->
                </div>
            </div>
            <!-- End User chat -->

            <!-- audiocall Modal -->
            <div class="modal fade" id="audiocallModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center p-4">
                                <div class="avatar-lg mx-auto mb-4">
                                    <img src="https://themesbrand.com/chatvia/layouts/assets/images/users/avatar-4.jpg" alt="" class="img-thumbnail rounded-circle">
                                </div>

                                <h5 class="text-truncate">Doris Brown</h5>
                                <p class="text-muted">Start Audio Call</p>

                                <div class="mt-5">
                                    <ul class="list-inline mb-1">
                                        <li class="list-inline-item px-2 me-2 ms-0">
                                            <button type="button" class="btn btn-danger avatar-sm rounded-circle" data-bs-dismiss="modal">
                                                <span class="avatar-title bg-transparent font-size-20">
                                                    <i class="ri-close-fill"></i>
                                                </span>
                                            </button>
                                        </li>
                                        <li class="list-inline-item px-2">
                                            <button type="button" class="btn btn-success avatar-sm rounded-circle">
                                                <span class="avatar-title bg-transparent font-size-20">
                                                    <i class="ri-phone-fill"></i>
                                                </span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <!-- audiocall Modal -->

            <!-- videocall Modal -->
            <div class="modal fade" id="videocallModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center p-4">
                                <div class="avatar-lg mx-auto mb-4">
                                    <img src="https://themesbrand.com/chatvia/layouts/assets/images/users/avatar-4.jpg" alt="" class="img-thumbnail rounded-circle">
                                </div>

                                <h5 class="text-truncate">Doris Brown</h5>
                                <p class="text-muted mb-0">Start Video Call</p>

                                <div class="mt-5">
                                    <ul class="list-inline mb-1">
                                        <li class="list-inline-item px-2 me-2 ms-0">
                                            <button type="button" class="btn btn-danger avatar-sm rounded-circle" data-bs-dismiss="modal">
                                                <span class="avatar-title bg-transparent font-size-20">
                                                    <i class="ri-close-fill"></i>
                                                </span>
                                            </button>
                                        </li>
                                        <li class="list-inline-item px-2">
                                            <button type="button" class="btn btn-success avatar-sm rounded-circle">
                                                <span class="avatar-title bg-transparent font-size-20">
                                                    <i class="ri-vidicon-fill"></i>
                                                </span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
        </div>
        <!-- end  layout wrapper -->

        <!-- JAVASCRIPT -->
        <script src="https://themesbrand.com/chatvia/layouts/assets/libs/jquery/jquery.min.js"></script>
        <script src="https://themesbrand.com/chatvia/layouts/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://themesbrand.com/chatvia/layouts/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="https://themesbrand.com/chatvia/layouts/assets/libs/node-waves/waves.min.js"></script>

        <!-- Magnific Popup-->
        <script src="https://themesbrand.com/chatvia/layouts/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- owl.carousel js -->
        <script src="https://themesbrand.com/chatvia/layouts/assets/libs/owl.carousel/owl.carousel.min.js"></script>

        <!-- page init -->
        <script src="https://themesbrand.com/chatvia/layouts/assets/js/pages/index.init.js"></script>

        <script src="https://themesbrand.com/chatvia/layouts/assets/js/app.js"></script>

        
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://momentjs.com/downloads/moment.js"></script>
        <script>
            var conn = new WebSocket('ws://localhost:8080');
            conn.onopen = function(e) {
                console.log("Connection established!");
            };
            
            function updateUserStatus(){
                jQuery.ajax({
                    url:'auth_page/update_user_status.php',
                    success:function(result){
                        
                    }
                });
            }
            
            setInterval(function(){
                updateUserStatus();
            },3000);
        </script>
        <script src="script.js"></script>
    </body>
</html>

