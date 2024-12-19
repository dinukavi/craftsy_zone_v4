$(document).on("click","#delete_item",function(){

    $.ajax({
        url : "inc/request.php",
        type: "post",
        data : {type:"remove_my_items",item:$(this).attr("data-cat")},
        success:function(add_product){
            if (confirm("Product Remove successfully. Click OK to reload the page.")) {
                location.reload();
            }
        }
    });

});