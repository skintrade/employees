jQuery(window).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
    $(".backClick").click(function() {
        window.history.back();
    });

});
$(document).ready(function() {
    //console.log( "doc loaded" );
    $("#sreset").click(function () {
        $(this).closest('form').find("input[type=text], textarea").val("");
        $(this).closest('form').find("option[value='']").prop('selected', true);
    });
});
