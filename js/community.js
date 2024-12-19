$(document).on("click","#send_message",function(){
    var message = $("#message").val();
    var chat_frm_Data = new FormData();
    var chat_file_data = $('#chat_attach').prop('files')[0];

    if(message=="" && chat_file_data==null){
        alert('Please Type message Or attach somthing');
    }else{
        chat_frm_Data.append('type',"send_message");
        chat_frm_Data.append('chat_attach',chat_file_data);
        chat_frm_Data.append('chat_message',message);
        chat_frm_Data.append('chat_list',$("#chat_list").val());

        $.ajax({
            url : "inc/request.php",
            type: "post",
            dataType: "script",
            cache: false,
            contentType: false,
            processData: false,
            data : chat_frm_Data,
            success:function(message_send){
                $("#message").val("");
                $('#chat_attach').val('');
                messageload()
            }
        });
    }
});

function messageload(){

    $.ajax({
        url : "inc/request.php",
        type: "get",
        data : {type:"get_messages_community",chat_list:$("#chat_list").val()},
        success:function(message_get){
            $("#message_area").html(message_get);
            scrollToBottom();
        }
    });

}

function scrollToBottom() {
    var messageArea = $('#message_area');
    messageArea.scrollTop(messageArea[0].scrollHeight);
}



$(document).ready(function() {
    
    messageload();
    scrollToBottom();
    setInterval(messageload, 10000);
});