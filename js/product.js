$(document).on("click","#product_upload",function(){
    var cmp_frm_Data = new FormData();
    var cmp_file_data = $('#file_slt').prop('files')[0];

    if(cmp_file_data=="" || cmp_file_data==null){
        
    }else{
        
        cmp_frm_Data.append('type',"add_product");
        cmp_frm_Data.append('prod_type',$("#prod_type").val());
        cmp_frm_Data.append('item_name',$("#item_name").val());
        cmp_frm_Data.append('item_desc',$("#item_desc").val());
        cmp_frm_Data.append('item_price',$("#item_price").val());
        cmp_frm_Data.append('product_image',cmp_file_data);

        $.ajax({
            url : "inc/request.php",
            type: "post",
            dataType: "script",
            cache: false,
            contentType: false,
            processData: false,
            data : cmp_frm_Data,
            success:function(add_product){
                if (confirm("Product added successfully. Click OK to reload the page.")) {
                    location.reload();
                }
            }
        });
    }
});

$(document).on("click","#product_update",function(){
    
    var cmp_frm_Data = new FormData();
    var cmp_file_data = $('#file_slt').prop('files')[0];

    if(cmp_file_data=="" || cmp_file_data==null){
        
    }else{
        
        cmp_frm_Data.append('type',"update_product");
        cmp_frm_Data.append('prod_id',$("#item_id").val());
        cmp_frm_Data.append('prod_type',$("#prod_type").val());
        cmp_frm_Data.append('item_name',$("#item_name").val());
        cmp_frm_Data.append('item_desc',$("#item_desc").val());
        cmp_frm_Data.append('item_price',$("#item_price").val());
        cmp_frm_Data.append('product_image',cmp_file_data);

        $.ajax({
            url : "inc/request.php",
            type: "post",
            dataType: "script",
            cache: false,
            contentType: false,
            processData: false,
            data : cmp_frm_Data,
            success:function(add_product){
                if (confirm("Product Update successfully. Click OK to reload the page.")) {
                    location.reload();
                }
            }
        });
    }
});
