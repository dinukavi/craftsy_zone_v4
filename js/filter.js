$(document).on("click", "#search_craft", function() {
    var selectedMaterials = [];
    var selectedAges = [];

    $('.image-container input[type="checkbox"]:checked').each(function() {
        if ($(this).attr('name') === 'ages') {
            selectedAges.push($(this).attr('id'));
        } else {
            selectedMaterials.push($(this).attr('id'));
        }
    });

   
    var materialQueryString = $.param({ filters: selectedMaterials });
    var ageQueryString = $.param({ ages: selectedAges });

    
    var queryString = materialQueryString + "&" + ageQueryString;

    
    window.location.href = "video_list.php?" + queryString;
});

$(document).on("click","#clear_filter",function(){
    $('.image-container input[type="checkbox"]').prop('checked', false);
})