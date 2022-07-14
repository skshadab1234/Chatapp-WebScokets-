
    
    function OpenSelectedChat(id,email,name,time,location){
        $("#no_chat_selected").addClass('d-none');
        $("#start_chat").removeClass('d-none');

        $.ajax({
            url: 'auth/ajax.php',
            type:'post',
            data: {
                id : id,
                email : email,
                name : name,
                time: time,
                location: location,
                getselectedData : 'data'
            },
            success: (res) => {
                $("#start_chat").html(res);
                $(".chat-user-list li").removeClass("active");
                $(".user_active_box"+id).addClass('active');
                getProfile(id,name,email,time,location,getProfile);
                $('.chat-conversation').animate({scrollTop: $('.chat-conversation').get(0).scrollHeight}, 0);
            }
        })
    }

    $.ajax({
        url: 'auth/ajax.php',
        type:'post',
        data: {
            userChatList_4121 : 'userChatList-4121'
        },
        success: (res) => {
           $(".chat-user-list").html(res);
        }
    })




